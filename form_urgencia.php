<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Urgencia</title>
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
            margin-top: 10px;
        }

        .formulario__btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" action="registro_urgencia.php">
            <div class="formulario__grupo-input">
                <label for="id_paciente" class="formulario__label">ID Paciente *</label>
                <input type="text" class="formulario__input" name="id_paciente" id="id_paciente" placeholder="ID Paciente" required>
            </div>

            <div class="formulario__grupo-input">
                <label for="id_medico" class="formulario__label">ID Médico *</label>
                <input type="text" class="formulario__input" name="id_medico" id="id_medico" placeholder="ID Médico" required>
            </div>

            <div class="formulario__grupo-input">
                <label for="fecha" class="formulario__label">Fecha *</label>
                <input type="date" class="formulario__input" name="fecha" id="fecha" required>
            </div>

            <div class="formulario__grupo-input">
                <label for="enfermedad" class="formulario__label">Enfermedad</label>
                <input type="text" class="formulario__input" name="enfermedad" id="enfermedad" placeholder="Enfermedad">
            </div>
            <button type="submit" class="formulario__btn">Registrar urgencia </button><br>
            <button onclick="window.location.href = 'model/index.php';" class="formulario__btn">Ir a las tablas</button>

        </form>
    </main>

    <script src="formulario.js"></script>
</body>
</html>
