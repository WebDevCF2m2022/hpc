<?php

namespace model\AbstractModel;

/*
 * Classe abstraite de tous les mappings de tables de ma DB
 */
abstract class MappingAbstract
{
        // constructeur commun
        public function __construct(array $tab){
            $this->hydrate($tab);
        }

        // hydratation (utiliser les setters des enfants pour remplir les attributs)
        public function hydrate(array $tab){
            foreach ($tab as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

}