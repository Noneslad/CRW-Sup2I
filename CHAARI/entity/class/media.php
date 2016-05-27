<?php

namespace Noneslad\Entity;

use Noneslad\Tools\DB\model as DB;
use Noneslad\Tools\WebTools as WT;

class Media extends DB
{
    private $id;
    private $nom;
    private $alt;
    private $url;
    private $dossier;
    private $user;
    private $product;
    private $page;

    /**
     * Media constructor.
     * @param $id
     */
    public function __construct($id = false)
    {
        parent::__construct();
        if($id !== false){
            $this->id = $id;
            $this->load();
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
     * @param boolean $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * @return mixed
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * @param mixed $dossier
     */
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;
    }

    public function upload($file){
        $uploads_dir = 'assets/contents/upload';
        var_dump($file);
        return move_uploaded_file($file['tmp_name'],$uploads_dir."/".$this->getNom());
    }




}