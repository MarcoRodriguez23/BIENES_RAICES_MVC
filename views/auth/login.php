
<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>
    <?php foreach ($errores as $error): ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error;?></div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" action="/login" class="formulario" novalidate>
        <fieldset>
            <legend>Email y password</legend>
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="email" required maxlength="50">

            <label for="password">password (Máx. 12 caracteres)</label>
            <input type="password" placeholder="Tu password" id="password" name="password" required maxlength="12">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>
