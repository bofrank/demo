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


	var strTapId, strPassWord;
			
	<?php

		include("mysqli.class.php"); 
		include("data.php");

		//$cookie = 10;
		$cookie = createCookie();

		function createCookie(){

		    $text = "";
		    $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		    $possibleLength = strlen($possible);
		    

		    for($i=0;$i<23;$i++){
		        $possibleRand = rand(0,$possibleLength);
		        $text = $text.$possible{$possibleRand};
		    }
		    return $text;

		}


		$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
		socket_connect( $socket, "172.31.27.57", 8010 );

		socket_write( $socket, "command=create_tap_id&cookie=$cookie" );

		$buf = socket_read( $socket, 2048 );
		#echo $buf;

		parse_str($buf, $array);

		socket_close( $socket );

		$strTapId = $array['tapid'];
		$strPassWord = $array['strPassWord'];

		echo "strTapId = '".$array['tapid']."';\n";
		echo "strPassWord = '".$array['password']."';\n";
		echo "var newCookie = '".$cookie."';\n";

		//load data

		$config = array();
		$config['host'] = $hostname;
		$config['user'] = $username;
		$config['pass'] = $password;
		$config['table'] = 'topicb';

		$DB = new DB($config);

		$DB->Query("SELECT * FROM topicb.topics ORDER BY tapid DESC");

		$result = $DB->get();

		$dataFormated = array();

		//$dataResult = $dataFormated[0]['topic'];
		//$dataResult = json_encode(fix_keys($dataFormated));
