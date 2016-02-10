<% include Breadcrumbs %>

<div class="divide40"></div>

<div class="container">
    <div class="row">
        <!-- ========================================== -->
        <!--        Product Filter Sidebar              -->
        <!-- ========================================== -->
        <div class="col-sm-5">
            <div class="results-sidebar-box">
                <h4>$Title</h4>
                <hr>
            </div>
            <div class="panel-group" id="accordion">
                <% loop GetCategories() %>
                    <% if Children %>
                        <div class="panel panel-default">
                            <div class="panel-heading panel-ico">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse$ID">
                                        $Title
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse$ID" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul style="padding-left: 20px">
                                    <!--  -->
                                        <div id="accordion2">
                                            <% loop Children %>
                                                <% if Children %>
                                                    <li>
                                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2$ID">
                                                            $Title
                                                        </a>
                                                        <div id="collapse2$ID" class="panel-collapse collapse">
                                                            <ul style="padding-left: 10px">
                                                                <% loop Children %>
                                                                    <li>
                                                                        <a href="$FilterLink">$Title</a>
                                                                    </li>
                                                                <% end_loop %>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <% end_if %>
                                            <% end_loop %>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        </div>
    </div>
</div>

<div class="divide80"></div>

<!-- ========================================== -->
<!--               Banner                       -->
<!-- ========================================== -->
<section id="cta-1">
    <div class="container">
        <h1>Do you have a project or idea?</h1>
        <a href="#" class="btn border-white btn-lg">Join us today</a>
    </div>
</section>