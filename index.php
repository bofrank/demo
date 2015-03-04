<!DOCTYPE html>
<html>
<head>
	<title>TopicB Beta V.08</title>
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
			.topicbox_left{
				width:50%;
				float:left;
			}
			.topicbox_right{
				width:50%;
				float:left;
			}
			.topic_item{
				width:100%;border-radius: 6px 6px 0 0;border:0px;margin-top:-60px;
			}
			.promo_item{
				width:100%;border-radius: 6px;border:0px;
			}
			.imgbox_left{
				width:100%;
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
				overflow:hidden;
			}
			.img_item{
				
			}
			.img_item_old{
				width:100%;border-radius: 6px 6px 0 0;border:0px;
			}

			.img_meta{
				border-top: 1px solid #e7e7e7;
    		color: #777;border-radius: 0 0 6px 6px;background-color:#fff;padding:10px;
			}
			.img_topic{

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


	var strTapId, strPassWord, tempVote;

	var voteJSON = {};
			
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

		$DB->Query("SELECT * FROM topicb.topics ORDER BY score ASC");

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
		
		console.log("document ready");
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

	  
	  


		function addTopic(searchImageURL){
			$("#testImage").attr("src",searchImageURL);
		}

		var appendApiKeyHeader = function( xhr ) {
			xhr.setRequestHeader('Api-Key', 'ehcwe4fvk97ur4dzc5mw4ztp')
		}

		function GetSearchResults(searchRequest,element) {
			console.log("getting search results");
			var tempImageURL;
		  $.ajax({
		    type: "GET",
		    beforeSend: appendApiKeyHeader,
		    url: "https://api.gettyimages.com/v3/search/images?fields=comp",
		    data: searchRequest})
		    .success(function (data, textStatus, jqXHR) {
		    	tempImageURL = data['images'][0]['display_sizes'][0]['uri'];
					$('#'+ element + ' img').attr("src",tempImageURL);
		    	//$("#topicRef1 img").attr("src",tempImageURL);
		    	//$("#testImage").attr("src",tempImageURL);
		    	//addTopic(tempImageURL);
		    })
		    .fail(function (data, err) {  });
		}

		//var newRequest = {"phrase":"startups"};

		//GetSearchResults(newRequest);


		
		
	  

	  //get url
	  //insert into html


		<?php

	  	echo "var tempTopic = '';";

	  	//echo "var voteJSON = {};";

	  	$uniqueTopics = array();

	  	//for($i=0;$i<count($result);$i++){
			for($i=(count($result)-1);$i>1;$i--){

				    $dataFormated[$i]['topic'] = $result[$i]['topic'];
				    $dataFormated[$i]['score'] = $result[$i]['score'];
				    $dataFormated[$i]['image'] = $result[$i]['image'];
				    $dataFormated[$i]['vid'] = $result[$i]['vid'];

				    $topicNum = $i+1;

				    echo "var topic = '".$dataFormated[0]['topic']."';";

				    echo "var tempTopic = '".$result[$i]['topic']."';";

				    echo "voteJSON['".$result[$i]['topic']."']=0;";


				    //list topics if not already listed
				    
				    if(!in_array($result[$i]['category'], $uniqueTopics)){

				    	array_push($uniqueTopics, $result[$i]['category']);

				    	//sleep(2);

							if ($i % 2 == 0) {
					    	echo "$('.topicbox_right').prepend('<div class=\"wrapper\" id=\"topicRef".$i."\"><img class=\"topic_item\" src=\"\" /><div class=\"img_meta\"><div class=\"img_topic\" style=\"float:left;\"><span>".$result[$i]['category']."</span></div><div class=\"img_votes\"><i class=\"fa fa-thumbs-o-up\"></i>1,090 <i class=\"fa fa-comment-o\"></i> Chat Now </div><div style=\"clear:both;\"></div></div></div>');";
					    }else{
					    	echo "$('.topicbox_left').prepend('<div class=\"wrapper\" id=\"topicRef".$i."\"><img class=\"topic_item\" src=\"\" /><div class=\"img_meta\"><div class=\"img_topic\" style=\"float:left;\"><span>".$result[$i]['category']."</span></div><div class=\"img_votes\"><i class=\"fa fa-thumbs-o-up\"></i>1,090 <i class=\"fa fa-comment-o\"></i> Chat Now </div><div style=\"clear:both;\"></div></div></div>');";
					    }

					    echo "console.log(\"created topic html\");";

					    //echo "GetSearchResults(\"".$result[$i]['category']."\",\"topicRef".$i."\");";
							//echo "tempPhrase = {\"phrase\":\"".$result[$i]['category']."\"};";

							$tempPhrase = "{'phrase':'".$result[$i]['category']."'}";

							$j = $i*300;
					    //echo "setTimeout(function(){GetSearchResults(tempPhrase,\"topicRef".$i."\");},".$j.");";
					    echo "setTimeout(function(){GetSearchResults(".$tempPhrase.",\"topicRef".$i."\");},".$j.");";

				  	}

				    //list blog posts
				    //check to see if the source is video
				    if (strpos($result[$i]['image'],'youtube') !== false) {
				    	
				    	//get youtube id
				    	$pieces = explode("/", $result[$i]['image']);
				    	//there might be params so seperate them
				    	$youtubeid = explode("?", $pieces[4]);

				    	//display item with youtube thumbnail
				    	echo "$('.imgbox_left').prepend('<div class=\"wrapper\"><img class=\"img_item\" style=\"float:left;height:50px;\" src=\"http://img.youtube.com/vi/".$youtubeid[0]."/default.jpg\" alt=\"".$result[$i]['image']."\" /><div style=\"margin:10px 0px 0px 10px;padding:10px 50px 10px 10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;\"><span class=\"img_topic\">".$result[$i]['topic']."</span><br/><i class=\"fa fa-thumbs-o-up\"></i><span class=\"votes_num\">".$result[$i]['score']."</span></div><div style=\"float:right;margin-top:-44px;margin-right:8px;\"><i class=\"fa fa-play-circle-o\" style=\"color:#98c0e0;font-size:40px;\"></i></div></div><div style=\"clear:both;\"></div>');";

				    }else{

				    	//display item with image
							echo "$('.imgbox_left').prepend('<div class=\"wrapper\"><img class=\"img_item\" style=\"float:left;height:50px;max-width:100px;\" src=\"".$result[$i]['image']."\" /><div style=\"margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;\"><span class=\"img_topic\">".$result[$i]['topic']."</span><br/><i class=\"fa fa-thumbs-o-up\"></i><span class=\"votes_num\">".$result[$i]['score']."</span></div></div><div style=\"clear:both;\"></div>');";

						}
					

			}

			//display promo item in topics screen
			echo "$('.topicbox_left').prepend('<div class=\"wrapper\"><a href=\"http://wordpress.org/plugins/topicb-chat/\" target=\"_blank\"><img class=\"promo_item\" src=\"images/get_wordpress_plugin.jpg\" /></a></div>');";

    ?>

		  //bind on drop down list choosing a topic to starting chat and getting a tapid
		  $(".topic_list a").click(function(){
	  	$('#link_01').trigger('click');


	  	//get topic images
	  	/*
	  	console.log("pre getting topic");
		
			$(".topic_item").each(function(){
				console.log("getting topic");
				//get topic
				//tempPhrase = {"phrase":$("span",this).text()};
				tempPhrase = {"phrase":"dogs"};
				topicID = $(this).attr("id");
				console.log("getting url = "+topicID);
	    	GetSearchResults(tempPhrase,topicID);

	  	});*/

		});

		$("#phoneBox").attr("src","../flashphone/index.php?c="+newCookie);

		//using this function for the tiling topic image taps
		$(".topic_item").parent().click(function(){
			console.log("topic clicked");

		  $temptopic=$(".img_topic",this).text();

		  console.log("topic = " + $temptopic);

		  $('#link_01').trigger('click');

		});

		//using this function for the blogger list
		$(".img_item").parent().click(function(){
			console.log("topic clicked");
			//$('#link_01').trigger('click');
		  //chatStart($("div.img_topic",this).html());
		  chatStart($("span.img_topic",this).html(),$("span.votes_num",this).text());

			//test for video
		  $tempimg=$(".img_item",this).attr("src");
		  $tempurl=$(".img_item",this).attr("alt");


			if($tempimg.indexOf("youtube") > 0){
	  		$("#mediaWrapper").html("<iframe id='imgTopic' style='margin:-100px 10px 10px 10px;border-width:0px;border-radius:3px;width:94%;' src='"+$tempurl+"' />");
	  	}else{
	  		$("#mediaWrapper").html("<img id='imgTopic' style='margin:-100px 10px 10px 10px;border-radius:5px;width:94%;' src='"+$tempimg+"' />");
	  	}

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

	//var voteCounter = "voted";

	function upVote(topic){

		if(voteJSON[''+topic+'']<1){
			
			xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET", "http://topicb.com/demo/upVote.php?topic="+topic, true);
		  xmlhttp.send();

		  var num = 0;

			if(voteJSON[''+topic+'']==0){
				var num = +$("#scoreDiv").text() + 1;
			}else{
				var num = +$("#scoreDiv").text() + 2;
			}

			voteJSON[''+topic+''] = 1;
			$("#scoreDiv").text(num);

		}else{
			alert("Already up voted!");
		}

	}

	function downVote(topic){

		if(voteJSON[''+topic+'']>-1){

			xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET", "http://topicb.com/demo/downVote.php?topic="+topic, true);
		  xmlhttp.send();

		  var num = 0;

			if(voteJSON[''+topic+'']==0){
				var num = +$("#scoreDiv").text() - 1;
			}else{
				var num = +$("#scoreDiv").text() - 2;
			}

			voteJSON[''+topic+''] = -1;
			$("#scoreDiv").text(num);

		}else{
			alert("Already down voted!");
		}

	}



			


  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53853189-1', 'auto');
  ga('send', 'pageview');

</script>

<body>

<div data-role="page" id="page_00">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<div class="topicbox">
			<div class="topicbox_left">
				<div class="wrapper">
					<img class="topic_item" src="http://st.houzz.com/simgs/9f915d0801e440a8_8-9074/mediterranean-kitchen.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Interior Design
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>808 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_13.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Board Games
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>1,256 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_07.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Music
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>2,351 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_11.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Bikes
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>324 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_01.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Mental Health
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>468 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_08.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Apple
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>12 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
			</div>
			<div class="topicbox_right">
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_14.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Dogs
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>5,609 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_04.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Creative Writing
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>7 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_02.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Yoga
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>808 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_09.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Craft Beer
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>1,256 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_06.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Visual Art
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>546 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_10.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Cars
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>22 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_05.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
							Acting
						</div>
						<div class="img_votes">
							<i class="fa fa-thumbs-o-up"></i>85 
							<i class="fa fa-comment-o"></i> Chat Now 
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('footer.php'); ?>

</div>

<div data-role="page" id="page_01">

	<?php include('header.php'); ?>

	<div role="main" class="ui-content">
		<div class="imgbox">
			<div class="imgbox_left">
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_02.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						What are your favorite Yoga positions?<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_07.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						Top 10 Electronica of 2015<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_11.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						Fuji Transonic 2.7<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_04.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						How to be creative in writing your posts.<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_01.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						How to find a good therapist.<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_08.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						What to look for in displays.<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_09.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						Hop Alternatives<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_06.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						Gerhard Richter's Influence in the Art Market<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
				<div class="wrapper">
					<img class="img_item" style="float:left;height:50px;max-width:100px;" src="images/topics/topic_05.jpg" />
					<div style="margin:10px 0px 0px 10px;padding:10px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height:14px;">
						Why Actors make Great CEOs<br/><i class="fa fa-thumbs-o-up"></i><span class="votes_num">50</span>
					</div>
					<div style="clear:both;">
					</div>
				</div>
			</div>
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
  			<div id="mediaWrapper">
					<!--<img id="imgTopic" style="margin:-100px 10px 10px 10px;border-radius:3px;width:94%;" src="" />-->
				</div>
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