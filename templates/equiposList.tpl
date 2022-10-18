{include file="equiposAdd.tpl"}

<!-- lista de tareas -->
<ul class="list-group w-75">
    {foreach from=$equipos item=$equipo}
        <li class='
                list-group-item d-flex justify-content-between align-items-center
            '>
            <span><b>{$equipo->nombre}</b> - Estadio: <b>{$equipo->estadio}</b> - Categoria: <img style="height: 2rem;" src="img/{$equipo->imagen}"/></span>
            <div class="ml-auto">
                <a href='formEditEquipo/{$equipo->id_equipo}' type='button' class='btn btn-primary'>Modificar</a>
                <a href='delete/{$equipo->id_equipo}' type='button' class='btn btn-danger'>Borrar</a>
            </div>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} equipos</small></p>

{include file="footer.tpl"}