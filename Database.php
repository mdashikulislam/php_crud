<?php
 include 'config.php';

class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->ConnectDB();
    }


    /**
     * @return bool
     */
    private function ConnectDB()
    {
        $this->link = new mysqli( $this->host, $this->user, $this->pass, $this->dbname );
        if (!$this->link) {
            $this->error = 'Connection Failed'.$this->link->connect_error.__LINE__;
            return false;
        }

        //return $this->link;
    }

    /**
     * @param $sql
     * @return bool
     */
    public function Select($sql){
        $result = $this->link->query($sql) or die($this->link->error.__LINE__);
        if ($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    /**
     * @param $sql
     */
    public function  Insert($sql){
        $result = $this->link->query($sql) or die($this->link->error.__LINE__);
        if ($result){
            header('Location: index.php?msg='.urldecode("Data Insert Successfully...!!"));
            exit();
        }else{
            die('Data not insert....');
        }
    }

    /**
     * @param $sql
     */
    public function Update($sql){
        $result = $this->link->query($sql) or die($this->link->error.__LINE__);
        if ($result){
            header('Location: index.php?msg='.urldecode("Data Update Successfully...!!"));
            exit();
        }else{
            die('Data not Update....');
        }
    }

    /**
     * @param $sql
     */
    public function Delete($sql){
        $result = $this->link->query($sql) or die($this->link->error.__LINE__);
        if ($result){
            header('Location: index.php?msg='.urldecode("Data Delete Successfully...!!"));
            exit();
        }else{
            die('Data not Delete....');
        }
    }

}



?>