<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Médicos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .formulario {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .formulario__grupo-input {
            margin-bottom: 20px;
        }

        .formulario__label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .formulario__input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .formulario__btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        .formulario__btn:hover {
            background-color: #0056b3;
        }

        .formulario__btn + .formulario__btn {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>FORMULARIO DE MÉDICO</h1>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" action="registro_medico.php">

            <div class="formulario__grupo-input">
                <label for="nombre" class="formulario__label">Nombre *</label>
                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>

            <div class="formulario__grupo-input">
                <label for="especialidad" class="formulario__label">Especialidad *</label>
                <input type="text" class="formulario__input" name="especialidad" id="especialidad" placeholder="Especialidad" required>
            </div>

            <div class="formulario__grupo-input">
                <label for="telefono" class="formulario__label">Teléfono</label>
                <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Teléfono">
            </div>

            <button type="submit" class="formulario__btn">Enviar</button>
            <button onclick="window.location.href = 'form_paciente.php';" class="formulario__btn">Ir al formulario de Paciente</button>
        </form>
    </main>
</body>
</html>
