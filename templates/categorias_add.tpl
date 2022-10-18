{include file="header.tpl"}

<!-- formulario para agregar categorias -->
<form method="POST" action="agregar" enctype="multipart/form-data" class="my-4">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Imagen:</label>
                <input type="file" name="imagen" id="imageToUpload" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary m-2">Cargar</button>
    
</form>





