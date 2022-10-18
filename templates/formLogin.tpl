{include file="header.tpl"}
<div class="container">

        <div class="row">

        <div class="col-md-4">
                
                </div>
        <div class="col-md-4">
        <div class="card mt-4">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
    <form method="POST" action="validate">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" required class="form-control mb-3" id="" name="email" aria-describedby="emailHelp" placeholder="Ingrese email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" required class="form-control" id="" name="password" placeholder="Ingrese contraseña">
        </div>

        {if $error} 
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}
        <button type="submit" class="btn btn-success mt-3">Entrar</button>
    </form>
</div>

{include file="footer.tpl"}
