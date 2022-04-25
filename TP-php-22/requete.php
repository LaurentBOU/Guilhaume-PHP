<?php
// fonction qui récupère les infos d'un seul utilisateur en BdD
function requete_findUser($pseudo) {
    $db = connexion_BD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $req = $db->prepare($sql);
    $req->execute([
        ":pseudo"=>$pseudo
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

// fonction qui récupère tout les utilisateurs en BdD
function requete_lire_all_user()
{
    $db = connexion_BD();
    $sql = "SELECT * FROM users";
    $req = $db->prepare($sql);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

// fonction qui ajoute un utilisateur en BdD
function requete_inscription($pseudo,$password) {
    $db = connexion_BD();
    $sql = "INSERT INTO users (pseudo, password) VALUES (:pseudo, :password)";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":pseudo" => $pseudo,
        "password" => $password
        
    ]);
    return $result;
}