<?php
	include("../model/sql.php");
	session_start();
	class loadBaiHoc
	{	
		public $dapAn;
		public $cauHoi;
		function setDapan()
		{
			$this->dapAn=$_SESSION['data'][$_SESSION['tiendo']]["TV"];
		}
		function setCuaHoi()
		{
			$this->cauHoi=$_SESSION['data'][$_SESSION['tiendo']]["TA"];
		}
		function getdapan()
		{			
			return $this->dapAn;
		}
		function getcauHoi()
		{
			return $this->cauHoi;
		}
		function createData($id)
		{
			if(isset($_SESSION['data'])==false)
			{
				$db=new database();
				$qr=$db->execute("select TV,TA from baitap where MaBH='".$id."'");
				$array=array();
				while($row = mysqli_fetch_assoc($qr))
				{
					$baitap=new loadBaiHoc();
					$baitap->dapAn=$row['TA'];
					$baitap->cauHoi=$row['TV'];
					array_push($array,$baitap);
					//$array[]=$row;
				}
				$_SESSION['data']=$array;
				$_SESSION['DungSai']=[];
				array_push($_SESSION['DungSai'],0);
				array_push($_SESSION['DungSai'],0);
			}				
		}
		function createSession()
		{
			
			$tam=explode(" ",$this->dapAn);
			$chuoiFinal=$this->daoChuoi($tam);
			
			$_SESSION['flag']=[];
			for($i=0;$i<count($tam);$i++)
				array_push($_SESSION['flag'],0);
			$_SESSION['top']=[];
			$_SESSION['down']=$chuoiFinal;
		}
		function unsetSession()
		{
			unset($_SESSION['top'],$_SESSION['down'],$_SESSION['flag']);
		}
		function daoChuoi($tam)
		{
			shuffle($tam);
			$chuoiFinal=$tam;
			return $chuoiFinal;
		}
		function butDownOnclick($post){	
			array_push($_SESSION['top'],$_POST['down']);
			for($i=0;$i<$_SESSION['flag'];$i++)
			{	
				if($_SESSION['flag'][$i]==0 && $_SESSION['down'][$i]==$_POST['down'])
				{
					$_SESSION['flag'][$i]=1;
					break;
				}				
			}
			header('location:Hoc1.php?id='.$_GET['id']);	
		}
		function butTopOnclick($post)
		{
			$index=array_search($post,$_SESSION['top']);
			for($i=0;$i<count($_SESSION['flag']);$i++)
			{	
				if($_SESSION['flag'][$i]==1 && $_SESSION['down'][$i]==$post)
				{
					$_SESSION['flag'][$i]=0;
					break;
				}
			}
			array_splice($_SESSION['top'],$index,1);
			header('location:Hoc1.php?id='.$_GET['id']);
		}
		function butNextOnclick()
		{
			$id=$_GET['id'];
			if($_SESSION['tiendo']==count($_SESSION['data'])-1)
				header('location:TongKet.php?id='.$id);
			else
			{
				$_SESSION['tiendo']++;
				$_SESSION['data'][$_SESSION['tiendo']]->createSession();
				header('location:Hoc1.php?id='.$id);
			}				
		}
		function kiemtra()
		{
			$kq=null;
			foreach($_SESSION['top'] as $value)
				$kq.=$value." ";
			$kq=substr($kq,0,strlen($kq)-1);
			if($kq==$this->dapAn)
			{
				$_SESSION['DungSai'][0]++;
				return 1;
			}
			else
			{
				$_SESSION['DungSai'][1]++;
				return 0;
			}
			
		}
		function setTienDo()
		{
			if(isset($_SESSION['tiendo'])==false)
				$_SESSION['tiendo']=0;
		}
		function getTienDo()
		{
			return $_SESSION['tiendo'];
		}
	}
?>