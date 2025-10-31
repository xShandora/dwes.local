<?php
require_once __DIR__ .  '/../../src/utils/file.class.php';
require_once __DIR__ .  '/../../src/exceptions/FileExeption.php';
require_once __DIR__ .  '/../../src/database/Connection.class.php';
require_once __DIR__ .  '/../../src/database/QueryBuilder.php';
require_once __DIR__ .  '/../../src/entity/Imagen.class.php';
require_once __DIR__ .  '/../../core/App.php';
require_once __DIR__ .  '/../../src/repository/ImagenesRepository.php';

try { 
    $conexion = App::getConnection();
    
    $imagenesRepository = new ImagenesRepository(); 
    $titulo = trim(htmlspecialchars($_POST['titulo'])); 
    $descripcion = trim(htmlspecialchars($_POST['descripcion'])); 
    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png']; 
    $imagen = new File('imagen', $tiposAceptados);  // El nombre 'imagen' es el que se ha 
    // puesto en el formulario de galeria.view.php 
    /*$categoria = trim(htmlspecialchars($_POST['categoria'])); 
    
    if (empty($categoria)) 
        throw new CategoriaException; */
    
    $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS); 
    $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion /*,$categoria*/); 
    $imagenesRepository->save($imagenGaleria); 
    App::get('logger')->add("Se ha guardado una imagen: ".$imagenGaleria->getNombre());
    $mensaje = "Se ha guardado la imagen correctamente"; 
    
} catch (FileException $fileException) { 
$errores[] = $fileException->getMessage(); 
} catch (QueryException $queryException) { 
$errores[] = $queryException->getMessage(); 
} catch (AppException $appException) { 
$errores[] = $appException->getMessage(); 
} catch (CategoriaException) { 
$errores[] = "No se ha seleccionado una categoría válida"; 
} 
App::get('router')->redirect('galeria'); 