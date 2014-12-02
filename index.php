<!DOCTYPE html>
<html>
<head>
	<title>TopicB Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css" />
	 <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
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

	<div data-role="footer">		
		<div data-role="navbar">
			<ul>
				<li><a href="#">One</a></li>
				<li><a href="#">Two</a></li>
				<li><a href="#">Three</a></li>
				<li><a href="#">Four</a></li>
				<li><a href="#">Five</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->
</div><!-- /page -->

<!-- Start of second page -->
<div data-role="page" id="bar">

	<div data-role="header">
		<h1>Bar</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<p>I'm the second in the source order so I'm hidden when the page loads. I'm just shown if a link that references my id is beeing clicked.</p>
		<p><a href="#foo">Back to foo</a></p>
	</div><!-- /content -->

	<div data-role="footer">		
		<div data-role="navbar">
			<ul>
				<li><a href="#">One</a></li>
				<li><a href="#">Two</a></li>
				<li><a href="#">Three</a></li>
				<li><a href="#">Four</a></li>
				<li><a href="#">Five</a></li>
			</ul>
		</div><!-- /navbar -->
	</div><!-- /footer -->

</div><!-- /page -->
</body>
</body>
</html>