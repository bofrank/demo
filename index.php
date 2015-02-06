<!DOCTYPE html>
<html>
<head>
	<title>TopicB Demo V.03</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css' />
		<style>
			body{
				background-color:#e9e9e9;
				font-family: 'Roboto Slab', serif;
				font-size: 14px;
			}
			.imgbox_left{
				width:50%;
				float:left;
			}
			.imgbox_right{
				width:50%;
				float:left;
			}
			.wrapper{
				border-radius: 6px;
				box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.22);
				margin:10px;
				line-height:.85;
			}
			.img_item{
				width:100%;border-radius: 6px 6px 0 0;
			}
			.img_meta{
				border-top: 1px solid #e7e7e7;
    		color: #777;border-radius: 0 0 6px 6px;background-color:#fff;padding:10px;
			}
			.img_topic{
				float:left;
			}
			.img_votes{
				float:right;
				cursor:pointer;
			}
			.wrapper{
				cursor:pointer;
				line-height:.85;
			}
		</style>
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

		$DB->Query("SELECT * FROM topicb.topics");

		$result = $DB->get();

		$dataFormated = array();

		//$dataResult = $dataFormated[0]['topic'];
		//$dataResult = json_encode(fix_keys($dataFormated));

		


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
    	$("<div class='element-item transition metal' data-category='transition'><h3 class='name'>"+urlTopic+"</h3></div>").prependTo(".isotope");
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
/*
			for($i=0;$i<count($result);$i++){

		    $dataFormated[$i]['topic'] = $result[$i]['topic'];
		    $dataFormated[$i]['tapid'] = $result[$i]['tapid'];
		    $dataFormated[$i]['category'] = $result[$i]['category'];

		    //echo '$(".topic_list").append("<div class=\"element-item transition metal\" data-category=\"transition\"><h3 class=\"name\">'.$result[$i]['topic'].'</h3></div>");';

	  	}
*/
	  	echo "var tempTopic = '';";

			for($i=0;$i<count($result);$i++){

				    $dataFormated[$i]['topic'] = $result[$i]['topic'];
				    $dataFormated[$i]['score'] = $result[$i]['score'];
				    $dataFormated[$i]['image'] = $result[$i]['image'];

				    $topicNum = $i+1;

				    echo "var topic = '".$dataFormated[0]['topic']."';";

				    echo "var tempTopic = '".$result[$i]['topic']."';";

						echo "$('.imgbox_left').prepend('<div class=\"wrapper\"><img class=\"img_item\" src=\"".$result[$i]['image']."\" /><div class=\"img_meta\"><div class=\"img_topic\">".$result[$i]['topic']."</div><div class=\"img_votes\"><i class=\"fa fa-thumbs-o-up\"></i><span class=\"votes_num\">".$result[$i]['score']."</span></div><div style=\"clear:both;\"></div></div></div>');";
					
					//use the followingas a template
					/* 
						    <div class="wrapper">
									<img class="img_item" src="$result[$i]['image']" />
									<div class="img_meta">
										<div class="img_topic">
											$result[$i]['topic']
										</div>
										<div class="img_votes">
											<i class="fa fa-thumbs-o-up"></i>$result[$i]['score']
										</div>
										<div style="clear:both;">
										</div>
									</div>
								</div>
					*/
			}

    ?>

	  //bind choosing a topic to starting chat and getting a tapid
	  $(".topic_list a").click(function(){
	  	console.log("clicked");
	  	var $tempTopic = $(this).html();
	  	var $tempURL = $(this).find('img').attr("src");
	  	if($($tempTopic).is("img")){
	  		console.log("going to img chat");
		  	chatStart($tempURL);
		  	$("#imgTopic").html("<img src="+$tempURL+" />");
			}else{
				console.log("going to text chat");
				chatStart($(this).text());
				$("#imgTopic").html("");
			}
		});

		$("#phoneBox").attr("src","../flashphone/index.php?c="+newCookie);

		//using this function for the tiling image taps
		$(".img_item").parent().click(function(){

			//$('#link_01').trigger('click');
		  //chatStart($("div.img_topic",this).html());
		  chatStart($("div.img_topic",this).html(),$("span.votes_num",this).text());
		  $tempimg=$(".img_item",this).attr("src");
		  //$tempimg=$(".img_item").attr("src");
			$("#imgTopic").attr("src",$tempimg);
			//$(".img_votes").text();

		});

		//ux
		$(".ui-bar-inherit").css("background-color","#fff");
		$(".ui-input-search input").css("font-size","19px").css("height","43px").css("padding-top","12px");
		$(".ui-filterable").css("margin-left","35px");

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
	function chatStart(topic,$votes){
		console.log("start chat with "+topic);
		$.mobile.changePage("#page_03");
		$("#chatBox").attr("src","../index_chat.php?chatter="+<?php echo $strTapId ?>+"&chatee=1111111111&topicinit="+topic);
		$(".ui-bar-inherit").css("background-color","#fff");
		$(".ui-input-search input").css("font-size","19px").css("height","43px").css("padding-top","12px");
		$(".ui-filterable").css("margin-left","35px");
		$("#upVoteDiv").attr("onclick","upVote('"+topic+"')");
		$("#downVoteDiv").attr("onclick","downVote('"+topic+"')");
		$("#scoreDiv").html($votes);
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

	function upVote(topic){
		xmlhttp = new XMLHttpRequest();
	  xmlhttp.open("GET", "http://topicb.com/demo/upVote.php?topic="+topic, true);
	  xmlhttp.send();
	  var num = +$("#scoreDiv").text() + 1;
		$("#scoreDiv").text(num);
	}

	function downVote(topic){
		xmlhttp = new XMLHttpRequest();
	  xmlhttp.open("GET", "http://topicb.com/demo/downVote.php?topic="+topic, true);
	  xmlhttp.send();
	  var num = +$("#scoreDiv").text() - 1;
		$("#scoreDiv").text(num);
	}

</script>

<body>

<div data-role="page" id="page_00">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<!--
		<img src="images/logo.jpg" style="position:relative;top:56px;z-index:2;" />
		<ul data-role="listview" data-filter="true" data-filter-placeholder="What do you want to talk about?" data-inset="true" class="topic_list" data-filter-reveal="true">
				<li><a>Counseling</a></li>
				<li><a>Churches</a></li>
				<li><a>Breweries</a></li>
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
		</ul>-->
		
		<div class="imgbox">
			<div class="imgbox_left">
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_02.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Yoga
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>808
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_07.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Music
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>2,351
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_11.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Bikes
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>324
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_04.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Creative Writing
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>7
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_01.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Mental Health
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>468
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_08.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Apple
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>12
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
			</div>
			<div class="imgbox_right">
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_09.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Craft Beer
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>1,256
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_06.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Visual Art
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>546
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_10.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Cars
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>22
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_03.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Health Services
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>321
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" src="images/topics/topic_05.jpg" />
					<div class="img_meta">
						<div class="img_topic">
							Acting
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>85
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
			</div>
		</div>
	
<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d10758.92525143306!2d-122.32014538694011!3d47.61191397244879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1schurch!5e0!3m2!1sen!2sus!4v1421727219943" width="100%" height="450" frameborder="0" style="border:0"></iframe>
-->
	</div>

	<?php include('footer.php'); ?>

</div>

<div data-role="page" id="page_01">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<div style="width:100%;height:800px;background:url(images/map.png) no-repeat;">

			<img src="images/topics/thumbs/topic_1.png" style="position:relative;left:50px;top:20px;cursor:pointer;" onclick="chatStart('Counseling');$('#imgTopic').attr('src','http://topicb.com/demo/images/profiles/profile_5.jpg');" />
			<img src="images/topics/thumbs/topic_2.png" style="position:relative;left:0px;top:115px;cursor:pointer;" onclick="chatStart('Yoga');$('#imgTopic').attr('src','http://topicb.com/demo/images/profiles/profile_2.jpg');" />
			<img src="images/topics/thumbs/topic_3.png" style="position:relative;left:-50px;top:280px;cursor:pointer;" onclick="chatStart('Craft Beer');$('#imgTopic').attr('src','http://topicb.com/demo/images/profiles/profile_3.jpg');" />
			<img src="images/topics/thumbs/topic_4.png" style="position:relative;left:30px;top:290px;cursor:pointer;" onclick="chatStart('Church');$('#imgTopic').attr('src','http://topicb.com/demo/images/profiles/profile_4.jpg');" />
			<img src="images/topics/thumbs/topic_5.png" style="position:relative;left:180px;top:10px;cursor:pointer;" onclick="chatStart('Movies');$('#imgTopic').attr('src','http://topicb.com/demo/images/profiles/profile_1.jpg');" />
		 
			<!--<img src="images/map.png" style="width:100%;" onclick="chatStart('counseling')" />-->
		</div>
	</div>

	<?php include('footer.php'); ?>

</div>

<div data-role="page" id="page_02">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="What do you want to talk about?" data-inset="true" class="topic_list">
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

		<div style="margin-left:auto;margin-right:auto;">

			<div style="height:250px;overflow:hidden;">
				<div style="background-color: rgba(0,0,0,.2);height:100px;position:relative;top:180px;width:94%;margin-left:10px;text-shadow:none;color:#fff;font-size:45px;">
					<div style="margin:10px;">
	    			<div style="float:left;width:15%;cursor:pointer;" id="upVoteDiv">
	    				<i class="fa fa-thumbs-o-up"></i>
						</div>
						<div style="float:left;width:65%;text-align:center;">
						  <div id="scoreDiv">808</div>
						</div>
						<div style="float:right;width:15%;text-align:right;cursor:pointer;" id="downVoteDiv">
						  <i style="" class="fa fa-thumbs-o-down"></i>
						</div>
						<div style="clear:both;"></div>
  				</div>
  			</div>
				<img id="imgTopic" style="margin:-100px 10px 10px 10px;border-radius:3px;width:94%;" src="" />
			</div>

      <iframe style="border:none;min-height:400px;margin-top:10px;margin-left:10px;overflow:hidden;width:99%;" src="../index_chat.php?chatter=0000000000&amp;chatee=1111111111&amp;topicinit=lobby" id="chatBox"></iframe>

    </div>

	</div>

	<?php include('footer.php'); ?>

</div>


<div data-role="page" id="page_04">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-filter-placeholder="What do you want to talk about??" data-inset="true" class="topic_list">
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