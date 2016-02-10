<table class="table table-striped">
    <thead>
        <tr>
            <th>Manufacturer</th>
            <th>Product</th>
            <th>Environmental Management Systems</th>
            <th>Carbon Offset</th>
            <th>Performance Based Environmental Certification</th>
            <th>Life Cycle Based Ecolabel Certification</th>
            <th>Natural Product</th>
            <th>NZ Made</th>
        </tr>
    </thead>
    <tbody>
        <% loop Results %>
            <tr>
                <% loop GetManufacturer($ManufacturerID) %>
                    <td>$Name</td>
                <% end_loop %>
                <td><a href="$Link">$Title</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <% end_loop %>
    </tbody>
</table>