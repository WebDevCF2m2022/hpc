<?php

namespace model\InterfaceModel;

use PDO;

// fichier qui rend obligatoire la création de certaines méthodes dans les classes qui l'implémentent
interface ManagerInterface
{
    // un constructeur doit avoir un paramètre de type PDO
    public function __construct(PDO $pdo);

    // méthode pour récupérer tous les objet de la table
    public function getAll();

    // méthode pour récupérer un objet de la table via son id
    public function getOneById(int $id);

    //méthode pour ajouter un medecin a la table 
    

}