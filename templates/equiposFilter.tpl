{include file="header.tpl"}

<ul class="list-group mt-2">
    {foreach from=$equipos item=$equipoByCategoria}
            <li class="list-group-item">{$equipoByCategoria->nombre} - Estadio: <b>{$equipoByCategoria->estadio}</b>
            </li>
    {/foreach}
  
</ul>


{include file="footer.tpl"}