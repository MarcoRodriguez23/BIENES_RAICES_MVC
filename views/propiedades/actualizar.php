
<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <?php foreach ($errores as $error){ ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php    
    }
    ?>

    <a href="/admin" class="boton-verde">Volver</a>


    <form action="" method="POST" class="formulario" enctype="multipart/form-data">
        <?php
            include __DIR__ . '/formulario.php';
        ?>
        <input type="submit" value="Actualizar Propiedad" class="boton-verde">        
    </form>
    
</main>