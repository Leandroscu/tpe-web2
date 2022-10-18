{include file="header.tpl"}


<ul class="list-group mt-2">
    {foreach from=$equipos item=$equipo}
        <li class="list-group-item">{$equipo->nombre} - Estadio: <b>{$equipo->estadio}</b></li>
    {/foreach}
  
</ul>

<p class="mt-3"><small>Mostrando {$count} equipos</small></p>

<div class="col">
    {if isset($selectedClub)}
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="icono.png">
        <div class="card-body">
          <h4 class="card-title">{$selectedClub->nombre}</h4>
          <h5 class="card-subtitle">{$selectedClub->Estadio}</h5>
        </div>
      </div>
    {/if}
</div>


{include file="footer.tpl"}