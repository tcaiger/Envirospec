<div class="detail-img-col">
    <div class="hidden-xs">
        <% if $SupplierID %>
            $Company($SupplierID).Logo.SetWidth(250)
        <% else_if $ManufacturerID %>
            $Company($ManufacturerID).Logo.SetWidth(250)
        <% end_if %>
    </div>
    
    <div class="divide30"></div>
    <% loop $ProductImages %>
        <% if $First %>
            <!-- Main Image -->
            <a href="$URL" class="show-image">
                <img src="$SetWidth(250).URL">
            </a>
            <div class="divide15"></div>
        <% else_if $Pos > 1 && $Pos < 5 %>
            <a href="$URL" class="show-image detail-img-sm hidden-xs">
                <img src="$SetWidth(250).URL" class="img-responsive">
            </a>
        <% else %>
            <a href="$URL" class="show-image detail-img-sm hidden">
                <img src="$SetWidth(250).URL" class="img-responsive">
            </a>
        <% end_if %>
    <% end_loop %>
</div>

