
<?php

require_once '../sql.php';
$mydb=new mysql();

if(isset($_POST['act'])){
	$act=$_POST['act'];
if($act=='get')
{
	$sql="SELECT * FROM biu";
	$re=$mydb->toresult($sql);
	echo json_encode($re);	
}elseif($act=='pass'){
	$id=$_POST['id'];
	$sql="UPDATE `biu` SET `status`='1' WHERE (`id`='$id')";
	if($mydb->insert($sql)){
		echo json_encode(array(
			"status"=>1,
			"info"=>"通过~"
		));
	}else{
		echo json_encode(array(
				"status"=>0,
				"info"=>"未通过~"
			));
	}
}elseif($act=='passAll'){
		$temp=['1','2','3'];
		$flag=true;
		foreach($temp as $v){
			$sql="UPDATE `biu` SET `status`='1' WHERE (`id`='$v')";
			if(!$mydb->insert($sql)){
				$flag=false;
			}
		}
		if(!flag){
			echo json_encode(array(
				"status"=>0,
				"info"=>"失败~"
			));
		}else{
			echo json_encode(array(
					"status"=>1,
					"info"=>"成功~"
				));
		}
}elseif($act=="delete"){
	$id=$_POST['id'];
	$sql="DELETE FROM 'biu' where (`id`='$id')";
	if($mydb->insert($sql)){
		echo json_encode(array(
			"status"=>1,
			"info"=>"成功~"
		));
	}else{
		echo json_encode(array(
				"status"=>0,
				"info"=>"删除失败~"
			));
	}
}
}else{
	echo 403;
}
