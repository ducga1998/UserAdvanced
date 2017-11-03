$(document).ready(function() {
    $(document).on("click", ".btn-check", function() {

        $('input[type="checkbox"]').removeAttr('checked');

    });
    $(".checkAll").click(function() {
        
                 if ($(".containerCheck .checkboxclass").prop("checked") == false) {
                     $(".containerCheck .checkboxclass").prop("checked", true);
                     console.log("csacascasc");
                 } else {
                     $(".containerCheck .checkboxclass ").prop("checked", false);
                 }
             });

    var animating = false,
        submitPhase1 = 1100,
        submitPhase2 = 400,
        logoutPhase1 = 800,
        $login = $(".login"),
        $app = $(".app");

    function ripple(elem, e) {
        $(".ripple").remove();
        var elTop = elem.offset().top,
            elLeft = elem.offset().left,
            x = e.pageX - elLeft,
            y = e.pageY - elTop;
        var $ripple = $("<div class='ripple'></div>");
        $ripple.css({ top: y, left: x });
        elem.append($ripple);
    };
//ở đây
$('.login__input').on('keydown', function(e) {
    if (e.which == 13) {
        e.preventDefault();
        $('.login__submit', 'body').trigger('click');
    }
});

    $(document).on("click", ".login__submit", function(e) {
        if (animating) return;
        animating = true;
        var that = this;
        ripple($(that), e);
        $(that).addClass("processing");
        setTimeout(function() {
            $(that).addClass("success");
            setTimeout(function() {
                $app.show();
                $app.css("top");
                $app.addClass("active");
                $("#FormLogin").submit();
            }, submitPhase2 - 70);
            setTimeout(function() {
                $login.hide();
                $login.addClass("inactive");
                animating = false;
                $(that).removeClass("success processing");
            }, submitPhase2);
        }, submitPhase1);
    });

    $(document).on("click", ".app__logout", function(e) {
        if (animating) return;
        $(".ripple").remove();
        animating = true;
        var that = this;
        $(that).addClass("clicked");
        setTimeout(function() {
            $app.removeClass("active");
            $login.show();
            $login.css("top");
            $login.removeClass("inactive");
        }, logoutPhase1 - 120);
        setTimeout(function() {
            $app.hide();
            animating = false;
            $(that).removeClass("clicked");
        }, logoutPhase1);
    });

});