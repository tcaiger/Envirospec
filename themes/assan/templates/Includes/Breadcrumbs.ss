<div class="breadcrumb-wrap">
    <div class="container">
        <!-- ===================================== -->
        <!--        Product Search Pages           -->
        <!-- ===================================== -->
        <% if $Parent.URLSegment == "product-search" %>
            <div class="row">
                
                <!-- Manufacturer Keyword Search -->
                <% if $URLSegment == "manufacturer-keyword-search" %>
                    <div class="col-sm-6">
                        <h4>Product Search</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            Manufacturer & Keyword Search
                        </ol>
                    </div>

                <!-- Greenstar Search -->
                <% else_if $URLSegment == "search-green-star-nz-homestar-compatible" %>
                    <div class="col-sm-6">
                        <h4>Product Search</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            Search Green Star NZ & Homestar Compatible
                        </ol>
                    </div>

                <!-- Interactive House Search -->
                <% else_if $URLSegment == "navigate-the-interactive-house" %>
                    <div class="col-sm-6">
                        <h4>Product Search</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            $Title
                        </ol>
                    </div>

                <!-- Keyword Search Results -->
                <% else_if $URLSegment == "search-results" %>
                    <div class="col-sm-6">
                        <h4>Search Results</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            <a href="manufacturer-keyword-search">Manufacturer & Keyword Search</a>
                             / Results
                        </ol>
                    </div>

                <!-- Inter Active House Search Results -->
                <% else_if $URLSegment == "compare" %>
                    <div class="col-sm-6">
                        <h4>Search Results</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            <a href="navigate-the-interactive-house">Navigate The Interactive House</a>
                             / Results
                        </ol>
                    </div>

                <!-- Greenstar Search Results -->
                <% else_if $URLSegment == "greenstar-results" %>
                    <div class="col-sm-6">
                        <h4>Search Results</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            <a href="search-green-star-nz-homestar-compatible">Search Green Star NZ & Homestar Compatible</a>
                             / Results
                        </ol>
                    </div>
                <% end_if %>  
            </div>
        <!-- ===================================== -->
        <!--        General Pages                  -->
        <!-- ===================================== -->
        <% else %>
            <div class="row">
                <div class="col-sm-6">
                    <h4>$Title</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        $Breadcrumbs
                    </ol>
                </div>
            </div>
        <% end_if %>
    </div>
</div>