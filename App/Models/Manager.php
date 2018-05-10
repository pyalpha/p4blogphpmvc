<?php

class Manager 
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=;dbname=blog,charset=utf8', 'root', '');
        return $db;
    }
}