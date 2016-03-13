/* Custom Javascript
 * 
 * 
 */

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

   $('#GreenStarOrderForm').on('change','select', function(e){
        console.log('change event');

        // Get selected value
        var sort = $( '#GreenStarOrderForm option:selected' )
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

   $('#HouseOrderForm').on('change','select', function(e){
        console.log('change event');

        // Get selected value
        var sort = $( '#HouseOrderForm option:selected' )
            .attr('value');
        
        // Send an ajax request
        var url = window.location.href + '&sort=' + sort;

               $.ajax(url)
            .done(function(response){
                // Update the results table
                $('.comparison-table').html(response);
                console.log('ajax request complete');
            })
            .fail(function(xhr){
                alert('Error:' + xhr.responseText);
            });
    });
});



var ESpec = ESpec || {};

$(document).ready(function ($) {

    ESpec = {
        settings: {
            isIe8: false,
            isIphone: (/iPhone|iPod/gi).test(navigator.appVersion),
            isIpad: (/iPad/gi).test(navigator.appVersion),
            isAndroid: (/Android/gi).test(navigator.appVersion),
            isTouch: false,
            easing: 'cubic-bezier(0.77, 0, 0.175, 1)'
        },
        init: function () {

            if (!$.support.transition) {
                $.fn.transition = $.fn.animate;
            }
            if (this.settings.isIphone || this.settings.isIpad || this.settings.isAndroid) {
                this.settings.isTouch = true;
            }
            if (!$.support.leadingWhitespace) {
                this.settings.isIe8 = true;
            }

            //this.page.init();
            this.coverFlow.init();
            this.navSearch.init();
            this.wow.init();
            this.greenstarSearch.init();
            this.showImage.init();
        },
        navSearch: {
            searchIcon: $('.top-search'),
            searchField: $('.search'),
            searchClose: $('.search-close'),
            init: function(){

                this.searchIcon.on('click', function() {
                    ESpec.navSearch.searchField.fadeIn(300, function() {
                      $(this).toggleClass('search-toggle');
                    });     
                });

                this.searchClose.on('click', function() {
                    ESpec.navSearch.searchField.fadeOut(300, function() {
                        $(this).removeClass('search-toggle');
                    }); 
                });
            }
        },
        page: {
            //init: function () {
            //}
        },
        coverFlow: {
            cover: $('#cover-flow'),
            settings: {
                buttons: true,
                spacing: -0.5,
                scrollwheel: false
            },
            init: function(){
                if(this.cover.length){
                     this.cover.flipster(this.settings);
                }
            }
        },
        showImage: {
            image:$('.show-image'),
            settings: {
                type: 'image',
                gallery: {enabled:true}
            },
            init: function(){
                this.image.magnificPopup(this.settings);
            }
        },
        wow: {
            settings: {
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 100, // distance to the element when triggering the animation (default is 0)
                mobile: false        // trigger animations on mobile devices (true is default)
            },
            init: function(){
                
                var wow = new WOW(this.settings);
                wow.init();
            }
        },
        greenstarSearch: {
            form: $('.greenstar-search'),
            init: function(){

                this.form.on('change','select', function(e){

                    // Get Selected Values
                    var tool = $( '#BootstrapForm_CreditSearchForm_Tool option:selected' )
                        .attr('value');
                    
                    var category = $( '#BootstrapForm_CreditSearchForm_Category option:selected' )
                        .attr('value');

                     var credit = $( '#BootstrapForm_CreditSearchForm_Credit option:selected' )
                        .attr('value');
        
                    // Send the ajax request
                    var url = window.location.href+'?tool='+tool+'&category='+category+'&credit='+credit;
                    $.ajax(url)
                        .done(function(response){
                            $('.greenstar-search').html(response);
                        })
                        .fail(function(xhr){
                            alert('Error:' + xhr.responseText);
                    });
                });
            }
        },
        ReportSearch: {
            init: function(){
                this.image.magnificPopup(this.settings);
            }
        },
        SearchResults: {
            init: function(){
                this.image.magnificPopup(this.settings);
            }
        },
        SearchResults: {
            init: function(){
                this.image.magnificPopup(this.settings);
            }
        },
    }
    ESpec.init();
});



   

