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
        <div class="col-sm-4 membersarea-sidebar">
            <div class="divide60"></div>
            <div class="well">
                <h4>Company Logo</h4>
                <div class="member-image-form">
                    $MemberLogoForm
                </div>
            </div>
        </div>

        <main class="col-sm-8">

            <h3>Welcome $CurrentMember.FirstName</h3>
            <p>You are managing <strong>$CurrentMember.Companies.Name</strong>.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet architecto blanditiis ipsam magni modi mollitia nobis, quos. Assumenda enim eos esse laborum molestiae nulla pariatur perspiciatis praesentium rerum saepe!</p>
            <div class="alert-info alert">
                <h4>Product Information Disclaimer</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, asperiores cumque est fugiat nesciunt officia sequi voluptate? Autem, consequuntur, impedit in molestiae mollitia nemo obcaecati odio pariatur quae, rem totam.</p>
                <div class="divide10"></div>
                <form action="">
                    <input name="example" type="checkbox"><label style="padding-left: 10px" for="example">Tick the checkbox</label><br>
                    <div class="divide10"></div>
                    <button class="btn btn-theme-dark">Submit</button>
                </form>
            </div>

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