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

public function getOneById(int $id): serviceMapping

{
    $query = $this->pdo->prepare("SELECT * FROM `cmc_service` WHERE `serviceID` = :id");
    $query->execute(['id' => $id]);
    $service = $query->fetch();
    if($service === false) {
        throw new \Exception("Aucun service ne correspond à l'id $id");
    }
    return new serviceMapping($service);
}
    
public function getAll() {

        $query = $this->pdo->prepare("SELECT * FROM cmc_service");
            $query->execute();
            $service = $query->fetchAll();
            $services = [];

            foreach ($service as $row) {
                $services[] = new serviceMapping($row);
            }
            return $services;
       
    }
    
    public function addService(serviceMapping $service) {
        $query=$this->pdo->prepare('INSERT INTO cmc_service ( serviceID, soins, info_soins,imgSoins) value(?,?,?,?)');
        try{
        $query->execute([
             $service->getSoins(),
             $service->getInfo_soins(),
             $service->getImgsoins(),
             $service->getServiceID(),

        ]);}catch(Exception $e){
            die($e->getMessage());
        }
        return $service->setServiceID($this->pdo->lastInsertID());
    }


    public function updateService(serviceMapping $service) {
        $query = $this->pdo->prepare("UPDATE cmc_service SET serviceID=:serviceID, soins = :soins, info_soins = :info_soins, imgSoins = :imgSoins WHERE serviceID = :serviceID");
        
        
        $query->execute([
            'soins' => $service->getSoins(),
            'info_soins' => $service->getInfo_soins(),
            'imgSoins' => $service->getImgsoins(),
            'serviceID' => $service->GetServiceID(),
            'serviceID' => $service->getServiceID()
 
        ]);
        
    }

    public function deleteService(serviceMapping $service) {
        $query=$this->pdo->prepare("DELETE FROM cmc_service WHERE serviceID = :serviceID");
        $query->execute([
           'serviceID' => $service->getServiceID()

        ]);
        
    }

    };
