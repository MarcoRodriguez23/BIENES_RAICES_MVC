<fieldset>
    <legend>Información general de la propiedad</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" min="0" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="" class="imagen-small">
    <?php endif; ?>
    <label for="descripcion">descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información propiedad</legend>
    <label for="habitaciones">Habitaciones:</label>
    <input type="number" 
    id="habitaciones" 
    name="propiedad[habitaciones]" 
    placeholder="ej: 3" 
    min="1" max="10" 
    value="<?php echo s($propiedad->habitaciones); ?>">
    
    <label for="wc">wc:</label>
    <input type="number" 
    id="wc" 
    name="propiedad[wc]" 
    placeholder="ej: 3" 
    min="1" max="10" 
    value="<?php echo s($propiedad->wc); ?>">
    
    <label for="estacionamiento">estacionamiento:</label>
    <input type="number" 
    id="estacionamiento" 
    name="propiedad[estacionamiento]" 
    placeholder="ej: 3" 
    min="1" max="10" 
    value="<?php echo s($propiedad->estacionamiento); ?>">    
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[vendedorId]">
        <option value="" disabled selected>--Selecciona un vendedor--</option>
        <?php foreach ($vendedores as $vendedor) :?>
            <option 
            <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
            value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre)." ".s($vendedor->apellido); ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>