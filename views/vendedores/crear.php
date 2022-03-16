<main class="contenedor seccion">
    <h1>Registrar vendedor</h1>

    <a href="/admin" class="boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include 'formulario.php';?>

        <input type="submit" value="Registrar vendedor" class="boton-verde">
    </form>
</main>