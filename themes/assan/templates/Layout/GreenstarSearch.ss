<% include Breadcrumbs %>

<div class="divide20"></div>

<div class="container">
    <div class="row">
    	<h3>Search Green Star NZ / Homestar Products</h3>
    	<div class="divide20"></div>
        <div class="col-sm-4" style="padding-left: 0">
        	<div class="greenstar-search well">
				<% include SearchOptions %>
			</div>
			<div class="well">
	        	<h5>Search By Report Number</h5>
	        	<p>Download a report detailing a product’s compliance level with Green Star NZ and Homestar requirements.</p>
                <div class="form-group">
                    <label for="ReportSearch">Report Number</label>
                    <input type="text" name="ReportSearch" class="form-control report-search" placeholder="eg. ES-GSNZ-09-04c">
                </div>
                <div class="report-results"></div>
                <button class="report-search-btn btn btn-theme-bg btn-lg">Find Report</button>
	    	</div>
        </div>
         
        <div class="col-sm-8">
        	<div class="divide20"></div>
        	$Content
        </div>
	</div>
</div>

<div class="divide40"></div>

