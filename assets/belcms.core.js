if (typeof jQuery === 'undefined') {
	throw new Error('BEL-CMS requires jQuery')
}
(function($) {
	"use strict";

	if ($("textarea").hasClass("bel_cms_textarea_simple")) {
		_initTinymceSimple();
	}

	if ($("textarea").hasClass("bel_cms_textarea_full")) {
		_initTinymceFull();
	}
	
	var copyleft = $("body").hasClass("bel_cms_copyleft");
	if (copyleft === false) {
		var new_element = jQuery('<a style="display: none;" class="bel_cms_copyleft" href="https://bel-cms.dev" title="BEL-CMS">Powered by Bel-CMS</a>');
		$('body').append(new_element);
	}

	$('.alertAjaxForm').submit(function(event) {
		event.preventDefault();
		bel_cms_alert_box($(this), 'POST');
	});

	$('.alertAjaxLink').click(function(event) {
		event.preventDefault();
		bel_cms_alert_box($(this), 'GET');
	});

	if (window.sidebar){
		//document.onmousedown = disableselect
		document.onclick = reEnable
	}

	if ($('.colorpicker').height() != undefined) {
		$('.colorpicker').colorpicker();
	}

    var icons = {
        header: "ui-icon-circle-arrow-e",
        activeHeader: "ui-icon-circle-arrow-s"
    }

	if ($('.bel_cms_accordion').height() != undefined) {
		$(".bel_cms_accordion").accordion({
			heightStyle: "content",
		});
	}

	const lightbox = GLightbox({});

    console.log("Chargement BEL-CMS script Ok");

})(jQuery);

function _initTinymceSimple () {
	tinymce.init({
		selector: 'textarea.bel_cms_textarea_simple',
		browser_spellcheck: true,
		language: 'fr_FR',
		menubar: true,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		link_list: [
			{title: 'PalaceWaR', value: 'https://palacewar.eu'},
			{title: 'Bel-CMS', value: 'https://bel-cms.dev'},
			{title: 'Determe', value: 'https://determe.be'}
  		],
		toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
	});
}
function _initTinymceFull () {
	tinymce.init({
		selector: 'textarea.bel_cms_textarea_full',
		browser_spellcheck: true,
		height: 300,
		language: 'fr_FR',
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc fullscreen'
		],
		link_list: [
			{title: 'PalaceWaR', value: 'https://palacewar.eu'},
			{title: 'Bel-CMS', value: 'https://bel-cms.dev'},
			{title: 'Determe', value: 'https://determe.be'}
  		],
		toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		image_advtab: true,
		content_css: [
		]
	});
};

/*###################################
# Function Alert box
###################################*/
function bel_cms_alert_box (objet, type) {
	/* Get Url */
	if (objet.attr('href')) {
		var url = objet.attr('href');
	} else if (objet.attr('action')) {
		var url = objet.attr('action');
	} else if (objet.data('url')) {
		var url = objet.data('url');
	} else {
		alert('No link sets');
	}
	/* serialize data */
	if ($(objet).is('form')) {
		var dataValue  = $(objet).serialize();
	} else if (objet.data('data') == 'undefined'){
		var dataValue  = objet.data('data');
	}
	/* remove div#alrt_bel_cms is exists */
	if ($('#alrt_bel_cms').height()) {
		$('#alrt_bel_cms').remove();
	}
	$.ajax({
		type: type,
		url: url,
		data: dataValue,
		success: function(data) {
			var data = $.parseJSON(data);
			console.log(data);
			/* refresh page */
			if (data.redirect == undefined) {
				var redirect = false;
			} else {
				var redirect = true;
			}
			/* type color */
			if (data.type == undefined) {
				var type = 'blue';
			} else {
				var type = data.type;
			}
			/* link return */
			if (redirect) {
				setTimeout(function() {
					document.location.href=data.redirect;
				}, 3250);
			}
			/* add text */
			$('#alrt_bel_cms').addClass(type).empty().append(data.text);
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(chr.responseText);
		},
		beforeSend:function() {
			$('body').append('<div id="alrt_bel_cms">Chargement...</div>');
			$('#alrt_bel_cms').animate({ top: '0px' }, 300,)
		},
		complete: function() {
			$('textarea').val('');
			$('input:text').val('');
			bel_cms_alert_box_end(3);
		}
	});
}
/*###################################
# Function end Alert box
###################################*/
function bel_cms_alert_box_end (time) {
	parseInt(time);

	var time = time * 1000;

	setTimeout(function() {
		$('#alrt_bel_cms').animate({ top: '-35px' }, 300, function() {
			$(this).remove();
		});
	}, time);
}

tippy('.belcms_tooltip_right', {
    content: (reference) => reference.getAttribute('data'),
    placement: 'right',
    arrow: true,
    animation: 'scale',
    moveTransition: 'transform 0.2s ease-out',
    interactive: true,
    allowHTML: true,
    inlinePositioning: true,
    maxWidth: 'none',
	followCursor: true,
});
tippy('.belcms_tooltip_left', {
    content: (reference) => reference.getAttribute('data'),
    placement: 'left',
    arrow: true,
    animation: 'scale',
    moveTransition: 'transform 0.2s ease-out',
    interactive: true,
    allowHTML: true,
    inlinePositioning: true,
    maxWidth: 'none',
	followCursor: true,
});
tippy('.belcms_tooltip_top', {
    content: (reference) => reference.getAttribute('data'),
    placement: 'top',
    arrow: true,
    animation: 'scale',
    moveTransition: 'transform 0.2s ease-out',
    interactive: true,
    allowHTML: true,
    inlinePositioning: true,
    maxWidth: 'none',
	followCursor: true,
});
tippy('.belcms_tooltip_bottom', {
    content: (reference) => reference.getAttribute('data'),
    placement: 'bottom',
    arrow: true,
    animation: 'scale',
    moveTransition: 'transform 0.2s ease-out',
    interactive: true,
    allowHTML: true,
    inlinePositioning: true,
    maxWidth: 'none',
	followCursor: true,
});
