<?php 
require_once __DIR__ . '/../exceptions/QueryException.php'; 
require_once __DIR__ . '/../entity/Imagen.class.php';

class QueryBuilder{ 
    private $table; 
    private $classEntity; 
    
    public function __construct(string $table, string $classEntity){ 
        $this->connection = App::getConnection(); 
        $this->table = $table; 
        $this->classEntity = $classEntity; 
    } 
 
    public function findAll ( ): array { 
        $sql = "SELECT * FROM $this->table"; 
        $pdoStatement = $this->connection->prepare($sql); 
        
        if ($pdoStatement->execute()===false) 
            throw new QueryException("No se ha podido ejecutar la query solicitada."); 
        
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity); 
    }

    /** 
     * @param IEntity $entity 
     * @return void 
     * @throws QueryException 
     */ 
    public function save (IEntity $entity) : void 
    { 
        try { 
            $parametrers = $entity->toArray(); 
 
            $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', 
                $this->table, 
                implode(', ',array_keys($parametrers)), 
                ':'.implode(', :',array_keys($parametrers)) 
            ); 
            $statement = $this->connection->prepare($sql); 
            $statement->execute($parametrers); 
        } catch (PDOException $exception) { 
            throw new QueryException("Error al insertar en la base de datos."); 
        } 
    }
}