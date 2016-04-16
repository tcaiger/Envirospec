<% if $Report %>
	<div class="alert alert-success">
		<button class="close" data-dismiss="alert">x</button>
		<a class="text-success" href="$Report" target="_blank">
			<i style="margin-right: 0.5em" class="fa fa-desktop"></i>
			View Report.
		</a>
	</div>
<% else %>
	<div class="alert alert-danger">
		<button class="close" data-dismiss="alert">x</button>
		<p class="text-danger">
			<i style="margin-right: 0.5em" class="fa fa-exclamation-circle"></i>
			Please enter a valid report number.
		</p>

	</div>
<% end_if %>