<?php
namespace model\ManagerModel;

use model\MappingModel\serviceMapping;
use model\InterfaceModel\ManagerInterface;
use PDO;
use Exception;

class ServiceManager implements ManagerInterface
{

private PDO $pdo;

public function __construct(PDO $pdo)
{
    $this->pdo = $pdo;
}

public function getOneById(int $id): ServiceMapping

     {
        $query = $this->pdo->prepare("SELECT * FROM `cmc_service` WHERE `serviceID` = :id");
        $query->execute(['id' => $id]);
        $service = $query->fetch();
        if($service === false) {}
        //t es la 
        throw new \Exception("Aucun service ne coreespond à l'id $id
        ")
      /*  try {
            $query->execute();
            
            return new ServiceMapping($result);
        } catch (Exception $e) {
            echo "Erreur de requête : " . $e->getMessage();
            exit;
        }
    
    }*/

    public function getAll(): ?array
    {
        $query = $this->connect->prepare("SELECT * FROM cmc_service");
        try {
            $query->execute();
            $result = $query->fetchAll();
            $all = [];
            foreach ($result as $row) {
                $all[] = new ServiceMapping($row);
            }
            return $all;
        } catch (Exception $e) {
            echo "Erreur de requête : " . $e->getMessage();
            exit;
        }
    }

}