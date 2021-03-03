<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<form action="" method="post">
	<label for="id">ID : </label>
	<input type="text" name="id" id="id" /><br />
	
	<input type="submit" value="Supprimer" name="btn_supprimer"/>
</form>
	<?php 
	if(isset($_POST['btn_supprimer'])):
	include_once('../lib/personne.class.php');
	$p=new Personne('localhost','tsmm518','root','');
	/*print '<pre>';
	var_dump($p);
	print '</pre>';*/
	//$p->cnx : objet (PDO) qui est connecté à notre BDD
	$p->id=$_POST['id'];
	
	$p->delete();
	endif;
	?>
</body>
</html>