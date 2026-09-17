<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marcas — GGM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #12141a;
            --panel: #1b1e27;
            --line: #2e3240;
            --text: #f4f2ed;
            --text-muted: #9a9daa;
            --accent: #e8a33d;
            --accent-soft: rgba(232, 163, 61, 0.14);
        }
        * { box-sizing: border-box; }
        html, body {
            margin: 0; padding: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        h1, h2, .display {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            letter-spacing: 0.01em;
            margin: 0;
        }
        a { color: inherit; text-decoration: none; }
        .wrap { max-width: 1120px; margin: 0 auto; padding: 0 24px; }

        header { border-bottom: 1px solid var(--line); }
        .header-inner {
            display: flex; align-items: center; justify-content: space-between;
            padding: 20px 0; gap: 24px; flex-wrap: wrap;
        }
        .logo {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700; font-size: 28px; letter-spacing: 0.06em;
            display: flex; align-items: baseline; gap: 8px;
        }
        .logo span { color: var(--accent); }
        nav.main-nav { display: flex; align-items: center; gap: 28px; }
        nav.main-nav a.nav-link { font-size: 15px; color: var(--text-muted); transition: color .15s ease; }
        nav.main-nav a.nav-link:hover, nav.main-nav a.nav-link.active { color: var(--text); }
        .header-actions { display: flex; align-items: center; gap: 12px; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 10px 20px; border-radius: 4px; font-size: 15px; font-weight: 500;
            border: 1px solid transparent; cursor: pointer; transition: all .15s ease;
            font-family: inherit; background: none;
        }
        .btn-primary { background: var(--accent); color: #16171c; }
        .btn-primary:hover { background: #f2b459; }
        .btn-ghost { border-color: var(--line); color: var(--text); }
        .btn-ghost:hover { border-color: var(--accent); }

        .page-head { padding: 48px 0 8px; }
        .page-head h1 { font-size: 42px; }
        .page-head p { margin: 6px 0 0; color: var(--text-muted); font-size: 15px; }

        main { padding-bottom: 96px; }

        .grid { margin-top: 36px; display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 18px; }
        .brand-card {
            border: 1px solid var(--line); border-radius: 6px; padding: 26px;
            background: var(--panel); transition: border-color .15s ease, transform .15s ease;
        }
        .brand-card:hover { border-color: var(--accent); transform: translateY(-2px); }
        .brand-card .nome { font-size: 26px; font-family: 'Barlow Condensed', sans-serif; font-weight: 700; }
        .count {
            display: inline-block; margin-top: 10px; background: var(--accent-soft); color: var(--accent);
            border-radius: 999px; padding: 3px 12px; font-size: 13px; font-weight: 500;
        }
        .brand-card .link { display: block; margin-top: 20px; font-size: 14px; font-weight: 500; color: var(--accent); }
        .brand-card .link:hover { color: #f2b459; }

        .empty { color: var(--text-muted); font-size: 14px; margin-top: 20px; }
        .back { display: inline-block; margin-top: 36px; font-size: 14px; color: var(--text-muted); }
        .back:hover { color: var(--text); }

        footer { border-top: 1px solid var(--line); padding: 26px 0; }
        .footer-inner {
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 12px; font-size: 13px; color: var(--text-muted);
        }

        @media (max-width: 860px) {
            nav.main-nav { display: none; }
            .page-head h1 { font-size: 32px; }
        }
    </style>
</head>
<body>

    <header>
        <div class="wrap header-inner">
            <a href="{{ url('/') }}" class="logo">GG<span>M</span></a>

            <nav class="main-nav">
                <a class="nav-link" href="{{ url('/') }}">Início</a>
                <a class="nav-link" href="{{ route('carros.index') }}">Carros</a>
                <a class="nav-link active" href="{{ route('marcas.index') }}">Marcas</a>
            </nav>

            <div class="header-actions">
                <a href="{{ route('profile.edit') }}" class="btn btn-ghost">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Sair</button>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="wrap page-head">
            <h1>Marcas</h1>
            <p>{{ $marcas->count() }} marcas cadastradas no catálogo</p>
        </div>

        <div class="wrap">
            @if($marcas->isEmpty())
                <p class="empty">Nenhuma marca cadastrada.</p>
            @else
                <div class="grid">
                    @foreach($marcas as $marca)
                        <div class="brand-card">
                            <div class="nome">{{ $marca->nome }}</div>
                            <span class="count">{{ $marca->carros_count }} {{ $marca->carros_count === 1 ? 'carro' : 'carros' }}</span>
                            <a class="link" href="{{ route('marcas.show', $marca) }}">Ver carros desta marca →</a>
                        </div>
                    @endforeach
                </div>
            @endif

            <a href="{{ route('carros.index') }}" class="back">← Voltar para todos os carros</a>
        </div>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <span>GGM · Loja de Carros</span>
            <span>Projeto acadêmico — Laravel · PostgreSQL</span>
        </div>
    </footer>

</body>
</html>