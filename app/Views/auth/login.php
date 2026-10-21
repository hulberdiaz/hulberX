<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 40px 15px;
        }

        .contenedor {
            max-width: 380px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px  #00000015;
        }
        h2 {
            text-align:center;
        }
        label {
            display:block;
            margin-top:15px;
        }
        input {
            box-sizing: border-box;
            width: 100%;
            padding: 11px;
            margin-top:6px;
        }
        button {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
        }
        .exito {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
        }
    </style>
</head>
<body>    
    <div class="contenedor">
    <h2>Inicio de sesión</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <p class="exito">
            <?= esc(session()->getFlashdata('mensaje')) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <label for="usuario">Usuario:</label>
        <input 
        type="text" 
        id="usuario"
        name="usuario" 
        required
        autocomplete="username"
        >
        
        <label for="password">contraseña:</label>
        <input
        type="password"
        id="password"
        name="password"
        required 
        autocomplete="current-password"
        >

        <button type="submit">Ingresar</button>
    </form>
</div>

    </body>
</html>