<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body><table>
<form method="post" action="loginn.php">
	<h2>login</h2><br>
	<tr>
		<td>Nama :<input type="text" name="nama"></td><br>
	</tr>
	<tr>
		<td>Nim :<input type="text" name="nim"></td>
	</tr>
	<tr>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
		</table>
</form>
<?php
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
		$nim=$_POST['nim'];
}
  $qry = ("SELECT * from t_jurnal1 where nama='$nama' and nim='$nim'");
    $save = mysqli_query($simpan, $qry);
    $masuk = mysqli_num_rows($save);

    if($masuk > 0){
    session_start();
    $_SESSION['nama'] = $nama;
    $_SESSION['status'] = "login";
        header("location:hasil.php");
    }else{
     echo "<script>
            alert('Gagal Login');
        </script>";    
}
?>

