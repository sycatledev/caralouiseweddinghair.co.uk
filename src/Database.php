<?php
namespace AppCore;

class Database {
    private static $instance;
    private \PDO $database;

    public function __construct()
    {
        self::$instance = $this;
    }

    public static function getInstance() : Database
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function connectDatabase() : \PDO | Boolean
    {
        try {
            // Création de l'instance PDO de la base de données.
            $this->database = new \PDO("mysql:host=" . Main::getInstance()->getConfig()->database->host . ";dbname=" . Main::getInstance()->getConfig()->database->name . ";charset=utf8", Main::getInstance()->getConfig()->database->user, Main::getInstance()->getConfig()->database->password);
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Débuguer la connexion à la base de données
            // var_dump($this->database); 

            // Retourne l'objet PDO de la base de données en cas de succès
            return $this->database;
        } catch(\PDOException $error) {
            echo("Erreur lors de la connexion à la bdd.");
            return false;

            // En cas d'erreur de connection à la base de données
            // die("Erreur lors de la connexion à la base de données: " . $error->getMessage());
        }
    }

}