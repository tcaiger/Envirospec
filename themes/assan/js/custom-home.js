/* ==============================================
 Cover Flow
 =============================================== */
$(document).ready(function () {

	 $('#cover-flow').flipster({
        buttons: true,
        spacing: -0.5,
        scrollwheel: false
    });

});

$(document).ready(function () {
	var nav = $('div.navbar');
	var topbar = $('div.top-bar-light');

    $(window).scroll(function() {
        if($(this).scrollTop() > 100) {
            topbar.css('top', '0px');
            nav.css('top', '27px');
        } else {
        	topbar.css('top', '-97px');
            nav.css('top', '-70px');
        }
    });
});