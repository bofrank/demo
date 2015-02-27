<!DOCTYPE html>
<html>
<head>
	<title>TopicB Beta V.07</title>
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
				width:100%;border-radius: 6px 6px 0 0;border:0px;margin-top:-50px;
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
<script type="text/javascript">
window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({QJf3ax:[function(t,e){function n(t){function e(e,n,a){t&&t(e,n,a),a||(a={});for(var c=s(e),f=c.length,u=i(a,o,r),d=0;f>d;d++)c[d].apply(u,n);return u}function a(t,e){f[t]=s(t).concat(e)}function s(t){return f[t]||[]}function c(){return n(e)}var f={};return{on:a,emit:e,create:c,listeners:s,_events:f}}function r(){return{}}var o="nr@context",i=t("gos");e.exports=n()},{gos:"7eSDFh"}],ee:[function(t,e){e.exports=t("QJf3ax")},{}],3:[function(t){function e(t,e,n,i,s){try{c?c-=1:r("err",[s||new UncaughtException(t,e,n)])}catch(f){try{r("ierr",[f,(new Date).getTime(),!0])}catch(u){}}return"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(5),i=t("ee"),a=window.onerror,s=!1,c=0;t("loader").features.err=!0,window.onerror=e;try{throw new Error}catch(f){"stack"in f&&(t(1),t(4),"addEventListener"in window&&t(2),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(3),s=!0)}i.on("fn-start",function(){s&&(c+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&c>0&&(c-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:8,2:5,3:9,4:7,5:22,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],4:[function(t){function e(){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var n=t("ee"),r=t("handle"),o=t(1);t("loader").features.stn=!0,t(2),n.on("fn-start",function(t){var e=t[0];e instanceof Event&&(this.bstStart=Date.now())}),n.on("fn-end",function(t,e){var n=t[0];n instanceof Event&&r("bst",[n,e,this.bstStart,Date.now()])}),o.on("fn-start",function(t,e,n){this.bstStart=Date.now(),this.bstType=n}),o.on("fn-end",function(t,e){r("bstTimer",[e,this.bstStart,Date.now(),this.bstType])}),n.on("pushState-start",function(){this.time=Date.now(),this.startPath=location.pathname+location.hash}),n.on("pushState-end",function(){r("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),"addEventListener"in window.performance&&(window.performance.addEventListener("webkitresourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.webkitClearResourceTimings()},!1),window.performance.addEventListener("resourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.clearResourceTimings()},!1)),document.addEventListener("scroll",e,!1),document.addEventListener("keypress",e,!1),document.addEventListener("click",e,!1)}},{1:8,2:6,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],5:[function(t,e){function n(t){i.inPlace(t,["addEventListener","removeEventListener"],"-",r)}function r(t){return t[1]}var o=(t(1),t("ee").create()),i=t(2)(o),a=t("gos");if(e.exports=o,n(window),"getPrototypeOf"in Object){for(var s=document;s&&!s.hasOwnProperty("addEventListener");)s=Object.getPrototypeOf(s);s&&n(s);for(var c=XMLHttpRequest.prototype;c&&!c.hasOwnProperty("addEventListener");)c=Object.getPrototypeOf(c);c&&n(c)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&n(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=t[1]=a(e,"nr@wrapped",function(){return i(e,"fn-",null,e.name||"anonymous")}):"function"==typeof e.handleEvent&&i.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:22,2:23,ee:"QJf3ax",gos:"7eSDFh"}],6:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window.history,["pushState"],"-")},{1:23,2:22,ee:"QJf3ax"}],7:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=r(t[0],"fn-")})},{1:23,2:22,ee:"QJf3ax"}],8:[function(t,e){function n(t,e,n){var r=t[0];"string"==typeof r&&(r=new Function(r)),t[0]=o(r,"fn-",null,n)}var r=(t(2),t("ee").create()),o=t(1)(r);e.exports=r,o.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",n)},{1:23,2:22,ee:"QJf3ax"}],9:[function(t,e){function n(){c.inPlace(this,d,"fn-")}function r(t,e){c.inPlace(e,["onreadystatechange"],"fn-")}function o(t,e){return e}var i=t("ee").create(),a=t(1),s=t(2),c=s(i),f=s(a),u=window.XMLHttpRequest,d=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];e.exports=i,window.XMLHttpRequest=function(t){var e=new u(t);try{i.emit("new-xhr",[],e),f.inPlace(e,["addEventListener","removeEventListener"],"-",function(t,e){return e}),e.addEventListener("readystatechange",n,!1)}catch(r){try{i.emit("internal-error",[r])}catch(o){}}return e},window.XMLHttpRequest.prototype=u.prototype,c.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",o),i.on("send-xhr-start",r),i.on("open-xhr-start",r)},{1:5,2:23,ee:"QJf3ax"}],10:[function(t){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;c>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,f="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,u=e(f);if(u&&(r.rxSize=u),this.sameOrigin){var d=t.getResponseHeader("X-NewRelic-App-Data");d&&(n.cat=d.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r,this.startTime])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}if(window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)){t("loader").features.xhr=!0;var o=t("handle"),i=t(2),a=t("ee"),s=["load","error","abort","timeout"],c=s.length,f=t(1);t(4),t(3),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var f=e(o);f&&(r.txSize=f)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){try{a.emit("internal-error",[e])}catch(r){}}};for(var u=0;c>u;u++)n.addEventListener(s[u],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{1:"XL7HBI",2:11,3:9,4:5,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],11:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],12:[function(t,e){function n(t){return function(){r(t,[(new Date).getTime()].concat(i(arguments)))}}var r=t("handle"),o=t(1),i=t(2);"undefined"==typeof window.newrelic&&(newrelic=window.NREUM);var a=["setPageViewName","trackUserAction","finished","traceEvent","inlineHit","noticeError"];o(a,function(t,e){window.NREUM[e]=n("api-"+e)}),e.exports=window.NREUM},{1:21,2:22,handle:"D5DuLP"}],gos:[function(t,e){e.exports=t("7eSDFh")},{}],"7eSDFh":[function(t,e){function n(t,e,n){if(r.call(t,e))return t[e];var o=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:o,writable:!0,enumerable:!1}),o}catch(i){}return t[e]=o,o}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],D5DuLP:[function(t,e){function n(t,e,n){return r.listeners(t).length?r.emit(t,e,n):(o[t]||(o[t]=[]),void o[t].push(e))}var r=t("ee").create(),o={};e.exports=n,n.ee=r,r.q=o},{ee:"QJf3ax"}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],XL7HBI:[function(t,e){function n(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:i(t,o,function(){return r++})}var r=1,o="nr@id",i=t("gos");e.exports=n},{gos:"7eSDFh"}],id:[function(t,e){e.exports=t("XL7HBI")},{}],G9z0Bl:[function(t,e){function n(){var t=l.info=NREUM.info;if(t&&t.licenseKey&&t.applicationID&&f&&f.body){s(h,function(e,n){e in t||(t[e]=n)}),l.proto="https"===p.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=f.createElement("script");e.src=l.proto+t.agent,f.body.appendChild(e)}}function r(){"complete"===f.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=t(1),c=(t(2),window),f=c.document,u="addEventListener",d="attachEvent",p=(""+location).split("?")[0],h={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-536.min.js"},l=e.exports={offset:i(),origin:p,features:{}};f[u]?(f[u]("DOMContentLoaded",o,!1),c[u]("load",n,!1)):(f[d]("onreadystatechange",r),c[d]("onload",n)),a("mark",["firstbyte",i()])},{1:21,2:12,handle:"D5DuLP"}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],21:[function(t,e){function n(t,e){var n=[],o="",i=0;for(o in t)r.call(t,o)&&(n[i]=e(o,t[o]),i+=1);return n}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],22:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],23:[function(t,e){function n(t){return!(t&&"function"==typeof t&&t.apply&&!t[i])}var r=t("ee"),o=t(1),i="nr@wrapper",a=Object.prototype.hasOwnProperty;e.exports=function(t){function e(t,e,r,a){function nrWrapper(){var n,i,s,f;try{i=this,n=o(arguments),s=r&&r(n,i)||{}}catch(d){u([d,"",[n,i,a],s])}c(e+"start",[n,i,a],s);try{return f=t.apply(i,n)}catch(p){throw c(e+"err",[n,i,p],s),p}finally{c(e+"end",[n,i,f],s)}}return n(t)?t:(e||(e=""),nrWrapper[i]=!0,f(t,nrWrapper),nrWrapper)}function s(t,r,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<r.length;c++)s=r[c],a=t[s],n(a)||(t[s]=e(a,f?s+o:o,i,s,t))}function c(e,n,r){try{t.emit(e,n,r)}catch(o){u([o,e,n,r])}}function f(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){u([r])}for(var o in t)a.call(t,o)&&(e[o]=t[o]);return e}function u(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=r),e.inPlace=s,e.flag=i,e}},{1:22,ee:"QJf3ax"}]},{},["G9z0Bl",3,10,4]);
;NREUM.info={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",licenseKey:"ab60d03792",applicationID:"7083588",sa:1,agent:"js-agent.newrelic.com/nr-536.min.js"}
</script>
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

			for($i=0;$i<count($result);$i++){

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

					    echo "$('.topicbox_left').prepend('<div class=\"wrapper\" id=\"topicRef".$i."\"><img class=\"topic_item\" src=\"\" /><div class=\"img_meta\"><div class=\"img_topic\" style=\"float:left;\"><span>".$result[$i]['category']."</span></div><div class=\"img_votes\"><i class=\"fa fa-thumbs-o-up\"></i>1,090</div><div style=\"clear:both;\"></div></div></div>');";

					    echo "console.log(\"created topic html\");";

					    //echo "GetSearchResults(\"".$result[$i]['category']."\",\"topicRef".$i."\");";
							echo "tempPhrase = {\"phrase\":\"".$result[$i]['category']."\"};";
					    echo "GetSearchResults(tempPhrase,\"topicRef".$i."\");";

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
						</div>
						<div style="clear:both;">
						</div>
					</div>
				</div>
				<div class="wrapper">
					<img class="topic_item" src="images/topics/topic_03.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
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
					<img class="topic_item" src="images/topics/topic_05.jpg" />
					<div class="img_meta">
						<div class="img_topic" style="float:left;">
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