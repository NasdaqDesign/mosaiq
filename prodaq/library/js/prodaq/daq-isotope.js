// Isotope Stuff
// http://www.aliciaramirez.com/2014/03/integrating-isotope-with-wordpress/
// ------------------------------------------------------------------------------------------
(function($) {

	var $body = $('body'),
		$container = $('.isotope-filter'); //The ID for the list with all the blog posts
		$container.isotope({ //Isotope options, 'item' matches the class in the PHP
			itemSelector : '.isotope-list__item',
				layoutMode : 'masonry'
		});
		isotopeComplete($container);

	//Add the class selected to the item that is clicked, and remove from the others
	var $optionSets = $('.filters'),
		$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
		var $this = $(this);
		var $parent = $this.parent();
		// don't proceed if already selected
		if ( $parent.hasClass('selected') ) {
			return false;
		}
		var $optionSet = $this.parents('#filters');
		$optionSets.find('.selected').removeClass('selected');
		$parent.addClass('selected');

		//When an item is clicked, sort the items.
		var selector = $this.attr('data-filter');
		$container.isotope({ filter: selector });
		isotopeComplete($container);

		//return false;
	});
	
	function isotopeComplete($container){
		$container.each(function() {
			var $this = $(this),
			$parent = $this.parent();
			$parent.removeClass('isEmpty');
			if(!$this.data('isotope').filteredItems.length){
				$parent.addClass('isEmpty');
			}
		});
	}

	$body.on('change', 'select.filters', function(){
		var $this = $(this);

		var selector = $(this).val();
		$container.isotope({ filter: selector });

		return false;

	});
})(jQuery);
