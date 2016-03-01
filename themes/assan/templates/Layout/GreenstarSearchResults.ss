<% include Breadcrumbs %>

<div class="divide10"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3>$GetSearchParams</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="results">Showing results 1 - $Results.getTotalItems</h4>

                    <span class="pull-right" id="GreenStarOrderForm">
                        <h4 class="results">Sort:</h4>
                        <select style="border-bottom-left-radius: 0px">
                            <option value="0">Product </option>
                            <option value="1">Points </option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="divide20"></div>
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
        <a href="#" class="btn border-white btn-lg">Contact us today</a>
    </div>
</section>