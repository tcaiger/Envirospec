<div style="margin-top: 20px" class="detail-img-col">
    <div class="hidden-xs">
        $Company($ManufacturerID).Logo.SetWidth(250)
    </div>
    
    <div class="divide30"></div>
    <% loop ProductImages.Limit(4) %>
        <% if First %>
            <!-- Main Image -->
            <a href="$URL" class="show-image">
                <img src="$SetWidth(250).URL">
            </a>
            <div class="divide15"></div>
        <% else %>
            <!-- Small Images -->
            <a href="$URL" class="show-image detail-img-sm hidden-xs">
                <img src="$SetWidth(250).URL" class="img-responsive">
            </a>
        <% end_if %>
    <% end_loop %>
</div>

