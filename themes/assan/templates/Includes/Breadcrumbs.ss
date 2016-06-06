<div class="breadcrumb-wrap">
    <div class="container">

        <div class="row">

            <!-- Manufacturer Keyword Search -->
            <% if $ClassName == "KeywordSearch" %>
                <div class="col-sm-6">
                    <h4>Product Search</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        Manufacturer & Keyword Search
                    </ol>
                </div>

            <!-- Greenstar Search -->
            <% else_if $ClassName == "GreenstarSearch" %>
                <div class="col-sm-6">
                    <h4>Product Search</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        Search Green Star NZ & Homestar Compatible
                    </ol>
                </div>

            <!-- Interactive House Search -->
            <% else_if $ClassName == "InteractiveHouse" %>
                <div class="col-sm-6">
                    <h4>Product Search</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        $Title
                    </ol>
                </div>

            <!-- Keyword Search Results -->
            <% else_if $ClassName == "SearchResults" %>
                <div class="col-sm-6">
                    <h4>Search Results</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        <a href="manufacturer-keyword-search">Manufacturer & Keyword Search</a>
                         / Results
                    </ol>
                </div>

            <!-- Product Categories -->
            <% else_if $ClassName == "ProductCategoriesPage" %>
                <div class="col-sm-6">
                    <h4>Product Search</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        <a href="navigate-the-interactive-house">Navigate The Interactive House</a>
                         / Product Categories
                    </ol>
                </div>

            <!-- Inter Active House Search Results -->
            <% else_if $ClassName == "InteractiveHouseResults" %>
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
            <% else_if $ClassName == "GreenstarSearchResults" %>
                <div class="col-sm-6">
                    <h4>Search Results</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        <a href="search-green-star-nz-homestar-compatible">Search Green Star NZ & Homestar Compatible</a>
                         / Results
                    </ol>
                </div>

                <!-- Greenstar Search Results -->
            <% else_if $ClassName == "AssessorAdminPage" %>

                <div class="col-xs-6">
                    <h4>$Title</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a class="logout btn btn-theme-dark btn-ico" href="home/logout">Logout <span class="fa fa-sign-out"></span></a>
                </div>

            <% else %>

                <!-- ===================================== -->
                <!--        General Pages                  -->
                <!-- ===================================== -->
                <div class="col-sm-6">
                    <h4>$Title</h4>
                </div>
                <div class="col-sm-6 hidden-xs text-right">
                    <ol class="breadcrumb">
                        $Breadcrumbs
                    </ol>
                </div>

            <% end_if %>
        </div>
    </div>
</div>