<% include Header %>
<body class="$ClassName">

	<% if $ClassName != 'AssessorAdminPage' && $ClassName != 'Declaration'  %>
        <% include Topbar %>
	<% end_if %>
	<% include Navbar %>

    $Layout
    
    <% include Footer %>
</body>
</html>
