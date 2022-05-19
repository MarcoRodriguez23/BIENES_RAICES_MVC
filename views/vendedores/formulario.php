<p>Los campos con * son obligatorios</p>
<fieldset>
    <legend>Información personal</legend>

    <label for="nombre">* Nombre:</label>
    <input 
        type="text" 
        id="nombre" 
        name="vendedor[nombre]" 
        placeholder="Nombre vendedor@" 
        maxlength="45"
        value="<?php echo s($vendedor->nombre); ?>"
        oninput=
        "this.value = this.value.replace(/[^a-zA-Z ]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
    >
    <label for="apellido">* Apellido:</label>
    <input 
        type="text" 
        id="apellido" 
        name="vendedor[apellido]" 
        placeholder="apellido vendedor@" 
        maxlength="45"
        value="<?php echo s($vendedor->apellido); ?>"
        oninput=
        "this.value = this.value.replace(/[^a-zA-Z ]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"   
    >

</fieldset>
<fieldset>
    <legend>Información extra</legend>

    <label for="telefono">* Teléfono:</label>
    <input 
        type="number" 
        id="telefono" 
        name="vendedor[telefono]" 
        placeholder="telefono vendedor@" 
        min="0"
        maxlength="10"
        value="<?php echo s($vendedor->telefono); ?>"
        oninput=
        "this.value = this.value.replace(/[^0-9]/,'')
        if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
        
    >
</fieldset>