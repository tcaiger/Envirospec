
<div class="house-card">

    <table class="table table-striped">
        <thead>
            <th data-svg="$SVG">$Heading</th>
        </thead>
        <tbody>
            <% loop GetCategories($LabelID) %>
                <% if Children %>
                    <tr>
                        <td>
                            <a data-cat="$ID" class="house-label" href="#"> $Title
                        </td>
                    </tr>
                <% end_if %>
            <% end_loop %>
        </tbody>
    </table>

</div>






