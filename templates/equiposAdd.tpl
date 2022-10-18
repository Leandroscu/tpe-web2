{include file="header.tpl"}

<!-- formulario para agregar equipos -->
<form action="add" method="POST" class="my-4">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Nombre:</label>
                <input name="nombre" type="text" class="form-control">
            </div>

        <div class="form-group">
            <label>Estadio:</label>
        <input name="estadio" type="text" class="form-control">
    </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Imagen:</label>
                <input name="txtImagen" id="imageToUpload" type="file" class="form-control">
            </div>
            <div class="form-floating mt-4">

                <select class="form-select" name="id_categoria" aria-label="Floating label select example">
                    <option selected>Seleccione la categoria</option>
                    {foreach from=$categorias item=$categoria}
                        <option value="{$categoria->id_categoria}">{$categoria->name_categoria}</option>
                    {/foreach}
                </select>
                <label for="floatingSelect">Categorias:</label>

            </div>
            
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-2">Cargar</button>

</form>
