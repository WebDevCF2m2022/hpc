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
    if($service === false) {
        throw new \Exception("Aucun service ne correspond à l'id $id");
    }
    return new ServiceMapping($service);
}
    
public function getAll() {

        $query = $this->connect->prepare("SELECT * FROM cmc_service");
            $query->execute();
            $service = $query->fetchAll();
            $service = [];

            foreach ($service as $row) {
                $service[] = new ServiceMapping($row);
            }
            return $service;
       
    }
// te la !!!!!!!!!!!!!!!!!
    public function addService(ServiceMapping $service) {
        $query=$this->pdo->prepare("");
        $query->execute([

        ]);
        $service->setserviceID($this->pdo->lastInsertID());
    }

    }
