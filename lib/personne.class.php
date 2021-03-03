<?php 
class Personne{
public $id,$nom,$email,$adresse;
private $serveur,$bdd,$utilisateur,$mdp,$cnx;//connexion à la BDD
public function __construct($sever,$db,$user,$pwd){
	$this->serveur=$sever;
	$this->bdd=$db;
	$this->utilisateur=$user;
	$this->mdp=$pwd;
	//$this->cnx objet connecté sur notre BDD
	try{
	$this->cnx=new PDO('mysql:host='.$this->serveur.';dbname='.$this->bdd,$this->utilisateur,$this->mdp);
	}
	catch(Exception $e){
		print $e->getMessage();
	}
}
public function Create(){
	print $sql="insert into personnes values(NULL,'$this->nom','$this->email','$this->adresse')";
	$res=$this->cnx->exec($sql);
	if($res) return true;
	else return false;
}
public function Update(){
	print $sql="update personnes set nom='$this->nom',
									email='$this->email',
									adresse='$this->adresse'
								where id=$this->id";
	$res=$this->cnx->exec($sql);
	if($res) return true;
	else return false;
}
public function Delete(){
	print $sql="delete from personnes where id=$this->id";
	$res=$this->cnx->exec($sql);
	if($res) return true;
	else return false;
}
public function Read(){
	$sql="SELECT * from personnes ";
	$res=$this->cnx->query($sql);
	if($res) {
		$res->setFetchMode(PDO::FETCH_OBJ);
		$personnes=$res->fetchAll();
		print '<table class="table table-bordred table-striped table-hover">';
		print '<tr><th>ID</th><th>Nom</th><th>Actions</th></tr>';
		foreach($personnes as $personne):
		print '<tr>';
			print '<td>'.$personne->id.'</td>';
			print '<td>'.$personne->nom.'</td>';
			//passage de paramètres par URL
			print '<td><a href="update_personne.php?id='.$personne->id.'&nom='.$personne->nom.'&email='.$personne->email.'&adresse='.$personne->adresse.'" class="badge badge-warning">Modifier</a></td>';
			print '<td><a href="#" class="badge badge-danger">Supprimer</a></td>';
			print '<td><a href="#" class="badge badge-success">Détails</a></td>';
		print '</tr>';
		endforeach;
		print '</table>';
	}
	else echo 'Table vide !!!';
}
}
?>
