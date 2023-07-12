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

 

    function add(MedecinMapping $medecin) {
        $retour = $this->pdo->prepare('INSERT INTO cmc_medecin (name,`nickname`,`lang`,`info`,imgMed) VALUES (?, ?, ?, ?, ?)');
        try{
            $retour->execute([
                $medecin->getName(),
                $medecin->getNickname(),
                $medecin->getLang(),
                $medecin->getInfo(),
                $medecin->getImgMed()
            ]);
        }catch(Exception $e){
            die($e->getMessage());
        }
        return $medecin->setMedecinID($this->pdo->lastInsertId());
    }



    public function update(MedecinMapping $medecin,int $id) {
        $sql = "UPDATE `cmc_medecin` SET `name`= :name, `nickname`= :nickname, `lang`= :lang, `info`= :info,`imgMed`= :imgMed 
                WHERE `medecinID`= :medecinID";
        $prepare = $this->pdo->prepare($sql);

        $prepare->bindValue(':name', $medecin->getName(), PDO::PARAM_STR);
        $prepare->bindValue(':nickname', $medecin->getNickname(), PDO::PARAM_STR);
        $prepare->bindValue(':lang', $medecin->getLang(), PDO::PARAM_STR);
        $prepare->bindValue(':info', $medecin->getInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':imgMed', $medecin->getImgMed(), PDO::PARAM_STR);
        $prepare->bindValue(':medecinID', $id, PDO::PARAM_INT);


        $prepare->execute();

        try{
            $this->pdo->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }

    }




    public function delete($medecinID) {
        $sql = "DELETE FROM cmc_medecin WHERE medecinId = :medecinId";
        $prepare = $this -> pdo -> prepare($sql);
        $prepare->bindParam(':medecinId', $medecinID, PDO::PARAM_INT);

        try{
            $prepare -> execute();
            return true;
        }catch(Exception $e){
            $e->getMessage();
        }
    }



    

};