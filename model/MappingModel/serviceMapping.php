<?php

namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use model\InterfaceModel\ManagerInterface;
use Exception;


class ServiceMapping extends MappingAbstract
{

    protected int $serviceID;
    protected string $soins;
    protected string $info_soins;
    protected string $imgSoins;
    
    //getters
    public function getServiceID(): int
    {
        return $this->serviceID;
    }

    public function getSoins(): string
    {
        return $this->soins;

    }

    public function getInfo_soins(): string
    {
        return $this->info_soins;
    }
    public function getImgSoins(): string
    {
        return $this->imgSoins;
    }

    //setters

    public function setServiceID(int $serviceID): void
    {   $serviceID =strip_tags($serviceID);
        $serviceID =trim($serviceID);
        $this->serviceID = $serviceID;
    }

    public function setSoins(string $soins): void
    {
        if(strlen($soins) >=  50){
            throw new Exception("Vous avez dépassé la limite de caractère !");
        }else {
            $soins = strip_tags($soins);
            $soins = trim($soins);
            $this->soins = $soins;
        }
        
    }

    public function setInfo_soins(string $info_soins): void
    {
        $this->info_soins = $info_soins;
    }

    public function setImgSoins(string $imgSoins): void
    {
        $this->imgSoins = $imgSoins;

    }

}