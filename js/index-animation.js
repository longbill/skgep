$(function()
{
	if (SK.isTouchDevice) return;
	var H = $('html').height();
	var h = $(window).height();
	$(window).bind('scroll',function()
	{
		var y = $(window).scrollTop();
		for(var i=0,ani; ani=ANI.animations[i];i++)
		{
			if (ani.canRun(y,h,H))
			{
				ani.run.call(ani);
			}
		}
	});

	for(var i=0,ani; ani=ANI.animations[i];i++)
	{
		ani.init.call(ani);
	}
});

var ANI = {};
ANI.animations = [];
ANI.animations[0] = 
{
	init: function()
	{
		$('#animation1').css('left',-500);
		$('#animation2').css('right',-500);
		$('#animation3').css('bottom',-200);
	},
	animated: false,
	canRun: function(y)
	{
		if (this.animated) return false;
		if (y > 300)
		{
			this.animated = true;
			return true;
		}
		return false;
	},
	run : function()
	{
		$('#animation1').animate({'left':0},1500);
		$('#animation2').animate({'right':0},1500);
		$('#animation3').animate({'bottom':0},1500);
	}
};

ANI.animations[1] = 
{
	init: function()
	{
		$('#animation-media').css('margin-left',2000);
	},
	animated: false,
	canRun: function(y)
	{
		if (this.animated) return false;
		if (y > 800)
		{
			this.animated = true;
			return true;
		}
		return false;
	},
	run : function()
	{
		$('#animation-media').animate({'margin-left':0},1000);
	}
};


ANI.animations[2] = 
{
	doms: null,
	EN:false,
	init: function()
	{
		this.doms = $('#animation-popup1').add('#animation-popup2').add('#animation-popup3');
		this.doms.each(function()
		{
			$(this).data(
			{
				'transform':'scale(1)',
				'opacity':1
			});
			$(this).css(
			{
				opacity:0,
				'transform':'scale(0)'
			});//.find('.slides-wrapper').css('opacity',0);
		});
		this.EN = $('html').is('.EN');
	},
	animated: false,
	canRun: function(y)
	{
		if (this.animated) return false;
		if (y > 1550)
		{
			this.animated = true;
			return true;
		}
		return false;
	},
	run : function()
	{
		var ani = this;
		this.doms.each(function(i)
		{
			var self = this;
			setTimeout(function()
			{
				var dim = $(self).data();
				$(self).animate(dim,300);
			},(ani.EN ? (3-i) : i )*200);
		});
	}
};




ANI.animations[3] = 
{
	doms: null,
	EN:false,
	init: function()
	{
		this.doms = $('#animation-block1').add('#animation-block2').add('#animation-block3');
		this.doms.each(function()
		{
			$(this).data(
			{
				'top':'0',
				'opacity':1
			});
			$(this).css(
			{
				'position':'relative',
				'top':500,
				'opacity':0
			});
		});
		this.EN = $('html').is('.EN');
	},
	animated: false,
	canRun: function(y,h,H)
	{
		if (this.animated) return false;
		if (H - y - h < 200)
		{
			this.animated = true;
			return true;
		}
		return false;
	},
	run : function()
	{
		var ani = this;
		this.doms.each(function(i)
		{
			var self = this;
			setTimeout(function()
			{
				var dim = $(self).data();
				$(self).animate(dim,300);
			},(ani.EN ? i : (3-i) )*300);
		});
	}
};
