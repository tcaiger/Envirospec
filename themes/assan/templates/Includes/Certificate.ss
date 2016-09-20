<div class="sidebar-info-box">
    <div class="services-box wow animated fadeInUp animated">
        <a href="$Certificate.URL" target="_blank">
            <div class="services-box-icon">
                <% if $Type == 'Green Building Rating Compatibility' && $SiteConfig.GreenBuildingRatingCompatibility.URL %>
                    <img src="$SiteConfig.GreenBuildingRatingCompatibility.URL">
                <% else_if $Type == 'Indoor Air Quality Certification' && $SiteConfig.IndoorAirQualityCertification.URL %>
                    <img src="$SiteConfig.IndoorAirQualityCertification.URL">
                <% else_if $Type == 'Environmental Management System' && $SiteConfig.EnvironmentalManagementSystem.URL %>
                    <img src="$SiteConfig.EnvironmentalManagementSystem.URL">
                <% else_if $Type == 'Carbon Offset' && $SiteConfig.CarbonOffset.URL %>
                    <img src="$SiteConfig.CarbonOffset.URL">
                <% else_if $Type == 'Lifecycle Based Ecolabel' && $SiteConfig.LifecycleBasedEcolabel.URL %>
                    <img src="$SiteConfig.LifecycleBasedEcolabel.URL">
                <% else_if $Type == 'Product Technical Performance' && $SiteConfig.ProductTechnicalPerformance.URL %>
                    <img src="$SiteConfig.ProductTechnicalPerformance.URL">
                <% else_if $Type == 'Responsible Sourcing' && $SiteConfig.ResponsibleSourcing.URL %>
                    <img src="$SiteConfig.ResponsibleSourcing.URL">
                <% else_if $Type == 'Quality Management Systems' && $SiteConfig.QualityManagementSystems.URL %>
                    <img src="$SiteConfig.QualityManagementSystems.URL">

                    <%--Need To Be Supplied By Envirospec--%>
                <% else_if $Type == 'Energy Efficiency Rating' && $SiteConfig.EnergyEfficiencyRating.URL %>
                    <img src="$SiteConfig.EnergyEfficiencyRating.URL">
                <% else_if $Type == 'Full Building Product Appraisal' && $SiteConfig.FullBuildingProductAppraisal.URL %>
                    <img src="$SiteConfig.FullBuildingProductAppraisal.URL">
                <% else %>
                    <img src="$ThemeDir/img/icons/np-icon.png">
                <% end_if %>
            </div>
            <div class="services-box-info">
                <% if $Type == 'Green Building Rating Compatibility' %>
                    <h4><i class="fa fa-download" aria-hidden="true"></i> Click To Download PDF Summary Sheet</h4>
                    <p>$Name</p>
                <% else %>
                    <h4>$Name</h4>
                    <p>$Type</p>
                <% end_if %>
            </div>
        </a>
    </div>
</div>
<hr>
