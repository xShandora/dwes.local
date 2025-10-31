<?php
require_once __DIR__ . '/inicio.part.php';
require_once __DIR__ . '/navegacion.part.php';
?>
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Galería</h1>
                    <p class="text-white">Nuestros viajeros comparten aquí sus mejores experiencias. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h2>Subir imágenes:</h2>
            <hr>
            <!-- Sección que muestra la confirmación del formulario o bien sus errores -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <?php if (empty($errores)) : ?>
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <!-- Formulario que permite subir una imagen con su descripción -->
            <!-- Hay que indicar OBLIGATORIAMENTE enctype="multipart/form-data" para enviar ficheros al servidor -->
            <form clas="form-horizontal" action="/galeria/nueva" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?> ">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="imagenes_galeria">
                  <table class="table"> 
                    <thead> 
                    <tr> 
                        <th scope="col">#</th> 
                        <th scope="col">Imagen</th> 
                        <th scope="col">Visualizaciones</th> 
                        <th scope="col">Likes</th> 
                        <th scope="col">Descargas</th> 
                    </tr> 
                    </thead> 
                    <tbody> 
                    <?php foreach ($imagenes as $imagen) : ?> 
                        <tr> 
                            <th scope="row"><?= $imagen->getNombre()?></th> 
                            <td> 
                                <img src="<?= $imagen->getUrlSubidas()?>" 
                                    alt="<?= $imagen->getDescripcion()?>" 
                                    title="<?= $imagen->getDescripcion()?>" 
                                    width="100px"> 
                            </td> 
                            <td><?= $imagen->getNumVisualizaciones()?></td> 
                            <td><?= $imagen->getNumLikes()?></td> 
                            <td><?= $imagen->getNumDownloads()?></td> 
                        </tr> 
                    <?php endforeach;?> 
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . '/fin.part.php';