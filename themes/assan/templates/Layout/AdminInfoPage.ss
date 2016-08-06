<% include Breadcrumbs %>

<div class="container">
    <div class="divide60"></div>
    <div class="row">
        <div class="col-sm-12">
            <h1>$Title</h1>
        </div>
    </div>
    <div class="divide20"></div>
    <div class="row">
        <div class="col-sm-12">

            <%-- Certificates Without a File Path--%>
            <h3>Certificates Without A File Path</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Filepath</th>
                </tr>
                </thead>
                <tbody>

                    <% loop $PrintCertificates %>
                        <% if $Certificate.Filename == 'assets/' %>
                        <tr>
                            <td>$Pos</td>
                            <td>$Product.Title</td>
                            <td>$Name</td>
                            <td>$Certificate.Filename</td>
                        </tr>
                        <% end_if %>
                    <% end_loop %>

                </tbody>
            </table>

            <%-- Certificates Without A Product--%>
            <h3>Certificates Without A Product</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Filepath</th>
                </tr>
                </thead>
                <tbody>

                    <% loop $PrintCertificates %>
                        <% if $Product.Title == '' %>
                        <tr>
                            <td>$Pos</td>
                            <td>$Product.Title</td>
                            <td>$Name</td>
                            <td>$Certificate.Filename</td>
                        </tr>
                        <% end_if %>
                    <% end_loop %>

                </tbody>
            </table>


            <%-- Remaining Certificates--%>
            <h3>Complete Certificates</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Filepath</th>
                </tr>
                </thead>
                <tbody>

                    <% loop $PrintCertificates %>
                        <% if $Product.Title != '' && $Certificate.Filename != 'assets/' %>
                        <tr>
                            <td>$Pos</td>
                            <td>$Product.Title</td>
                            <td>$Name</td>
                            <td>$Certificate.Filename</td>
                        </tr>
                        <% end_if %>
                    <% end_loop %>

                </tbody>
            </table>


        </div>
    </div>
    <%--End of debugging--%>
</div>


