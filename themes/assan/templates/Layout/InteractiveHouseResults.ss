<% include Breadcrumbs %>

<div class="divide40"></div>

<!-- ========================================== -->
<!--               Results                      -->
<!-- ========================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
             <div class="row">
                <div class="col-sm-12">
                    <h3>$GetCategory</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h4 style="color: #333; display: inline">Showing results 1 - $Results.getTotalItems</h4>

                    <span class="pull-right" id="HouseOrderForm">
                        <h4 style="color: #333">Sort:</h4>
                        <select style="border-bottom-left-radius: 0px">
                            <option value="0">Product </option>
                            <option value="1">Manufacturer </option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="divide20"></div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>Product</th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/ems-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Environmental Management Systems">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/co-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Carbon Offset">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/pb-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Performance Based Environmental Certification">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/lbc-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Life Cycle Based Ecolabel Certification">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/np-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Natural Product">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/nzmade-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="NZ Made">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/greenstar-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Greenstar">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/lbc-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Living Building Challenge">
                        </th>
                        <th class="text-center">
                            <img src="$ThemeDir/img/pei-icon.png"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Product Environmental Index">
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

<!-- ========================================== -->
<!--               Banner                       -->
<!-- ========================================== -->
<section id="cta-1">
    <div class="container">
        <h1>Do you have a project or idea?</h1>
        <a href="#" class="btn border-white btn-lg">Contact us today</a>
    </div>
</section>


<script>
    /*========tooltip and popovers====*/
    $(document).ready(function () {
        $("[data-toggle=tooltip]").tooltip();
    });
</script>