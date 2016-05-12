(function($){

$(document).ready(function(){
	var $body = $('body');

	//Datepicker
	$body.on('focus', '.datepicker', function(){
		var dateForm = 'MM yy';
		if($(this).data('format')){
			dateForm = $(this).data('format');
		}
		$(this).datepicker({
			dateFormat: dateForm
		});
	});

	$body.on('click', '.prodaq-widget__nav li a', function(e){
		e.preventDefault();

		var target = $(this).data('target');
		$('.prodaq-widget__nav li').removeClass('active');
		$(this).parent().addClass('active');
		$('.documentation__pane').removeClass('active');
		$('.documentation__pane#' + target).addClass('active');

	});

	$('.quoteFormat').select2({
		allowClear: true,
		formatResult: formatRes,
		formatSelection: formatSel,
		containerCssClass: 'tpx-select2-container',
		dropdownCssClass: 'tpx-select2-drop select2-daq'
	});

	$('#iteration-type').on('change', function(e){
		if(e.val == 'element'){
			$('.iteration__pane').removeClass('active');
			$('.iteration__element').addClass('active');
		}
		else if(e.val == 'intro'){
			$('.iteration__pane').removeClass('active');
			$('.iteration__intro').addClass('active');
		}
		else{
			$('.iteration__pane').removeClass('active');
			$('.iteration__next').addClass('active');
		}
	});
	$('#product-size').on('change', function(e){
		$('.download-template li').removeClass('active');
		if(e.val == 'mobile'){
			$('.download-template li#mobile').addClass('active');
		}
		else if(e.val == 'tablet'){
			$('.download-template li#tablet').addClass('active');
		}
		else{
			$('.download-template li#desktop').addClass('active');
		}
	});

	$('#findings-type').on('change', function(e){
		if(e.val == 'document'){
			$('#findingsDocument').removeClass('hidden');
			$('#findingsReport').addClass('hidden');
		}
		else{
			$('#findingsDocument').addClass('hidden');
			$('#findingsReport').removeClass('hidden');
		}
	});


	function formatRes(quote) {
		var $el = $(quote.element);
		if($el.attr('title')){
			return  quote.text + "<br><small>"+ $el.attr("title") +"</small>";
		}
		else{
			return quote.text;
		}
	}
	function formatSel(quote) {
		var $el = $(quote.element);
		if($el.attr('title')){
			return  $.trim(quote.text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "..." + "<br><small>"+ $el.attr("title") +"</small>";
		}
		else{
			return $.trim(quote.text).substring(0, 50).split(" ").slice(0, -1).join(" ") + "...";
		}
	}







	// Image annotation work

	// Global annotations object
	var Annotations = {};


	// Add actual indicator to the image and build the edit modal.
	// ---------------------------------------------------------------------------
	function addPoint(preview, xpos, ypos, id, index){
		preview.append('<span style="left: ' + (xpos-20) + 'px; top: ' + (ypos-20) + 'px;" id="target-'+ id +'" class="target"><a href="#" data-toggle="modal" data-target="#modal-'+ id +'"><i class="fa fa-edit"></i></a><a href="#" class="remove" data-target="#modal-'+ id +'" data-anno="'+index+'"><i class="fa fa-remove"></i></a></span>');
	}

	function addModal(xperc, yperc, id, index){
		var annotationModal = '<div id="modal-'+ id +'" class="modal modal-annotation fade">' +
			'<div class="modal-dialog">' +
				'<div class="modal-content">' +
					'<div class="modal-body">' +
						'<input type="text" placeholder="Heading">' +
						'<textarea class="" placeholder="Describe the change" rows="6"></textarea>' +
					'</div>' +
					'<div class="modal-footer">' +
						'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
						'<button type="button" data-anno="'+ index + '" data-xperc="'+ xperc.toFixed(4) +'" data-yperc="'+ yperc.toFixed(4) +'" class="btn btn-primary">Save changes</button>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>';

		$body.append(annotationModal);
		$('#modal-'+id).modal('show');
	}


	// Save the points to the appropriate array
	// ---------------------------------------------------------------------------
	function savePoints(index, title, description, xperc, yperc, id){
		// Check to see if the point already exists
		var foundPoint = $.grep(Annotations['anno' + index], function(e){
			return e.id == id;
		});
		// If it exists,update heading and description assuming the other data is the same
		if(foundPoint.length){
			foundPoint[0].heading = title;
			foundPoint[0].annotation = description;
		}
		// Otherwise, create a new annotation object and push it to the array.
		else{
			var annotation = {
				id : id,
				heading : title,
				annotation : description,
				xperc : xperc,
				yperc : yperc
			};
			Annotations['anno' + index].push(annotation);
		}

		// Then update the hidden input with new array
		var $preview = $body.find('#target-'+id).parent();
		// Throw in the json string to be parsed on load
		$preview.siblings('input.annotationArr').val(JSON.stringify(Annotations['anno'+index]));
	}

	// Delete the points from the appropriate array
	// ---------------------------------------------------------------------------
	function deletePoint(point, modal, index){
		var id = modal.substr(modal.indexOf("-") + 1),
			$preview = $body.find('#target-'+id).parent();

		$body.find(modal).remove();

		for(var i = 0; i < Annotations['anno' + index].length; i++) {
			var obj = Annotations['anno'+index][i];
			if(id.indexOf(obj.id) !== -1) {
					Annotations['anno'+index].splice(i, 1);
					i--;
			}
		}
		$preview.siblings('input.annotationArr').val(JSON.stringify(Annotations['anno'+index]));
		point.closest('.target'). remove();
	}


	// Clicking on image to create annotation
	$body.on('click', '.preview-wrapper img', function(e) {
		var $preview = $(this).parent(),
			imgWidth = $(this).width(),
			imgHeight = $(this).height(),
			xpos = e.pageX - $(this).offset().left,
			ypos = e.pageY - $(this).offset().top,
			xperc = xpos / imgWidth,
			yperc = ypos / imgHeight,
			id = xpos.toString() + ypos.toString();

		// Get the index of the parent so we can create appropriate annotation array
		var previewIndex = $preview.closest('.wpa_group-images').index();
		if(typeof Annotations['anno' + previewIndex] === 'undefined'){
			Annotations['anno' + previewIndex] = [];
		}

		addModal(xperc, yperc, id, previewIndex);
		addPoint($preview, xpos, ypos, id, previewIndex);
	})
	// Saving the inputs of the modal
	.on('click', '.modal .btn-primary', function(e){
		e.preventDefault();
		var $modal = $(this).closest('.modal'),
			id = parseInt($modal.attr('id').substr($modal.attr('id').indexOf("-") + 1)),
			title = $modal.find('input').val(),
			description = $modal.find('textarea').val(),
			xperc = $(this).data('xperc'),
			yperc = $(this).data('yperc'),
			index = $(this).data('anno');

		savePoints(index, title, description, xperc, yperc, id);
		$modal.modal('hide');
	})
	// Removing data and added markup
	.on('click', '.target .remove', function(e){
		e.preventDefault();
		deletePoint($(this).parent(), $(this).data('target'), $(this).data('anno'));
	});


	// Quickly add before page load so that we can get image heights after load
	// ---------------------------------------------------------------------------
	$('.preview-wrapper').each(function(){
		var $wrapper = $(this),
			annoImage = $wrapper.closest('.wpa_group-images').find('input.has-wrapper').val();

		if(annoImage){
			var $img = $('<img/>').attr('src', annoImage).appendTo($wrapper);
		}
	});


	// Rebuild appropriate arrays and show UI on load
	// So we can embed in another tab
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.preview-wrapper').each(function(){
			var $wrapper = $(this),
				annotations =  $.parseJSON($wrapper.siblings('.annotationArr').val()),
				previewIndex = $wrapper.closest('.wpa_group-images').index(),
				imgWidth = $wrapper.find('img').width(),
				imgHeight = $wrapper.find('img').height();

			//clear any existing targets
			$wrapper.find('.target').remove();
			// Rebuild Annotations Object with appropriate Arrays
			Annotations['anno' + previewIndex] = [];
			if(annotations){
				for(var i = 0; i < annotations.length; i++){
					var id = annotations[i].id,
						heading = annotations[i].heading,
						description = annotations[i].annotation,
						xperc = annotations[i].xperc,
						yperc = annotations[i].yperc,
						xpos = imgWidth * xperc,
						ypos = imgHeight * yperc;


					var annotation = {
						id : id,
						heading : heading,
						annotation : description,
						xperc : xperc,
						yperc : yperc
					};
					Annotations['anno' + previewIndex].push(annotation);

					// Rebuild Modals
					var annotationModal = '<div id="modal-'+ id +'" class="modal modal-annotation fade">' +
						'<div class="modal-dialog">' +
							'<div class="modal-content">' +
								'<div class="modal-body">' +
									'<input type="text" placeholder="Heading" value="'+ heading +'">' +
									'<textarea class="" rows="6">'+ description +'</textarea>' +
								'</div>' +
								'<div class="modal-footer">' +
									'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
									'<button type="button" data-anno="' + previewIndex + '" data-xperc="'+ xperc +'" data-yperc="'+ yperc +'" class="btn btn-primary">Save changes</button>' +
								'</div>' +
							'</div>' +
						'</div>' +
					'</div>';
					$body.append(annotationModal);

					$wrapper.append('<span style="left: ' + (xpos-20) + 'px; top: ' + (ypos-20) + 'px;" id="target-'+ id +'" class="target"><a href="#" data-toggle="modal" data-target="#modal-'+ id +'"><i class="fa fa-edit"></i></a><a href="#" class="remove" data-target="#modal-'+ id +'" data-anno="'+ previewIndex +'"><i class="fa fa-remove"></i></a></span>');
				}
			}

		});
	});


	$('.row-with-thumb').each(function(){
		var url = $(this).find('.form-group.hidden-input input').val();
		$(this).find('.preview-wrapper').append('<img width="100%" src="'+url+'">');
	});




	//For ckeditors that need to repeat or are initially hidden
	$('.ckeditor-repeatable').ckeditor();

	//Needed to create an event listener... for some reason, the way metabox.php adds a clone is by taking a hidden last item, cloning it, and then inserting the original before the clone (which takes on the last class and remains hidden). This isn't playing nicely with select2 for some reason so this kind of hacks it so it works. TODO: Fix properly
	$(window).on('added', function (e) {
		var newItem = e.state;
		newItem.find('.cke').remove(); //need to remove existing instance and reinitialize ckeditor on hidden textfield.
		newItem.find('.ckeditor-repeatable').ckeditor();
		newItem.find('.select2-container').remove();
		newItem.find('select.selectnice').select2({
			allowClear: true,
			placeholder: 'Select',
			containerCssClass: 'tpx-select2-container',
			dropdownCssClass: 'tpx-select2-drop select2-daq'
		});
		newItem.find('.quoteFormat').select2({
			allowClear: true,
			formatResult: formatRes,
			formatSelection: formatSel,
			containerCssClass: 'tpx-select2-container',
			dropdownCssClass: 'tpx-select2-drop select2-daq'
		});
		newItem.find('input.selectnice-tags').select2({
			tags:[],
			tokenSeparators: [","],
			containerCssClass: 'tpx-select2-container',
			dropdownCssClass: 'tpx-select2-drop select2-daq'
		});
		newItem.find('.select2-container').css('display', 'block');
	});



	$('select.selectnice').select2({
		allowClear: true,
		placeholder: 'Select',
		containerCssClass: 'tpx-select2-container',
		dropdownCssClass: 'tpx-select2-drop select2-daq'
	});
	$('.selectnice-tags').select2({
		tags:[],
		tokenSeparators: [","],
		containerCssClass: 'tpx-select2-container',
		dropdownCssClass: 'tpx-select2-drop select2-daq'
	});

	$('.upload-inline').each(function(){
		var imageUrl = $(this).find('input[type="text"]').val();
		if(imageUrl.length > 0){
			$(this).find('.thumb-container').html('<img src="' + imageUrl + '">');
		}
	});

	//Quick search on dashboard
	//courtesy of http://stackoverflow.com/questions/7621711/how-to-prevent-blur-running-when-clicking-a-link-in-jquery
	var mousedownHappened = false;
	$('#search-participants').on('focus', function(){
		$(this).siblings('ul').addClass('show');
	});
	$('#search-participants').blur(function() {
		if(mousedownHappened){
				mousedownHappened = false;
		}
		else{
			$(this).siblings('ul').removeClass('show');
		}
	});

	$('a').mousedown(function() {
		mousedownHappened = true;
	});
	// ------------------------

	// Some basic metabox stuff
	$('body').on('click', '.ndaq-repeatable__header', function(){
		$(this).siblings('.ndaq-repeatable__body').toggleClass('active');
	});
});


})(jQuery);
