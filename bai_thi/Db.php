<?php
class DB
{
    protected $connect = null;
    function __construct()
    {
        $this->connect = mysqli_connect('localhost', 'root', '', 'phpbkap');
        if(!$this->connect){
            $this->connect = null;
        }
    }
}
