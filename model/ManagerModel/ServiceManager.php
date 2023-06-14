<?php
namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use PDO;
use Exception;



//public function getserviceID(int $id): ?serviceMapping
    {
        $prepare = $this->connect->prepare("SELECT * FROM test WHERE `idTest` = :id");
        $prepare->bindValue(":id", $id, PDO::PARAM_INT);
        try {
            $prepare->execute();
            $result = $prepare->fetch();
            return new TestMapping($result);
        } catch (Exception $e) {
            echo "Erreur de requête : " . $e->getMessage();
            exit;
        }
    }