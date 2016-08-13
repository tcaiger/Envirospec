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
        <div class="col-sm-3">
            <div class="divide30"></div>
            <div class="sidebar-box">
                <p>Welcome <strong>$CurrentMember.FirstName</strong></p>
                <h4>Company Logo</h4>
                <img src="http://placehold.it/250x200">
            </div>
        </div>

        <main class="col-sm-9">
            <section class="member">
                <h3>Company Details</h3>
                <% with $CurrentMember.Companies %>
                    <h4>$Name</h4>
                    <p>$Phone</p>
                    <p>$Email</p>
                    <p>$Fax</p>
                    <p>$Website</p>
                    <p>$Address</p>
                    <p>$Post</p>
                <% end_with %>
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