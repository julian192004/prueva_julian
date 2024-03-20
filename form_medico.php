<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Médicos</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        main {
            width: 80%;
            margin: 50px auto;
        }

        .formulario {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .formulario__grupo-input {
            margin-bottom: 20px;
        }

        .formulario__label {
            font-weight: bold;
        }

        .formulario__input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .formulario__select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .formulario__btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .formulario__btn:hover {
            background-color: #0056b3;
        }
    </style>
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
                <label for="especialidad" class="formulario__label">Especialidad</label>
                <input type="text" class="formulario__input" name="especialidad" id="especialidad" placeholder="Especialidad">
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
