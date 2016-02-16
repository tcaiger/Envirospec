<div class="navbar navbar-default navbar-static-top yamm" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="$AbsoluteBaseURL"><img style="height: 60px; width: auto; margin-top: -18px; margin-left: -15px;" src="$ThemeDir/img/es-logo.png" alt="ENVIROSPEC"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <% loop $Menu(1) %>
                    <!-- Menu items if there are sub-menu items  -->
                    <% if $Children %>
                        <li class="dropdown">
                            <a href="$Link" class="$LinkingMode dropdown-toggle" data-toggle="dropdown">$MenuTitle <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu multi-level" role="menu">
                                <% loop $Children %>
                                    <li>
                                        <a tabindex="-1" href="$Link">$MenuTitle</a>
                                    </li>
                                <% end_loop %>
                            </ul>
                        </li>
                    <!-- Default menu items -->
                    <% else %>
                        <li class="dropdown">
                            <a href="$Link" class="$LinkingMode">$MenuTitle</a>
                        </li>
                    <% end_if %>
                <% end_loop %>
            </ul>
        </div>
    </div>
</div>