define(['jquery'], function(){

	function Parallax () {
		
		// Parallax class
		this.pClass = $('.js-parallax');
		
		// Parallax element target
		this.pElemAttr = this.pClass.attr('data-parallax');
		
		// The actual element
		this.pElem = $('#js-' + this.pElemAttr);
		
		// Parallax element height
		this.pElemHeight = this.pElem.height();
		
		// Parallax speed from the front end
		this.pSpeed = this.pClass.attr('data-speed');
		
	}

	/**
	 *  Initialize the parallax effect
	 *
	 * @param {object} element
	 */
	Parallax.prototype.initialize = function () {
		var _this = this,
			win = $(window),
        	lastScrollTop = 0;
		
		// On scroll action the parallax effect. Bind is used due to the fact that we are declaring this within inside the function
		win.bind('scroll', function() {
			var st = $(this).scrollTop();
			
			// If the scrollTop is less than or equal to the element height then perform the parallax effect
			if (st <= _this.pElemHeight) {
				if (st >= lastScrollTop && lastScrollTop <= _this.pElemHeight){
					_this.pElem.css('transform', 'matrix(1, 0, 0, 1, 0, '+(st/_this.pSpeed)+')');
				} else {
					_this.pElem.css('transform', 'matrix(1, 0, 0, 1, 0, '+(st/_this.pSpeed)+')');
				}
			}

			lastScrollTop = st;
		});		
	}
	
	return Parallax;

});