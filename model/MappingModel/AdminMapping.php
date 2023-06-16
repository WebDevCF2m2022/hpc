<?php
namespace model\MappingModel;
use model\AbstractModel\MappingAbstract;
use Exception;

class AdminMapping extends MappingAbstract{
    protected int $userID;
    protected string $user_login;
    protected string $user_pwd;
    protected string $user_mail;
    protected int $perm_user;
    protected string $user_uniqID;


// getters

public function getUserID(): int
{
    return $this->userID;
}

public function getUserLogin(): string
{
    return $this->user_login;
}

public function getUserPwd(): string
{
    return $this->user_pwd;
}

public function getUserMail(): string
{
    return $this->user_mail;
}

public function getPermUser(): int
{
    return $this->perm_user;
}
public function getUserUniqID(): string
{
    return $this->user_uniqID;
}


// Setters

public function setUserID(int $userID): void
{
 
    $this->userID = (int) $userID;

}

public function setUserLogin(string $user_login): void
{
    if(strlen($user_login) > 30){
        throw new Exception("Le login ne peut pas dépasser 30 caractères");
    }else {
    $user_login =strip_tags($user_login);
    $user_login =trim($user_login);
    $this->user_login = $user_login;
    }
}

public function setUserPwd(string $user_pwd): void
{
    if(strlen($user_pwd) > 250){
        throw new Exception("Le mot de passe est trop long");
    }else {
    $user_pwd =strip_tags($user_pwd);
    $user_pwd =trim($user_pwd);
    $this->user_pwd = $user_pwd;
    }
}

public function setUserMail(string $user_mail): void
{
    if(strlen($user_mail) > 250){
        throw new Exception("Le mail est trop long");
    }else {
    $user_mail =strip_tags($user_mail);
    $user_mail =trim($user_mail);
    $this->user_mail = $user_mail;
    }
}

public function setPermUser(int $perm_user): void
{
 
    $this->perm_user = (int) $perm_user;

}

public function setUserUniqID(string $user_uniqID): void
{
    if(strlen($user_uniqID) > 250){
        throw new Exception("un erreur est survenue");
    }else {
    $user_uniqID =strip_tags($user_uniqID);
    $user_uniqID =trim($user_uniqID);
    $this->user_uniqID = $user_uniqID;
    }
}


}






