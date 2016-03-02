
    <% loop Results %>
        <tr>
            <% loop GetManufacturer($ManufacturerID) %>
                <td>$Name</td>
            <% end_loop %>
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

