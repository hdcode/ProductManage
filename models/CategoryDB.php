<?php

    require_once "Database.php";

    class CategoryDB{

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function create($libelle, $description)
        {
            $sql = "INSERT INTO category SET libelle=?, description=?";
            $datas = array($libelle, $description);
            $this->db->prepareReq($sql, $datas);
        }

        public function readAll()
        {
            $sql= "SELECT * FROM category ORDER BY id DESC";
            $req = $this->db->prepareReq($sql);
            $datas = $this->db->recover($req);
            return $datas;
        }

        public function update($id, $libelle, $description) {
            $sql= 'UPDATE category SET libelle= ?, description= ? WHERE id= ?';
            $datas= array($libelle, $description, $id);
            $this->db->prepareReq($sql, $datas);
        }

        public function delete($id) {
            $sql= 'DELETE FROM category WHERE id= ?';
            $datas= array($id);
            $this->db->prepareReq($sql, $datas);
        }

        public function read($id) {
            $sql= 'SELECT * FROM category WHERE id= ?';
            $datas= array($id);
            $req= $this->db->prepareReq($sql, $datas);
            $data= $this->db->recover($req, true);
            return $data;
        }


    }







?>