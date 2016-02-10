<table class="table table-striped">
    <thead>
        <tr>
            <th>Company</th>
            <th>Product</th>
            <th>Category</th>
            <th>Points</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Product Sorted Results -->
        <% if Sort == 0 %>
            <% loop Results.Sort('Title', 'ASC') %>
                <tr>
                    <% loop GetManufacturer($ManufacturerID) %>
                        <td>$Name</td>
                    <% end_loop %>
                    <td>$Title</td>
                    <td>$Parent.Title</td>
                    <td>$GetPoints($ID)</td>
                    <td><a href="$Link">View</a></td>
                </tr>
            <% end_loop %>
        <!-- Points Sorted List -->
        <% else %>
            <% loop Results.Sort('ContributionPotential','DESC') %>
                <tr>
                    <% loop Product.GetManufacturer($Product.ManufacturerID) %>
                        <td>$Name</td>
                    <% end_loop %>
                    <td>$Product.Title</td>
                    <td>$Product.Parent.Title</td>
                    <td>$ContributionPotential</td>
                    <td><a href="$Product.Link">View</a></td>
                </tr>
            <% end_loop %>
        <% end_if %>
    </tbody>
</table>