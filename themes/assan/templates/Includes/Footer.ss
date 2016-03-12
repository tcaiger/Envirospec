<footer id="footer-option">
    <div class="container">
        <div class="row">
            <% with $SiteConfig %>
                <!-- ===================================== -->
                <!--        Envirospec Summary             -->
                <!-- ===================================== -->
                <div class="col-md-3 margin20">
                    <div class="footer-col">
                        <h3>EnviroSpec Ltd</h3>
                        <p>$ESSummary</p>
                    </div>                        
                </div>
                <!-- ===================================== -->
                <!--        Contact Details                -->
                <!-- ===================================== -->
                <div class="col-md-3 margin20">
                    <div class="footer-col">
                        <h3>Contact</h3>
                        <ul class="list-unstyled contact">
                            <li><p><strong><i class="fa fa-phone"></i> Phone:</strong><a href="#">$ContactPhone</a></p></li>
                            <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong><a href="#">$ContactEmail</a></p></li>
                            <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong><a href="#">$ContactAddress</a></p></li>
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
                            <li><a href="$Page1.Link">$Page1.Title <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="$Page2.Link">$Page2.Title <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="$Page3.Link">$Page3.Title <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="$Page4.Link">$Page4.Title <i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>                        
                </div>
            <% end_with %>
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