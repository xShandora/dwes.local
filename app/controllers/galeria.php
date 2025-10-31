<?php

require_once __DIR__ .  '/../../src/utils/file.class.php';
require_once __DIR__ .  '/../../src/exceptions/FileExeption.php';
require_once __DIR__ .  '/../../src/database/Connection.class.php';
require_once __DIR__ .  '/../../src/database/QueryBuilder.php';
require_once __DIR__ .  '/../../src/entity/Imagen.class.php';
require_once __DIR__ .  '/../../core/App.php';
require_once __DIR__ .  '/../../src/repository/ImagenesRepository.php';


$errores=[]; 
$titulo=""; 
$descripcion=""; 
$mensaje=""; 
$imagenes=[];

try { 
    $conexion = App::getConnection(); 

    $imagenesRepository = new ImagenesRepository(); 
    //$categoriasRepository = new CategoriasRepository(); 
    
    $imagenes = $imagenesRepository->findAll(); 
    //$categorias = $categoriasRepository->findAll();
} catch (FileException $fileException) { 
    $errores[] = $fileException->getMessage(); 
} 
catch ( QueryException $queryException ){ 
    $errores[] = $queryException->getMessage(); 
} 
catch ( AppException $appException ){ 
    $errores[] = $appException->getMessage(); 
} 
require_once __DIR__ . '/../views/galeria.view.php'; 

