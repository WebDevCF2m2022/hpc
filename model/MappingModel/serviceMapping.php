<?php

namespace model\MappingModel;
use moel\AbstractModel\MappingAbstract;
use Exception;
class serviceMapping extends MappingAbstract
{

    protected int $serviceId;
    protected string $soins;
    protected string $info_soins;
    protected string $imgSoins;
    
    //getters
    public function getserviceId(): int
    {
        return $this->serviceId;
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

    public function setserviceId(int $serviceId): void
    {
        $this->serviceId = $serviceID;
    }

    public function setsoins(string $soins): void
    {
        if(strlen($soins) > 50){
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