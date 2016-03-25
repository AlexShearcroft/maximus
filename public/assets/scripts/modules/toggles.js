define(['jquery'], function(){

	function Toggles () {

		// The area to toggle up and down
		this.toggleArea = 'data-toggle';
		
	}

	/**
	 * Toggles a div area up and down
	 * @param {object} element
	 */
	Toggles.prototype.toggle = function (element) {

        var area = element.attr(this.toggleArea);

        $('#js-' + area).toggle();
	}
	
	/**
	 * Slidetoggles a div area up and down
	 * @param {object} element
	 */
	Toggles.prototype.slideToggle = function (element) {

        var area = element.attr(this.toggleArea);

        $('#js-' + area).slideToggle();
	}
	
	return Toggles;

});