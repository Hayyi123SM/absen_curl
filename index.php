<!DOCTYPE html>
<html>
<head>
	<title>Absen Akakom</title>
</head>
<?php 
	if ($_GET['empty'] == 'true') {
		$pesan = "Inputan dari form harus lengkap ya, silahkan dicoba ulang!";
	}else if($_GET['error'] == 'true'){
		$pesan = "Username atau Password masih salah, coba input ulang lalu tekan submit!";
	}else if($_GET['absen'] == 'false'){
		$pesan = "Sepertinya absen pada matkul ini belum ada deh";
	}else if($_GET['absen'] == 'success'){
		$pesan = "Mantap!! Terimakasi telah menggunakan web saya, kamu berhasi absen di matkul ini!";
	}
 ?>
<style type="text/css">
	body{
		font: 17px/18px "courier new";
		background-color: #dadfe8;
	}

	.head-container{
		width: 700px;
		margin: 50px auto;
		text-align: center;
	}

	.container{
		width: 700px;
		margin: 0px auto;
		border: 3px solid darkblue;
		border-radius: 30px;
	}

	.container h2{
		text-align: center;
	}

	.container .pesan{
		background-color: #84b0bd;
		width: 500px;
		height: 30px;
		margin: 0px auto;
		border-radius: 20px;
	}

	.container .pesan p{
		line-height: 30px;
		color: #a81919;
		text-align: center;
		font-size: 14px;
		font-weight: bold;
	}

	.container .pesan .failed{
		color: #94710c;
	}

	.container .pesan .success{
		color: darkgreen;
	}

	.form{
		width: 250px;
		margin: 25px auto;
	}

	.form td{
		padding-top: 15px;
		font-weight: bold;
		font-style: italic;
	}

	.form input, select{
		width: 150px;
		outline: none;
		border : 1px solid lightskyblue;
		border-radius: 15px;
	}

	.form input{
		padding: 3px 5px;
		padding-left: 10px;
	}

	.form select{
		padding: 3px;
		width: 167px;
	}

	.form button{
		padding: 7px 10px;
		outline: none;
		border : 2px solid lightblue;
		border-radius: 20px;
		cursor: pointer;
	}

	.form button:hover{
		background-color: lightblue;
		color: white;
	}

	.info{
		width: 350px;
		height: 100px;
		margin: 10px auto;
		border: 1px solid black;
		border-radius: 10px;
	}

	.info h4{
		margin: 0;
		padding: 0;
		padding-left: 10px;
		padding-top: 5px;
		font-family: arial;
	}

	.info p{
		font-size: 15px;
		color: blue;
		padding-left: 10px;
	}

</style>
<body>
	<div class="head-container">
		<h1>AUTO ABSEN ELA AKAKOM</h1>
	</div>
	<div class="container">
		<h2>LOGIN</h2>
		<?php if ($_GET['empty'] == 'true' || $_GET['error'] == 'true' || $_GET['absen'] == 'false' || $_GET['absen'] == 'success'): ?>
		<div class="pesan">
			<?php if ($_GET['empty'] == 'true'): ?>
			<p>Username atau Password masih ada kosong!!</p>
			<?php elseif($_GET['error'] == 'true'): ?>
			<p>Username atau Password Salah!!</p>
			<?php elseif($_GET['absen'] == 'false'): ?>
			<p class="failed">Belum ada absen!!</p>
			<?php elseif($_GET['absen'] == 'success'): ?>
			<p class="success">Absen berhasil dilakukan!!</p>
			<?php endif; ?>
		</div>
		<?php endif ?>
		<div class="form">
			<form method="post" action="absen.php">
				<table>
					<tr>
						<td>User</td>
						<td>:</td>
						<td><input type="number" name="user" autofocus=""></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>Matkul</td>
						<td>:</td>
						<td>
							<select name="matkul">
								<option value="https://elearning.akakom.ac.id/mod/attendance/view.php?id=13085">PWC</option>
								<option value="https://elearning.akakom.ac.id/mod/attendance/view.php?id=13086">Prak PWC</option>
								<option value="https://elearning.akakom.ac.id/mod/attendance/view.php?id=18860">Kec. Buatan</option>
								<option value="https://elearning.akakom.ac.id/mod/attendance/view.php?id=14391">ALVECMA</option>
								<option value="https://elearning.akakom.ac.id/mod/attendance/view.php?id=13083">Jar. nirkabel</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="3" align="right"><button type="Submit" name="Submit">Submit</button></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="info">
				<h4>#INFO#</h4>
				<p><?= $pesan; ?></p>
		</div>
	</div>
</body>
</html>