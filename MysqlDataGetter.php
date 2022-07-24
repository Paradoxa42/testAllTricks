<?php

class MysqlDataGetter
{
    public function getData(string $host, string $user, string $password, string $databaseName): array
    {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$databaseName, $user, $password);
        return $pdo->query('SELECT article.name, article.content, `source`.name AS source_name FROM `article` LEFT JOIN `source` ON article.source_id = `source`.id;')->fetchAll();
    }
}

