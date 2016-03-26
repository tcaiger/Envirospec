<% include Breadcrumbs %>

<div class="divide20"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="divide20"></div>
        <div class="col-sm-12">

            <h4 class="pull-left">Results for "$GetCategory"</h4>

            <div class="dropdown sort-dropdown pull-right">

                <button class="btn border-black btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-hashopopup="true" aria-expanded="false">
                    Sort Results <span class="caret"> </span>
                </button>
                <ul id="HouseSort" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li data-sort="Title" data-order="DESC">Products</li>
                    <li data-sort="ManufacturerID" data-order="DESC">Manufacturer</li>
                </ul>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h5 class="results">Showing results 1 - $Results.getTotalItems</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="divide20"></div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Manufacturer</th>
                    <th>Product</th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/ems-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Environmental Management Systems">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/co-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Carbon Offset">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/pb-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Performance Based Environmental Certification">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/lbc-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Life Cycle Based Ecolabel Certification">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/np-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Natural Product">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/nzmade-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="NZ Made">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/greenstar-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Greenstar">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/lbc-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Living Building Challenge">
                    </th>
                    <th class="text-center">
                        <img src="$ThemeDir/img/pei-icon.png" data-toggle="tooltip" data-placement="top" title="" data-original-title="Product Environmental Index">
                    </th>
                </tr>
                </thead>
                <tbody class="comparison-table">

                    <% include ComparisonTable %>

                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="divide60"></div>