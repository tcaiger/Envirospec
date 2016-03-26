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

        <% loop $Results %>
            <tr>
                <% loop $Manufacturer($SupplierID) %>
                    <td>$Name</td>
                <% end_loop %>
                <td>$Title $GetCreditID</td>
                <td>$Parent.Title</td>
                <td>$Points</td>
                <td><a class="show-link" href="$Link">View</a></td>
            </tr>
        <% end_loop %>

    </tbody>
</table>