/*
		for($i=0;$i<count($result);$i+=3){

	    $dataFormated[$i]['topic'] = $result[$i]['topic'];
	    $dataFormated[$i]['tapid'] = $result[$i]['tapid'];
	    $dataFormated[$i]['category'] = $result[$i]['category'];

	    $topicNum = $i+1;

	    echo "var topicNum=".$topicNum;

		}
*/

	?>

	function login()
	{
		tap.callback( "{ actionType:'login', tapid: '" + strTapId + "', password: '" + strPassWord + "' }" );
	}

	function logout()
	{
		tap.callback( "{ actionType:'logout' }" );
	}

	function showdialpad()
	{
		tap.callback( "{ actionType:'showdialpad' }" );
	}

	function call(tapIdCallee)
	{
    tapIdCallee = tapIdCallee.replace(/-/g, "");
	 	tap.callback( "{ actionType:'call', callnumber:"+tapIdCallee+" }" );
	}

	$(document).ready(function() {

		//get topic from url
    var urlTopic = getUrlParameter('topic');
    var urlImage = getUrlParameter('image');

    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    }

    //add url topic to list
    if(urlTopic){
    	$("input[placeholder='Search TopicB']").val(urlTopic).trigger("change");
    	$("<li><a>"+urlTopic+"</a></li>").prependTo(".topic_list");
  	}

  	//add image to list
  	if(urlImage){
    	$("input[placeholder='Search TopicB']").val(urlImage).trigger("change");
    	$("<li><a class='ui-btn ui-btn-icon-right ui-icon-carat-r' style='cursor:pointer;'><img src='"+urlImage+"' style='max-height:200%;max-width:200%' /></a></li>").prependTo(".topic_list");
    	$("#imgTopic").html("<img src="+urlImage+" />");
    	chatStart(urlImage);
  	}

		//show button as active in navigation
		$(document).on("pageshow", '#page_01', function () {
	    $('#page_01').find("#link_01").addClass("ui-btn-active ui-state-persist");
	  }).on("pageshow", '#page_02', function () {
	    $('#page_02').find("#link_02").addClass("ui-btn-active ui-state-persist");
	  }).on("pageshow", '#page_03', function () {
	    $('#page_03').find("#link_03").addClass("ui-btn-active ui-state-persist");
	  }).on("pageshow", '#page_04', function () {
	    $('#page_04').find("#link_04").addClass("ui-btn-active ui-state-persist");
	  }).on("pageshow", '#page_05', function () {
	    $('#page_05').find("#link_05").addClass("ui-btn-active ui-state-persist");
	  });

		//handle swipe left
		$(document).on("swipeleft", '#page_00', function () {
			$('#link_01').removeAttr("data-direction");
	    $('#link_01').trigger('click');
	  }).on("swipeleft", '#page_01', function () {
	  	$('#link_02').removeAttr("data-direction");
	    $('#link_02').trigger('click');
	  }).on("swipeleft", '#page_02', function () {
	  	$('#link_03').removeAttr("data-direction");
	    $('#link_03').trigger('click');
	  }).on("swipeleft", '#page_03', function () {
	  	$('#link_04').removeAttr("data-direction");
	    $('#link_04').trigger('click');
	  }).on("swipeleft", '#page_04', function () {
	  	$('#link_05').removeAttr("data-direction");
	    $('#link_05').trigger('click');
	  }).on("swipeleft", '#page_05', function () {
	  	$('#link_00').removeAttr("data-direction");
	    $('#link_00').trigger('click');
	  });

	  //handle swipe right
	  $(document).on("swiperight", '#page_01', function () {
	    $('#link_00').trigger('click');
	    $('#link_00').attr("data-direction","reverse");
	  }).on("swiperight", '#page_02', function () {
	  	$('#link_01').attr("data-direction","reverse");
	    $('#link_01').trigger('click');
	  }).on("swiperight", '#page_03', function () {
	  	$('#link_02').attr("data-direction","reverse");
	    $('#link_02').trigger('click');
	  }).on("swiperight", '#page_04', function () {
	  	$('#link_03').attr("data-direction","reverse");
	    $('#link_03').trigger('click');
	  }).on("swiperight", '#page_05', function () {
	  	$('#link_04').attr("data-direction","reverse");
	    $('#link_04').trigger('click');
	  }).on("swiperight", '#page_00', function () {
	  	$('#link_05').attr("data-direction","reverse");
	    $('#link_05').trigger('click');
	  });

		<?php

			for($i=0;$i<count($result);$i++){

		    $dataFormated[$i]['topic'] = $result[$i]['topic'];
		    $dataFormated[$i]['tapid'] = $result[$i]['tapid'];
		    $dataFormated[$i]['category'] = $result[$i]['category'];

		    echo '$(".topic_list").append("<li><a class=\"ui-btn ui-btn-icon-right ui-icon-carat-r\">'.$result[$i]['topic'].'</a></li>");';

	  	}

    ?>

	  //bind choosing a topic to starting chat and getting a tapid
	  $(".topic_list a").click(function(){
	  	var $tempTopic = $(this).html();
	  	var $tempURL = $(this).find('img').attr("src");
	  	if($($tempTopic).is("img")){
		  	chatStart($tempURL);
		  	$("#imgTopic").html("<img src="+$tempURL+" />");
			}else{
				chatStart($(this).text());
				$("#imgTopic").html("");
			}
		});

		$("#phoneBox").attr("src","../flashphone/index.php?c="+newCookie);

	});

	//create unique id (this will eventually become tapid from sip server)
	/*
	var cookie = "";
  var possible = "0123456789";

  for( var i=0; i < 10; i++ )
      cookie += possible.charAt(Math.floor(Math.random() * possible.length));
	*/

	//create chat from clicking on topic

	var topic="default";
	function chatStart(topic){
		$.mobile.changePage("#page_03");
		$("#chatBox").attr("src","../index_chat.php?chatter="+<?php echo $strTapId ?>+"&chatee=1111111111&topicinit="+topic);
	}

	function voiceStart(callee){
		var calleeStripped = callee.replace(/-/g, "");
		$("#phoneBox").attr("src","../flashphone/index.php?c="+newCookie+"&callee="+calleeStripped);
		$('#link_05').trigger('click');
	}

	function voiceIncoming(){
		$('#link_05').trigger('click');
	}

	function favSave(topic){
		//alert("Topic "+topic+" saved. Go to favs.");
		$('#link_01').trigger('click');
	}

