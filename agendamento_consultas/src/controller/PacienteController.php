<?php
class ConnectionDB
{
    private static $instancia;

    public static function getConexao()
    {
        if (!isset(self::$instancia)) {

            $host = 'localhost';
            $dbname =  'agendamento_consultas';
            $username = 'root';
            $password = '';
            $port = 3306;

            try {
                self::$instancia = new PDO(
                    "mysql:host=$host;port=$port;dbname=$dbname",
                    $username,
                    $password
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
                die('Erro na conexão: ' . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}