function formSendLogin(n, e) {
    var o = n.attr("action"),
        t = $(n).serialize(),
        a = $("#loader > span");
        setTimeout(function () {
            $.ajax({
                type: e,
                url: o,
                data: t,
                success: function (n) {
                    n = $.parseJSON(n);
                    console.log(n),
                    a.empty().append(n.ajax);
                },
                error: function () {
                    alert("Error function ajax");
                },
                complete: function () {
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
            });
        }, 2500);
}
$(document).ready(function () {
    $("#sendLogin").submit(function (n) {
        n.preventDefault();
        $('#submitText').val("Vérification en cours...");
        n.preventDefault(), formSendLogin($(this), "POST");
    });
});
