/* Custom Javascript
 * 
 * 
 */

 $( window ).resize(function() {
    $(".navbar-collapse").css({ maxHeight: $(window).height() - $(".navbar-header").height() + "px" });
});


/* ==============================================
 WOW plugin triggers animate.css on scroll
 =============================================== */
$(document).ready(function () {
    var wow = new WOW(
            {
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 100, // distance to the element when triggering the animation (default is 0)
                mobile: false        // trigger animations on mobile devices (true is default)
            }
    );
    wow.init();
});

/* ==============================================
 AJAX For Greenstar Search Page
 =============================================== */
$(document).ready(function () {

   $('.greenstar-search').on('change','select', function(e){

        // Get Selected Values
        var tool = $( '#BootstrapForm_CreditSearchForm_Tool option:selected' )
            .attr('value');
        
        var category = $( '#BootstrapForm_CreditSearchForm_Category option:selected' )
            .attr('value');

         var credit = $( '#BootstrapForm_CreditSearchForm_Credit option:selected' )
            .attr('value');
        
        // Send the ajax request
        var url = window.location.href + '?tool=' + tool + '&category=' + category + '&credit=' + credit;

        $.ajax(url)
            .done(function(response){
                // Update the HTML for the form
                $('.greenstar-search').html(response);
                console.log('ajax request done');
            })
            .fail(function(xhr){
                alert('Error:' + xhr.responseText);
        });
    });
});

/* ==============================================
 AJAX For Report Search
 =============================================== */
$(document).ready(function () {

   $('.report-search-btn').click( function(e){

        // Get Search Value
         var reportNumber = $( '.report-search' ).attr('value');

         if (reportNumber == ''){
            reportNumber = 'blank';
         }
        
        // Send the ajax request
        var url = window.location.href + '?report=' + reportNumber;
        console.log(url);

        $.ajax(url)
            .done(function(response){
                // Update the HTML for the form
                $('.report-results').html(response);
            })
            .fail(function(xhr){
                alert('Error:' + xhr.responseText);
        });
    });
});

/* ==============================================
 AJAX For Ordering Greenstar Results
 =============================================== */
$(document).ready(function () {

   $('#OrderByForm').on('change','select', function(e){
        console.log('change event');

        // Get selected value
        var sort = $( '#OrderByForm option:selected' )
            .attr('value');
        
        // Send an ajax request
        var url = window.location.href + '&sort=' + sort;

               $.ajax(url)
            .done(function(response){
                // Update the results table
                $('.results-table').html(response);
                console.log('ajax request complete');
            })
            .fail(function(xhr){
                alert('Error:' + xhr.responseText);
            });
    });
});


/* ==============================================
 AJAX For Ordering Comparison Table Results
 =============================================== */
$(document).ready(function () {

   $('.comparison-table').on('click','th', function(e){
        console.log('change event', e.currentTarget.innerHTML);

        // Get selected value
        // var sort = $(  )
        //     .attr('value');
        
        // Send an ajax request
        // var url = window.location.href + '&sort=' + sort;

        //        $.ajax(url)
        //     .done(function(response){
        //         // Update the results table
        //         $('.results-table').html(response);
        //         console.log('ajax request complete');
        //     })
        //     .fail(function(xhr){
        //         alert('Error:' + xhr.responseText);
        //     });
    });
});

//MAGNIFIC POPUP
$(document).ready(function ($) {
    $('.show-image').magnificPopup({
        type: 'image',
        gallery: {enabled:true}
    });
});


/*========tooltip and popovers====*/
$(document).ready(function () {
$("[data-toggle=popover]").popover();

$("[data-toggle=tooltip]").tooltip();
});


/***********************************************************
 * ACCORDION
 ***********************************************************/
$('.panel-ico a[data-toggle="collapse"]').on('click', function () {
    if ($(this).closest('.panel-heading').hasClass('active')) {
        $(this).closest('.panel-heading').removeClass('active');
    } else {
        $('.panel-heading a[data-toggle="collapse"]').closest('.panel-heading').removeClass('active');
        $(this).closest('.panel-heading').addClass('active');
    }
});

