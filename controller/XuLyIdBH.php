<?php
			include('../controller/CodeHoc.php');
			unset($_SESSION['top'],$_SESSION['down'],$_SESSION['flag'],$_SESSION['data'],$_SESSION['tiendo'],$_SESSION['DungSai'][0]);
			$id=$_GET['id'];
			$baihoc=new loadBaiHoc();
			$baihoc->createData($id);
			$baihoc->setTienDo();
			$_SESSION['data'][$_SESSION['tiendo']]->createSession();
			header('location:../view/Hoc1.php?id='.$id);
?>