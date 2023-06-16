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
            $services = [];

            foreach ($service as $row) {
                $services[] = new ServiceMapping($row);
            }
            return $services;
       
    }
    
    public function addService(ServiceMapping $service) {
        $query=$this->pdo->prepare("INSERT INTO cmc_service (Name, soins, info_soins,imgSoins) VALUES (:Name, :soins, :info_soins, :imgSoins)");
        $query->execute([
            'soins' => $service->getSoins(),
            'info_soins' => $service->getInfo_soins(),
            'imgSoins' => $service->getImgsoins()

        ]);
        $service->setServiceID($this->pdo->lastInsertID());
    }

    public function updateService(ServiceMapping $service) {
        $query = $this->pdo->prepare("UPDATE cmc_service SET Name = :Name, soins = :soins, info_soins = :info_soins, imgSoins = :imgSoins WHERE serviceID = :serviceID");
        
        
        $query->execute([
            'soins' => $service->getSoins(),
            'info_soins' => $service->getInfo_soins(),
            'imgSoins' => $service->getImgsoins(),
            'serviceID' => $service->GetServiceID()
 
        ]);
        
    }

    public function deleteService(ServiceMapping $service) {
        $query=$this->pdo->prepare("DELETE FROM cmc_service WHERE serviceID = :serviceID");
        $query->execute([
           'serviceID' => $service->getServiceID()

        ]);
        
    }

    };
