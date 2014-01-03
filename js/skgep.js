$(function()
{
	SK.initHead();
	SK.initMenu();
	SK.initFooter();
	$('.slideshow').each(function()
	{
		SK.initSlideshow(this);
	});
	$('input[placeholder],textarea[placeholder]').placeholder();

});



SK = {};
SK.isTouchDevice = ("createTouch" in document);
SK.isIE = !!navigator.userAgent.match(/Trident/i);

SK.initHead = function()
{
	$('header .click-to-show-search-form').click(function()
	{
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
		var $viewportMeta = $('meta[name="viewport"]');
		var isPad = true;
		if (screen.width < 768)
		{
			isPad = false;
			$viewportMeta.attr('content', 'width=480,initial-scale=0.666,maximum-scale=0.666,user-scalable=no');
		}
	}



	$('header .line1 .block.block-menu').click(function(evt)
	{
		evt.preventDefault();
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
	});
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



SK.initSlideshow = function(dom)
{
	var $slides = $(dom);
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

	if ($slides.find('.slide.active').length == 0) $slides.find('.slide').eq(0).addClass('active');

};
















