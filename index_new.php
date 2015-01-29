<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
		<style>
			body{
				background-color:#e9e9e9;
				font-family: 'Roboto Slab', serif;
				font-size: 14px;
			}
			.container_left{
				width:50%;
				float:left;
			}
			.container_right{
				width:50%;
				float:left;
			}
			.wrapper{
				border-radius: 6px;
				box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.22);
				margin:10px;
			}
			.img_item{
				width:100%;border-radius: 6px 6px 0 0;
			}
			.img_meta{
				border-top: 1px solid #e7e7e7;
    		color: #777;border-radius: 0 0 6px 6px;background-color:#fff;padding:10px;
			}
		</style>
	</head>
	<body>
		<div style="width:100%;height:800px;background:url(images/map.png) no-repeat;">

			<img src="images/beer/topic_1.png" style="position:relative;left:50px;top:20px;cursor:pointer;" onclick="chatStart('Stout')" />
			<img src="images/beer/topic_2.png" style="position:relative;left:0px;top:115px;cursor:pointer;" onclick="chatStart('Wheat')" />
			<img src="images/beer/topic_3.png" style="position:relative;left:-50px;top:280px;cursor:pointer;" onclick="chatStart('Red')" />
			<img src="images/beer/topic_4.png" style="position:relative;left:10px;top:390px;cursor:pointer;" onclick="chatStart('Cider')" />
			<img src="images/beer/topic_5.png" style="position:relative;left:-290px;top:350px;cursor:pointer;" onclick="chatStart('CDA')" />
		 
			<!--<img src="images/map.png" style="width:100%;" onclick="chatStart('counseling')" />-->
		</div>
	</body>
</html>