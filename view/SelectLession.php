<?php
	session_start();
	include('createHeaderFooter.php');
	
	include('../controller/CodeSelectLession.php');
	$bh=new baihoc();
	$array= $bh->contructer("select * from baihoc");
	
	if(isset($_POST['logout']))
	{
		unset($_SESSION['id'],$_SESSION['Name']);
		header('location:signin.php');
	}
?>
<html lang="vi">
	<head>
		<?php
			createHead();
		?>
		<link rel="stylesheet" href="../asset/HocCss.css">
		<link rel="stylesheet" href="../asset/HeaderFooter.css">
		<link rel="stylesheet" href="../asset/SelectLession.css">
	</head>
	<body>
		<?php
			createHeader();
		?>
		<div class='lession'>
			<div class='listBH'>
				<?php 
				$dem=1;
					for($i=0;$i<count($array);$i++)
					{
						$a=$i%3;
						if($a==0)
						{
							echo '<div class="baihoc"> 
								<a href="../controller/XuLyIdBH.php?id='.$array[$i]->id.'"><img src="../image/book.png" style="width:120px; heigh:159px;">
								<div class="textPic">'.$array[$i]->tenBH.'</div> </a>
								</div>
								<div class="baihoc"> ';
						}
						else 
						{
							if($dem==1)
							{	echo '<div class="baihoc2 one">
								<a href="../controller/XuLyIdBH.php?id='.$array[$i]->id.'"><img src="../image/book.png" style="width:120px; heigh:159px;">
								<div class="textPic">'.$array[$i]->tenBH.'</div></div></a>';
								$dem++;
							}
							else
							{
								$dem=1;
								echo '<div class="baihoc2 sec">
								<a href="../controller/XuLyIdBH.php?id='.$array[$i]->id.'"><img src="../image/book.png" style="width:120px; heigh:159px;">
								<div class="textPic">'.$array[$i]->tenBH.'</div></div> </div></a>';				
							}
						}
					}
				?>
			</div>
		</div>
		<div class='achi'>
		
		</div>
	</body>
</html>
