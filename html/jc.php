<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<script type="text/javascript" src="../other/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="../other/my.js"></script>
<link rel="stylesheet" href="../other/xx.css">
<link rel="stylesheet" href="../other/fy.css">
</head>
<body>
<script type="text/javascript">	
function dis(obj,i){
	var a=window.document.getElementById(i);
	if(obj.type == "mouseover")
	{
		a.childNodes.item(3).style.display="block";
		a.childNodes.item(3).childNodes.item(1).style.display="block";
	}
	else if(obj.type == "mouseout")
		a.childNodes.item(3).childNodes.item(1).style.display="none";
}
function go(){

		var pageNow=document.getElementById('pageNow').value;
		//发给manageEmpList.php[get]
		window.location.href='manageEmpList.php?pageNow='+pageNow;
		
	}

	//校验用户输入的值是否是整数.(isNaN) 0123

function checkPageNow(j){

		//1.获取用户输入
		var pageNow=document.getElementById('pageNow').value;

		//alert(pageNow);
		//2.校验 isNaN如果不是数，返回真
		/*if(isNaN(pageNow)){
			alert('输入的跳转页数有错误!');
			return false;//!!
		}*/
		//3.这里正则表达式处理
		//pageNow 这个数必须满足,要以1-9,后面的数是0-9的数
		var reg=/^[1-9](\d)*$/; 
		//reg.test(pageNow) 表示使用reg这个规则，来测试一下pageNow字符串是否合法
		//如果合法 ture,否则 false;
		if(pageNow!=""){
			if(!reg.test(pageNow)){
				alert('输入的跳转页数有错误!');
				//把最后输入截掉
				document.getElementById('pageNow').value=pageNow.substring(0,pageNow.length-1);
				return false;	
			}else{
				
				//格式ok
				if(pageNow>j){
					alert('输入值过大');
					//把最后输入截掉
					document.getElementById('pageNow').value=pageNow.substring(0,pageNow.length-1);
				}
			}
		}else{
			alert('不能为空');
		}

		
		
		
	}
</script>

<?php
	require_once 'tool/RanService.class.php';
	require_once 'tool/FenyePage.class.php';
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
	$fenyePage->goUrl="zp.php";
	$type="教程";
	//调用 $RanService 的方法
	$rang->showRangByPage2($fenyePage,$type);
	echo "<div class='range'><ul>";
	$i=0;
	foreach ($fenyePage->res as $row){

		echo "<li>
				<div id='list".$i."' onmouseover=\"dis(event,this.id)\" onmouseout=\"dis(event,this.id)\">
					<div class='im' style=\"background-image:url({$row['cover']})\">
					</div>
					<div class='zz' id='zz'>
						<span id='zz2'>
							<div class='zz3'><br>
								{$row['title']}
									<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  class='a1' href='#' onclick=\"window.parent.iframe1('{$row['html']}?id={$row['id']}&type=$type&pageNow=$fenyePage->pageNow&t=zp',1);\">阅读>></a>
							</div>
						</span>
					</div>
				</div>
			</li>";
			$i++;
	}
	
	echo "</ul></div>
	<br>";
	echo $fenyePage->navigator;
	
?>
</body>
</html>