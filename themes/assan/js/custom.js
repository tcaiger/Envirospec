/* Custom Javascript
 * 
 * 
 */

var ESpec = ESpec || {};

$(document).ready(function ($) {

    ESpec = {

        init: function () {


            // ----------------------
            // Contents
            // ----------------------
            this.wow.init();
            this.productTabs.init();
            this.toolTips.init();
            this.coverFlow.init();
            this.showImage.init();
            this.greenstarSearch.init();
            this.sortGreenstarResults.init();
            this.sortHouseResults.init();
            this.reportSearch.init();
            this.contactMap.init();
        },

        productTabs: {
            tabs: $('#product-tabs'),
            init: function () {
                if(this.tabs.width){
                    _this = this;
                    this.tabs.on('click', 'a', function(){
                        var tabNum = $(this).data('tab');
                        var cur = window.location;
                        var tabs = {active : '1'};

                        window.history.pushState(tabs, '', cur.origin + cur.pathname + '?tab=' + tabNum);
                    })
                }
            }
        },

        wow: {
            settings: {
                boxClass    : 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset      : 100, // distance to the element when triggering the animation (default is 0)
                mobile      : false        // trigger animations on mobile devices (true is default)
            },
            init    : function () {

                var wow = new WOW(this.settings);
                wow.init();
            }
        },

        toolTips: {
            tip : $("[data-toggle=tooltip]"),
            init: function () {
                if (this.tip.length) {
                    this.tip.tooltip();
                }
            }
        },

        coverFlow: {
            cover   : $('#cover-flow'),
            settings: {
                buttons    : true,
                spacing    : -0.5,
                scrollwheel: false
            },
            init    : function () {
                if (this.cover.length) {
                    this.cover.css('display', 'block');
                    this.cover.flipster(this.settings);
                }
            }
        },

        showImage: {
            image   : $('.show-image'),
            settings: {
                type   : 'image',
                gallery: {enabled: true}
            },
            init    : function () {
                this.image.magnificPopup(this.settings);
            }
        },

        greenstarSearch     : {
            form: $('.greenstar-search'),
            init: function () {

                this.form.on('change', 'select', function (e) {

                    // Get Selected Values
                    var tool = $('#BootstrapForm_CreditSearchForm_Tool option:selected')
                        .attr('value');

                    var category = $('#BootstrapForm_CreditSearchForm_Category option:selected')
                        .attr('value');

                    var credit = $('#BootstrapForm_CreditSearchForm_Credit option:selected')
                        .attr('value');

                    var subCredit = $('#BootstrapForm_CreditSearchForm_SubCredit option:selected')
                        .attr('value');

                    // Send the ajax request
                    var url = window.location.href + '?tool=' + tool + '&category=' + category + '&credit=' + credit + '&subCredit=' + subCredit;
                    $.ajax(url)
                        .done(function (response) {
                            $('.greenstar-search').html(response);
                        })
                        .fail(function (xhr) {
                            alert('Error:' + xhr.responseText);
                        });
                });
            }
        },
        sortGreenstarResults: {
            button: $('#GreenstarSort'),
            init  : function () {

                this.button.on('click', 'li', function (e) {
                    var sort  = $(this).data('sort');
                    var order = $(this).data('order');
                    var url   = window.location.href + '&sort=' + sort + '&order=' + order;

                    $.ajax(url)
                        .done(function (response) {
                            $('.results-table').html(response);
                        })
                        .fail(function (xhr) {
                            alert('Error:' + xhr.responseText);
                        });
                });
            }
        },
        sortHouseResults    : {
            button: $('#HouseSort'),
            init  : function () {

                this.button.on('click', 'li', function (e) {
                    var sort  = $(this).data('sort');
                    var order = $(this).data('order');
                    var url   = window.location.href + '&sort=' + sort + '&order=' + order;

                    $.ajax(url)
                        .done(function (response) {
                            $('.comparison-table').html(response);
                        })
                        .fail(function (xhr) {
                            alert('Error:' + xhr.responseText);
                        });
                });
            }
        },
        reportSearch        : {
            button: $('.report-search-btn'),
            init  : function () {
                this.button.click(function () {

                    // Get Search Value
                    var reportNumber = $('.report-search').val();

                    if (reportNumber == '') {
                        reportNumber = 'blank';
                    }

                    // Send the ajax request
                    var url = window.location.href + '?report=' + reportNumber;
                    console.log(url);

                    $.ajax(url)
                        .done(function (response) {
                            // Update the HTML for the form
                            $('.report-results').html(response);
                        })
                        .fail(function (xhr) {
                            alert('Error:' + xhr.responseText);
                        });
                });
            }
        },

        contactMap: {
            container : document.getElementById('map-canvas'),
            Lat       : -36.845,
            Lng       : 174.76,
            map       : null,
            marker    : null,
            init      : function () {

                if (this.container) {
                    this.makeMap();
                    this.addMarker();
                    this.addInfoBox();
                }
            },
            makeMap   : function () {

                var mapOptions = {
                    zoom  : 13,
                    center: new google.maps.LatLng(this.Lat, this.Lng)
                };

                this.map = new google.maps.Map(this.container,
                    mapOptions);
            },
            addMarker : function () {

                this.marker = new google.maps.Marker({
                    position: {lat: this.Lat, lng: this.Lng},
                    map     : this.map,
                    icon    : 'themes/assan/img/pin.png'
                });
            },
            addInfoBox: function () {

                var contentString = '<h4>Envirospec Office</h4>';

                var infowindow = new google.maps.InfoWindow({content: contentString});

                google.maps.event.addListener(this.marker, 'click', function () {
                    infowindow.open(this.map, this.marker);
                });

            }
        }
    }
    ESpec.init();
});

   

