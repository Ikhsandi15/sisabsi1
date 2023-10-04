<?php
// FILE KONEKSI

include"config/conn.php";

$pass=md5($_POST['password']);
$passw=$_POST['password'];

$user=$_POST['username'];

	$sql=$conn->query("select * from user where nama='$user' and pass='$pass'");
	$count=mysqli_num_rows($sql);
	$rs=mysqli_fetch_array($sql);
		if($count>0){
			session_start();
				$_SESSION['idu']=$rs['idu'];

				$_SESSION['nama']=$rs['nama'];
				$_SESSION['level']=$rs['level'];
				$_SESSION['idk']="";
				$_SESSION['ortu']="";
				$_SESSION['id']=$rs['id'];


			header('location:media.php?module=home');
		}else{
$mr=md5($_POST['password']);
	$sqla=$conn->query("select * from siswa where nis='$user' and pass='$mr'");
	$counta=mysqli_num_rows($sqla);
	$rsa=mysqli_fetch_array($sqla);
if($counta>0){
			session_start();
				$_SESSION['idu']=$rsa['nis'];
				$_SESSION['nama']=$rsa['nama'];
				$_SESSION['level']="user";
				$_SESSION['ortu']=$passw;
				$_SESSION['idk']=$rsa['idk'];
				$_SESSION['id']="2";

			header('location:media.php?module=home');

}else{
$gr=md5($_POST['password']);
	$sqlz=$conn->query("select * from guru where nip='$user' and pass='$gr'");
	$countz=mysqli_num_rows($sqlz);
	$rsz=mysqli_fetch_array($sqlz);
if($countz>0){
			session_start();
				$_SESSION['idu']=$rsz['nip'];
				$_SESSION['nama']=$rsz['nama'];
				$_SESSION['idk']=$rsz['idk'];
				$_SESSION['level']="guru";
				$_SESSION['ortu']="";
				$_SESSION['id']="2";

			header('location:media.php?module=home');


}else{
			echo "<script>alert('Mohon periksa kembali Username & Password Anda'); location.href='login.php';</script>";
}
}
}
?>
