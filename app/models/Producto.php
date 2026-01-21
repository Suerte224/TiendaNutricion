<?php



class Producto{
    private $db;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;
    private $marca_id;
    private $categoria_id;

    private $fecha;

    public function __construct(){
        $this->db = new Db();
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta): void
    {
        $this->oferta = $oferta;
    }

    /**
     * @param mixed $marca_id
     */
    public function setMarcaId($marca_id): void
    {
        $this->marca_id = $marca_id;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }



    public function listar(){
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        return $this->db->lanzar_consulta($sql);
    }


    public function listarPorCategoria($categoria_id){
        $categoria_id = (int)$categoria_id;

          $sql ="SELECT * FROM productos WHERE 
                            categoria_id = $categoria_id
                            ORDER BY id DESC";
            return $this->db->lanzar_consulta($sql);
    }
    public function buscar($texto){
        $texto = "%$texto%";
        $sql = "SELECT * FROM productos WHERE nombre LIKE ? ORDER BY id DESC";
        return $this->db->lanzar_consulta($sql, array($texto));
    }
    public function guardar() {
        $sql = "
            INSERT INTO productos 
            (marca_id, categoria_id, nombre, descripcion, precio, stock, oferta, imagen, fecha)
            VALUES
            (:marca_id, :categoria_id, :nombre, :descripcion, :precio, :stock, :oferta, :imagen, :fecha)
        ";

        $params = [
            'marca_id' => $this->marca_id,
            'categoria_id' => $this->categoria_id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'oferta' => $this->oferta,
            'imagen' => $this->imagen,
            'fecha' => $this->fecha
        ];

        $this->db->lanzar_consulta($sql, $params);
    }

}