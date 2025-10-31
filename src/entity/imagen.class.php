<?php
require_once __DIR__ . '/IEntity.php';

Class Imagen implements IEntity{
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/'; 
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/'; 
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/'; 
    const RUTA_IMAGENES_SUBIDAS = '/public/images/galeria';

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var int
     */
    private $categoria;
    /**
     * @var int
     */
    private $numVisualizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    public function __construct(string $nombre = "", string $descripcion = "",
     int $categoria = 0, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0){
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    /**
     * @return string
     */
    public function getId(): ?int{
        return $this->id;
    }

    public function setNombre(string $nombre): Imagen{
        $this->nombre = $nombre;
        return $this;
    }
    public function getNombre(): ?string{
        return $this->nombre;
    }

    public function setDescripcion(string $descripcion): Imagen{
        $this->descripcion = $descripcion;
        return $this;
    }
    public function getDescripcion(): string{
        return $this->descripcion;
    }

    public function setCategoria(int $categoria): Imagen{
        $this->categoria = $categoria;
        return $this;
    }
    public function getCategoria(): int{
        return $this->categoria;
    }

    public function setNumVisualizaciones(int $numVisualizaciones): Imagen{
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }
    public function getNumVisualizaciones(): int{
        return $this->numVisualizaciones;
    }

    public function setNumLikes(int $numLikes): Imagen{
        $this->numLikes = $numLikes;
        return $this;
    }
    public function getNumLikes(): int{
        return $this->numLikes;
    }

    public function setNumDownloads(int $numDownloads): Imagen{
        $this->numDownloads = $numDownloads;
        return $this;
    }
    public function getNumDownloads(): int{
        return $this->numDownloads;
    }

    public function getUrlPortfolio(): string{
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }
    public function getUrlGaleria(): string{
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }
    public function getUrlClientes(): string{
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }
    public function getUrlSubidas(): string{
        return self::RUTA_IMAGENES_SUBIDAS . $this->getNombre();
    }
    
    public function toArray(): array{ 
        return [ 
            'id' => $this->getId(), 
            'nombre' => $this->getNombre(), 
            'descripcion' => $this->getDescripcion(), 
            'numVisualizaciones' => $this->getNumVisualizaciones(), 
            'numLikes' => $this->getNumLikes(), 
            'numDownloads' => $this->getNumDownloads(), 
            'categoria' => $this->getCategoria() 
        ]; 
    } 

    public function __toString(): string{
        return $this->getDescription();
    }

}