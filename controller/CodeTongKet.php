<?php
	include('../controller/CodeHoc.php');
	function unsetSession()
	{
		unset($_SESSION['top'],$_SESSION['down'],$_SESSION['flag'],$_SESSION['data'],$_SESSION['tiendo'],$_SESSION['DungSai'][0]);
	}
	function restart()
	{
		$id=$_GET['id'];
		unsetSession();
		$baihoc=new loadBaiHoc();
		$baihoc->unsetSession();
		$baihoc->createData($id);
		$baihoc->setTienDo();
		$_SESSION['data'][$_SESSION['tiendo']]->createSession();
		header('location:Hoc.php?id='.$id);
	}
	function endLession()
	{
		unsetSession();
		header('location:SelectLession.php');
	}
?>