<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel principal</title>
    <style>
        *{box-sizing:border-box}
        body{font-family:Arial,sans-serif;background:#f1f5f9;margin:0;padding:32px 16px;color:#1e293b}
        main{max-width:960px;margin:auto}
        header,.card{background:#fff;border-radius:12px;padding:24px;box-shadow:0 3px 12px #00000012}
        header{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap}
        h1{margin:0 0 8px}
        p{color:#64748b}
        .cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:18px;margin-top:20px}
        .number{font-size:2rem;font-weight:700;color:#1d4ed8;margin:8px 0}
        a,button{display:inline-block;padding:10px 14px;border:0;border-radius:6px;background:#2563eb;color:#fff;text-decoration:none;cursor:pointer;font-size:1rem}
        .logout{background:#475569}
        form{margin:0}
    </style>
</head>
<body>
<main>
    <header>
        <div>
            <h1>Panel principal</h1>
            <p>Bienvenido, <strong><?= esc(session()->get('usuario')) ?></strong>.</p>
        </div>
        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button class="logout" type="submit">Cerrar sesión</button>
        </form>
    </header>
    <section class="cards" aria-label="Resumen del sistema">
        <article class="card">
            <h2>Alumnos registrados</h2>
            <p class="number"><?= esc($totalAlumnos) ?></p>
            <a href="<?= site_url('alumnos') ?>">Ver alumnos</a>
        </article>
        <article class="card">
            <h2>Nuevo registro</h2>
            <p>Agrega un alumno al registro académico.</p>
            <a href="<?= site_url('alumnos/nuevo') ?>">Registrar alumno</a>
        </article>
    </section>
</main>
</body>
</html>
