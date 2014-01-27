$(function()
{
	SK.initHead();
	SK.initMenu();
	SK.initFooter();
	SK.initFunctionButtons();
	SK.initSidebar();
	SK.initAccordions();
	SK.initLoginButton();
	SK.initSelects();
	SK.initTab();

	$('.slideshow').each(SK.initSlideshow);
	$('.stepshow').each(SK.initStepshow);
	$('input[placeholder],textarea[placeholder]').placeholder();
	SK.resetMediaUpdates();
	$(window).bind('resize',SK.resetMediaUpdates);

	$(window).bind('scroll',function()
	{
		if ($(window).scrollTop() > 50)
		{
			$('#top-bar').addClass('small');
		}
		else
		{
			$('#top-bar').removeClass('small');
		}
	});

	if (window['skrollr'] && !SK.isTouchDevice)
	{
		skrollr.init();
	}
});



SK = {};
SK.isTouchDevice = ("createTouch" in document);
SK.isIE = !!navigator.userAgent.match(/Trident/i);


SK.initFunctionButtons = function()
{
	$('.page-text-size').each(function()
	{
		$(this).find('b[data-size]').click(function(evt)
		{
			evt.preventDefault();
			var size = $(this).attr('data-size');
			var selector = $(this).parent().attr('data-for');
			$(selector).css('font-size',size);
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
		});
	});
};


SK.initSidebar = function()
{
	$('.link-list').each(function()
	{
		$(this).find('li.has-sub-items > a').click(function(evt)
		{
			evt.preventDefault();
			var li = $(this).parent().toggleClass('open');
			if (li.is('.open'))
			{
				li.children('ul').hide().slideDown();
			}
			else
			{
				li.children('ul').show().slideUp();
			}
		});
	});
};

SK.initHead = function()
{
	$('header .click-to-show-search-form').click(function(evt)
	{
		evt.preventDefault();
		if (SK.isTouchDevice)
		{
			$('header').removeClass('is-default').addClass('is-search');
			$('header form input').focus().bind('blur.abc',function()
			{
				$(this).unbind('.abc');
				$('header').css('position','fixed');
			})
			$('header').css('position','absolute');
		}
		else
		{
			$('header').removeClass('is-default').addClass('is-search');
			if (!SK.isIE) $('header form input').focus();
		}
	});

	$('header .close-search').click(function()
	{
		$('header').addClass('is-default').removeClass('is-search');
	});

	if (SK.isTouchDevice)
	{
		SK.resetViewPort();
		$(window).resize(SK.resetViewPort);
	}



	$('header .line1 .block.block-menu').click(function(evt)
	{
		evt.preventDefault();
		var btn = $(this);
		if ($(this).hasClass('active'))
		{
			$(this).removeClass('active');
			$('header .mobile-menu').slideUp();
		}
		else
		{
			$(this).addClass('active');
			$('header .mobile-menu').slideDown();
		}

		setTimeout(function()
		{
			$(window).bind('click.menu touchend.menu',function()
			{
				btn.removeClass('active');
				$('header .mobile-menu').slideUp();
				$(window).unbind('.menu');
			});
		},0);
	});
};

SK.resetViewPort = function()
{
	var $viewportMeta = $('meta[name="viewport"]');
	if (screen.width >= 768)
	{
		$viewportMeta.attr('content', 'width=device-width,minimum-scale=1,user-scalable=yes');
	}
	else if (screen.width < 768 && screen.width >= 480)
	{
		$viewportMeta.attr('content', 'width=device-width,minimum-scale=1,user-scalable=yes');
	}
	else
	{
		var p = screen.width / 480;
		$viewportMeta.attr('content', 'width=480,initial-scale='+p+',user-scalable=no');
	}
};

SK.initMenu = function()
{
	$('nav ul.menu > li').mouseenter(function()
	{
		//$('nav ul.menu > li.active').removeClass('active');
		$(this).addClass('active').find('.slidedown').slideDown(100);
	}).mouseleave(function()
	{
		$(this).removeClass('active').find('.slidedown').slideUp(50);
	});
};

SK.initFooter = function()
{
	$('footer .newsletter .tab.tab1').click(function()
	{
		$('footer .newsletter .tab.tab1').hide();
		$('footer .newsletter .tab.tab2').show();
		var input = $('footer .newsletter .tab.tab2 input')[0];
		$(input).placeholder();
		input.focus();
		setTimeout(function()
		{
			input.blur();
		},10);
	});
	$('footer .newsletter .tab.tab2 .close').click(function()
	{
		$('footer .newsletter .tab.tab2').hide();
		$('footer .newsletter .tab.tab1').show();
	});


	$('footer .back-to-top').click(function(evt)
	{
		evt.preventDefault();
		$('html,body').animate({ scrollTop : 0});
	});
};



