<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Members Area</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    Members Area / Update Personal Details
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="divide30"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Welcome $CurrentMember.FirstName</h3>

        </div>
        <div class="col-sm-8">
            <h3>You are managing $CurrentMember.Companies.Name</h3>

        </div>
    </div>
    <div class="row">
        <div class="divide10"></div>
        <div class="col-sm-3 membersarea-sidebar">
            <div class="well">
                <h4>Company Logo</h4>
                <div class="member-image-form">
                    $MemberLogoForm
                </div>
            </div>
        </div>

        <main class="col-sm-8 col-md-offset-1">
            <section class="members-area-form">
                <h4>Company Details</h4>
                <div class="members-area-form">
                    $MembersAreaForm
                </div>
            </section>

            <div class="divide30"></div>

            <section>
                <h3>Manufacturer Products</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $MemberProducts.Sort('Title', 'ASC') %>
                        <tr>
                            <td>$Title</td>
                            <td>$Parent.Title</td>
                            <td><a class="show-link" href="$MembersAreaLink">Edit</a></td>
                        </tr>
                        <% end_loop %>
                    </tbody>
                </table>
            </section>

            <div class="divide30"></div>

            <section>
                <h3>Company Certificates</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $MemberCertificates.Sort('Name', 'ASC') %>
                        <tr>
                            <td>$Name</td>
                            <td>$Status</td>
                            <td><a class="show-link" href="$MembersAreaLink">Edit</a></td>
                        </tr>
                        <% end_loop %>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>

<div class="divide30"></div>