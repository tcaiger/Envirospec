<% include Breadcrumbs %>

<div class="divide40"></div>
<div class="container">
    <div class="row">
        
         <% if $SelectedCategory.CategoryImage %>
    	   <div class="col-lg-5 col-sm-6 col-xs-12 col-sm-push-6">
        <% else %>
            <div class="col-md-6 col-md-offset-2">
        <% end_if %>
    		<div class="category-table">
                <h4>$SelectedCategory.Parent.Title / $SelectedCategory.Title</h4>
                <p>Select a sub category</p>
                <ul class="list-unstyled">
                	<% loop $Results %>
                    	<li>
                    		<a href="$FilterLink">
                    			<i class="fa fa-check-square"></i> $Title 
                    		</a>
                    	</li>
                    <% end_loop %>
                </ul>
            </div>
    	</div>
        
         <% if $SelectedCategory.CategoryImage %>
            <div class="col-sm-6 col-xs-12 col-lg-pull-5 col-sm-pull-6">
                <div class="house-img-holder pull-right">
                    <img src="$SelectedCategory.CategoryImage.URL">
                </div>
            </div>
        <% end_if %>
    </div>
</div>
<div class="divide20"></div>