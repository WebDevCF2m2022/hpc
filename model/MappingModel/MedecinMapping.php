<?php
namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use Exception;
class MedecinMapping extends  MappingAbstract{


    protected int $medecinID;

    protected string $name;

    protected string $nickname;

    protected string $lang;

    protected string $info;

    protected string $imgMed;
    //getters
    public function getMedecinID(): int
    {
        return $this->medecinID;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getNickname(): string
    {
        return $this->nickname;
    }
    public function getLang(): string
    {
        return $this->lang;
    }
    public function getInfo(): string
    {
        return $this->info;
    }
    public function getImgMed(): string
    {
        return $this->imgMed;
    }


    //setters
    public function setMedecinID(int $medecinID): void
    {
        $medecinID =strip_tags($medecinID);
        $medecinID =trim($medecinID);
        $this->medecinID = $medecinID;
    }
    public function setName(string $name): void
    {

        if(strlen($name) > 50){


            throw new Exception("Le nom du médecin ne peut pas dépasser 50 caractères");
        }else {
            $name = strip_tags($name);
            $name = trim($name);
            $this->name = $name;
        }
    }
    public function setNickname(string $nickname): void
    {

        if(strlen($nickname) > 50){

        if(strlen($nickname) > 50) { 

            throw new Exception("Le surnom du médecin ne peut pas dépasser 50 caractères");
        }else {
            $nickname = strip_tags($nickname);
            $nickname = trim($nickname);
            $this->nickname = $nickname;
        }
    }}
    public function setLang(string $lang): void
    {
        if(strlen($lang) > 50){
            throw new Exception("La langue du médecin ne peut pas dépasser 50 caractères");
        }else {
            $lang = strip_tags($lang);
            $lang = trim($lang);
            $this->lang = $lang;
        }
    }
    public function setInfo(string $info): void
    {

        $this->info = $info;
    }

    public function setImgMed(string $imgMed): void
    {
            $imgMed = strip_tags($imgMed);
            $imgMed = trim($imgMed);
            $this->imgMed = $imgMed;
        }
    

}
