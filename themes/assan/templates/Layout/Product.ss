<div class="tabs">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h4><a href="$BackLink"><i class="fa fa-arrow-left"></i> search results</a></h4>
                </div>
                <div class="col-sm-8 hidden-xs pull-right">

                    <!-- ================================= -->
                    <!--            Tab Headings           -->
                    <!-- ================================= -->
                    <ul style="position: absolute; top: -7px; right:0px"class="nav nav-tabs">
                        <li class="active">
                            <a href="#ptab1" data-toggle="tab" aria-expanded="true">Product<br>Description</a>
                        </li>
                        <li>
                            <a href="#ptab2" data-toggle="tab" aria-expanded="false">Green Building<br>Info</a>
                        </li>
                        <li>
                            <a href="#ptab3" data-toggle="tab" aria-expanded="false">Download<br>Certificates</a>
                        </li>
                        <li>
                            <a href="#ptab4" data-toggle="tab" aria-expanded="false">Product<br>Enquiry</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="divide60"></div>
    <div class="container">
        <div class="row">

            <!-- ================================= -->
            <!--             Product Images        -->
            <!-- ================================= -->
            <div class="col-sm-3 margin60" style="padding-left: 0">
                <% include ProductImages %>

                <div class="divide50"></div>

                <div class="sidebar-box margin40" style="margin-right: 2em">
                    <h4>Useful Resources</h4>
                    <ul class="list-unstyled cat-list">
                        <% if $ProductSpecificWebsite %>
                            <li>
                                <a href="$ProductSpecificWebsite" target="_blank">Product Specific Website</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $ProductDistributor %>
                            <li>
                                <a href="$ProductDistributor" target="_blank">Product Distributor</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $ProductApplicators %>
                            <li>
                                <a href="$ProductApplicators" target="_blank">Product Applicators</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $InstallationManual %>
                            <li>
                                <a href="$InstallationManual" target="_blank">Installation Manual</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $MaintainanceManual %>
                            <li>
                                <a href="$MaintainanceManual" target="_blank">Maintainance Manual</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $ProductBrochure %>
                            <li>
                                <a href="$ProductBrochure" target="_blank">Product Brochure</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $CAD %>
                            <li>
                                <a href="$CAD" target="_blank">CAD Drawings</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $MaterialSafetyDataSheet %>
                            <li>
                                <a href="$MaterialSafetyDataSheet" target="_blank">Material Safety Data Sheet</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $TechnicalAppraisalDocument %>
                            <li>
                                <a href="$TechnicalAppraisalDocument" target="_blank">Technical Appraisal Document</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $ProductSpecification %>
                            <li>
                                <a href="$ProductSpecification" target="_blank">Product Specification</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                        <% if $EnvironmentalManagementSystem %>
                            <li>
                                <a href="$EnvironmentalManagementSystem" target="_blank">Environmental Management System</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_if %>
                    </ul>
                </div>
            </div>

            <!-- ================================ -->
            <!--            Tab Content           -->
            <!-- ================================ -->
            <div class="tab-content">

                <!-- ========== Product Description ========= -->
                <div class="tab-pane active" id="ptab1">
                    <div class="tab-desc animated fadeIn">
                        
                        <div class="col-sm-12">
                            <h3 class="title">$Title</h3>
                            <h3 style="margin-bottom: 0px"><small>$Subheading</small></h3>
                            <p>$GeneralDescription</p>

                            <h4>Technical and Environmental Benefits</h4>
                            $BenefitsAdvantages

                            <h4>Manufacturers and Suppliers</h4>
                            $Company($SupplierID).Description

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
                            <h3 class="title">$Title</h3>
                            <h3 style="margin-bottom: 0px"><small>Green Building Info Summary Sheet</small></h3>
                            <div class="divide30"></div>
                            <% loop ShowCertificates($ID) %>
                                <% if $Type == "Green Building Rating Compatibility" %>

                                    <object data="$Certificate.URL" type="application/pdf"  width="100%" height="1110px">
                                        <p>You don't have a PDF plugin for this browser. <a href="$Certificate.URL">click here to download the PDF file.</a></p>
                                    </object>

                                <% end_if %>
                            <% end_loop %>
                        </div> 
                    </div>
                </div>

                <!-- ========== Download Certificates ========== -->
                <div class="tab-pane" id="ptab3">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-8">
                            <h3 class="title">$Title</h3>
                            <h3 style="margin-bottom: 0px"><small>Certificates</small></h3>
                            <div class="divide30"></div>

                            <% loop ShowCertificates($ID) %>
                                <div class="sidebar-info-box">
                                    <div class="services-box wow animated fadeInUp animated">
                                         <a href="$Certificate.URL" target="_blank">
                                            <div class="services-box-icon">
                                                <i class="fa fa-leaf"></i>
                                            </div>
                                            <div class="services-box-info">
                                                <h4>$Type</h4>
                                                <p>$Name</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                            <% end_loop %>
                        </div>
                    </div>
                </div>

                <!-- ========== Product Enquiry ==========  -->
                <div class="tab-pane" id="ptab4">
                    <div class="tab-desc animated fadeIn">

                        <div class="col-sm-8">

                            <h3 class="title">$Title</h3>
                            <h3 style="margin-bottom: 0px"><small>Product Enquiry Form</small></h3>
                            <div class="divide30"></div>
                            <div class="comment-form">
                                <div class="form-contact">
                                    <!-- Contact Form -->
                                    $CompanyContactForm
                                </div>
                            </div>
                            <div class="divide40"></div>
                        </div>

                        <div class="col-sm-5 well">
                            <h3>Supplier</h3>
                            <% with $Company($SupplierID) %>
                                <h4>$Name</h4>
                                <h5 style="margin-bottom: 0px">Website</h5>
                                <p>$Website</p>
                                <h5 style="margin-bottom: 0px">Address</h5>
                                $Address
                                <h5 style="margin-bottom: 0px">Postal Address</h5>
                                $Post
                                <h5 style="margin-bottom: 0px">Phone Number</h5>
                                <p>$Phone</p>
                                <h5 style="margin-bottom: 0px">Fax</h5>
                                <p>$Fax</p>
                            <% end_with %>
                        </div> 

                        <div class="col-sm-5 col-sm-offset-1 well">
                            <h3>Manufacturer</h3>
                            <% with $Company($ManufacturerID) %>
                                <h4>$Name</h4>
                                <h5 style="margin-bottom: 0px">Website</h5>
                                <p>$Website</p>
                                <h5 style="margin-bottom: 0px">Address</h5>
                                $Address
                                <h5 style="margin-bottom: 0px">Postal Address</h5>
                                $Post
                                <h5 style="margin-bottom: 0px">Phone Number</h5>
                                <p>$Phone</p>
                                <h5 style="margin-bottom: 0px">Fax</h5>
                                <p>$Fax</p>
                            <% end_with %> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
        <div class="divide50"></div>
    </div>
</div><!-- end of tabs -->