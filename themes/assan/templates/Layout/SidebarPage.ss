<% include Breadcrumbs %>

<div class="divide80"></div>

<div class="container">
    <div class="row">
    <% if $Logo || $Sources %>
        <div class="col-sm-4 ">

            <!-- ========================================== -->
            <!--               Image                        -->
            <!-- ========================================== -->
             <% if $Logo %>
                <div class="sidebar-box">
                    <img style="max-width: 100%; height: auto; display: block; margin: -0px 0 0 -40px" src="$Logo.SetWidth(300).URL">
                </div>
            <% end_if %>
            <div class="divide60"></div>
            <!-- ========================================== -->
            <!--               Sources                       -->
            <!-- ========================================== -->
            <% if Sources %>
                <div class="sidebar-box margin40" style="margin-right: 2em">
                    <h4>Useful Resources</h4>
                    <ul class="list-unstyled cat-list">
                        <% loop Sources %>
                            <li> 
                                <a href="$URL" target="_blank">$Caption</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        <% end_loop %>
                    </ul>
                </div>
            <% end_if %>
        </div>
        <!-- ========================================== -->
        <!--           Main Column                      -->
        <!-- ========================================== -->
        <div class="col-sm-8">
    <% else %>
        <!-- ========================================== -->
        <!--           Main Column                      -->
        <!-- ========================================== -->
        <div class="col-sm-12">
    <% end_if %>
            <h3>$Subheading</h3>
            $Content
            <div class="divide30"></div>
            <% loop AllChildren %>
                <div class="results-box">
                    <h3><a href="$Link">$Title</a></h3>
                    $Content.LimitCharacters(300)
                </div>
                <p><a href="$Link" class="btn btn-default btn-ico btn-xs">Read More...</a></p>
                <hr>
            <% end_loop %>
            <div class="divide30"></div>
        </div>
    </div>
</div>
<div class="divide60"></div>

