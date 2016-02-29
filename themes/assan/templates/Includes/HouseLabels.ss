
<div class="house-card">

    <table class="table table-striped">
        <thead>
            <th data-svg="$SVG">$Heading</th>
        </thead>
        <tbody>
            <% if GetCategories($LabelID) %>
                <% loop GetCategories($LabelID) %>
                    <% if Children %>
                        <tr>
                            <td>
                                <a class="house-label" href="$FilterLink1"> $Title</a>
                            </td>
                        </tr>
                    <% end_if %>
                <% end_loop %>
            <% else %>
                <tr>
                    <td>
                        <a class="house-label" href="#">There are no products loaded under this category.
                    </td>
                </tr>
            <% end_if %>
        </tbody>
    </table>

</div>






