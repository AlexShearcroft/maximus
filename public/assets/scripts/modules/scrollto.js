define(['jquery'], function(){

	function ScrollTo () {

		// The area to scroll to
		this.ScrollArea = 'data-area';

	}

	/**
	 * Scrolls to the respected area
	 * @param {object} element
	 */
	ScrollTo.prototype.scrollPos = function (element) {

        var area = element.attr(this.ScrollArea),
        	offset;

        if(area == 'top') {
            offset = 0;
        }
        else {
            offset = $('#js-' + area).offset().top;
        }

        $('html, body').animate({ 
            scrollTop: offset
        }, 800);
	}

	return ScrollTo;

});