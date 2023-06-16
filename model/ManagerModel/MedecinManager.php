<?php
namespace model\ManagerModel;

use PDO;
use Exception;
use model\MappingModel\MedecinMapping;
use model\InterfaceModel\ManagerInterface;

class MedecinManager implements ManagerInterface
{
    private PDO $pdo;

    //function public __construct
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //function public GetMedecinByID
    public function getOneById(int $id): MedecinMapping
    {
        $query = $this->pdo->prepare("SELECT * FROM cmc_medecin WHERE medecinID = :id");
        $query->execute(['id' => $id]);
        $medecin = $query->fetch();
        if ($medecin === false) {
            throw new \Exception("Aucun medecin ne correspond à l'id $id");
        }
        return new MedecinMapping($medecin);
    }

    public function getAll() {
        $query = $this->pdo->prepare("SELECT * FROM cmc_medecin");
        $query->execute();
        $medecin = $query->fetchAll();
        $medecins=[];

        foreach ($medecin as $row) {
            $medecins[] = new MedecinMapping($row);
        }
        return $medecins;

    }

    public function addMedecin(MedecinMapping $medecin) {
        $query = $this->pdo->prepare("INSERT INTO cmc_medecin (Name, nickName, lang, info, imgMed) VALUES (:Name, :nickName, :lang, :info, :imgMed)");
        $query->execute([
            'Name' => $medecin->getName(),
            'nickName' => $medecin->getNickName(),
            'lang' => $medecin->getLang(),
            'info' => $medecin->getInfo(),
            'imgMed' => $medecin->getImgMed()
        ]);
        $medecin->setMedecinID($this->pdo->lastInsertId());
    }

    //public fnction updateMedecin avec bindValue et prepare
    public function updateMedecin(MedecinMapping $medecin) {
        $query = $this->pdo->prepare("UPDATE cmc_medecin SET name = ?Name, nickame = ?nickName, lang = ?lang, info = ?info, imgMed = ?imgMed WHERE cmc_medecin.medecinID = ?medecinID");
        $query->bindValue(':name', $medecin->getName(), PDO::PARAM_STR);
        $query->bindValue(':nickName', $medecin->getNickName(), PDO::PARAM_STR);
        $query->bindValue(':lang', $medecin->getLang(), PDO::PARAM_STR);
        $query->bindValue(':info', $medecin->getInfo(), PDO::PARAM_STR);
        $query->bindValue(':imgMed', $medecin->getImgMed(), PDO::PARAM_STR);
        $query->bindValue(':medecinID', $medecin->getMedecinID(), PDO::PARAM_INT);
        $query->execute();
    }

 

    public function deleteMedecin(MedecinMapping $medecin) {
        $query = $this->pdo->prepare("DELETE FROM cmc_medecin WHERE medecinID = :medecinID");
        $query->execute([
            'medecinID' => $medecin->getMedecinID()
        ]);
    }



    

};