<?php
/**
 * ========================================================
 * 🧩 Clase Database (Patrón Singleton)
 
┌────────────────────────────┐
│        Database            │
│────────────────────────────│
│ - conexion : ?PDO          │
│────────────────────────────│
│ + getConnection() : PDO    │
│ + close() : void           │
└──────────────┬─────────────┘
               │
               ▼
          ÚNICA INSTANCIA
 * ========================================================
 */

declare(strict_types=1);
require_once __DIR__ . '/../config.php';


class Database {
    private static ?PDO $conexion = null;

    private function __construct() {}

    public static function getConnection(): PDO {
        if (self::$conexion === null) {
            $host = 'localhost';
            $db   = 'tienda_php';
            $port = '3307';
            $user = 'root';
            $pass = '123456';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$conexion = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                if (DEBUG) {
                    die("<pre style='color:red'>❌ Error al conectar con la base de datos:\n" . $e->getMessage() . "</pre>");
                } else {
                    die("Error interno del servidor.");
                }
            }
        }

        return self::$conexion;
    }

    public static function close(): void {
        self::$conexion = null;
    }
}
?>