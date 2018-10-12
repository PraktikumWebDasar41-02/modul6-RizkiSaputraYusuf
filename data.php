<form method="post">
	Nim <input type="text" name="Nim"><br>
	Nama <input type="text" name="nama"><br>
	Kelas <input type="radio" name="radi" value="D3MI-41-01">
	D3MI-41-01
	Kelas <input type="radio" name="radi" value="D3MI-41-02">
	D3MI-41-02<br>
	Jeniskelamin <input type="radio" name="jenisk" value="laki-laki">
	Laki-Laki<input type="radio" name="jenisk" value="perempuan">Perempuan<br>
	Hobi <input type="checkbox" name="hb[]" value="basket"><basefont></basefont>basket
		 <input type="checkbox" name="hb[]" value="futsal">futsal
		 <input type="checkbox" name="hb[]" value="badminthon">badminthon<br>
	Fakultas<select name="fk">
	<option value="FIT">FIT</option>
	<option value="FRI">FRI</option>
	<option value="FKB">FKB</option>
	<option value="FTE">FTE</option>
	</select><br>
	Alamat: <textarea name="Alamat"></textarea>
	<input type="submit" name="send" "submit">
	<a href="login.php">Masuk</a>
</form>

<?php
	include 'konek.php';
	if (isset($_POST['send'])) {
	if (str_word_count($_POST['nama'])<=35){
		$nama = $_POST['nama'];
	}else{echo "Nama Terlalu Panjang<br>";}

	if (!is_numeric($_POST['Nim'])&&str_word_count($_POST['Nim']>10)) {
		echo "NIM yang Harus diisi harus angka dan 10 karakter <br>";}
	}else{$nim=$_POST['Nim'];}

	$Kelas = $_POST['radi'];
	$Jeniskelamin = $_POST['jenisk'];

	$good = $_POST['hb'];
	$Hobi = implode (",",$good);
	$Fakultas = $_POST['fk'];
	$Alamat = $_POST['Alamat'];
	if (isset($nama)&&isset($Nim)&&isset($Kelas)&&isset($Jeniskelamin)&&isset($Hobi)&&isset($Fakultas)&&isset($Alamat)){
		$query = mysql_query($conn,"INSERT INTO data(Nim, nama, Kelas, Jeniskelamin, Hobi, fk, Alamat) VALUES ('$nim','$nama','$Kelas','$Jeniskelamin','$Hobi','$fk','$Alamat')");
		if (isset($query)){
			header("Location:login.php");
		}
	}else{echo "Data Masih Kosong";}
	?>