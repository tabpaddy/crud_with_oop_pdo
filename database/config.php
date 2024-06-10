<?php

    class Config{

        private $DBHOST ='localhost';
        private $DBUSER ='root';
        private $DBPASS ='';
        private $DBNAME ='crud_pdo';

        private $dbh;
        private $stmt;
        private $error;

        public function __construct() {
            // set dsn
            $dsn = 'mysql:host='.$this->DBHOST.';dbname='.$this->DBNAME;
            $options = [
                PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            // create pdo instance
            try {
                $this->dbh = new PDO($dsn, $this->DBUSER, $this->DBPASS, $options);
            } catch (PDOException $e) {
                //throw $th;
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // bind values to prepared statement using named parameters
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch (true) {
                    case is_int($value):
                        # code...
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        # code...
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        # code...
                        $type = PDO::PARAM_NULL;
                        break;
                    
                    default:
                        # code...
                        $type = PDO::PARAM_STR;
                        
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        // execute the prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

         // return multiple records
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll();
        }

        // return single records
        public function single(){
            $this->execute();
            return $this->stmt->fetch();
        }

        // get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }

   
