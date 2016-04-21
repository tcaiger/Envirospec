<% include Breadcrumbs %>


<div class="divide20"></div>

<div class="container" style="min-height: 400px">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="pull-left">Resene Paints Ltd</h3>
                </div>
            </div>

            <div class="divide20"></div>

            <div class="well">
                <h5>$Subheading</h5>
                $Content
                <div class="form-group">
                    <label for="ReportSearch">Report Number</label>
                    <input type="text" name="ReportSearch" class="form-control report-search" placeholder="eg. ES-GSNZ-09-04c">
                </div>
                <div class="report-results"></div>
                <button class="report-search-btn btn btn-theme-bg btn-lg">Find Report</button>
            </div>

        </div>
    </div>


    <%-- Debugging --%>

    <div class="divide60"></div>
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

<div class="divide60"></div>

