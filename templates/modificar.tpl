{include file="header.tpl"}

<form method="POST" action="edit" enctype="multipart/form-data" class="my-4">
    <input type="hidden" value="{$categoria->id_categoria}" name="id_categoria">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{$categoria->name_categoria}" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Imagen:</label>
                <input type="file" name="imagen" id="imageToUpload" value="{$categoria->imagen}" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary m-2">Modificar</button>
    
</form>


{include file="footer.tpl"}