{include file="categorias_add.tpl"}

<!-- lista de tareas -->
<ul class="list-group col-md-8">
    {foreach from=$categorias item=$categoria}
        <li class='
                list-group-item d-flex justify-content-between align-items-center
            '>
            <span><img class="p-2" style="height: 3rem;" src="img/{$categoria->imagen}"/> <b>{$categoria->name_categoria}</b> </span>
            <div class="ml-auto">
                
                <a href='formModificar/{$categoria->id_categoria}' type='button' class='btn btn-primary'>Seleccionar</a>
                <a href='borrar/{$categoria->id_categoria}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} categorias</small></p>

{include file="footer.tpl"}