(function($) {


	$(document).ready(function(){
		$wrapper = $('#report-wrapper');

		// Fullpage config
		var navArr = [],
			anchorArr = [];
		// dynamically populate the needed arrays for variable sections
		$('.section').each(function(){
			navArr.push($(this).data('name'));
			anchorArr.push($(this).data('anchor'));
		});
		// make sure we know how many image slides there are and which section it is
		var imageSlideCount = $('.slide').length,
			imagesIndex = $wrapper.find('#images').index() + 1;

		$wrapper.fullpage({
			navigation: true,
			anchors: anchorArr,
			navigationTooltips: navArr,
			controlArrows: true,
			showActiveTooltip: true,
			afterLoad: function(anchorLink, index){
				var loadedSection = $(this);
				if(index == imagesIndex){
					placePoints(loadedSection);
					loadedSection.find('.slide.active .target').popover('show');
				}
			},
			onLeave: function(index, nextIndex, direction){
				var leavingSection = $(this);
				if(index == imagesIndex){
					leavingSection.find('.target').popover('destroy').remove();
				}
			},
			afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
				var loadedSlide = $(this);
				loadedSlide.find('.target').popover('show');
			},
			onSlideLeave: function( anchorLink, index, slideIndex, direction, nextSlideIndex){
				var leavingSlide = $(this);
				leavingSlide.find('.target').popover('destroy');
			}
		});

		hideNav($wrapper, 1500);
	});

})(jQuery);
