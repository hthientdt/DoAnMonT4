<?php
	include('../controller/CodeHoc.php');
	include('createHeaderFooter.php');	
	$baihoc=new loadBaiHoc();
?>
<html lang="vi">
	<head>
		<link rel="stylesheet" href="../asset/HocCss.css">
		<link rel="stylesheet" href="../asset/HeaderFooter.css">
	</head>
	<body>
		<?php
			createHeader();
		?>
		<div class='hoc'>
			<div class='headerWork'>
			<div class='tiendo cauHoi'>
				<?php
					echo ($baihoc->getTienDo()+1)."/".(count($_SESSION['data']));
				?>
			</div>
			<div class='cauhoi'>
				<?php
					echo $_SESSION['data'][$_SESSION['tiendo']]->cauHoi;
				?>
			</div>
			
		</div>
			<div class='top'>
			
				<center>
					<form method='post'>
						<?php
							for($i=0;$i<count($_SESSION['top']);$i++)
								echo "<input type='submit' name='top' class='butTop' value='".$_SESSION['top'][$i]."'>";
						?>
					</form>
				</center>
			</div>
			<div class='down'>
				<center>
					<form method='post'>
						<?php
						for($i=0;$i<count($_SESSION['flag']);$i++)
						{
							if($_SESSION['flag'][$i]==1)
								echo "<input type='submit' name='down' class='butDownEmty' disabled value='".$_SESSION['down'][$i]."' >";					
							else
								echo "<input type='submit' name='down' class='butDown' value='".$_SESSION['down'][$i]."' >";					
						}
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
		
	?>
</html>
<?php
	if(isset($_POST['down']))
	{
		$_SESSION['data'][$_SESSION['tiendo']]->butDownOnclick($_POST['down']);
		
	}
?>
<?php
	if(isset($_POST['top']))
	{
		$_SESSION['data'][$_SESSION['tiendo']]->butTopOnclick($_POST['top']);
	}
?>
<?php
	if(isset($_POST['next']))
	{
		$_SESSION['data'][$_SESSION['tiendo']]->butNextOnclick();
	}
?>

















