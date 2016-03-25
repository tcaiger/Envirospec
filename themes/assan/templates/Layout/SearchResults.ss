<% include Breadcrumbs %>

<div class="divide20"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <% if $Results  %>

                <div class="row">
                    <div class="col-sm-12">
                        <h4>Search Results for "$SearchName"</h4>
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
            <% else %>
                <div style="height: 400px">
                    <h3>Sorry there are no results for "$SearchName"</h3>
                    <h4>Please try another search</h4>
                </div>
            <% end_if %>
        </div>
    </div>
</div>

<div class="divide40"></div>
