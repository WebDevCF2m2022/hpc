<?php

namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use Exception;
class FaqMapping extends MappingAbstract
{

    protected int $faqID;
    protected string $faqTitle;
    protected string $faqText;

    // getters
    public function getFaqID(): int
    {
        return $this->faqID;
    }

    public function getFaqTitle(): string
    {
        return $this->faqTitle;
    }

    public function getFaqText(): string
    {
        return $this->faqText;
    }

    // setters

    public function setFaqID(int $faqID): void
    {
        $this->faqID = $faqID;
    }

    public function setFaqTitle(string $faqTitle): void
    {
        if(strlen($faqTitle) > 120){
            throw new Exception("Le titre de la FAQ ne peut pas dépasser 120 caractères");
        }else {
            $faqTitle = strip_tags($faqTitle);
            $faqTitle = trim($faqTitle);
            $this->faqTitle = $faqTitle;
        }
        
    }

    public function setFaqText(string $faqText): void
    {
        if(strlen($faqText) <10){
            throw new Exception("Le texte de la FAQ ne peut pas être plus petit que 10 caractères");
        }else {
            $faqText = strip_tags($faqText);
            $faqText = trim($faqText);
            $this->faqText = $faqText;
        }
    }

}