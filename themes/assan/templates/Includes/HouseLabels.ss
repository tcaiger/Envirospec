<div class="panel-group simple-collapse" id="accordion-$LabelID">
    <div class="panel">
        <div class="panel-heading">
            <a class="house-heading" data-toggle="collapse" data-parent="#accordion-$LabelID" href="#collapse-$LabelID">
                <i class="fa fa-desktop"></i> $Heading
            </a>
        </div>
        <div id="collapse-$LabelID" class="panel-collapse collapse">
            <div class="panel-body">
                <ul style="padding-left: 20px">
                    <div>
                        <% loop GetCategories($LabelID) %>
                            <% if Children %>
                                <li>
                                    <a data-cat="$ID" class="house-label" href="#">
                                        $Title
                                    </a>
                                </li>
                            <% end_if %>
                        <% end_loop %>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>





