<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            background: #f1f5f9;
            color: #0f172a;
            font-family: Arial, sans-serif;
        }
        .barra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px max(24px, calc((100% - 1080px) / 2));
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
        }
        .marca { margin: 0; color: #1d4ed8; font-size: 1.25rem; }
        .salir {
            padding: 10px 14px;
            border: 0;
            border-radius: 7px;
            background: #1d4ed8;
            color: #fff;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }
        .salir:hover { background: #1e40af; }
        main { width: min(100% - 32px, 1080px); margin: 40px auto; }
        .bienvenida {
            padding: 30px;
            border-radius: 14px;
            background: #1d4ed8;
            color: #fff;
        }
        .bienvenida h2 { margin: 0 0 8px; font-size: clamp(1.5rem, 4vw, 2rem); }
        .bienvenida p { margin: 0; color: #dbeafe; }
        .tarjetas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 22px;
        }
        .tarjeta {
            padding: 22px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
        }
        .tarjeta h3 { margin: 0 0 12px; color: #475569; font-size: .95rem; }
        .valor { margin: 0; font-size: 1.2rem; font-weight: 700; overflow-wrap: anywhere; }
        .estado { color: #15803d; }
        @media (max-width: 480px) {
            .barra { padding: 14px 16px; }
            main { margin-top: 24px; }
            .bienvenida { padding: 23px; }
        }
    </style>
</head>
<body>
    <header class="barra">
        <h1 class="marca">Dashboard</h1>
        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button class="salir" type="submit">Cerrar sesión</button>
        </form>
    </header>

    <main>
        <section class="bienvenida">
            <h2>¡Bienvenido, <?= esc((string) session()->get('usuario')) ?>!</h2>
            <p>Has iniciado sesión correctamente. Este es tu panel principal.</p>
        </section>

        <section class="tarjetas" aria-label="Información de la sesión">
            <article class="tarjeta">
                <h3>Usuario</h3>
                <p class="valor"><?= esc((string) session()->get('usuario')) ?></p>
            </article>
            <article class="tarjeta">
                <h3>Estado de la sesión</h3>
                <p class="valor estado">Activa</p>
            </article>
            <article class="tarjeta">
                <h3>Sección actual</h3>
                <p class="valor">Dashboard</p>
            </article>
        </section>
    </main>
</body>
</html>
