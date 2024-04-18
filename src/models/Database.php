<?php

declare(strict_types=1);

namespace App\Guild;

class Database
{
  private static ?Database $instance = null;

  public function __construct(private ?\PDO $connexion = null)
  {
    $this->connexion = new \PDO('mysql:host=mysql-srv;dbname=guild_db', 'steven', 'stevenaurelemallo');
  }

  public static function getInstance(): Database
  {
    /**
     * Singleton pattern to ensure both a single instance and a global point-access.
     */
    if (self::$instance == null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnexion(): \PDO
  {
    return $this->connexion;
  }
}
