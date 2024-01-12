<h1 class="nombre-pagina">Olvide contraseña</h1>
<p class="descripcion-pagina">Restablece tu contraseña escribiendo tu email a continuación</p>

<?php 
    @include_once __DIR__ . '/../templates/alertas.php';
?>

<form class="formulario" method="POST" action="/forget">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Tu Email" name="email">
    </div>

    <input type="submit" value="Restablecer Contraseña" class="boton">
</form>

<div class="acciones">
    <a href="/create-account">¿Aun no tienes una cuenta? Crear una</a>
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
</div>