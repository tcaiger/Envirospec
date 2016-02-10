<% include Breadcrumbs %>

<div class="divide40"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8">
                    <h4>Search Results For: $GetSearchParams</h4>
                </div>
                <div class="col-sm-3 col-sm-offset-1" id="OrderByForm">
                    <h4 style="display: inline">Order by: </h4>
                    <select style="display: inline; width: 60%;"name="filter" class="dropdown form-control pull-right">
                        <option value="0">Product </option>
                        <option value="1">Points </option>
                    </select>
                </div>
            </div>
            <span class="results-number">Showing $Results.getTotalItems results</span>
            
            <!-- Search Results Table -->
            <div class="results-table">
                <% include ResultsTable %>
            </div>
        </div>
    </div>
</div>

<div class="divide40"></div>

<!-- ========================================== -->
<!--               Banner                       -->
<!-- ========================================== -->
<section id="cta-1">
    <div class="container">
        <h1>Do you have a project or idea?</h1>
        <a href="#" class="btn border-white btn-lg">Join us today</a>
    </div>
</section>