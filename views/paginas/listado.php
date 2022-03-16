<div class="contenedor-anuncio" data-cy="anuncios">
            <?php foreach($propiedades as $propiedad) { ?>
                <div class="anuncio">
                    <div>
                        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">
                        <h3><?php echo $propiedad->titulo; ?></h3>
                    </div>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <div>
                        <p class="precio"><?php echo "$ " . $propiedad->precio; ?></p>
                        <ul class="iconos-caracteristicas">
                            <li>
                                <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                                <p><?php echo $propiedad->wc; ?></p>
                            </li>
                            <li>
                                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                                <p><?php echo $propiedad->estacionamiento; ?></p>
                            </li>
                            <li>
                                <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                                <p><?php echo $propiedad->habitaciones; ?></p>
                            </li>
                        </ul>
                        <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver propiedad</a>                              
                    </div>
            </div><!--anuncio-->
            <?php } ?>
        </div><!--contenedor-anuncios-->