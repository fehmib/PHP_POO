<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form action="" method="post">
	<label for="id">ID : </label>
	<input type="text" name="id" value="<?=$_GET['id']?>" readonly  /><br />
	<label for="nom">Nom : </label>
	<input type="text" name="nom" value="<?=$_GET['nom']?>" /><br />
	<label for="">Email : </label>
	<input type="text" name="email" value="<?=$_GET['email']?>" /><br />
	<label for="">Adresse : </label>
	<input type="text" name="adresse" value="<?=$_GET['adresse']?>" /><br />
	<input type="submit" value="Modifier" name="btn_modifier"/>
</form>
	<?php 
	if(isset($_POST['btn_modifier'])):
	include_once('../lib/personne.class.php');
	$p=new Personne('localhost','tsmm518','root','');
	/*print '<pre>';
	var_dump($p);
	print '</pre>';*/
	//$p->cnx : objet (PDO) qui est connecté à notre BDD
	$p->id=$_POST['id'];
	$p->nom=$_POST['nom'];
	$p->email=$_POST['email'];
	$p->adresse=$_POST['adresse'];
	if($p->update()) header("location:index.php");
	endif;
	?>
</body>
</html>