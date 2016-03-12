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

//Search         
(function () {

    $('.top-search').on('click', function() {
        $('.search').fadeIn(300, function() {
          $(this).toggleClass('search-toggle');
        });     
    });

    $('.search-close').on('click', function() {
        $('.search').fadeOut(300, function() {
            $(this).removeClass('search-toggle');
        }); 
    });

}());