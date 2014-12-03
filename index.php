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

<script>

		$(document).ready(function() {

			//handle swipe left
			$(document).on("swipeleft", '#home', function () {
		    $('#link_01').trigger('click');
		  }).on("swipeleft", '#favorites', function () {
		    $('#link_02').trigger('click');
		  }).on("swipeleft", '#matching', function () {
		    $('#link_03').trigger('click');
		  }).on("swipeleft", '#chats', function () {
		    $('#link_04').trigger('click');
		  }).on("swipeleft", '#trending', function () {
		    $('#link_05').trigger('click');
		  }).on("swipeleft", '#contacts', function () {
		    $('#link_00').trigger('click');
		  });

		  //handle swipe right
		  $(document).on("swiperight", '#favorites', function () {
		    $('#link_00').trigger('click');
		  }).on("swiperight", '#matching', function () {
		    $('#link_01').trigger('click');
		  }).on("swiperight", '#chats', function () {
		    $('#link_02').trigger('click');
		  }).on("swiperight", '#trending', function () {
		    $('#link_03').trigger('click');
		  }).on("swiperight", '#contacts', function () {
		    $('#link_04').trigger('click');
		  }).on("swiperight", '#home', function () {
		    $('#link_05').trigger('click');
		  });


		});

</script>

<body>

<div data-role="page" id="home">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true">
				<li><a href="#">Lodging</a></li>
				<li><a href="#">Travel Agent</a></li>
				<li><a href="#">Snow Report</a></li>
				<li><a href="#">Heli-Skiing</a></li>
				<li><a href="#">Kids Snow School</a></li>
				<li><a href="#">Restaurants</a></li>
				<li><a href="#">Alpine Tour Bindings</a></li>
		</ul>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="favorites">

	<?php include('header.php'); ?>

	</script>

	<div role="main" class="ui-content">
		<p>Favorites Content</p>
		<p><a href="#home">Back to home</a></p>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="matching">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<p>Matching Content</p>
		<p><a href="#home">Back to home</a></p>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="chats">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<p>Chats Content</p>
		<p><a href="#home">Back to home</a></p>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="trending">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<p>Trending Content</p>
		<p><a href="#home">Back to home</a></p>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="contacts">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<p>Contacts Content</p>
		<p><a href="#home">Back to home</a></p>
	</div>

	<?php include('footer.php'); ?>

</div>


</body>
</html>