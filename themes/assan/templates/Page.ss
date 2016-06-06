<% include Header %>
<body class="$ClassName">

	<% if $ClassName != 'AssessorAdminPage' %>
        <% include Topbar %>
	<% end_if %>
	<% include Navbar %>

    $Layout
    
    <% include Footer %>
</body>
</html>
