<% include Breadcrumbs %>

<div class="divide10"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="divide20"></div>
                <div class="col-sm-12">

                    <h4 class="pull-left">Results for "$GetSearchParams"</h4>

                    <div class="dropdown sort-dropdown pull-right" id="HouseOrderForm">

                        <button  class="btn border-black btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-hashopopup="true" aria-expanded="false">
                            Sort Results <span class="caret"> </span>
                        </button>
                        <ul id="GreenstarSort" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li data-sort="Title" data-order="ASC">Products ASC</li>
                            <li data-sort="Title" data-order="DESC">Products DESC</li>
                            <li data-sort="Points" data-order="ASC">Points ASC</li>
                            <li data-sort="Points" data-order="DESC">Points DESC</li>
                        </ul>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="results">Showing results 1 - $Results.getTotalItems</h5>
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

<div class="divide50"></div>
