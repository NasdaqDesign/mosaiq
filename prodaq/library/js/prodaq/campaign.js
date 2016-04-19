(function($){

	$(document).ready(function(){
		var assetsLength = 0;
		$('.other-assets li').each(function(i){
			assetsLength += $(this).outerWidth();
		});
		if(assetsLength >= $('.other-assets').outerWidth()){
			$('.other-assets').addClass('overflow');
			$('.other-assets ul').css('width', assetsLength + 100);
		}
		
		$('body').on('shown.bs.modal', function(e){
			//when a participant modal is opened up, go find any recordings
			//and start to load them
			//this saves moves the loading of the files to only be done when needed
			//instead of on page load
			var $modal = $(e.target);
			$modal.find('[data-src]:not([data-loaded])').each(function(){
				//find any data-src elements that are NOT loaded already
				var $recordingContainer = $(this);
				//use the data-src to load up a new <audio> control
				$recordingContainer.html('<audio controls><source src="' + $recordingContainer.data('src')  +'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
				//set data-loaded so we don't redo this again the next time the same modal is opened
				$recordingContainer.attr('data-loaded', '');
			});
			
		});
	});
	
})(jQuery);
