if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}

function generer_password(champ_cible) {
    var ok = '@#*/€azertyupqsdfghjkmwxcvbn2345@#*/6789AZERTYUPQSDFGHJKMW@#*/XCVBN';
    var pass = '';
    longueur = 6;
    for(i=0;i<longueur;i++){
        var wpos = Math.round(Math.random()*ok.length);
        pass+=ok.substring(wpos,wpos+1);
    }
    document.getElementById(champ_cible).value = pass;
}
(function($) {
    "use strict";

    $(".active_img").click(function(event) {
        event.preventDefault();
        var img = $(this).data('file');

        $.ajax({
            url: "/User/ActiveAvatar",
            type: "POST",
            data: {
                avatar: img,
            },
            success: function(response) {
                setTimeout(
                function()  {
                    window.location.replace("/User/avatar");
                }, 500);
            },
            error: function() {
                alert("error Ajax");
            }
        });
    });

    $(".delete_img").click(function(event) {
        event.preventDefault();
        var img = $(this).data('file');

        $.ajax({
            url: "/User/deleteAvatar&echo",
            type: "POST",
            data: {
                avatar: img,
            },
            success: function(response) {
                setTimeout(
                function()  {
                    window.location.replace("/User/avatar");
                }, 500);
            },
            error: function() {
                alert("error Ajax");
            }
        });
    });

    $(document).on('click','#requestTokenBt',function() {
        $('#requestTokenBt').removeClass('btn-secondary').addClass('btn-warning').html('Veuillez attendre un moment.');
        var mail = $("#email").val();
        if (!mail) {
            alert("Veuillez entrer votre adresse e-mail avant de demander le token.");
        } else {
            $.ajax({
                url: "/User/sendToken?echo",
                type: "GET",
                data: {
                    data: mail,
                },
                success: function(response) {
                    setTimeout(
                    function()  {
                        if (response == 'true') {
                            $('#no_member').remove();
                            $('#requestTokenBt').removeClass('btn-warning').addClass('btn-success').html('Le courriel concernant la réinitialisation a été correctement expédié.');
                            $('#newpassowrd').removeClass('false');
                        } else {
                            $('#requestTokenBt').removeClass('btn-warning').addClass('btn-danger').html(response);
                        }
                    }, 1500);
                },
                error: function() {
                    alert("error Ajax");
                }
            });
        }
    });

})(jQuery);