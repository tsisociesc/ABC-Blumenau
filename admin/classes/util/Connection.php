<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 04/06/2018
 * Time: 19:54
 */

class Connection
{
    CONST bd_host = "localhost";
    CONST bd_base = "bombeiro";
    CONST bd_user = "root";
    CONST bd_pass = "";

    private $conn;

    /**
     * Connection constructor.
     * @return Connection
     */
    public function __construct()
    {
        $this->conn = new mysqli(self::bd_host, self::bd_user, self::bd_pass, self::bd_base);

        if ($this->conn->connect_error) {
            new Exception($this->conn->connect_error);
        }

        return $this;
    }

    public function executeQuery($sql) {
        $columns = array();

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $columns[] = $row;
            }
        }

        $this->conn->close();

        return $columns;
    }

    public function execute($sql) {
        if ($this->conn->query($sql) === true) {
            $this->conn->close();
            return true;
        } else {
            new Exception($this->conn->error);
        }
    }
}