SK.initSlideshow = function()
{
	var $slides = $(this);
	var animationType = $slides.attr('data-type');
	var interval = $slides.attr('data-interval');
	var animationTime = $slides.attr('data-animation-time') || 300;
	var timer;
	var animating = false;

	function slide(isNext)
	{
		if (animating) return;
		animating = true;
		var $current = $slides.find('.slide.active');
		var $next = isNext ? $current.next('.slide') : $current.prev('.slide');
		if ($next.length == 0) $next = isNext ? $slides.find('.slide').first() : $slides.find('.slide').last();
		$next.addClass(isNext?'next':'prev');
		animate($current,$next,isNext ? 1 : -1,function()
		{
			$current.removeClass('active');
			$next.addClass('active').removeClass(isNext?'next':'prev');
			animating = false;
		});
	}

	function slideTo(index)
	{
		if (animating) return;
		index = parseInt(index,10);
		if (index < 1) index = 1;
		var $current = $slides.find('.slide.active');
		var $next = $slides.find('.slide').eq(index -1 );
		if ($next.is($current)) return;
		$next.addClass('next');
		animating = true;
		animate($current,$next,1,function()
		{
			$current.removeClass('active');
			$next.addClass('active').removeClass('next');
			animating = false;
		});
	}

	

	function animate($dom,$next,direction,cb)
	{
		try{ clearTimeout(timer);}catch(e){}
		if (animationType == 'fade')
		{
			$dom.fadeOut(animationTime,cb);
			$next.show();//.fadeIn(animationTime);
		}
		else if (animationType == 'horizontal')
		{
			var w = $dom.parent().width();
			$dom.animate({left: -1*w*direction },animationTime,cb);
			$next.css({left:w*direction}).animate({left:0});
		}
		else if (animationType == 'vertical')
		{
			var h = $dom.parent().height();
			$dom.animate({'top': -1*h*direction },animationTime,cb);
			$next.css({'top':h*direction}).animate({'top':0});
		}
		else
		{
			cb();
		}
		if ($slides.find('.indicators').length > 0)
		{
			var slides = $slides.find('.slide');
			for(var i=0;i<slides.length;i++)
			{
				if (slides.eq(i).is($next))
				{
					$slides.find('.slide-indicator.active').removeClass('active');
					$slides.find('.slide-indicator[data-slide='+(i+1)+']').addClass('active');
					break;
				}
			}
		}
	}

	function initTimer()
	{
		try{ clearTimeout(timer);}catch(e){}
		timer = setTimeout(function()
		{
			slide(1);
			initTimer();
		},interval);
	}

	if (interval && interval > 0)
	{
		interval = parseInt(interval,10);
		$slides.mouseenter(function()
		{
			try{ clearTimeout(timer);}catch(e){}
		}).mouseleave(function()
		{
			initTimer();
		});
		initTimer();
	}

	$slides.find('.arrows > a').click(function(evt)
	{
		evt.preventDefault();
		var isNext = $(this).is('.next');
		slide(isNext);
	});

	$slides.find('.indicators > a').click(function(evt)
	{
		evt.preventDefault();
		var index = $(this).attr('data-slide') || '1';
		slideTo(index);
	});

	if ($slides.find('.slide.active').length == 0) $slides.find('.slide').eq(0).addClass('active');

};


