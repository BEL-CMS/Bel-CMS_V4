if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}

(function($) {
    "use strict";
    
        $('.like').click(function(event) {
            event.preventDefault();

            /* remove div#alrt_bel_cms is exists */
            if ($('#alrt_bel_cms').height()) {
                $('#alrt_bel_cms').remove();
            }

            var url = $(this).attr('href');
            var id  = $(this).data("id");

            $.ajax({
                type: 'POST',
                url: url,
                async: true,
                data: {id: id},
                success: function(data) {
                    $('#alrt_bel_cms').addClass('success').empty().append('+1 actif');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(chr.responseText);
                },
                beforeSend:function() {
                    $('body').append('<div id="alrt_bel_cms">Chargement...</div>');
                    $('#alrt_bel_cms').animate({ top: '0px' }, 300);
                },
                complete: function() {
                    setTimeout(function() {
                        window.location.reload();
                    }, 3250);
                }
            });
        });



})(jQuery);