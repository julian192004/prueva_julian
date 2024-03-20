<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
    <!-- Agrega aquí tus estilos CSS -->
</head>
<body>

<main>
    <form method="POST" autocomplete="off" class="formulario" id="formulario" action="registro.php">
        <div class="formulario__grupo-input">
            <label for="documento" class="formulario__label">Documento *</label>
            <input type="text" class="formulario__input" name="doc" id="documento" placeholder="Documento" required>
        </div>

        <div class="formulario__grupo-input">
            <label for="nombre" class="formulario__label">Nombre *</label>
            <input type="text" class="formulario__input" name="nom" id="nombre" placeholder="Nombre" required>
        </div>

        <div class="formulario__grupo-input">
            <label for="edad" class="formulario__label">Edad</label>
            <input type="number" class="formulario__input" name="edad" id="edad" placeholder="Edad">
        </div>

        <div class="formulario__grupo-input">
            <label for="genero" class="formulario__label">Género</label>
            <select name="genero" id="genero" class="formulario__select">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>

        <div class="formulario__grupo-input">
            <label for="direccion" class="formulario__label">Dirección</label>
            <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Dirección">
        </div>

        <div class="formulario__grupo-input">
            <label for="telefono" class="formulario__label">Teléfono</label>
            <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Teléfono">
        </div>

        <button type="submit" class="formulario__btn">Enviar</button>
    </form>
</main>

<script src="formulario.js"></script>
</body>
</html>
