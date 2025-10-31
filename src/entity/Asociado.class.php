<?php

require_once __DIR__ . '/IEntity.php';

class asociado implements IEntity
{

    const RUTA_IMAGENES_ASOCIADOS = '/public/images/asociados/';

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
    private $logo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @param string $nombre
     * @param string $logo
     * @param string $descripcion
     */

    public function __construct(string $nombre, string $logo, string $descripcion)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getUrl(): string
    {
        return self::RUTA_IMAGENES_ASOCIADOS . $this->getNombre();
    }

    public function __toString()
    {
        return $this->descripcion;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'logo' => $this->getLogo(),
        ];
    }
}