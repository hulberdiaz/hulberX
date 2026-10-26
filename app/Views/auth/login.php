<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            margin: 0;
            padding: 24px;
            background: #f1f5f9;
            color: #0f172a;
            font-family: Arial, sans-serif;
        }
        .contenedor {
            width: min(100%, 400px);
            padding: 32px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 12px 35px #0f172a12;
        }
        h1 { margin: 0 0 8px; text-align: center; font-size: 1.6rem; }
        .descripcion { margin: 0 0 24px; color: #475569; text-align: center; }
        label { display: block; margin: 16px 0 6px; font-weight: 600; }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
        }
        input:focus { outline: 3px solid #bfdbfe; border-color: #2563eb; }
        button {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            border: 0;
            border-radius: 7px;
            background: #2563eb;
            color: #fff;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }
        button:hover { background: #1d4ed8; }
        .mensaje { margin: 0 0 16px; padding: 12px; border-radius: 7px; }
        .error { background: #fee2e2; color: #991b1b; }
        .exito { background: #dcfce7; color: #166534; }
    </style>
</head>
<body>
    <main class="contenedor">
        <h1>Iniciar sesión</h1>
        <p class="descripcion">Ingresa tus datos para acceder al panel.</p>

        <?php if ($error = session()->getFlashdata('error')): ?>
            <p class="mensaje error" role="alert"><?= esc($error) ?></p>
        <?php endif; ?>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
            <p class="mensaje exito" role="status"><?= esc($mensaje) ?></p>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <label for="usuario">Usuario</label>
            <input
                type="text"
                id="usuario"
                name="usuario"
                required
                autocomplete="username"
                autofocus
            >

            <label for="password">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
