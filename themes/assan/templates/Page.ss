<% include Header %>
<body>
	<% include Topbar %>
	<% if $ClassName == "Product" %>
		<% include ProductPageNavbar %>
	<% else %>
		<% include Navbar %>
	<% end_if %>
    $Layout
    <% include Footer %>
</body>
</html>
