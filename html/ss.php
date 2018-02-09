<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<link rel="stylesheet" href="../other/fy.css">
<style>
.range{
	position:absolute;
}
li{
	list-style:none;
	text-align:center;
}
.li0,.li1,.li2,.li3,.li4,.li5{
	cursor:pointer;
	width:500px;
	height:30px;
	border:1px solid grey;
	margin-top:50px;
	font-size:20px;
	background-color:rgba(55,55,55,0.1);
	transition:0.5s;
}
.li0:hover,.li1:hover,.li2:hover,.li3:hover,.li4:hover,.li5:hover{
	border:2px solid black;
	box-shadow:0px 5px 5px 1px rgba(55,55,55,0.5);
	background-color:white;
	}
</style>
<body>
<?php
	require_once 'tool/RanService.class.php';
	require_once 'tool/FenyePage.class.php';
	$a1=$_POST['a1'];
	$rang = new Rang();
	
	//创建一个分页对象
	$fenyePage=new FenyePage();
	//默认显示第一页内容
	$fenyePage->pageNow=1;
	
	//这里添加逻辑处理[获取用户点击的分页超链接]
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	//默认每页显示6条记录
	$fenyePage->pageSize=6;
	//默认将分页请求发送给哪个页面
	$fenyePage->goUrl="ss.php";
	//调用 $RanService 的方法
	$rang->seaRang($a1,$fenyePage);
	echo "<ul>";
	$i=0;
	$t='ss';
	echo "<div class='range'>";
	foreach ($fenyePage->res as $row){
		switch($row['type1'])
		{
			case 1:
				$type = "教程";
				break;
			case 2:
				$type = "资讯";
				break;
			case 3:
				$type = "作品";
				break;
			}
		
		echo "
			<li  onClick=\"window.parent.iframe1('{$row['html']}?id={$row['id']}&type=$type&pageNow=$fenyePage->pageNow&t=ss',1)\">
				<div class='li".$i."'>
					{$row['title']}
				</div>
			</li>
		";
		$i++;
	}
	echo "</div>";
	echo $fenyePage->navigator;
	
?>
</body>
</html>
