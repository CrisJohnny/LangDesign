<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>朗设计</title>
<script src="other/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="other/jquery-ui-1.7.2.custom.css" type="text/javascript"></script>
<script src="other/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>
</head>
<script>
	function is(j){
		return window.document.getElementById(j).style;
	}
	function id(j){
		return window.document.getElementById(j);
	}
	$(function(){ 
          $('.logo3').draggable({ containment: '.d1', scroll: false });//容器拖动               
  	})
	function dip2(j){
		is("i").display="none";
		is("zz").display="none";
		is("zz1").display="none";
		if (j == 'gy')
			is("gywm").cssText="animation:1s tm forwards,1s xz alternate infinite";
		else
			is("gywm").cssText="animation:0.5s tm1 forwards";
	}
	function dip(){
		is("i").display="block";
		is("zz").display="none";
		is("zz1").display="none";
		is("gywm").cssText="animation:0.5s tm1 forwards";
	}
	function iframe(j){
		id("if").src=j;
	}
	function iframe1(j,k){
		id("if").src=j;
		switch(k)
		{
			case 1:
			is("zz").display="block";
			is("zz1").display="block";
			break;
			case 0:
			is("zz").display="none";
			is("zz1").display="none";
			break;
		}
	}

	
</script>
<style>
*{
	margin: 0 auto;
	text-align: center;
	font-family:"微软雅黑";
}
html { overflow-x: hidden; overflow-y: hidden; }
.d1{
	width:1350px;
	height:650px;	
	border:1px 1px solid #000;
}
.dh{
	position:absolute;
	width:357px;
	height:380px;
	margin-left:-50px;
	margin-top:150px;
	background-image:url(img/menu.png);
}
.logo{
	position:absolute;
	width:549px;
	height:293px;
	margin-left:750px;
	margin-top:370px;
	background-image:url(img/logo.png);
}
.logo3{
	position:absolute;
	width:150px;
	height:80px;
	margin-left:30px;
	margin-top:130px;
	background-image:url(img/logo3.png);
	cursor:move;
}
.sy{
	position:absolute;
	width:73px;
	height:30px;
	margin-left:110px;
	margin-top:80px;
	background-image:url(img/sy.png);
	Transition:all 0.25s linear;
	background-position:0 -8px;
	
}
.jc{
	position:absolute;
	width:73px;
	height:30px;
	margin-left:110px;
	margin-top:100px;
	background-image:url(img/jc.png);
	Transition:all 0.25s linear;
	background-position:0 -8px;
}
.zx{
	position:absolute;
	width:73px;
	height:30px;
	margin-left:110px;
	margin-top:120px;
	background-image:url(img/zx.png);
	Transition:all 0.25s linear;
	background-position:0 -8px;
}
.zp{
	position:absolute;
	width:73px;
	height:30px;
	margin-left:110px;
	margin-top:140px;
	background-image:url(img/zp.png);
	Transition:all 0.25s linear;
	background-position:0 -8px;
}
.gy{
	position:absolute;
	width:73px;
	height:30px;
	margin-left:110px;
	margin-top:160px;
	background-image:url(img/gy.png);
	Transition:all 0.25s linear;
	background-position:0 -8px;
}
#gy:hover,#jc:hover,#zp:hover,#sy:hover,#zx:hover{
	background-position: 0 -37px;
}

