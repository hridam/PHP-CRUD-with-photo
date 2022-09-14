<?php
namespace model;

class Databases
{
    private $HOST="localhost";
    private $USERNAME="root";
    private $PASSOWRD="";
    public $connection;
    // create contructer for connecting to database;
    public function getConnection()
    {
        return $connection;
    }
}
