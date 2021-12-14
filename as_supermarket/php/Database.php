<?php

namespace classes;

use mysqli;

class Database
{
    public $con;
    public $res;
    public $err;
    public $suc;

    function __construct()
    {
        $this->conn();
    }
    public function conn()
    {
        $this->con = new mysqli(HOST, DBU, PASS, DBN);
        if ($this->con->connect_errno) {
            return $this->err = "Database could not be connected";
        } else {
            return $this->suc = "successs";
        }
    }

    public function runquery($query)
    {
        $run = $this->con->query($query);
        if ($run) {
            $this->err = $this->con->connect_error;
            return $run;
        } else {
            return false;
            return $this->con->error;
        }
    }
    public function realString(string $data)
    {
        return mysqli_real_escape_string($this->con, $data);
    }
    public function lastid()
    {
        return $this->con->insert_id;
    }
}
