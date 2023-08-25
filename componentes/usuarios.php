<?php 
    	$usuarios = [
            "usuario_1" => ["id"=> 1, "codigo_estudiante"=> "U20190280", "email"=> "retro@retro.com", "password"=> password_hash("123", PASSWORD_DEFAULT), "rol"=> "admin", "nombres"=> "Nicolas Javier", "apellidos"=> "Pineda Argueta"], 
            "usuario_2" => ["id"=> 2, "codigo_estudiante"=> "U20190281", "email"=> "retro1@retro1.com", "password"=> password_hash("1234", PASSWORD_DEFAULT), "rol"=> "rustico", "nombres"=> "William", "apellidos"=> "Morales"], 
            "usuario_3" => ["id"=> 3, "codigo_estudiante"=> "U20190282", "email"=> "retro2@retro2.com", "password"=> password_hash("12345", PASSWORD_DEFAULT), "rol"=> "basico", "nombres"=> "Carlos cristian", "apellidos"=> "Villagran Smith"], 
        ];

        function verificar_usuario($lista_usuarios, $codigo_o_email, $password) {
           foreach($lista_usuarios as $usuario) {
            if (($usuario["codigo_estudiante"] == $codigo_o_email || $usuario["email"] == $codigo_o_email) && password_verify($password, $usuario["password"])) {
                    return $usuario;
                }
           }

           return false;
        }

        function verificar_permisos_de_usuario($lista_usuarios, $usuario_sesion_id, $permiso) {
            if(buscar_usuario_por_id($lista_usuarios, $usuario_sesion_id)) {
                $usuario = buscar_usuario_por_id($lista_usuarios, $usuario_sesion_id);
                
                if($usuario["rol"] == "admin") {
                    return true;
                } else if($usuario["rol"] == "rustico" && $permiso == "modificar") {
                    return true;
                }
            }
                
            return false;
        }

        function buscar_usuario_por_id($lista_usuarios, $id) {
            foreach($lista_usuarios as $usuario) {
                if ($usuario["id"] == $id) {
                        return $usuario;
                    }
               }
    
               return null;
        }
?>