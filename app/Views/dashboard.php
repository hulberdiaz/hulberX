<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel principal</title>
</head>
<body>
    <main>
        <h1>Bienvenido, <?= esc(session()->get('usuario')) ?></h1>
        <p>Has iniciado sesión correctamente.</p>
        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit">Cerrar sesión</button>
        </form>
    </main>
</body>
</html>
