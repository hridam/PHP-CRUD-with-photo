<?php
namespace model;
// use models\Database;
class Model 
{
    
    public $table;
    public $query;
    public  static function table($table)
    {
        $this->table=$table;
        return $this;
    }
    public static function select(...$columns)
    {
      $this->query="select";
        foreach ($columns as $col) {
            $$this->query.=$columns;
        }
        $this->query.="FROM $this->table";
        return $this;
    }

    public static function get()
    {
        // called the query and exteute 
        return $this->query;
    }
}
Model::table('user')
        ->select('*')
        ->get();