SK.initStepshow = function()
{
	var $slides = $(this);
	var $inner = $slides.find('.stepshow-inner');
	var animationType = $slides.attr('data-type');
	var interval = $slides.attr('data-interval');
	var animationTime = $slides.attr('data-animation-time') || 300;
	var animating = false;

	var itemSelector = $slides.attr('data-item');
	var totalItems = $inner.find(itemSelector).length;
	var containerWidth = $slides.find('.stepshow-container').width();
	
	var $item = $inner.find(itemSelector).eq(0);
	var itemWidth = $item.width() + parseInt($item.css('margin-right') || 0) + parseInt($item.css('margin-left') || 0);
	var itemHeight = $item.height() + parseInt($item.css('margin-top') || 0) + parseInt($item.css('margin-bottom') || 0);
	var itemsOnScreen = Math.round(containerWidth / itemWidth);

	function slide(isNext)
	{
		var current = $slides.attr('data-current') || 1;
		current = parseInt(current,10);
		if (totalItems - current < itemsOnScreen && isNext) return;//current = 0;
		if (current <= 1 && !isNext) return;//current = totalItems - itemsOnScreen + 2;
		current += isNext ? 1 : -1;
		slideTo(current);
	}

	function slideTo(index)
	{
		if (animating) return;
		animating = true;
		animate(index-1,function()
		{
			$slides.attr('data-current',index);
			animating = false;
		});
	}

	function animate(index,cb)
	{
		if (animationType == 'horizontal')
		{
			$inner.animate({left: -1*itemWidth*index },animationTime,cb);
		}
		else if (animationType == 'vertical')
		{
			var h = $dom.height();
			$inner.animate({'top': -1*itemHeight*index },animationTime,cb);
		}
		else
		{
			cb();
		}
	}

	$slides.find('.arrows > a').click(function(evt)
	{
		evt.preventDefault();
		var isNext = $(this).is('.next');
		slide(isNext);
	});

	if (!$slides.attr('data-current')) $slides.attr('data-current','1');
};



SK.resetMediaUpdates = function()
{
	var windowWidth = $(window).width();
	var containerWidth = $('header .container').width();
	var containerItems = 3;
	var marginWidth = 10;
	if (containerWidth == 758) // if tablet
	{
		containerWidth = 658;
		containerItems = 2;
	}


	if (windowWidth < 758 ) //if mobile
	{
		containerItems = 1;
		windowWidth = containerWidth;
		marginWidth = 0;
	}


	$('.media-block').each(function()
	{
		var itemWidth = $(this).find('.media-item').width()+marginWidth;
		var $self = $(this);
		var totalColumns = $self.attr('data-total-columns') || 0;
		scrollFix();

		$self.find('.arrows > a').unbind('.abc').bind('click.abc',function(evt)
		{
			evt.preventDefault();
			var previous = $self.attr('data-previous-columns') || 0;
			previous = parseInt(previous,10);
			if ($(this).is('.next'))
			{
				if (previous + containerItems >= totalColumns)
				{
					previous = -1;
				}
				$self.attr('data-previous-columns',previous+1);
			}
			else
			{
				if (previous <= 0)
				{
					previous = totalColumns - containerItems + 1;
				}
				$self.attr('data-previous-columns',previous-1);
			}
			scrollFix();
		});

		function scrollFix()
		{
			var previous = $self.attr('data-previous-columns') || 0;
			var left = (windowWidth - containerWidth)/2 - itemWidth * parseInt(previous,10);
			var $inner = $self.find('.media-items-wrapper');
			$inner.stop().animate({left:left},300);
		}
	});
};



SK.initAccordions = function()
{
	$('.accordion-block').each(function()
	{
		var $content = $(this).find('.accordion-content-wrapper');
		var $title = $(this).find('.block-title');
		var $self = $(this);
		$title.click(function(evt)
		{
			evt.preventDefault();
			$self.toggleClass('open');
			if ($self.is('.open'))
			{
				$content.hide().slideDown();
			}
			else
			{
				$content.show().slideUp();
			}
		});
	});
};


SK.initLoginButton = function()
{
	$('.events-login-wrapper .actions').click(function(evt)
	{
		evt.preventDefault();
		var btn = $(this);
		if (btn.is('.active'))
		{
			btn.removeClass('active');
			return;
		}
		btn.addClass('active');
		setTimeout(function()
		{
			$(window).bind('click.loginbutton touchend.loginbutton scroll.loginbutton',function()
			{
				btn.removeClass('active');
				$(window).unbind('.loginbutton');
			});
		},0);
	});
};


SK.initSelects = function()
{
	$('select.sync-value-select').each(function()
	{
		var dom = $( $(this).attr('data-for') );
		var select = $(this);
		if (dom.length == 0) return;
		dom.html( select.find('option:selected').html() );
		select.bind('change',function()
		{
			dom.html( select.find('option:selected').html() );
		});
	});
};


SK.initTab = function()
{
	$('.tab-container').each(function()
	{
		var container = $(this);
		var contentWrapper = container.find('.tab-content-wrapper');
		var head = container.find('.tab-head');
		head.find('.tab').click(function()
		{
			if ($(this).is('.active')) return;
			head.find('.tab.active').removeClass('active');
			$(this).addClass('active');
			var className = $(this).attr('data-for');
			contentWrapper.find('.tab.active').removeClass('active');
			contentWrapper.find('.tab.'+className).addClass('active');
		});
	});
};







