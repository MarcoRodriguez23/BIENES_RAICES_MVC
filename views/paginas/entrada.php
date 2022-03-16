<main class="contenedor seccion contenido-centrado">
    <a href="/blog" class="boton-verde">Volver</a>
    <h1><?php echo $entrada->titulo; ?></h1>

    

    <picture>
        <img loading="lazy" src="build/img/<?php echo $entrada->imagen; ?>" alt="imagen propiedad">
    </picture>

    <p class="informacion-meta">Escrito el: <span><?php echo $entrada->fecha; ?></span> por: <span><?php echo $entrada->autor; ?></span></p>

    <div class="resumen-propiedad">
        <p>
            <?php echo $entrada->descripcion; ?>
        </p>
    </div>
</main>