$(function()
{
	SK.initHead();
});



SK = {};
SK.isTouchDevice = ("createTouch" in document);
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
			$('header form input').focus();
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
		// $('input, select, textarea').bind('focus blur', function(event)
		// {
		// 	if (isPad)
		// 	{
		// 		$viewportMeta.attr('content', 'width=device-width,initial-scale=1,maximum-scale=' + (event.type == 'blur' ? 10 : 1));
		// 	}
		// 	else
		// 	{
		// 		$viewportMeta.attr('content', 'width=device-width,initial-scale=0.666,maximum-scale=' + (event.type == 'blur' ? 10 : 0.666));
		// 	}
		// });
	}
};