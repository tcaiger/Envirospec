<% include Breadcrumbs %>

<div class="divide30"></div>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h3>$Title</h3>

            <% if $MemberTest  %>
                Welcome . Fill in the form below with the content which you would like to send to all users.
                $DeclarationEmailForm
            <% else %>
                $Content
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consequatur cumque error est labore molestias nisi officiis quaerat. Ab amet dolore dolorem enim et magni nesciunt omnis, placeat quidem repellendus.</p>
                $DeclarationForm
            <% end_if %>

        </div>
    </div>
</div>
<div class="divide60"></div>

