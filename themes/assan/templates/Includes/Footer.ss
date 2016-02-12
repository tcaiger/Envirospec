<footer id="footer-option">
    <div class="container">
        <div class="row">
            <!-- ===================================== -->
            <!--        Envirospec Summary             -->
            <!-- ===================================== -->
            <div class="col-md-3 margin20">
                <div class="footer-col">
                    <h3>EnviroSpec Ltd</h3>
                    <p>$SiteConfig.ESSummary</p>
                </div>                        
            </div>
            <!-- ===================================== -->
            <!--        Contact Details                -->
            <!-- ===================================== -->
            <div class="col-md-3 margin20">
                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul class="list-unstyled contact">
                        <li><p><strong><i class="fa fa-phone"></i> Phone:</strong><a href="#">$SiteConfig.ContactPhone</a></p></li>
                        <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong><a href="#">$SiteConfig.ContactEmail</a></p></li>
                        <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong><a href="#">$SiteConfig.ContactAddress</a></p></li>
                    </ul>
                </div>                        
            </div>
            <!-- ===================================== -->
            <!--        Useful Pages                   -->
            <!-- ===================================== -->
            <div class="col-md-3 margin20">
                <div class="footer-col">
                    <h3>Useful Pages</h3>
                    <ul class="list-unstyled latest-f-news">
                        <li><a href="/">Homepage <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="product-search/search-green-star-nz-homestar-compatible/">Searh Green Star NZ | Homestar Compatible <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="product-search/manufacturer-keyword-search/">Manufacturer | Keyword Search <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="product-search/navigate-the-interactive-house/">Navigate The Interactive House <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>                        
            </div>
            <!-- ===================================== -->
            <!--        Latest News                    -->
            <!-- ===================================== -->
            <div class="col-md-3 margin20">
                <div class="footer-col">
                    <h3>Latest News</h3>
                    <ul class="list-unstyled latest-f-news">
                        <% loop GetNews %>
                            <li><a href="$Title">$Title <i class="fa fa-angle-right"></i></a></li>
                        <% end_loop %> 
                    </ul>
                </div>                        
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-btm">
                    <span>&copy;2015. Website by Tom Caiger</span>
                </div>
            </div>
        </div>
    </div>
</footer>