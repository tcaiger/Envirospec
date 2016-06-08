
<body style="margin: 0; padding: 0;">

    <table cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 10px 40px 10px 15px;">
                <p>Dear Administrator,</p>
                <p>The following is a list of certificates that are expired as of $Date.</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px 15px 20px 15px">
                <h3 style="margin-bottom: 20px">Expired Certificates</h3>

                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <th width="50" style="border-bottom: 2px solid #ddd; padding: 8px; margin-bottom: 2px;">
                            #
                        </th>
                        <th width="150" style="border-bottom: 2px solid #ddd; padding: 8px; margin-bottom: 2px; text-align: left">
                            Company
                        </th>
                        <th width="150" style="border-bottom: 2px solid #ddd; padding: 8px; margin-bottom: 2px; text-align: left">
                            Product
                        </th>
                        <th width="150" style="border-bottom: 2px solid #ddd; padding: 8px; margin-bottom: 2px; text-align: left">
                            Certificate
                        </th>
                        <th width="100" style="border-bottom: 2px solid #ddd; padding: 8px; margin-bottom: 2px; text-align: left">
                            Expiry Date
                        </th>
                    </tr>

                    <% loop $ExpiredCertificates() %>
                        <tr <% if  $Even %>style="background-color: #eee;"<% end_if %>>
                            <th width="50" style="border-top: 1px solid #ddd; padding: 8px; line-height: 1.4">
                                $Pos
                            </th>
                            <td width="150" style="border-top: 1px solid #ddd; padding: 8px; line-height: 1.4">
                                <% if $Product.Supplier.Name %>
                                    $Product.Supplier.Name
                                <% else %>
                                    $Product.Manufacturer.Name
                                <% end_if %>
                            </td>
                            <td width="150" style="border-top: 1px solid #ddd; padding: 8px; line-height: 1.4">
                                $Product.Title
                            </td>
                            <td width="150" style="border-top: 1px solid #ddd; padding: 8px; line-height: 1.4">
                                $Name
                            </td>
                            <td width="100" style="border-top: 1px solid #ddd; padding: 8px; line-height: 1.4">
                                $ValidUntil
                            </td>
                        </tr>
                    <% end_loop %>

                </table>
            </td>
        </tr>
    </table>
</body>