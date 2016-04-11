<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AccesoDatos.php';

 class Usuario {
    public $pkIdUsuarios = 0;
    public $nombre ='';
    public $apellido1 = '';
    public $apellido2 = '';
    public $correo = '';
    public $telefono = 0;
    public $usuario = '';
    public $rol = '';
   
    function toJson() {
        $data = array(
        'usuario' => array(
            'nombre' => $this->nombre,
            'id'=>$this->id,
            'apellido'=> $this->apellido
            )
        );
        return json_encode($data);
    }
    
    
    function toJsonSeveral() {
        $data = array(
        'usuario' => array(
            'nombre' => $this->nombre,
            'id'=>$this->id,
            'apellido'=> $this->apellido
            ),
        'usuario2' => array(
            'nombre' => $this->nombre,
            'id'=>$this->id,
            'apellido'=> $this->apellido
            ),
        'usuario3' => array(
            'nombre' => $this->nombre,
            'id'=>$this->id,
            'apellido'=> $this->apellido
            ),
            
        );
        return json_encode($data);
    }
    
   public function toJsonUsuarios(){
        //$data = array();
        $query="SELECT pkIdUsuarios, nombre, apellido1, apellido2, correo, telefono,usuario, rol FROM Usuarios";
        $acc = new AccesoDatos();
       // $data = $acc->ObtenerDatos($query);
      //  while($r = mysqli_fetch_array($result)) {
        //  $data[] = $r;
        //}
       return  json_encode( $acc->ObtenerDatos($query));

    }
    
    function Insertar(){
                 //read the json file contents
    $jsondata = file_get_contents('empdetails.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    foreach ($data->usuario as $user) 
	{
            $nombre = $user->nombre; 
            $apellido1 = $user->apellido1; 
            $apellido2 = $user->apellido2; 
            $correo = $user->correo; 
            $telefono = $user->telefono; 
            $usuario = $user->usuario; 
            $rol = $user->rol; 
            $sql = "INSERT INTO usuarios(nombre, apellido1, apellido2, correo, telefono, usuario, rol)
            VALUES('$nombre', '$apellido1', '$apellido2', '$correo', $telefono, '$usuario', '$rol')";
            AccesoDatos.Insert($sql);
	}
    }
    
    function fromJson(){
        return null;
    }
} 