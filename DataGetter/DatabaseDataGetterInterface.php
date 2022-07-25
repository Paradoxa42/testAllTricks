<?php

namespace DataGetter;

interface DatabaseDataGetterInterface
{
    public function getData(string $host, string $user, string $password, string $databaseName): array;
}