<div class="sidebar-info-box">
    <div class="services-box wow animated fadeInUp animated">
         <a href="$Certificate.URL" target="_blank">
            <div class="services-box-icon">
                <%--<i class="fa fa-leaf"></i>--%>
                <% if $Type == 'Green Building Rating Compatibility' %>
                    <img src="$ThemeDir/img/icons/green-building-rating-compatible.jpg">
                <% else_if $Type == 'Indoor Air Quality Certification' %>
                    <img src="$ThemeDir/img/icons/Indoor-air-quality.jpg">
                <% else_if $Type == 'Environmental Management System' %>
                    <img src="$ThemeDir/img/icons/Environmental-Management-System.jpg">
                <% else_if $Type == 'Carbon Offset' %>
                    <img src="$ThemeDir/img/icons/carbon-offset.jpg">
                <% else_if $Type == 'Energy Efficiency Rating' %>
                    <img src="$ThemeDir/img/icons/energy-efficiency.jpg">


                    <%--Need To Be Supplied By Envirospec--%>
                <% else_if $Type == 'Lifecycle Based Ecolabel' %>
                    <img src="$ThemeDir/img/icons/np-icon.png">
                <% else_if $Type == 'Quality Management Systems' %>
                    <img src="$ThemeDir/img/icons/np-icon.png">
                <% else_if $Type == 'Full Building Product Appraisal' %>
                    <img src="$ThemeDir/img/icons/np-icon.png">
                <% else_if $Type == 'Product Technical Performance' %>
                    <img src="$ThemeDir/img/icons/np-icon.png">
                <% else_if $Type == 'Responsible Sourcing' %>
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