</script>

<body>

<div data-role="page" id="page_00">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
    <ul id="listFav" data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true" data-filter-reveal="true" class="topic_list">
	    	<li><a>TopicB</a></li>
	    	<li><a><img src="http://topicb.com/seahawks/images/logo.png" style='max-height:200%;max-width:200%' /></a></li>
				<li><a>Heli-Skiing</a></li>
				<li><a>Travel Agent</a></li>
				<li><a>Snow Report</a></li>
				<li><a>Lodging</a></li>
				<li><a>Kids Snow School</a></li>
				<li><a>Restaurants</a></li>
				<li><a>Alpine Tour Bindings</a></li>
				<li><a>fresh powder</a></li>
				<li><a>best month for powder</a></li>
				<li><a>powder skiis</a></li>
		</ul>
	</div>

	<?php include('footer.php'); ?>

</div>

<div data-role="page" id="page_01">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true" class="topic_list">
				<li><a>TopicB</a></li>
				<li><a><img src="http://topicb.com/seahawks/images/logo.png" style='max-height:200%;max-width:200%' /></a></li>
				<li><a>Heli-Skiing</a></li>
				<li><a>Travel Agent</a></li>
				<li><a>Snow Report</a></li>
				<li><a>Lodging</a></li>
				<li><a>Kids Snow School</a></li>
				<li><a>Restaurants</a></li>
				<li><a>Alpine Tour Bindings</a></li>
				<li><a>fresh powder</a></li>
				<li><a>best month for powder</a></li>
				<li><a>powder skiis</a></li>
		</ul>
	</div>

	<?php include('footer.php'); ?>

</div>

<div data-role="page" id="page_02">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true" class="topic_list">
				<li><a>TopicB</a></li>
				<li><a><img src='http://topicb.com/seahawks/images/logo.png' style='max-height:200%;max-width:200%' /></a></li>
				<li><a>Heli-Skiing</a></li>
				<li><a>Travel Agent</a></li>
				<li><a>Snow Report</a></li>
				<li><a>Lodging</a></li>
				<li><a>Kids Snow School</a></li>
				<li><a>Restaurants</a></li>
				<li><a>Alpine Tour Bindings</a></li>
				<li><a>fresh powder</a></li>
				<li><a>best month for powder</a></li>
				<li><a>powder skiis</a></li>
		</ul>
	</div>

	<?php include('footer.php'); ?>

</div>

<!-- this is the chat page -->
<div data-role="page" id="page_03">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">

		<div style="width:90%;margin-left:auto;margin-right:auto;padding-left:15px;padding-right:15px;background:#999;">

			<div id="imgTopic">
				<!-- load image here -->
			</div>

      <iframe style="border:none;min-height:400px;margin-top:10px;overflow:hidden;width:103%;" src="../index_chat.php?chatter=0000000000&amp;chatee=1111111111&amp;topicinit=lobby" id="chatBox"></iframe>

    </div>

	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="page_04">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="Search TopicB" data-inset="true" class="topic_list">
				<li><a>TopicB</a></li>
				<li><a><img src="http://topicb.com/seahawks/images/logo.png" style='max-height:200%;max-width:200%' /></a></li>
				<li><a>Heli-Skiing</a></li>
				<li><a>Travel Agent</a></li>
				<li><a>Snow Report</a></li>
				<li><a>Lodging</a></li>
				<li><a>Kids Snow School</a></li>
				<li><a>Restaurants</a></li>
				<li><a>Alpine Tour Bindings</a></li>
				<li><a>fresh powder</a></li>
				<li><a>best month for powder</a></li>
				<li><a>powder skiis</a></li>
		</ul>
	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="page_05">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<iframe id="phoneBox" src="" scrolling="no" width="246" height="400" border="0" style="width:246px;height:400px;border:none;"></iframe>
	</div>

	<?php include('footer.php'); ?>

</div>


</body>
</html>