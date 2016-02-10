<% include Breadcrumbs %>

<div class="divide40"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">   
            <h4 class="margin30">Products Containing $SearchName</h4>
            <span class="results-number">Showing $Results.getTotalItems results</span>
            
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
                            <% loop GetManufacturer($ManufacturerID) %>
                                <td>$Name</td>
                            <% end_loop %>
                            <td>$Title</td>
                            <td>$Parent.Title</td>
                            <td><a href="$Link">View</a></td>
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