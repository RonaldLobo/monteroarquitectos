<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario {
    public $id = 1;
    public $nombre = 'Ronald';
    public $apellido = 'Lobo';
   
   
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
    
    function fromJson(){
        return null;
    }
} 