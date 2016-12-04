<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="membersarea" style="margin-left: 15px;"><i style="margin-right: 6px" class="fa fa-arrow-circle-left"></i> Back To Members Area</a>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    Members Area / Product
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
                <div class="member-image-form">
                    $ProductImagesForm
                </div>
            </div>
        </div>

        <main class="col-sm-8">
            <section>
                <h3>$Title</h3>
                $GeneralDescription
            </section>
            <div class="divide30"></div>
            <section>
                <h3>Product Certificates</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <% loop $Certificates.Sort('Name', 'ASC') %>
                        <tr>
                            <td>$Name</td>
                            <td>$Status</td>
                            <td><a class="show-link" href="$MembersAreaLink">Edit</a></td>
                        </tr>
                        <% end_loop %>
                    </tbody>
                </table>
            </section>
            <div class="divide30"></div>
            <section>
                <h3>Product Links</h3>
                <div class="product-form">
                    $ProductForm
                </div>
            </section>
            <div class="divide30"></div>
        </main>
    </div>
</div>

<div class="divide30"></div>