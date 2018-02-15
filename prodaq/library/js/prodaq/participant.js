(function($) {


	$(document).ready(function(){
		if(location.hash) {
			$(location.hash).modal('show');
		}

		$('.participant__assets-container').on('click', '.interview-summary', function(e){
			$(this.hash).modal('show');
		});
		$('.vimeo-media').fancybox({
			 maxWidth	: 800,
			 maxHeight	: 400,
			 padding: 0,
			 helpers : {
				 overlay: {
					 locked: false
				 },
				 media : {}
			 }
		});
	});

})(jQuery);
