            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">nombre:</label>
                <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedo@" value="<?php echo s($vendedor->nombre); ?>">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="vendedor[apellido]" placeholder="apellido vendedo@" value="<?php echo s($vendedor->apellido); ?>">

            </fieldset>
            <fieldset>
                <legend>Información extra</legend>

                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="vendedor[telefono]" placeholder="telefono vendedo@" value="<?php echo s($vendedor->telefono); ?>">
            </fieldset>