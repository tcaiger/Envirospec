<div class="tabs">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="col-sm-6">
                <h4>Members Area</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    Members Area / Update Personal Details
                </ol>
            </div>
            <div class="row"></div>
        </div>
    </div>
    <div class="second-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 hidden-xs" style="padding: 10px 20px">
                    <a href="home/logout"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
                <div class="col-sm-9 tab-cont">

                    <ul class="list-inline">
                        <li class="first active $DefaultTabState">
                            <a href="#ptab1" data-toggle="tab" data-tab="tab1" aria-expanded="true">Personal Details</a>
                        </li>
                        <li class="$Tab2">
                            <a href="#ptab2" data-toggle="tab" data-tab="tab2" aria-expanded="false">Products</a>
                        </li>
                        <li class="$Tab3">
                            <a href="#ptab3" data-toggle="tab" data-tab="tab3" aria-expanded="false">Certificates</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="divide10"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="divide30"></div>
                <div class="sidebar-box">
                    <p>Welcome <strong>$CurrentMember.FirstName</strong></p>
                    <h4>Company Logo</h4>
                </div>
            </div>

            <div class="col-sm-9 tab-content">

                <!-- ========== Tab1 ========= -->
                <div class="tab-pane active" id="ptab1">
                    <div class="tab-desc animated fadeIn">

                        <div class="col-sm-12">
                            <div class="member">
                                <h3>Company Details</h3>
                                <% with $CurrentMember.Companies %>
                                    <h4>$Name</h4>
                                    <p>$Phone</p>
                                    <p>$Email</p>
                                    <p>$Fax</p>
                                    <p>$Website</p>
                                    <p>$Address</p>
                                    <p>$Post</p>
                                <% end_with %>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== Tab2 ========= -->
                <div class="tab-pane $Tab2" id="ptab2">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-12">
                            <h3>Products</h3>


                        </div>
                    </div>
                </div>

                <!-- ========== tab3 ========== -->
                <div class="tab-pane $Tab3" id="ptab3">
                    <div class="tab-desc animated fadeIn">
                        <div class="col-sm-8">
                            <h3>Certificates</h3>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divide50"></div>
    </div>
</div><!-- end of tabs -->