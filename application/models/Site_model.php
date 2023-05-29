<?php

class Site_model extends CI_Model
{

    //Login de empresa
    public function loginUser($dataLogin)
    {
        $this->db->select("*");
        $this->db->from("usuario");
        $this->db->where("correo", $dataLogin['username']);
        $this->db->where("contrasena", $dataLogin['password']);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function insertEmpleado($dataForm, $dataFoto)
    {

        // Procesamiento de datos para cargo y sexo
        //$cargo = ($dataForm['cargo'] == 'Administrador') ? 1 : 2;
        //$sexo = ($dataForm['sexo'] == 'Hombre') ? 1 : 2;

        //Procesamiento de datos para foto
        $fotoForm = $dataFoto['foto'];
        if ($fotoForm['error'] === UPLOAD_ERR_OK) {

            $tmp_name = $fotoForm['tmp_name'];

            // Lee el contenido del archivo
            $contenido = file_get_contents($tmp_name);
        } else {
            echo "Error al subir la imagen: " . $fotoForm['error'];
        }

        $array = array(
            "nombre" => $dataForm['nombre'],
            "apellidos" => $dataForm['apellidos'],
            "fecha_nacimiento" => $dataForm['fecha_nacimiento'],
            "correo" => $dataForm['correo'],
            "numero_telefono" => $dataForm['telefono'],
            "foto" => $contenido,
            "contrasena" => $dataForm['contrasena'],
            "id_cargo" => $dataForm['cargo'],
            "id_sexo" => $dataForm['sexo']
        );

        $this->db->insert("usuario", $array);
    }

    public function getEmpleados()
    {

        // tipo de peticion
        $this->db->select("*");
        $this->db->from("usuario");
        $this->db->where("id_cargo", 2);
        $this->db->order_by("nombre", "asc");

        //peticion a la base de datos
        $query = $this->db->get();
        //respuesta de la base de datos
        if ($query->num_rows() > 0) {
            return $query->result();
            return NULL;
        }
    }

    public function getEmpleado($id)
    {
        $this->db->select("*");
        $this->db->from("usuario");
        $this->db->where("id", $id);

        //peticion a la base de datos
        $query = $this->db->get();

        //respuesta de la base de datos
        if ($query->num_rows() > 0) {
            return $query->result();
            return NULL;
        }
    }

    public function deleteEmpleado($id)
    {
        $array = array(
            "nombre" => "delete test",
        );
        $this->db->where("id", $id);
        $this->db->delete("usuario");
    }

    public function updateEmpleado($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("usuario", $data);
    }
}
