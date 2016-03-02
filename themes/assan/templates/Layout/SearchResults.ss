<% include Breadcrumbs %>

<div class="divide20"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">   
            <div class="row">
                <div class="col-sm-12">
                    <h3>Search Results For: $SearchName</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="results">Showing results 1 - $Results.getTotalItems</h4>
                </div>
            </div>
            <div class="divide15"></div>
            <!-- Search Results Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <% loop Results.Sort('Title', 'ASC') %>
                        <tr>
                            <% loop GetManufacturer($SupplierID) %>
                                <td>$Name</td>
                            <% end_loop %>
                            <td>$Title</td>
                            <td>$Parent.Title</td>
                            <td><a class="show-link" href="$Link">View</a></td>
                        </tr>
                    <% end_loop %>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="divide40"></div>

<!-- ========================================== -->
<!--               Banner                       -->
<!-- ========================================== -->
<section id="cta-1">
    <div class="container">
        <h1>Do you have a project or idea?</h1>
        <a href="#" class="btn border-white btn-lg">Join us today</a>
    </div>
</section>