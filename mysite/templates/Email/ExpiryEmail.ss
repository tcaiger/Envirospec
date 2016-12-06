
<body style="margin: 0; padding: 0;">

<table cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
    <tr>
        <td style="padding: 10px 40px 10px 15px;">
            <p>Dear $Member.FirstName,</p>
            <p>$Message</p>
            <% with $Certificate %>
                <p><strong>Manufacturer: </strong>$Product.Manufacturer.Name</p>
                <p><strong>Supplier: </strong>$Product.Supplier.Name</p>
                <p><strong>Product: </strong><% if $Product.Title%>$Product.Title<% else %>Company Certificate<% end_if %></p>
                <p><strong>Certificate: </strong>$Name</p>
                <p><strong>Document Number: </strong>$Number</p>
                <p><strong>Expiry: </strong>$ValidUntil</p>
                <p><strong>Link to document: </strong><a href="www.envirospec.nz{$Certificate.URL}">{$Certificate.Name}</a></p>
            <% end_with %>
        </td>
    </tr>
</table>
</body>