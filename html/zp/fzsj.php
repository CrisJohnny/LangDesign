<?php

	require_once '../tool/SqlHelper.class.php';
	$rang = new SqlHelper();
	$id = $_GET['id'];
	$type = $_GET['type'];
	$pageNow = $_GET['pageNow'];
	$t = $_GET['t'];
	
	$sql ="select * from list,list_t1 where list.type1=list_t1.type1 and id=$id and name=\"作品\";";
	$res=$rang->execute_dql($sql);
	if($row=mysql_fetch_assoc($res)){
		echo "<!doctype html>
				<html>
				<head>
				<meta charset='utf-8'>
				<title>{$row['title']}</title>
				<link rel='stylesheet' href='../../other/art.css'>
				</head>
				<body>
				";
				$f ="window.parent.iframe1('html/zp.php?pageNow=1',0);";
				if ($t == 'ss')
						$h="window.parent.iframe1('html/ss.php?pageNow=$pageNow',0);";
				else  if($t == 'zx')
						$h="window.parent.iframe1('html/zx.php?pageNow=$pageNow',0);";
				else  if($t == 'zp')
						$h="window.parent.iframe1('html/zp.php?pageNow=$pageNow',0);";
				else  if($t == 'jc')
						$h="window.parent.iframe1('html/jc.php?pageNow=$pageNow',0);";
						
		echo   "<div class='dd'><div class='aa' onclick=$h><</div></div>
				<center><p class='pp1'>{$row['title']}</p></center>
		<center><p class='pp2'><a id='abc' onclick=$f>$type</a>&nbsp;&nbsp;&nbsp;&nbsp;日期：{$row['date']}&nbsp;&nbsp;&nbsp;&nbsp;浏览量：{$row['readi']}&nbsp;&nbsp;&nbsp;&nbsp;点击量：{$row['clicki']}</p></center><br>
		<hr><br>
		{$row['introduce']}<br><br>
		</body>
		</html>
		";
		
	}
	
?>
<style>
#abc{
	color:grey;
	cursor:pointer;
	transition:0.5s;
}
#abc:hover{
	font-size:20px;
}
</style>

