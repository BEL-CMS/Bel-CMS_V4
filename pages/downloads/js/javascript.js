if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
(function ($) {
    "use strict";
    $(document).on('click', '#dlsSupp', function () {
        var data = $(this).attr("data")
        $.ajax({
            url: "/downloads/addOne?echo",
            type: "GET",
            data: {
                data: data,
            }
        });
    });
}) (jQuery);