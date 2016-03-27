<div class="sidebar-info-box">
    <div class="services-box wow animated fadeInUp animated">
         <a href="$Certificate.URL" target="_blank">
            <div class="services-box-icon">
                <%--<i class="fa fa-leaf"></i>--%>
                <% if $Type == 'Green Building Rating Compatibility' %>
                    <img src="$ThemeDir/img/greenstar-icon.png">
                <% else_if $Type == 'Indoor Air Quality Certification' %>
                    <img src="$ThemeDir/img/full-ica-icon.png">
                <% else_if $Type == 'Energy Efficiency Rating' %>
                    <img src="$ThemeDir/img/co-icon.png">
                <% else_if $Type == 'Lifecycle Based Ecolabel' %>
                    <img src="$ThemeDir/img/full-lca.png">
                <% else_if $Type == 'Environmental Management System' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% else_if $Type == 'Quality Management Systems' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% else_if $Type == 'Full Building Product Appraisal' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% else_if $Type == 'Product Technical Performance' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% else_if $Type == 'Carbon Offset' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% else_if $Type == 'Responsible Sourcing' %>
                    <img src="$ThemeDir/img/np-icon.png">
                <% end_if %>
            </div>
            <div class="services-box-info">
                <h4>$Name</h4>
                <p>$Type</p>
            </div>
        </a>
    </div>
</div>
<hr>


<%--

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
</th>--%>
