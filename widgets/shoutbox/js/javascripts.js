(function ($) {
    "use strict";

    $(document).on('submit', "#belcms_shoutbox_form", function (e) {
        e.preventDefault();
        if ($('#alrt_bel_cms').height()) {
            $('#alrt_bel_cms').remove();
        }

        $.ajax({
            url: "shoutbox/addMessage?json",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('body').append('<div id="alrt_bel_cms" class="warning">Chargement en cours...</div>');
                $('#alrt_bel_cms').animate({ top: '0px' }, 300);
            },
            success: function (data) {
                $('#alrt_bel_cms').addClass('success').empty().append(data);
                $('#belcms_shoutbox_input').val('');
            },
            complete: function () {
                bel_cms_alert_box_end(3);
            }
        });

    });

})(jQuery);
