<?php
	include('../model/code.php');
	include("../model/sql.php");
	$p=new NguoiDung;
	$db=new database();
?>
<html lang="vi">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>AdameatEva</title>
	<link rel="stylesheet" href="../asset/QuanLyTaiKhoanCss.css">
	<link rel="stylesheet" href="../asset/HeaderFooter.css">
</head>

<body>
	<div class="Menu">
		
	</div>
	
	<section class="work">
		<div class="left">
			<a href='QuanLyTaiKhoan'><button  name="qluser" class="butMenuLeft"> Quản lý người dùng</button></a>
			<a href='QuanLyBaiHoc'><button  name="qllesson" class="butMenuLeft"> Quản lý bài học</button></a>
			<button  name="qllesson" class="butMenuLeft"> Quản lý bài tập</button>
		</div>
		<div class="middle">
		<form method='post'>
			<label> Chọn bài học:</label>
			<select name="bh">
				<?php
				$qr=$db->execute('select * from baihoc');
				while($row = mysqli_fetch_assoc($qr))
				{
					echo'<option value="'.$row['MaBH'].'">'.$row['TenBH'].'</option>';
				}
				?>
			</select>
			<input type='submit' name='denBH' value='Chọn'>
		</form>
			<div class="list">
				<table class="bang">
						<tr>
							<th> ID </th>
							<th> ID bài học </th>
							<th> Câu hỏi </th>
							<th> Đáp án </th>
							<th> </th>
						</tr>	
					<?php	
						if(isset($_POST['denBH']))
						{
							$idbh= $_POST['bh'];						
							header('location:QuanLyBaiTap.php?idBH='.$idbh.'');
						}
						if(isset($_GET['idBH']))
							$p->loadBaiTap($_GET['idBH']);
					?>
				</table>
			</div >
			<form method="post">
				<button type="submit" name="butthemMoi" class="butThaoTac">+ Thêm bài tập mới</button>
			</form>
				<?php 
					if(isset($_POST['butthemMoi']))
					echo	'<div class="form">
				Thêm người dùng.
				<form method="post">
				  <div class="mb-3">
					  <label for="formGroupExampleInput" class="form-label">Câu hỏi</label>
					  <input type="text" class="form-control" name="CauHoi" id="formGroupExampleInput" placeholder="Câu hỏi">
					</div>
					<div class="mb-3">
					  <label for="formGroupExampleInput2" class="form-label">Đáp án</label>
					  <input type="text" class="form-control" name="DapAn" id="formGroupExampleInput2" placeholder="Đáp án">
					</div>
					<button type="submit" name="Them" class="btn btn-primary">Thêm</button>				
				</form>
			</div>'
				?>
			
			<?php 
						if(isset($_POST['Them']))
						{
							$db->execute2('insert into baitap  values (null,"'.$_GET['idBH'].'","'.$_POST['CauHoi'].'","'.$_POST['DapAn'].'")');
							header('location:QuanLyBaiTap.php?idBH='.$_GET['idBH'].'');
						}
						if(isset($_POST['sua']))
						{
							$db->execute2('update baitap  set TV="'.$_POST['CauHoi'].'",TA="'.$_POST['DapAn'].'"');
							header('location:QuanLyBaiTap.php?idBH='.$_GET['idBH'].'');
						}
			?>
			<?php 
						if(isset($_GET['id']))
						{
							$id=$_GET['id'];
							
							$qr=$db->execute('select * from baitap where MaBT="'.$id.'"');
							while($row = mysqli_fetch_assoc($qr))
							{
								echo '<div class="form">
						Sửa người dùng.
				<form method="post">
				  <div class="mb-3">
					  <label for="formGroupExampleInput" class="form-label">Tên</label>
					  <input type="text" class="form-control" name="CauHoi" id="formGroupExampleInput" value="'.$row['TV'].'">
					</div>
					<div class="mb-3">
					  <label for="formGroupExampleInput2" class="form-label">Email</label>
					  <input type="text" class="form-control" name="DapAn" id="formGroupExampleInput2" value="'.$row['TA'].'">
					</div>
					<button type="submit" name="sua" class="btn btn-primary">Sửa</button>				
				</form>
			</div>';
							}
						}
			?>
  		</div>
	</section>
	
</body>

</html>