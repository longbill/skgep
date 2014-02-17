<?php

error_reporting(E_ALL ^ E_NOTICE);

include('lib/lorem.php');


function rand_choose($s)
{
	$arr = explode(",",$s);
	$t = count($arr);
	return $arr[ rand(0,$t-1) ];
}



class EndSkin
{
	public $vars = array();
	public $template_dir = './';
	public $cache_dir = '/tmp';
	public $compile_hook = '';
	public $debug = true;
	public $command_line_php = 'php';

	function EndSkin($template_dir = NULL,$cache_dir = NULL)
	{
		if ($template_dir) $this->template_dir = $template_dir;
		if ($cache_dir)
		{
			$this->cache_dir = $cache_dir;
		}
		else if ($_ENV && $_ENV['TMPDIR'])
		{
			$this->cache_dir = $_ENV['TMPDIR'];
		}
		if (substr($this->template_dir,-1) != '/') $this->template_dir.='/';
		if (substr($this->cache_dir,-1) != '/') $this->cache_dir.='/';
		if (!is_dir($this->template_dir)) mkdir($this->template_dir);
		if (!is_dir($this->cache_dir)) mkdir($this->cache_dir);
	}
	
	function assign($key,$data = NULL)
	{
		if (is_array($key))
		{
			foreach($key as $_k=>$_v) $this->vars[$_k] = $_v;
		}
		else
		{
			$this->vars[$key] = $data;
		}
	}
	
	function display($__endskin__template = '')
	{
		if (!$__endskin__template) die('EndSkin->display() need a template file name');
		extract($this->vars);
		$tmpfile = $this->_compile($__endskin__template);
		if ($this->debug)
		{
			$s = array();
			exec($this->command_line_php.' -l "'.$tmpfile.'"',$s);
			$s = join("\n",$s);
			if (preg_match('/no syntax errors/i',$s))
			{
				include($tmpfile);
			}
			else
			{
				$lines = file($tmpfile);
				preg_match_all('/line (\d+)/',$s,$ms);
				$marklines = array();
				if ($ms && $ms[1])
				{
					foreach($ms[1] as $i=>$line)
					{
						$marklines[ $line-1 ] = true;
					}
				}
				$html = array();
				foreach($lines as $i=>$line)
				{
					$html[] = isset($marklines[$i]) ? '<span style="color:red">'.htmlspecialchars($line).'</span>' : htmlspecialchars($line);
				}
				header('Content-type: text/html; charset=utf-8');
				echo '<pre><span style="color:red">'.$s."</span>\n".join("",$html).'</pre>';
				die;
			}
		}
		else
		{
			include($tmpfile);
		}
		unlink($tmpfile);
	}
	
	function result($template = '')
	{
		if (!$template)  die('EndSkin->result() need a template file name');
		ob_start();
	    $this->display($template);
	    $s  =  ob_get_contents();
	    ob_end_clean();
	    return $s;
	}
	
	private function _compile($template)
	{
		$filename = $this->template_dir.$template;
		$cache_filename = $this->cache_dir.md5($template);
		//if (file_exists($cache_filename) && filemtime($cache_filename) > filemtime($filename)) return $cache_filename;
		$page = $this->_get_template($template);

		//匹配变量
		if (preg_match_all('/\{(\$[a-zA-Z\_][a-zA-Z0-9\_\.\-\>\[\]\'\"]*)\}/',$page,$ms))
		{
			foreach($ms[1] as $cnt=>$tag)
			{
				$tag = $this->_replace_var_name($tag);
				$code = '<'.'?php echo '.$tag.'; ?'.'>';
				$page = str_replace($ms[0][$cnt],$code,$page);
			}
		}
		
		//匹配foreach
		if (preg_match_all('/\{(foreach\s*\([^}]+\))\}/',$page,$ms))
		{
			foreach($ms[1] as $cnt=>$tag)
			{
				$tag = $this->_replace_var_name($tag);
				$code = '<'.'?php '.$tag.': ?>';
				$page = str_replace($ms[0][$cnt],$code,$page);
			}
		}

		//匹配if,elseif
		if (preg_match_all('/\{((else)?if\s*\([^}]+\))\}/',$page,$ms))
		{
			foreach($ms[1] as $cnt=>$tag)
			{
				$tag = $this->_replace_var_name($tag);
				$code = '<'.'?php '.$tag.':?>';
				$page = str_replace($ms[0][$cnt],$code,$page);
			}
		}

		//匹配函数调用
		if (preg_match_all('/\{([a-zA-Z0-9\_]+\([^\}]*\))\}/',$page,$ms))
		{
			foreach($ms[1] as $cnt=>$tag)
			{
				$tag = $this->_replace_var_name($tag);
				if (!preg_match('/\;\s*$/',$tag)) $tag.=';';
				$code = '<'.'?php echo '.$tag.'?>';
				$page = str_replace($ms[0][$cnt],$code,$page);
			}
		}

		$page = preg_replace('/\{\/foreach\}/i','<?php endforeach; ?>',$page);
		$page = preg_replace('/\{else\}/i','<?php else: ?>',$page);
		$page = preg_replace('/\{\/if\}/i','<?php endif; ?>',$page);
		
		if ($this->compile_hook && function_exists($this->compile_hook))
		{
			$_hook = $this->compile_hook;
			$page = $_hook($page);
		}
		
		file_put_contents($cache_filename,$page);
		return $cache_filename;
	}
	
	private function _replace_var_name($s)
	{
		preg_match_all('/\$([a-zA-Z\_][a-zA-Z\_0-9]*)\.([\.a-zA-Z\_0-9]+)/',$s,$ms);
		foreach($ms[1] as $i=>$v)
		{
			$parts = explode('.',$ms[2][$i]);
			$code = '$'.$ms[1][$i];
			foreach($parts as $_p)
			{
				$code.= '[\''.$_p.'\']';
			}
			$s = str_replace($ms[0][$i],$code,$s);
		}
		return $s;
	}
	
	private function _get_template($template,$indent='')
	{
		$filename = $this->template_dir.$template;
		$lines = file($filename);
		$indent = str_replace(array("\r","\n"),"",$indent);
		$s = join($indent,$lines);
		preg_match_all('/([\s\t]*)<\!\-\-\s+INCLUDE\s+(.*?)\s*\-\-\>/i', $s, $ms);
		foreach($ms[2] as $_key=>$_temp)
		{
			$s = str_replace(trim($ms[0][$_key]),$this->_get_template(trim($_temp),$ms[1][$_key]),$s);
		}
		return $s;
	}
}