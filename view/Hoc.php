<?php
	include('../controller/CodeHoc.php');
	include('createHeaderFooter.php');
	$baihoc=new loadBaiHoc();
	/*unset($_SESSION['data'],$_SESSION['tiendo']);
	$baihoc->unsetSession();
	$baihoc->createData();
	$baihoc->setTienDo();*/
	//$_SESSION['data'][$_SESSION['tiendo']]->createSession();
?>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<title>AdameatEva</title>
		<link rel="stylesheet" href="../asset/HocCss.css">
		<link rel="stylesheet" href="../asset/HeaderFooter.css">
	</head>
	<body>
		<?php
			createHeader();
		?>		
		<div class='hoc'>
		<div class='headerWork'>
			<div class='cauhoi'>
				<?php
					echo $_SESSION['data'][$_SESSION['tiendo']]->cauHoi;
				?>
			</div>
			<div class='tiendo cauHoi'>
				<?php
					echo ($baihoc->getTienDo()+1)."/".(count($_SESSION['data']));
				?>
			</div>
		</div>
			<div class='top'>
				<center>
					<form method='post'>
						<?php
							for($i=0;$i<count($_SESSION['top']);$i++)
								echo "<button type='submit' name='top' value=' '>"
						?>
					</form>
				</center>
			</div>
			<div class='down'>
				<center>
					<form method='post'>
						<?php				
							for($i=0;$i<count($_SESSION['down']);$i++)
								echo "<input type='submit' name='down' class='butDown' value='".$_SESSION['down'][$i]."' >";
						?>
					</form>
				</center>
			</div>
		</div>
	</body>
	<?php
		if(isset($_POST['finish']))
		{			
			footerFinish($_SESSION['data'][$_SESSION['tiendo']]->kiemtra(),$_SESSION['data'][$_SESSION['tiendo']]->getdapan());			
		}
		else
			createFooter();
		if(isset($_POST['next']))
		{
		$_SESSION['data'][$_SESSION['tiendo']]->butNextOnclick();
		}
	?>
</html>
<?php

	if(isset($_POST['down']))
	{
		$_SESSION['data'][$_SESSION['tiendo']]->butDownOnclick($_POST['down']);
	}
?>