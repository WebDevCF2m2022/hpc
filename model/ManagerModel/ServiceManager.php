<?php
namespace model\ManagerModel;
use model\AbstractModel\MappingAbstract;
use model\InterfaceModel\ManagerInterface;
use PDO;
use Exception;

class ServiceManager implements ManagerInterface
{

    private $connect;



public function __construct(PDO $connection)

{
$this->connect = $connection;
}

public function getOneById(int $id): int 
     {
        $prepare = $this->connect->prepare("SELECT * FROM `cmc_service` WHERE `serviceID` = :id");
        $prepare->bindValue(":id", $id, PDO::PARAM_INT);
        try {
            $prepare->execute();
            $result = $prepare->fetch();
            return new ServiceMapping($result);
        } catch (Exception $e) {
            echo "Erreur de requête : " . $e->getMessage();
            exit;
        }
    
    }

    public function getAll(): ?array
    {
        $prepare = $this->connect->prepare("SELECT * FROM cmc_service");
        try {
            $prepare->execute();
            $result = $prepare->fetchAll();
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