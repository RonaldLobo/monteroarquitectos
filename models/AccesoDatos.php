<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccesoDatos
 *
 * @author Kimberly
 */
class AccesoDatos {
    //put your code here
    private $conexion;
    
    function __construct() {
    }

    //Conexión a la BD
    function ConectarBD(){
        $host="localhost";
        $user="root";
        $password="";
        $db="arquitec";
        $this->conexion = new mysqli($host, $user, $password, $db);
        if ($this->conexion->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
      }

   function DesconectarBD(){    
       // Cerrar la conexión
       mysqli_close($this->conexion)or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   }
   
   
    public function ObtenerDatos($query){
        $this->ConectarBD();
        $result = mysqli_query($this->conexion,$query) or die('No se pudo seleccionar la base de datos' . mysql_error());
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        $this->DesconectarBD();
         return $emparray;
        }

    function Insert($query){
        $this->ConectarBD();
         mysql_query("BEGIN");
        if(!mysql_query($query,$this->conexion))
        {
             mysql_query("ROLLBACK");
            die('Error : ' . mysql_error());
        }  
        mysql_query("COMMIT");
        $this->DesconectarBD();
       
    }
    
    
 
    
}
