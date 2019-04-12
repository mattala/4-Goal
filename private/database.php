<?php
    //Require once for now...
    require_once('db_credentials');
    //PDO CRUD
    class Database extends PDO
    {
        //Initialize any object with DB connection
        public function __construct(){
            //Connection string DSN
            parent::__construct(DB_TYPE.':host='. DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        }
        
        public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
        {
            $sth = $this->prepare($sql);
            if($fetchMode !== PDO::FETCH_NUM){
                foreach ($array as $key => $value) {
                    $sth->bindValue("$key", $value);
                }
            }
            
            if(!$sth->execute()){
                $this->handleError();
                }
            else{
            return $sth->fetchAll($fetchMode);
            }
        }
        //Custom sql statements
        public function sql_exe($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
        {
            $sth = $this->prepare($sql);
            $sth->execute();
            return $sth->fetchAll();
        }
        
        public function insert($table, $data)
        {
            ksort($data);
            
            $fieldNames = implode('`, `', array_keys($data));
            $fieldValues = ':' . implode(', :', array_keys($data));
            $sql = "INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)";
            $sth = $this->prepare($sql);
            
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            } 
            if(!$sth->execute()){
                $this->handleError();
                //print_r($sth->errorInfo());
            }
            else {
                
            }
        }
        
        public function update($table, $data, $where)
        {
            ksort($data);
            
            $fieldDetails = NULL;
            foreach($data as $key=> $value) {
                $fieldDetails .= "`$key`=:$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');
            
            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
            
            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            
            $sth->execute();
        }
        
        public function delete($table, $where, $limit = 1)
        {
            return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        }
        
        /* count rows*/
        public function rowsCount($table){
                $sth = $this->prepare("SELECT * FROM ".$table);
                $sth->execute();
                return $sth -> rowCount(); 
            }
        public function q($sql){
            $sth = $this->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_NUM);
        }
        
        /* error check */
        private function handleError()
        {
            if ($this->errorCode() != '00000')
            {
                if ($this->_errorLog == true)
                //Log::write($this->_errorLog, "Error: " . implode(',', $this->errorInfo()));
                echo json_encode($this->errorInfo());
                throw new Exception("Error: " . implode(',', $this->errorInfo()));
            }
        }
        
    }