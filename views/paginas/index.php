    <main class="contenedor seccion">
        <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>

        <?php 
            include 'iconos.php';
        ?>
    </main>

    <section class="seccion contenedor">
        <h2 data-cy="heading-lista-departamentos">Casas y departamentos en venta</h2>

        <?php
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="ver-propiedades">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2 data-cy="casa-de-ensueño">Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo" data-cy="visitar-contacto">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/wepb">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="imagen blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada?id=1">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>28/09/2021</span> por: <span> Admin </span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/wepb">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="imagen blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada?id=2">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>28/09/2021</span> por: <span> Admin </span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente  forma, muy buena anteción y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Marco Antonio Rodriguez</p>
            </div>
        </section>
    </div>