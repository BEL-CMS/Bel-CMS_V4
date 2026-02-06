function formSendLogin(n, e) {
    var o = n.attr("action"),
        t = $(n).serialize(),
        a = $("#loading > span");
    $("#loading").show(),
        $("#loading").animate({ opacity: "1" }, 1e3, function () {
            a.empty().append("Veuillez patienter");
        }),
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
                    }, 3250);
                },
            });
        }, 1e3);
}
$(document).ready(function () {
    $("#sendLogin").submit(function (n) {
        $("#loading").css("background", "gray");
        n.preventDefault(), formSendLogin($(this), "POST");
    });
});
