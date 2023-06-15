<?php
namespace model\ManagerModel;

use model\MappingModel\ServiceMapping;
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

        $query = $this->pdo->prepare("SELECT * FROM cmc_service");
            $query->execute();
            $service = $query->fetchAll();
            $service = [];

            foreach ($service as $row) {
                $service[] = new ServiceMapping($row);
            }
            return $service;
       
    }
    
    public function addService(ServiceMapping $service) {
        $query=$this->pdo->prepare("INSERT INTO `cmc_service` (`serviceID`, `soins`, `info_soins`, `imgSoins`) VALUES (:Name, :soins, :info_soins, :imgSoins )");
        $query->execute([
            'soins' => $service->getSoins(),
            'info_soins' => $service->getInfo_soins(),
            'imgSoins' => $service->getImgsoins()

        ]);
        $service->setserviceID($this->pdo->lastInsertID());
    }

    public function updateService(ServiceMapping $service) {
        $query=$this->pdo->prepare("UPDATE `cmc_service` (`serviceID`, `soins`, `info_soins`, `imgSoins`) VALUES (:Name, :soins, :info_soins, :imgSoins )");
        $query->execute([
            'soins' => $service->getSoins(),
            'info_soins' => $service->getInfo_soins(),
            'imgSoins' => $service->getImgsoins()

        ]);
        
    }

    public function deleteService(ServiceMapping $service) {
        $query=$this->pdo->prepare("DELETE FROM cmc_service WHERE serviceID = :serviceID");
        $query->execute([
           'serviceID' => $service->getServiceID()

        ]);
        
    }

    };
