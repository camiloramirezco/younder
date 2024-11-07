<?php
    class Categorias {
        public $conexion;
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
        public function consulta() {
            $con = "SELECT * FROM categorias ORDER BY nombre_categoria";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM categorias WHERE id = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "La categoria ha sido eliminada";
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO categorias(nombre_categoria) VALUES('$params->nombre')";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "La categoria ha sido guardada";
            return $vec;
        }

        public function editar($params, $id) { 
            $editar = "UPDATE categorias SET nombre_categoria = '$params->nombre' WHERE id = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "La categoria ha sido editada";
            return $vec;
        }

        public function filtro($valor) {
            $filtro = "SELECT * FROM categorias WHERE nombre_categoria LIKE '%$valor%'";
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];

            while($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }