<?php
	function createHead()
	{
		echo '<meta charset="utf-8">
			<title>AdameatEva</title>';
	}
	function createHeader()
	{
		echo " <div class='Menu'>
			<div class='LoginLogout'>";
		if(isset($_SESSION['id']))
		{
			echo '<div class="name">Chào '.$_SESSION['Name'].'||</div>';
			echo '<form method="post">
				<input type="submit" name="logout" value="Đăng xuất">
				</form>';
		}
		else
			echo '<a href="signin.php">Đăng nhập</a>';				
		echo	"</div>
		</div>";
	}
	function createFooter()
	{
		echo "<footer>
		<div class='foot'>
			<div class='dungLabel Label'> </div>
			<form class='submitForm' method='post'>
				<input type='submit' name='finish' class='butFinish' value='Kiểm tra'>				
			</form>
		</div>
		</footer>";
	}
	function footerFinish($kt,$dapan)
	{			
		echo "<footer>";
			if($kt==1)
				echo "<div class='footFinish dung'> 
						<div class='dungLabel Label'> Chính xác </div>";
			else
				echo "<div class='footFinish sai'> 
						<div class='saiLabel Label'> 
							<div>Sai</div> 
							<div>Đáp án: ".$dapan."</div>
						</div>";
			echo	"<form class='submitForm' method='post'>
						<input type='submit' name='next' class='butFinish' value='Tiếp tục'>				
					</form>
				</div>
				</footer>";
	}
	
?>