.i{
	position:absolute;
	margin-top:50px;
	margin-left:280px;
	width:1000px;
	height:600px;
	box-shadow:0px 0px 20px 10px rgba(33,33,33,0.3);
	display:none;
}
.if{
	width:1000px;
	height:600px;
}
.hd_1{
	position:absolute;
	width:120px;
	height:120px;
	background-color:#cfcfcf;
	border-radius:10px;
	transition:0.8s;
	margin-top:150px;
	margin-left:400px;
	animation:1.7s ys4 alternate infinite;
	box-shadow:0px 0px 1px 1px rgba(255,255,255,0.9);
	transition-timing-function:cubic-bezier(0,.100,.9,1);
}
.hd_1:hover{
	background-image:url(img/zp/cmxb_c.jpg);
	box-shadow:0px 0px 10px 10px rgba(255,255,255,0.3);
	width:200px;
	height:200px;
	margin-top:110px;
	margin-left:360px;
	animation:none;
}
.hd_2{
	position:absolute;
	width:150px;
	height:150px;
	background:#cfcfcf;
	transition:0.8s;
	border-radius:10px;
	margin-top:220px;
	margin-left:550px;
	animation:1.5s ys2 alternate infinite;
	box-shadow:0px 0px 1px 1px rgba(255,255,255,0.9);
	transition-timing-function:cubic-bezier(0,.100,.9,1);
}
.hd_2:hover{
	background-image:url(img/zp/wzbz_1.jpg);
	box-shadow:0px 0px 5px 5px rgba(255,255,255,0.3);
	width:250px;
	height:250px;
	margin-top:170px;
	margin-left:500px;
	animation:none;
}
.hd_3{
	position:absolute;
	width:50px;
	height:50px;
	background:#cfcfcf;
	transition:0.8s;
	border-radius:10px;
	margin-top:300px;
	margin-left:750px;
	animation:1.3s ys3 alternate infinite;
	box-shadow:0px 0px 1px 1px rgba(255,255,255,0.9);
	transition-timing-function:cubic-bezier(0,.100,.9,1);
}
.hd_3:hover{
	border:0px;
	background-image:url(img/zx/bdmb_c.jpg);
	box-shadow:0px 0px 8px 8px rgba(255,255,255,0.9,0.3);
	width:150px;
	height:150px;
	margin-top:250px;
	margin-left:725px;
	animation:none;
}
.hd_4{
	position:absolute;
	width:100px;
	height:100px;
	background:#cfcfcf;
	transition:0.8s;
	border-radius:10px;
	margin-top:380px;
	margin-left:420px;
	animation:1s ys1 alternate infinite;
	box-shadow:0px 0px 1px 1px rgba(255,255,255,0.9);
	transition-timing-function:cubic-bezier(0,.100,.9,1);
}
.hd_4:hover{
	border:0px;
	background-image:url(img/zp/fzsj_c.png);
	box-shadow:0px 0px 10px 10px rgba(255,255,255,,0.3);
	width:200px;
	height:200px;
	margin-top:330px;
	margin-left:390px;
	animation:none;
}
.zz{
	margin-top:-74px;
	position:absolute;
	width:1000px;
	height:70px;
	display:none;
	background: -ms-linear-gradient(top,rgba(0,0,0,0),rgba(0,0,0,0.3));  
	background: -o-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
	background: -moz-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
	background: -webkit-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
}
.zz1{
	margin-top:-604px;
	position:absolute;
	width:1000px;
	height:70px;
	display:none;
	background: -ms-linear-gradient(top,rgba(0,0,0,0.3),rgba(0,0,0,0));  
	background: -o-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
	background: -moz-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
	background: -webkit-linear-gradient(top, rgba(0,0,0,0),rgba(0,0,0,0.2));  
}
.ss{
	background:transparent;
	border-style:none;
	border:2px solid white;
	text-align:left;
	margin-top:520px;
	margin-left:10px;
	height:30px;
	color:grey;
	float:left;
}
.ss2{
	background:transparent;
	border-style:none;
	border:2px solid white;
	margin-top:520px;
	margin-left:-1150px;
	height:36px;
	border-bottom-right-radius:15px;
	border-top-right-radius:15px;
	cursor:pointer;
	background-color:rgba(100,100,100,0.3);
	color:white;
	transition:0.5s;
}
.ss2:hover{
	color:grey;
	box-shadow:1px 1px 1px 1px rgba(55,55,55,0.5);
	background-color:white;
}
@keyframes ys1{
	100%{ background:green;}
}
@keyframes ys2{
	100%{ background:blue;}
}
@keyframes ys3{
	100%{ background:yellow;}
}
@keyframes ys4{
	50%{ background:red;}
}

#gywm{
	background-image:url(img/gywm2.png);
	position:absolute;
	width:500px;
	height:283px;
	margin-top:50px;
	margin-left:850px;
	opacity:0;
}
@keyframes tm{
	100%{ opacity:1;}
}
@keyframes tm1{
	100%{ opacity:0;}
}
@keyframes xz{
	50%{ transform:rotate(10deg);}
	100%{ transform:rotate(-10deg);}
}
</style>
<body bgcolor="#cfcfcf">
	<div class="d1">
    
    	<div class="dh">
        	<a href="#" onClick="dip2('sy');">
                <div class="sy" id="sy">
                </div>
            </a><br>
            <a id="jc_1" target="if" href="html/jc.php" onClick="dip();">
                <div class="jc" id="jc">
                </div>
            </a><br>
            <a target="if" href="html/zx.php" onClick="dip();">
                <div class="zx" id="zx">
                </div>
            </a><br>
            <a target="if" href="html/zp.php" onClick="dip();">
                <div class="zp" id="zp">
                </div>
           	</a><br>
            <a href="#" onClick="dip2('gy');" >
            <div class="gy" id="gy">
            </div>
            </a>
        </div>
        <div class="logo">
        </div>
        <div class="hd">
        	<div class="hd_1">
            </div>
            <div class="hd_2">
            </div>
            <div class="hd_3">
            </div>
            <div class="hd_4">
            </div>
        </div>
        <div class="logo3">
        </div>
        <div id="gywm"></div>
        <div class="i" id="i">
            <iframe id="if" class="if" name="if" frameborder="0">
            </iframe>
            <div class="zz" id="zz"></div>
            <div class="zz1" id="zz1"></div>
        </div>
        <form  action="html/ss.php" method="post" target="if">
        <input id="sou" class="ss" type="text" name="a1">
        <input class="ss2" type="submit"  value="up" onClick="dip()">
        </form>
	</div>
</body>
</html>

