<?php

namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use Exception;
class serviceMapping extends MappingAbstract
{

    protected int $serviceID;
    protected string $soins;
    protected string $info_soins;
    protected string $imgSoins;
    
    //getters
    public function getserviceID(): int
    {
        return $this->serviceID;
    }

    public function getsoins(): string
    {
        return $this->soins;

    }

    public function getinfo_soins(): string
    {
        return $this->info_soins;
    }
    public function getimgSoins(): string
    {
        return $this->imgSoins;
    }

    //setters

    public function setserviceID(int $serviceID): void
    {
        $this->serviceID = $serviceID;
    }

    public function setsoins(string $soins): void
    {
        if(strlen($soins) >=  50){
            throw new Exception("Vous avez dépassé la limite de caractère !");
        }else {
            $soins = strip_tags($soins);
            $soins = trim($soins);
            $this->soins = $soins;
        }
        
    }

    public function setinfo_soins(string $info_soins): void
    {
        $this->info_soins = $info_soins;
    }

    public function setimgSoins(string $imgSoins): void
    {
        $this->imgSoins = $imgSoins;

    }

}