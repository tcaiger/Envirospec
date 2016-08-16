<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Members Area</h4>
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
        <div class="col-sm-3">
            <div class="divide30"></div>
            <div class="member-image-form">
                $ProductImagesForm
            </div>
        </div>

        <main class="col-sm-9">
            <section>
                <h3>$Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum error eveniet in possimus quaerat voluptas! Aut eius eos excepturi exercitationem harum ipsam neque optio sit veritatis. Eum, nobis, praesentium.</p>
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