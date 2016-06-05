<% include Breadcrumbs %>

<div class="divide80"></div>

<!-- ===================================== -->
<!--        Google Maps                  -->
<!-- ===================================== -->
<div class="container">
    <div id="map-canvas"></div>
</div>
<div class="divide60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-7 margin30">
            <h3 class="heading">Contact us</h3>
            <%--$Content--%>
            <%--<div class="divide30"></div>--%>
            <div class="form-contact">
                $ContactForm
            </div>
            <div class="divide60 hidden-xs"></div>
        </div>
        <!-- ===================================== -->
        <!--        Contact Info           -->
        <!-- ===================================== -->
        <div class="col-md-4 col-md-offset-1">
            <h3 class="heading">Contact info</h3>
            <ul class="list-unstyled contact contact-info">
                <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> $SiteConfig.ContactAddress</p></li> 
                <li><p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a href="#">$SiteConfig.ContactEmail</a></p></li>
                <li> <p><strong><i class="fa fa-phone"></i> Phone:</strong> $SiteConfig.ContactPhone</p></li>
            </ul>
            <div class="divide40"></div>
            <!-- Social Media -->
            <h4>Get social</h4>
             <div class=" margin10">
                <a href="https://www.facebook.com/EnviroSpec" target="_blank" class="social-icon si-dark si-colored-facebook">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="https://twitter.com/envirospecnz" target="_blank" class="social-icon si-dark si-colored-twitter">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/company/envirospec-nz-ltd" target="_blank" class="social-icon si-dark si-colored-linkedin">
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=wgBqVfRLG78&feature=youtu.be" target="_blank" class="social-icon si-dark si-colored-google-plus">
                    <i class="fa fa-youtube"></i>
                    <i class="fa fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</div>