<div class="divide50"></div>
<div class="row">
	<div class="col-sm-6">
		<div class="house-img-holder">
			<img src="$ThemeDir/img/glazing.jpeg">
		</div>
	</div>
	<div class="col-sm-5">
		<div class="category-table">
            <h4>Glazing</h4>
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
</div>