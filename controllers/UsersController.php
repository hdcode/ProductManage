<?php

require_once 'Controller.php';

$action= $_GET['action'];

if($action == 'create') {
	$nom= $_POST['nom'];
	$prenom= $_POST['prenom'];
	$telephone= $_POST['telephone'];
	$email= $_POST['email'];
    $login= $_POST['login'];
	$password= $_POST['password'];
	$role= $_POST['role'];

	$user= $userdb->readCompte($login, $password);

	if($user == false) {
		$userdb->create($nom, $prenom, $email, $telephone, $login, $password, $role);
		header('Location:../users/add-users.php?error=0&message=Utilisateur ajouté');
	}
	else {
		header('Location:../users/users.php?error=1&message=Compte déjà existant');
	}
}

if($action == 'update') {
	$iduser= $_POST['iduser'];
	$nom= $_POST['nom'];
	$prenom= $_POST['prenom'];
	$telephone= $_POST['telephone'];
	$email= $_POST['email'];
    $login= $_POST['login'];
	$password= $_POST['password'];
	$role= $_POST['role'];

	$user= $userdb->readCompte($login, $password);

	if(($user == false) || ($user != false && $user->iduser == $iduser)) {
		$userdb->update($iduser, $nom, $prenom, $email, $telephone, $login, $password, $role);
		header('Location:../users/users.php?error=0&message=Modification réussie');
	}
	else {
		header('Location:../users/users.php?error=1&message=Compte déjà existant');
	}
}

if($action == 'delete') {
	$iduser= $_GET['iduser'];
	$userdb->delete($iduser);
	header('Location:../users/users.php?error=0&message=Utilisateur supprimé');
}


?>