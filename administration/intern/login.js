

function formSendLogin(n, e) {
    var o = n.attr("action"),
        t = $(n).serialize(),
        a = $("#submitText");
        b = $("#submitTextAlert");
        setTimeout(function () {
            $.ajax({
                type: e,
                url: o,
                data: t,
                success: function (n) {
                    t = n.replace(/"/g, "");
                    b.removeClass('alert-warning').addClass('alert-success');
                    a.empty(t).append(t);
                    console.log(t);
                },
                error: function () {
                    alert("Error function ajax");
                },
                complete: function () {
                    setTimeout(function () {
                        location.reload();
                    }, 3250);
                },
            });
        }, 1e3);
}

$(document).ready(function () {
    $("#signinForm").submit(function (n) {
        n.preventDefault();
        $('#submitText').empty().append("Vérification en cours...");
        n.preventDefault(), formSendLogin($(this), "POST");
    });
});
