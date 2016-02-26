<% include Breadcrumbs %>

<div class="container">
	<div class="row">
    	<div id="house-container" class="col-sm-12">
            
    		<% include House %>

            <i id="help" 
                class="fa fa-question-circle fa-3x" 
                data-toggle="tooltip" 
                data-placement="top" 
                title="" 
                data-original-title="Drag the cursor over an area of interest to search product categories">
            </i>
	    	
            <div class="services">
                <% include HouseLabels Heading="Services", LabelID="14", SVG="Services" %>
            </div>
            <div class="fit-out">
                <% include HouseLabels Heading="Interior Fit-Out Items", LabelID="12", SVG="Interior" %>
            </div>
            <div class="paints">
                <% include HouseLabels Heading="Interior Paints", LabelID="13", SVG="Paints" %>
            </div>
            <div class="build-shell">
                <% include HouseLabels Heading="Building Shell and Envelope", LabelID="11", SVG="Shell" %>
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

<script>
    /*========tooltip and popovers====*/
    $(document).ready(function () {
        $("[data-toggle=tooltip]").tooltip();
    });
</script>

