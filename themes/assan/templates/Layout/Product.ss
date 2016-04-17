<div class="tabs">
    <% include Breadcrumbs %>
    <div class="second-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 hidden-xs" style="padding: 10px">
                    <a href="$BackLink"><i class="fa fa-arrow-circle-left"></i> Search Results</a>
                </div>
                <div class="col-sm-9 tab-cont">

                    <!-- ================================= -->
                    <!--            Tab Headings           -->
                    <!-- ================================= -->
                    <ul id="product-tabs" class="list-inline">
                        <li class="first $DefaultTabState">
                            <a href="#ptab1" data-toggle="tab" aria-expanded="true">Product Description</a>
                        </li>
                        <li>
                            <a href="#ptab2" data-toggle="tab" aria-expanded="false">Green Building Info</a>
                        </li>
                        <li>
                            <a href="#ptab3" data-toggle="tab" aria-expanded="false">Download Certificates</a>
                        </li>
                        <li class="$EnquiryTabState">
                            <a href="#ptab4" data-toggle="tab" aria-expanded="false">Product Enquiry</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="divide10"></div>
    <div class="container">
        <div class="row">

            <!-- ================================= -->
            <!--             Product Images        -->
            <!-- ================================= -->
            <div class="col-sm-3 margin60">
                <% include ProductImages %>

                <div class="divide50 hidden-xs"></div>

                <div class="sidebar-box margin40 hidden-xs" style="margin-right: 2em">
                    <h4>Useful Resources</h4>
                    <ul class="list-unstyled cat-list">

                        <% loop DisplayLinks %>

                            <li>
                                <a href="$URL" target="_blank">$Title</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_loop %>
                    </ul>
                </div>
            </div>

            <!-- ================================ -->
            <!--            Tab Content           -->
            <!-- ================================ -->
            <div class="col-sm-9 tab-content">

                <!-- ========== Product Description ========= -->
                <div class="tab-pane $DefaultTabState" id="ptab1">
                    <div class="tab-desc animated fadeIn">

                        <div class="col-sm-12">
                            <h3>Product Description</h3>

                            $GeneralDescription

                            <h4>Technical and Environmental Benefits</h4>
                            $BenefitsAdvantages

                            <% if $Company($SupplierID).title  == $Company($ManufacturerID).title %>
                                <h4>Manufacturer and Supplier Information - $Company($SupplierID).title</h4>
                                $Company($SupplierID).Description
                            <% else %>
                                <h4>Manufacturer Information - $Company($ManufacturerID).title</h4>
                                $Company($ManufacturerID).Description
                                <h4>Supplier Information - $Company($SupplierID).title</h4>
                                $Company($SupplierID).Description
                            <% end_if %>


                            <h4>Application and Purpose</h4>
                            $ApplicationAndPurpose

                            <h4>Installation and Maintenance</h4>
                            $InstallationAndMaintainance
                        </div>
                    </div>
                </div>

                <!-- ========== View Green Building Info ========= -->
                <div class="tab-pane" id="ptab2">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-12">
                            <h3>Green Building Information Summary Sheet</h3>

                            <div class="divide30"></div>
                            <% if ShowGreenStarCertificate($ID) %>
                                <% loop ShowGreenStarCertificate($ID) %>
                                    <% include Certificate %>
                                    <h5>Summary Sheet Preview</h5>
                                    <embed src="$Certificate.URL" type="application/pdf" width="600" height="700"/>
                                <% end_loop %>
                            <% else %>
                                <h3>
                                    <small> -- No Certificate For This Product --</small>
                                </h3>
                            <% end_if %>
                        </div>
                    </div>
                </div>

                <!-- ========== Download Certificates ========== -->
                <div class="tab-pane" id="ptab3">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-8">
                            <h3>Download Certificates</h3>

                            <div class="divide30"></div>
                            <% if ShowCertificates($ID, $ManufacturerID, $SupplierID) %>
                                <% loop ShowCertificates($ID, $ManufacturerID, $SupplierID) %>
                                    <% include Certificate %>
                                <% end_loop %>
                            <% else %>
                                <h3>
                                    <small> -- No Certificates For This Product --</small>
                                </h3>
                            <% end_if %>
                        </div>
                    </div>
                </div>

                <!-- ========== Product Enquiry ==========  -->
                <div class="tab-pane $EnquiryTabState" id="ptab4">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-8">

                            <h3>Product Enquiry</h3>
                            <p>Fill out the form below to send an enquiry to <% if $Company($SupplierID) %>$Company($SupplierID).Name<% else %>$Company($ManufacturerID).Name<% end_if %> .</p>
                            <div class="comment-form">
                                <div class="form-contact">
                                    <!-- Contact Form -->
                                    $CompanyContactForm
                                    <div id="test"></div>
                                </div>
                            </div>
                            <div class="divide20"></div>
                            <hr>
                        </div>

                        <div class="col-sm-12" style="position: relative">
                            <% if $Company($SupplierID).title  == $Company($ManufacturerID).title %>
                                <h3>Manufacturer And Supplier Contact Information</h3>
                            <% else %>
                                <h3>Supplier Contact Information</h3>
                            <% end_if %>
                            <% with $Company($SupplierID) %>
                                <% include Contact %>
                            <% end_with %>
                        </div>

                        <div class="divide30"></div>

                        <% if $Company($SupplierID).title  != $Company($ManufacturerID).title %>
                            <div class="col-sm-12" style="position: relative">
                                <hr>
                                <div class="divide20"></div>
                                <h3>Manufacturer Contact Information</h3>
                                <% with $Company($ManufacturerID) %>
                                    <% include Contact %>
                                <% end_with %>
                            </div>
                        <% end_if %>

                    </div>
                </div>
            </div>
        </div>
        <div class="divide50"></div>
    </div>
</div><!-- end of tabs -->