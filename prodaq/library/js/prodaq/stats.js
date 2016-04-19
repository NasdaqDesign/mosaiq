(function($) {

	var chartHeight, totalCount;
	$(document).ready(function(){
		$( '.filters .select2' ).select2( {
			placeholder: 'Select an option',
			width: '100%'
		}).on('change', function(e) {
			$('.isotope-filter').isotope({ filter: this.value });
			
			//cleanup
			$('.bar-chart').empty();
			$('.is-charted').removeClass('is-charted');
			$('.filters .selected').removeClass('selected');
			console.log(e);
			console.log(this);
			$('.filters select.select2').not(this).select2("val", "");
			
			var meetingCount = $(e.target).find(':selected').data('meetings');
			$('.bar-chart').append('<div class="total-count">' + meetingCount + ' Meeting' + (meetingCount > 1 ? 's': '') +'</div>');
		});
		
		chartHeight = $('.bar-chart').height();
		totalCount = $('body').find('.filters a[data-total-count]').data('total-count');
		
		$('.bar-chart').append('<div class="total-count">' + totalCount + ' Total Participants</div>');

		$('.progress-meter').each(function(){
			var elm = $(this).attr('id'),
				complete = $(this).data('complete'),
				startColor = '#f16669',
				endColor = '#48D0AA';

			if(complete < 0.5){
				endColor = startColor;
			}
			else if(complete >= 0.5 && complete < 0.7){
				endColor = '#FFC360';
			}
			var circle = new ProgressBar.Circle('#'+elm, {
				color: startColor,
				strokeWidth: 4,
				trailWidth: 5,
				duration: 1500,
				step: function(state, circle){
					circle.path.setAttribute('stroke', state.color);
				}
			});
			circle.animate(complete, {
					from: {color: startColor},
					to: {color: endColor}
			});
		});
	});
	
	$('body').on('click', '[data-filter]', function(e) {
		e.preventDefault();
		var $this = $(this);
		var filterList = $this.closest('.filters');
		if(!filterList.hasClass('is-charted')) {
			//cleanup
			$('.bar-chart').empty();
			$('.is-charted').removeClass('is-charted');
			$('.filters select.select2').select2("val", "");
						
			var chartMax = filterList.data('chartMax') ? filterList.data('chartMax') : 0;
			
			if(filterList.has('[data-total-count]').length > 0){
				//participants clicked
				$('.bar-chart').append('<div class="total-count">' + totalCount + ' Total Participants</div>');
			}
			else {
				filterList.addClass('is-charted').find('[data-filter]').each(function(i){
					var $this = $(this);
					if(chartMax !== 0 && i >= chartMax) return false;
					var count = $this.data('count'),
						label = $this.data('label') ? $this.data('label') : $this.text(),
						barHeight = count * chartHeight / totalCount;
					$('.bar-chart').addClass('four').append('<div data-height="'+ barHeight +'"><h4>'+ label +': '+ count +'</h4></div>');
				});
				setTimeout(function(){
					$('.bar-chart div').each(function(){
						var $this = $(this);
						var barHeight = $this.data('height');
						$this.animate({height: barHeight}, 250);
					});
				}, 1000);
			}
		}
	});

})( jQuery );
