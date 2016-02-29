<% include Breadcrumbs %>

<div class="container">
<div class="divide20"></div>
    <h5>
        <i class="fa fa-info-circle"></i>
        Drag the cursor over an area of interest to search product categories</h5>
	<div class="row">
    	<div id="house-container" class="col-sm-12">
            
    		<% include House %>
	    	
            <div class="services">
                <% include HouseLabels Heading="Services", LabelID="14", SVG="Services" %>
            </div>
            <div class="fit-out">
                <% include HouseLabels Heading="Interior Fit-Out Items", LabelID="12", SVG="Interior" %>
            </div>
            <div class="paints">
                <% include HouseLabels Heading="Sealants, Adhesives, Paints & Coating Systems", LabelID="13", SVG="Paints" %>
            </div>
            <div class="framing">
                <% include HouseLabels Heading="Structure & Framing Systems", LabelID="10", SVG="Structure" %>
            </div>
            <div class="build-shell">
                <% include HouseLabels Heading="Building Shell and Envelope", LabelID="11", SVG="Shell" %>
            </div>
            <div class="landscape">
                <% include HouseLabels Heading="Site Work & Landscape", LabelID="9", SVG="Landscape" %>
            </div>
	    </div>
    </div>
</div>


<!-- ========================================== -->
<!--               Banner                       -->
<!-- ========================================== -->
<section id="cta-1">
    <div class="container">
        <h1>Do you have a project or idea?</h1>
        <a href="#" class="btn border-white btn-lg">Join us today</a>
    </div>
</section>

