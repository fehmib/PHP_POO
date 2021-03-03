<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form action="" method="post">
	<label for="nom">Nom : </label>
	<input type="text" name="nom" id="nom" /><br />
	<label for="">Email : </label>
	<input type="text" name="email" id="" /><br />
	<label for="">Adresse : </label>
	<input type="text" name="adresse" id="" /><br />
	<input type="submit" value="Enregisrer" name="btn_enregistrer"/>
</form>
	<?php 
	if(isset($_POST['btn_enregistrer'])):
	include_once('../lib/personne.class.php');
	$p=new Personne('localhost','tsmm518','root','');
	/*print '<pre>';
	var_dump($p);
	print '</pre>';*/
	//$p->cnx : objet (PDO) qui est connecté à notre BDD
	$p->nom=$_POST['nom'];
	$p->email=$_POST['email'];
	$p->adresse=$_POST['adresse'];
	$p->Create();
	endif;
	?>
</body>
</html>