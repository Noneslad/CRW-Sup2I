<?php

namespace Noneslad\Entity;

use Noneslad\Tools\DB\model as DB;
use Noneslad\Tools\WebTools;

class User extends DB
{

    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;


    /**
     * PageWeb constructor.
     * @param $id
     */
    public function __construct($id = false)
    {

        parent::__construct();
        if($id !== false){
            $this->id = $id;
            $this->load();
            $this->sujet = new Sujet($this->id_sujet);
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {

        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    //Singleton
    public function getSujet()
    {
        if($this->sujet != null){
            $this->sujet = new Sujet($this->id_sujet);
        }
        return $this->sujet;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function connectUser() {

        $this->load();
        $_SESSION['login'] = $this->getId();

    }

    public static function disconnectUser() {
        unset($_SESSION['login']);
    }

    public static function isAnyConnected() {
        return WebTools::fromSession('login');
    }


    /* Permet de recuperer un User sur un autre page du site */
    public static function giveMeUser() {

        $user = new User(WebTools::fromSession('login'));
        return $user;

    }

    public function hydrayeByStdObject($stdObject) {

        $this->id = $stdObject->id;
        $this->nom = $stdObject->nom;
        $this->prenom = $stdObject->prenom;
        $this->email = $stdObject->email;
        $this->password = $stdObject->password;

        return $this;

    }

    public function getUserByEmail() {

        $stdObject = $this->findOneBy(array("email" => $this->email));

        if (is_object($stdObject)) {
            $this->hydrayeByStdObject($stdObject);
        }

        return $this;

    }


    public function validatePassword($passwordForm) {

        return $passwordForm == $this->password;
    }

    public static function EmailExiste($email) {

        $sql = "select * from user where email = '".$email."'";
        $resultat =  DB::get_sql_object($sql)->id;
        return $resultat == null ? false : true;
    }




}