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

 

    function addInstrument(MedecinMapping $medecin) {
        $retour = $this->pdo->prepare('INSERT INTO cmc_medecin (name,`nickName`,`lang`,`info`,imgMed) VALUES (?, ?, ?, ?, ?, ?)');
        try{
            $retour->execute([
                'Name' => $medecin->getName(),
                'nickName' => $medecin->getNickName(),
                'lang' => $medecin->getLang(),
                'info' => $medecin->getInfo(),
                'imgMed' => $medecin->getImgMed()
            ]);
        }catch(Exception $e){
            die($e->getMessage());
        }
        return $medecin->setMedecinID($this->pdo->lastInsertId());
    }

  

    //Create function public updateMedecin avec bindParam et prepare et un try catch
    public function updateMedecin(MedecinMapping $medecin) {
        $query = $this->pdo->prepare("UPDATE cmc_medecin SET name = :name, nickame = :nickName, lang = :lang, info = :info, imgMed = :imgMed WHERE medecinID = ?");
        $query->bindParam(':name', $medecin->getName(), PDO::PARAM_STR);
        $query->bindParam(':nickName', $medecin->getNickName(), PDO::PARAM_STR);
        $query->bindParam(':lang', $medecin->getLang(), PDO::PARAM_STR);
        $query->bindParam(':info', $medecin->getInfo(), PDO::PARAM_STR);
        $query->bindParam(':imgMed', $medecin->getImgMed(), PDO::PARAM_STR);
        $query->bindParam(':medecinID', $medecin->getMedecinID(), PDO::PARAM_INT);
        try {
            $query->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

 

    public function deleteMedecin(MedecinMapping $medecin) {
        $query = $this->pdo->prepare("DELETE FROM cmc_medecin WHERE medecinID = :medecinID");
        $query->execute([
            'medecinID' => $medecin->getMedecinID()
        ]);
    }



    

};