
<body style="margin: 0; padding: 0;">

<table cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
    <tr>
        <td style="padding: 10px 40px 10px 15px;">
            <p>Dear $Member->FirstName,</p>
            <p>This is a polite reminder from Envirospec.nz that the following certificate will expire in 30 days:</p>
            <% with $Certificate %>
                <%--<p>Product: $Product()->Title</p>--%>
                <p>Name: $Name</p>
                <p>Expiry: $ValidUntil</p>
            <% end_with %>
        </td>
    </tr>
</table>
</body>