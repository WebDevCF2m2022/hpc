<?php 

namespace model\ManagerModel;

use PDO;
use Exception;
use model\MappingModel\AdminMapping;
use model\InterfaceModel\ManagerInterface;

   
class AdminManager implements ManagerInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getOneById(int $id): AdminMapping
    {
        $query = $this->pdo->prepare("SELECT * FROM cmc_admin WHERE userID= :id");
        $query->execute(['id' => $id]);
        $adminID = $query->fetch();
        if ($adminID === false) {
            throw new \Exception("Aucun admin  ne correspond à l'id $id");
            
        }
        return new AdminMapping($adminID);
    }


    public function getAll()
    {
        $querry = $this->pdo->prepare("SELECT * FROM cmc_admin");
        $querry->execute();
        $admin = $querry->fetchAll();
        $admin = [];
        
        foreach ($admin as $row) {
            $admin[] = new AdminMapping($row);
        }
        return $admin;
    }



    public function insertUser(AdminManager $admin){

        $query = $this->pdo->prepare("INSERT INTO cmc_admin(user_login, user_pwd, user_mail, perm_user, user_uniqID) VALUES (:userID, :user_login, :user_pwd, :user_mail, :perm_user, :user_uniqID)");

        $query->execute([
            'user_login' => $admin->getUserLogin(),
            'user_pwd' => $admin->getUserPwd(),
            'user_mail' => $admin->getUserMail(),
            'perm_user' => $admin->getPermUser(),
            'user_uniqID' => $admin->getUserUniqID()
        ]);
    }

    public function updateAdmin(AdminManager $admin) {

        $query = $this->pdo->prepare("UPDATE cmc_admin SET userID = :userID, user_login = :user_login, user_pwd = :user_pwd, user_mail = :user_mail, perm_user = perm_user:, user_uniqID = :user_uniqID");

        $query->execute([
            'userID' => $admin->getUserID(),
            'user_login' => $admin->getUserLogin(),
            'user_pwd' => $admin->getUserPwd(),
            'user_mail' => $admin->getUserMail(),
            'perm_user' => $admin->getPermUser(),
            'user_uniqID' => $admin->getUserUniqID()
        ]);
    }


    public function deleteAdmin(AdminMapping $adminMapping){
        $querry = $this->pdo->prepare("DELETE FROM cmc_admin WHERE userID = :userID");
        
        $query->execute([
            'user_ID' => $admin->getUserID();
        ]);
    }

}

