<?php
    class Productos {
        public $conexion;
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
        public function consulta() {
            $con = "SELECT p.*, c.nombre AS categorias, pr.nombre AS proveedor FROM producto p
                    INNER JOIN categorias c ON p.fo_categorias = c.id_categorias
                    INNER JOIN proveedor pr ON p.fo_proveedor = p.id_prov
                    ORDER BY p.nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }

        public function eliminar($id) {
            $del = "DELETE FROM productos WHERE id = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido eliminada";
            return $vec;
        }

        public function insertar($params) {
            $ins = "INSERT INTO productos(id, precio, nombre, descripcion, fo_categoria, stock
                    VALUES ($params->id, '$params->nombre', '$params->descripcion', $params->precio, $params->descripcion, $params->fo_categoria, $params->stock)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido guardado";
            return $vec;
        }

        public function editar($params, $id) { 
            $editar = "UPDATE productos SET id = $params->id, $params->precio, '$params->nombre', '$params->descripcion', $params->fo_categoria, $params->stock
                       WHERE id = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec ['resultado'] = "OK";
            $vec['mensaje'] = "El producto ha sido editado";
            return $vec;
        }

        public function filtro($valor) {
            $filtro = "SELECT p.*, c.nombre AS categoria, pr.nombre AS proveedores FROM productos p
                       INNER JOIN categorias c ON p.fo_categorias = c.id_categorias
                       INNER JOIN proveedores pr ON p.fo_proveedores = pr.id_prov
                       WHERE p.codigo LIKE '%$valor%' OR .p.nombre LIKE '%$valor%' OR categorias LIKE '%$valor%' OR proveedores LIKE '%$valor%' ";
            $res = mysqli_query($this->conexion, $filtro);
            $vec = [];

            while($row = mysqli_fetch_array($res)) {
                $vec[] = $row;
            }
            return $vec;
        }
    }