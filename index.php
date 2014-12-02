<!DOCTYPE html>
<html>
<head>
	<title>TopicB Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<!-- Start of first page -->
<div data-role="page" id="foo">

	<div data-role="header">
		<h1>TopicB</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true">
				<li><a href="#">Lodging</a></li>
				<li><a href="#">Travel Agent</a></li>
				<li><a href="#">Snow Report</a></li>
				<li><a href="#">Heli-Skiing</a></li>
				<li><a href="#">Kids Snow School</a></li>
				<li><a href="#">Restaurants</a></li>
		</ul>
		<p>link to another <a href="#bar">page</a></p>
	</div><!-- /content -->

	<?php
		include('footer.php');
	?>
	
</div><!-- /page -->

<!-- Start of second page -->
<div data-role="page" id="favorites">

	<div data-role="header">
		<h1>TopicB Favorites</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<p>I'm the second in the source order so I'm hidden when the page loads. I'm just shown if a link that references my id is beeing clicked.</p>
		<p><a href="#foo">Back to foo</a></p>
	</div><!-- /content -->

	<?php
		include('footer.php');
	?>

</div><!-- /page -->
</body>
</body>
</html>