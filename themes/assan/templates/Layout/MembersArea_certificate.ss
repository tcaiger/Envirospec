<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <% if $Product.ID == 0 %>
                    <a class="t-back-link" href="membersarea"><i class="fa fa-arrow-circle-left"></i> Back To Members Area</a>
                <% else %>
                    <a class="t-back-link" href="$getBackLink($Product.ID)"><i class="fa fa-arrow-circle-left"></i> Back To Product</a>
                <% end_if %>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    Members Area / Certificate
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="divide30"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-3 membersarea-sidebar">
        </div>
        <main class="col-lg-6 col-md-7 col-sm-9">
            <section>
                <h3>$Name</h3>
                <div class="divide10"></div>
                <h5>Certificate Status: <span>$Status</span></h5>

                <p>Once uploaded, the certificate will be reviewed by Envirospec and you will receive an email as soon as the certificate is approved. Approvals usually take 3- 5 working days.</p>
                <div class="certificate-form">
                    $CertificateForm
                </div>
                <div class="divide10"></div>
            </section>

            <div class="divide30"></div>

        </main>
    </div>
</div>

<div class="divide80"></div>