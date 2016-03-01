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
                        <li class="active">
                            <a href="#ptab1" data-toggle="tab" aria-expanded="true">Product Description</a>
                        </li>
                        <li>
                            <a href="#ptab2" data-toggle="tab" aria-expanded="false">Green Building Info</a>
                        </li>
                        <li>
                            <a href="#ptab3" data-toggle="tab" aria-expanded="false">Download Certificates</a>
                        </li>
                        <li>
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
            <div class="col-sm-9 tab-content">

                <!-- ========== Product Description ========= -->
                <div class="tab-pane active" id="ptab1">
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
                                <% end_loop %>
                             <% else %>
                               <h3><small> -- No Certificate For This Product -- </small></h3>
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
                               <h3><small> -- No Certificates For This Product -- </small></h3>
                            <% end_if %>
                        </div>
                    </div>
                </div>

                <!-- ========== Product Enquiry ==========  -->
                <div class="tab-pane" id="ptab4">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-8">

                            <h3>Product Enquiry</h3>
                            <p>Please Enter in your contact information below.</p>
                            <div class="comment-form">
                                <div class="form-contact">
                                    <!-- Contact Form -->
                                    $CompanyContactForm
                                </div>
                            </div>
                            <div class="divide20"></div>
                            <hr>
                        </div>

                         <% if $Company($SupplierID).title  == $Company($ManufacturerID).title %>

                                <div class="col-sm-12" style="position: relative">
                                    <h3>Manufacturer And Supplier Contact Information</h3>
                        <% else %>

                           
                            <div class="col-sm-12" style="position: relative">
                                <h3>Manufacturer Contact Information</h3>

                        <% end_if %>

                            <% with $Company($ManufacturerID) %>
                                <h2>$Name</h2>

                                <div class="first-logo hidden-xs">$Logo.SetWidth(250)</div>
                             
                                <ul class="list-unstyled contact contact-info">
                                     <li><p><strong><i class="fa fa-envelope"></i> Website:</strong> <a href="#">$Website</a></p></li>
                                    <li><p><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="#">$Email</a></p></li>
                                    <li><p><strong><i class="fa fa-phone"></i> Phone:</strong> $Phone</p></li>
                                    <li><p><strong><i class="fa fa-phone"></i> Fax:</strong> $Fax</p></li>
                                    <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong>$Address</p></li> 
                                    <li ><p><strong><i class="fa fa-map-marker"></i> Postal Address:</strong> $Post</p></li> 
                                </ul>
                                <div class="divide20"></div>
                               
                            </div>
      
                        <% end_with %>
                        
                        <% if $Company($SupplierID).title  != $Company($ManufacturerID).title %>
                            <% with $Company($SupplierID) %>
                                <div class="col-sm-12" style="position: relative">
                                     <hr>
                                    <h3>Supplier Contact Information</h3>
                                    <h2>$Name</h2>

                                    <div class="second-logo hidden-xs">$Logo.SetWidth(250)</div>
                                 
                                    <ul class="list-unstyled contact contact-info">
                                         <li><p><strong><i class="fa fa-envelope"></i> Website:</strong> <a href="#">$Website</a></p></li>
                                        <li><p><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="#">$Email</a></p></li>
                                        <li><p><strong><i class="fa fa-phone"></i> Phone:</strong> $Phone</p></li>
                                        <li><p><strong><i class="fa fa-phone"></i> Fax:</strong> $Fax</p></li>
                                        <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong>$Address</p></li> 
                                        <li ><p><strong><i class="fa fa-map-marker"></i> Postal Address:</strong> $Post</p></li> 
                                    </ul>
                                     <div class="divide20"></div>
                                </div>
          
                            <% end_with %>
                        <% end_if %>
                             
                    </div> 
                </div>
            </div>
        </div>
        <div class="divide50"></div>
    </div>
</div><!-- end of tabs -->