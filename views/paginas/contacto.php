<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php
        if($mensaje){
            echo "<p data-cy='alerta-envio-formulario' class='alerta exito'>" .$mensaje. "</p>";
        }
    ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el formulario de contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input 
                data-cy="input-nombre" 
                type="text" 
                placeholder="Tu nombre" 
                id="nombre" 
                name="contacto[nombre]" 
                required
                maxlength="40"
                oninput=
                "this.value = this.value.replace(/[^a-zA-Z ]/,'')
                if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"    
            >

            <label for="mensaje">Mensaje: </label>
            <textarea 
                data-cy="input-mensaje" 
                id="mensaje" 
                name="contacto[mensaje]" 
                required
                oninput=
                "this.value = this.value.replace(/[^0-9a-zA-Z ]/,'')"    
            >
            </textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o Compra: </label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Presupuesto</label>
            <input 
                data-cy="input-presupuesto"
                type="number" 
                placeholder="Tu precio o presupuesto" 
                id="presupuesto" 
                name="contacto[precio]" 
                required
                maxlength="10"
                oninput=
                "this.value = this.value.replace(/[^0-9]/,'')
                if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"     
            >
            
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado:</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>   
                <input data-cy="forma-contacto" type="radio" value="telefono" name="contacto[contacto]" required>

                <label for="contactar-email">Email</label>   
                <input data-cy="forma-contacto" type="radio" value="email" name="contacto[contacto]" required>
            </div>

            <div id="contacto">

            </div>

            
        </fieldset>

        <input type="submit" class="boton-verde" value="enviar">
    </form>
</main>