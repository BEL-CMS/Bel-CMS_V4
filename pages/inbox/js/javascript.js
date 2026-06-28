if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
/* inbox/search?json */

$('#belcms_mails_new_author').autocomplete({
    source: function (request, response) {
        $.getJSON("inbox/search?json&term=" + request.term, function (data) {
            response($.map(data, function (value, key) {
                return {
                    label: value,
                    value: value
                };
            }));
        });
    },
    minLength: 3,
    delay: 100
});