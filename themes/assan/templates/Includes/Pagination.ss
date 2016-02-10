<% if $Results.MoreThanOnePage %>
    <ul class="pagination">
        <% if $Results.NotFirstPage %>
            <li>
                <a href="$Results.PrevLink" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
        <% end_if %>
        <% loop $Results.PaginationSummary %>
            <% if $CurrentBool %>
                <li class="active"><a href="$Link">$PageNum</a></li>
            <% else %>
                <li><a href="$Link">$PageNum</a></li>
            <% end_if %>
        <% end_loop %>
        <% if $Results.NotLastPage %>
            <li>
                <a href="$Results.NextLink" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        <% end_if %>
    </ul>
<% end_if %>
