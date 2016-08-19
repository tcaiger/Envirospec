<% include Breadcrumbs %>

<div class="divide30"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h3>$Title</h3>
            <p>Submitting the form below will send an email to all users telling them to login to Envirospec.nz and confirm that all their product information is correct and up to date. The content from the field below will be the body of the email.</p>
            $DeclarationEmailForm
        </div>
        <div class="col-md-6">
            <h3>Member Details</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Member</th>
                    <th>Email Address</th>
                </tr>
                </thead>
                <tbody>
                    <% loop $GetMembers %>
                    <tr>
                        <td>$FirstName</td>
                        <td>$Email</td>
                    </tr>
                    <% end_loop %>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="divide60"></div>

