<?php 

class Connessione{
    const HOST="localhost";
    const USERNAME="root";
    const PASSWORD="";
    const NOME_DATABASE="tec_progetto";

    public $conn=null;

    //apre la connessione restituendo true se é andata a buon fine altrimenti false
    public function apriConnessione(){
        $this->conn = new mysqli(Connessione::HOST,Connessione::USERNAME,Connessione::PASSWORD,Connessione::NOME_DATABASE);
        if(!$this->conn->connect_errno)
            return true;
        else
            return false;
    }

    public function eseguiQuery($query){
        $this->conn->query($query);
        $rows=$this->conn->affected_rows;
        if($rows>0)
            return true;
        else{
            echo $this->conn->error;
            return false;
        }

    }     

    public function chiudiConnessione(){
        if($this->conn)
         return mysqli_close($this->conn);
    }
    
    public function interrogaDB($stringaQuery){
        $risultatoQuery=$this->conn->query($stringaQuery);
        $ris=array();
        if($risultatoQuery && ($risultatoQuery->num_rows>0)){
            while($row=$risultatoQuery->fetch_array(MYSQLI_ASSOC)){
                array_push($ris,$row);
            }
            $risultatoQuery->close();
            return $ris;
        }
        else
            return false;
    }
    

}
?>      