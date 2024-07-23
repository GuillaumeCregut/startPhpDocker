<?php

namespace App;

class GetEnvVars
{
    public static function getDbUser(): string
    {
        return getenv('DB_USER') ? getenv('DB_USER') : 'userDB';
    }
    public static function getDbName(): string
    {
        return getenv('DB_NAME') ? getenv('DB_NAME') : 'dbName';
    }

    public static function getDbPassword(): string
    {
        return getenv('DB_PASS') ? getenv('DB_PASS') : 'passDB';
    }

    public static function getDbHost(): string
    {
        return getenv('DB_HOST') ? getenv('DB_HOST') : 'db';
    }
}
