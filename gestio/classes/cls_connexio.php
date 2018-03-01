<?php
class connexio{
    var $host;
    var $db;
    var $user;
    var $passwd;
    var $conn;
    
    function connexio ($ruta="../../"){
        $this->host="localhosr";
        $this->db="pt3";
        $this->user="elatfi";
        $this->passwd="root";
        
    }
    function DB_Open(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->passwd);
        if($this->conn){
            if (!mysqli_select_db($this->conn, $this->db)){
                $status = mysqli_error();
            }
            
        else{
            $status=0;
        }
            
    }else{
        $status = mysqli_error();
    }
    return ($status);
    }
    
    function DB_Close(){
        if (mysqli_close($this->conn)){
            $status=1;
            
        }else {
            $status=0;
        }
            return ($status);
       
    }
    
    
    function DB_Select($strSelect){
         $this->DB_Open();
         $result = mysqli_query($this->conn,$strSelect);
         if($result) {
             if (mysqli_num_rows($result) > 0){
             return($result);
             
         }else{
         return (0);
         }
             
         }else{
             $result = mysqli_error();
         }
         $this->DB_Close();
    }
    
    function DB_Execute($strSelect){
        $this->DB_Open();
        $result = mysqli_query($this->conn,$strSelect);
        $this->DB_Close();
        
    }
    
    function DB_Fetch($resultat){
        if ($resultat){
             if (mysqli_num_rows($result) > 0){
             return(mysqli_fetch_array($result));
             }else {
                 return false;
             }

        }else {
            return false;
        }
    }
    
}


?>