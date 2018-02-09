<?php

	require_once 'SqlHelper.class.php';

	class Rang{
		
	
		
		//1.提供一个多少页函数
		function getPageCount($pageSize, $type){
			
			$sql="select count(*) from list where type1=".$type;
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			
			//取出又有多少记录
			if($row=mysql_fetch_row($res)){
				$rowCount=$row[0];
				
			}
			//关闭资源，关闭连接
			mysql_free_result($res);
			//$sqlHelper->my_close();;
			return ceil($rowCount/$pageSize);
			
			
		}
		
		//2.提供方法返回应当显示的列表
		function showRangByPage($pageSize,$pageNow){
			
			$sql="select * from emp limit "
			.($pageNow-1)*$pageSize.",".$pageSize;
			$sqlHelper=new SqlHelper();
			//操作数据库..
			
			return $sqlHelper->execute_dql2($sql); 
			
		}
		
		
		
		//3.把上面的两个函数合并
		//mysql->sql（好好学习）
		/**
		 * Enter description here...
		 *
		 * @param unknown_type $fenyePage
		 * @example 
		 */
		function showRangByPage2($fenyePage, $type){
			
			$sqls[0]="select count(*) from list,list_t1 where list.type1=list_t1.type1 and name=\"".$type."\";";
			$sqls[1]="select * from list,list_t1 where list.type1=list_t1.type1 and name=\"".$type."\" limit "
			.($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize.";";
			
			
			
			$sqlHelper=new SqlHelper();
			//因为分页不只是 emp表分页，还有其它
			$sqlHelper->execute_dql_page($sqls,$fenyePage);
			
			//关闭!!!!
			$sqlHelper->my_close();
			
		}
		
		function showRang($sql){
			
			$sql="select * from emp limit "
			.($pageNow-1)*$pageSize.",".$pageSize;
			$sqlHelper=new SqlHelper();
			//操作数据库..
			
			return $sqlHelper->execute_dql2($sql); 
			
		}
		
		//提供一个通过
		function seaRang($keyword,$fenyePage){
			$sq="from list,list_t1 where list.type1=list_t1.type1 and (title like \"%$keyword%\" or introduce like \"%$keyword%\")";
			$sql[0]="select count(*) ".$sq.";";
			$sql[1]="select * ".$sq." limit "
			.($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize.";";
			
			$sqlHelper=new SqlHelper();
			
			$sqlHelper->execute_dql_page($sql,$fenyePage);
			
			$sqlHelper->my_close();
			
			
			}
		
		}
?>