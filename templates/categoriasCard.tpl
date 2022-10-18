{include file="header.tpl"}

<div class="container">
<div class="row d-flex justify-content-center">

{foreach from=$categorias item=$categoria}
<div class="card bg-dark bg-opacity-25 border border-white  rounded-0 w-25">
    {if isset($categoria->imagen)}
      <img class="mt-3" style="height: auto;" src="img/{$categoria->imagen}"/>
    {/if}
    <div class="card-body">
      <h4 class="d-flex justify-content-center card-title">{$categoria->name_categoria}</h4>
      <a href="filtrar/{$categoria->id_categoria}" class="d-flex justify-content-center btn btn-outline-primary" value="{$categoria->id_categoria}">Ver más</a>
    </div>
</div>
{/foreach}


{include file="footer.tpl"}