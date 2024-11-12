<?php

class PdoGsb
{
    private static $hostname = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $database = 'tp_cyber';
    private static $monPdo;
    private static $monPdoGsb = null;

    private function __construct()
    {
        try {
            $dsn = 'mysql:host=' . self::$hostname . ';dbname=' . self::$database;
            self::$monPdo = new PDO($dsn, self::$username, self::$password);
            self::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$monPdo->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            die(); 
        }
    }

    public static function getPDOGsb()
    {
        if (self::$monPdoGsb === null) {
            self::$monPdoGsb = new PdoGsb();
        }
        return self::$monPdoGsb;
    }


    public function enregistrerClient($nom, $prenom, $email, $mdpHash) {
        $requetePrepare = self::$monPdo->prepare(
            'INSERT INTO clients (nom, prenom, mail, mdp) VALUES (:nom, :prenom, :email, :mdp)'
        );
        $requetePrepare->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':mdp', $mdpHash, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    public function login($email){
        $requetePrepare = self::$monPdo->prepare(
            'SELECT * FROM clients where mail = :email'
        );
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
        $resulat = $requetePrepare->fetch(PDO::FETCH_ASSOC);
        return $resulat;
    }

    public function updateUserProfile($id_client, $nom, $prenom, $email) {
        $requetePrepare = self::$monPdo->prepare(
            'UPDATE clients SET nom = :nom, prenom = :prenom, mail = :email WHERE id = :id_client'
        );
        $requetePrepare->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':id_client', $id_client, PDO::PARAM_INT); 
        $requetePrepare->execute();
    }

    public function emailExists($email, $id_client = null) {
        $requetePrepare = self::$monPdo->prepare(
            'SELECT COUNT(*) FROM clients WHERE mail = :email and mail >'
        );
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
    }

    
    public function getAllClients(){
        $requetePrepare = self::$monPdo->prepare(
            'SELECT * FROM clients'
        );
        $requetePrepare->execute();
        $resulat = $requetePrepare->fetchAll();
        return $resulat;
    }

}

?>