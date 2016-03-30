
<% loop Results %>
    <tr>
        <% if $SupplierID %>
            <% loop GetManufacturer($SupplierID) %>
                <td>$Name</td>
            <% end_loop %>
        <% else_if $ManufacturerID %>
            <% loop GetManufacturer($ManufacturerID) %>
                <td>$Name</td>
            <% end_loop %>
        <% else %>
            <td>No Manufacturer / Supplier</td>
        <% end_if %>


        <td><a class="show-link" href="$Link">$Title</a></td>
        <td class="text-center">$GetCompliance($EnvironmentalManagementSystem)</td>
        <td class="text-center">$GetCompliance($CarbonOffset)</td>
        <td class="text-center">$GetCompliance($PerformanceItemEcolabel)</td>
        <td class="text-center">$GetCompliance($LifeCycleBasedEcolabel)</td>
        <td class="text-center">$GetCompliance($NaturalProduct)</td>
        <td class="text-center">$GetCompliance($NewZealandMadeAccreditations)</td>
        <td class="text-center">$GetCompliance($GreenStarCompatible)</td>
        <td class="text-center">$GetCompliance($LivingBuildingChallenge)</td>
        <td class="text-center">$GetCompliance($ProductEnvironmentalIndex)</td>
    </tr>
<% end_loop %>

