<?php

//提供一个操作数据库的工具类(SqlHelper).[提供curd]


class SqlHelper {
	
	var $dbName = "rangds";
	var $host = "localhost";
	var $userName = "root";
	var $userPass = "root";
	var $conn;
	
	function __construct() {
		
		$this->conn = mysql_connect ( $this->host, $this->userName, $this->userPass );
		if (! $this->conn) {
			die ( "连接数据库失败" . mysql_error () );
		}
		
		mysql_query ( "set names utf8" );
		//选择数据库
		mysql_select_db ( $this->dbName, $this->conn ) or die ( "连接数据库失败" );
	
	}
	
	//提供统一查询函数 dql(select) dml(update,delete,insert)
	

	//接收一个sql语句，完成该语句.
	//$sql select * from list
	function execute_dql($sql) {
		
		$res = mysql_query ( $sql ) or die ( "查询失败" . mysql_error () );
		//mysql_close($this->conn);
		return $res;
	
	}
	
	//提供一个执行 dml(update delete insert)语句
	function execute_dml($sql){
		$b=mysql_query($sql,$this->conn) or die("dml语句错误".mysql_error());
	
		if(!$b){
			return 0;//0表示失败
		}else{
			if(mysql_affected_rows($this->conn)>0){
				//有行数受到影响
				return 1;//有行数被影响
			}else{
				return 2;//没有行数影响
			}
		}	
		
	}
	//可以批量执行sql // prepared,批量执行 
	function execute_dml3($sqls){
		for($i=0;$i<count($sqls);$i++){
			$this->execute_dql($sqls[$i]);
		}
	}
	
	//因为分页功能是一个通用的功能.所有也一个函数来处理
	//$sqls $sqls1 ="select count(*) cun from 表名";
	//      $sqls2 ="select * from 表名 limt ..."
	function execute_dql_page($sqls, $fenyePage) {
		//"select count(*) from list"
		$res = $this->execute_dql2 ( $sqls [0] );
		
		$fenyePage->pageCount = ceil ( $res [0]['count(*)'] / ($fenyePage->pageSize) );
		//echo $fenyePage->pageCount;
		

		$fenyePage->rowCount = $res [0]['count(*)'];
		
		//操作数据库..
		//echo '----'.$sqls[1];
		$fenyePage->res = $this->execute_dql2 ( $sqls [1] );
		$fenyePage->navigator .= "<div class='fy'>
		<form action='{$fenyePage->goUrl}' method='get' onsubmit='return checkPageNow()' />
		";
		//显示上一页的超链接
		if ($fenyePage->pageNow > 1) {
			$pre_page = $fenyePage->pageNow - 1;
			$fenyePage->navigator .= "	<a href='{$fenyePage->goUrl}?pageNow={$pre_page}{$fenyePage->condition}'>上一页</a>&nbsp;&nbsp;";
		}
		
		
		
		$start = floor ( ($fenyePage->pageNow - 1) / 10 ) * 10 + 1;
		
		if ($start > 1) {
			$pre_start = $start - 1;
			$fenyePage->navigator .="	<a href='{$fenyePage->goUrl}?pageNow=$pre_start{$fenyePage->condition}'><<<</a>&nbsp;";
		}
		//显示10超链接
		for($index = $start; $start < $index + 10 && $start <= $fenyePage->pageCount; $start ++) {
			$fenyePage->navigator .="<a href='{$fenyePage->goUrl}?pageNow=$start{$fenyePage->condition}'>$start</a>&nbsp;";
		}
		
		
		
		$fenyePage->navigator .= "当前第{$fenyePage->pageNow}页/共{$fenyePage->pageCount}页
				转<input class='tz' type='text' id='pageNow' onkeyup='return checkPageNow($fenyePage->pageCount)' name='pageNow'/>
				<input type='submit'  value='go'>
			
		";
		//显示一页
		if ($fenyePage->pageNow < $fenyePage->pageCount) {
			$next_page = $fenyePage->pageNow + 1;
			$fenyePage->navigator .= "	<a href='{$fenyePage->goUrl}?pageNow={$next_page}{$fenyePage->condition}'>下一页</a>&nbsp;&nbsp;";
		
		}
		//如果 $pageNow如是是 1 2 3 4 5 6 7 8 9 10  >>>11
		if ($fenyePage->pageNow < $fenyePage->pageCount) {
			$fenyePage->navigator .="	<a href='{$fenyePage->goUrl}?pageNow=$start{$fenyePage->condition}'>>>></a>&nbsp;";
		}
		$fenyePage->navigator .="</form></div>";
		
		//表单
		/*
		$fenyePage->navigator .= "转<input class='tz' type='text' id='pageNow' onkeyup='return checkPageNow($fenyePage->pageCount)' name='pageNow'/>";
		$fenyePage->navigator .= "<input type='submit'  value='go'>";
		$fenyePage->navigator .= "</form>";
		$fenyePage->navigator .="</div>";
		*/
	}
	
	//完成查询功能的函数
	function execute_dql2($sql) {
		
		//echo 'sql='.$sql;
		//exit();
		//如何记录日志,这里可以记录所有执行的 sql
		//file_put_contents("d:/mylog.txt",$sql."\r\n",FILE_APPEND);
		//$sql="select count(*) from emp";
		$res = mysql_query ( $sql, $this->conn ) or die ( "查询失败" . mysql_error () );
		
		//立即释放资源.
		$arr = array ();
		//$res=>$arr;
		while ( $row = mysql_fetch_assoc( $res ) ) {
			//$row [ $row['empid'] $row['name']  ]
			//$row 一维数组
			$arr [] = $row;
		}
		//可以立马释放资源(这里是ok!)
		mysql_free_result ( $res );
		//关闭的动作，我们单独处理.,不能马上关闭原因，是因为可能使用通过一
		//$sqlHelper 可以掉哟过多次 execute_dql2
		//mysql_close($this->conn);
		return $arr;
	
	}
	
	//关闭连接
	function my_close() {
		
		if (! empty ( $this->conn )) {
			mysql_close ( $this->conn );
		}
	}
	


}
?>