<p>Los campos con * son obligatorios</p>
<fieldset>
    <legend>Información general de la propiedad</legend>

    <label for="titulo">* Titulo:</label>
    <input
        maxlength="60"
        type="text" 
        id="titulo" 
        name="propiedad[titulo]" 
        placeholder="Titulo propiedad" 
        value="<?php echo s($propiedad->titulo); ?>"
        
    >

    <label for="precio">* Precio: (Máx. $9,999,999,999)</label>
    <input 
        type="number" 
        id="precio" 
        name="propiedad[precio]" 
        placeholder="Precio propiedad" 
        min="0"
        maxlength="10"
        value="<?php echo s($propiedad->precio); ?>"
        oninput=
        "this.value = this.value.replace(/[^0-9]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
    >

    <label for="imagen">* Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="" class="imagen-small">
    <?php endif; ?>
    <label for="descripcion">* Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información propiedad</legend>
    <label for="habitaciones">* Habitaciones:</label>
    <input type="number" 
        id="habitaciones" 
        name="propiedad[habitaciones]" 
        placeholder="ej: 3" 
        min="1" max="9"
        value="<?php echo s($propiedad->habitaciones); ?>"
        maxlength="1" 
        oninput=
        "this.value = this.value.replace(/[^0-9]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
    >
    
    <label for="wc">* wc:</label>
    <input type="number" 
        id="wc" 
        name="propiedad[wc]" 
        placeholder="ej: 3" 
        min="1" max="9" 
        value="<?php echo s($propiedad->wc); ?>"
        maxlength="1" 
        oninput=
        "this.value = this.value.replace(/[^0-9]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"    
    >
    
    <label for="estacionamiento">* Estacionamiento:</label>
    <input type="number" 
        id="estacionamiento" 
        name="propiedad[estacionamiento]" 
        placeholder="ej: 3" 
        min="1" max="9" 
        value="<?php echo s($propiedad->estacionamiento); ?>"
        maxlength="1" 
        oninput=
        "this.value = this.value.replace(/[^0-9]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
    >    
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