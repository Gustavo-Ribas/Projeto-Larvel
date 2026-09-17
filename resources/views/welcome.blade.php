<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GGM — Loja de Carros</title>

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
            margin: 0;
            padding: 0;
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

        .wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 24px;
        }

        header {
            border-bottom: 1px solid var(--line);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
            gap: 24px;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            font-size: 28px;
            letter-spacing: 0.06em;
            display: flex;
            align-items: baseline;
            gap: 8px;
        }

        .logo span {
            color: var(--accent);
        }

        nav.main-nav {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        nav.main-nav a.nav-link {
            font-size: 15px;
            color: var(--text-muted);
            transition: color 0.15s ease;
        }

        nav.main-nav a.nav-link:hover {
            color: var(--text);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 500;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-primary {
            background: var(--accent);
            color: #16171c;
        }

        .btn-primary:hover {
            background: #f2b459;
        }

        .btn-ghost {
            border-color: var(--line);
            color: var(--text);
        }

        .btn-ghost:hover {
            border-color: var(--accent);
        }

        .hero {
            padding: 88px 0 96px;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
            gap: 48px;
            align-items: center;
        }

        .hero-copy .eyebrow {
            color: var(--accent);
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .hero-copy h1 {
            font-size: 58px;
            line-height: 1.04;
            max-width: 11ch;
        }

        .hero-copy p {
            margin-top: 22px;
            font-size: 17px;
            line-height: 1.6;
            color: var(--text-muted);
            max-width: 42ch;
        }

        .hero-actions {
            margin-top: 34px;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-art {
            position: relative;
            border: 1px solid var(--line);
            border-radius: 6px;
            background:
                linear-gradient(var(--panel), var(--panel)) padding-box,
                repeating-linear-gradient(0deg, transparent, transparent 27px, var(--line) 27px, var(--line) 28px),
                repeating-linear-gradient(90deg, transparent, transparent 27px, var(--line) 27px, var(--line) 28px);
            background-color: var(--panel);
            padding: 32px;
            overflow: hidden;
        }

        .hero-art svg {
            width: 100%;
            height: auto;
            display: block;
        }

        .features {
            padding: 72px 0 96px;
            border-top: 1px solid var(--line);
        }

        .features h2 {
            font-size: 34px;
            max-width: 18ch;
        }

        .features-grid {
            margin-top: 42px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--line);
            border: 1px solid var(--line);
        }

        .feature-card {
            background: var(--bg);
            padding: 32px 28px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            background: var(--accent-soft);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 18px;
            margin: 0 0 10px;
        }

        .feature-card p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: var(--text-muted);
        }

        footer {
            border-top: 1px solid var(--line);
            padding: 26px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }

        @media (max-width: 860px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 56px 0 64px;
            }
            .hero-copy h1 { font-size: 42px; }
            .features-grid { grid-template-columns: 1fr; }
            nav.main-nav { display: none; }
        }
    </style>
</head>
<body>

    <header>
        <div class="wrap header-inner">
            <a href="{{ url('/') }}" class="logo">GG<span>M</span></a>

            <nav class="main-nav">
                <a class="nav-link" href="{{ url('/') }}">Início</a>
                @auth
                    <a class="nav-link" href="{{ route('carros.index') }}">Carros</a>
                    <a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a>
                @endauth
            </nav>

            <div class="header-actions">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="btn btn-ghost">Perfil</a>
                    @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-ghost">Entrar</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Criar conta</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <main>
        <section class="hero wrap">
            <div class="hero-copy">
                <div class="eyebrow">Loja de carros</div>
                <h1>O carro certo está mais perto do que parece.</h1>
                <p>
                    A GGM reúne o catálogo completo em um só lugar: navegue por marca,
                    compare modelos e converse com a equipe sem enrolação.
                </p>
                <div class="hero-actions">
                    @auth
                        <a href="{{ route('carros.index') }}" class="btn btn-primary">Ver catálogo</a>
                        <a href="{{ route('marcas.index') }}" class="btn btn-ghost">Ver marcas</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Criar conta</a>
                        @endif
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-ghost">Já tenho conta</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hero-art">
                <svg viewBox="0 0 400 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40 165 C40 150 55 150 68 150 L92 122 C98 114 108 109 118 109 L232 109 C244 109 255 114 262 123 L286 150 C300 150 314 150 320 158 C328 168 328 182 320 188 L306 188"
                        stroke="#e8a33d" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M68 150 L306 150" stroke="#e8a33d" stroke-width="2.5" stroke-linecap="round"/>
                    <path d="M120 150 L120 122 C120 116 124 112 130 112 L150 112 L150 150" stroke="#e8a33d" stroke-width="2" stroke-linejoin="round"/>
                    <path d="M158 150 L158 112 L212 112 C222 112 230 117 236 125 L250 150" stroke="#e8a33d" stroke-width="2" stroke-linejoin="round"/>
                    <circle cx="112" cy="168" r="22" stroke="#e8a33d" stroke-width="2.5"/>
                    <circle cx="112" cy="168" r="7" stroke="#e8a33d" stroke-width="2"/>
                    <circle cx="268" cy="168" r="22" stroke="#e8a33d" stroke-width="2.5"/>
                    <circle cx="268" cy="168" r="7" stroke="#e8a33d" stroke-width="2"/>
                    <line x1="40" y1="188" x2="80" y2="188" stroke="#e8a33d" stroke-width="2" stroke-linecap="round" opacity="0.5"/>
                    <line x1="300" y1="188" x2="340" y2="188" stroke="#e8a33d" stroke-width="2" stroke-linecap="round" opacity="0.5"/>
                </svg>
            </div>
        </section>

        <section class="features wrap">
            <h2>Feito para quem só quer achar o carro e resolver.</h2>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e8a33d" stroke-width="2"><path d="M4 12h16M4 12l3-3M4 12l3 3M20 12l-3-3M20 12l-3 3"/></svg>
                    </div>
                    <h3>Catálogo organizado por marca</h3>
                    <p>Veja rapidamente todos os modelos de cada marca, com ano, preço e cor, sem precisar filtrar nada na mão.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e8a33d" stroke-width="2"><path d="M12 3l7 3v6c0 4.5-3 8-7 9-4-1-7-4.5-7-9V6l7-3z"/></svg>
                    </div>
                    <h3>Acesso por papel</h3>
                    <p>Administrador, gerente e usuário enxergam e fazem só o que faz sentido pra cada um — sem confusão de permissões.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e8a33d" stroke-width="2"><path d="M4 20l3.5-1 10-10-2.5-2.5-10 10L4 20z"/><path d="M14 6l2.5 2.5"/></svg>
                    </div>
                    <h3>Cadastro sem enrolação</h3>
                    <p>Adicionar, editar ou remover um carro leva poucos cliques, com validação que avisa na hora se algo está faltando.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="wrap footer-inner">
            <span>GGM · Loja de Carros</span>
            <span>Projeto acadêmico — Laravel · PostgreSQL</span>
        </div>
    </footer>

</body>
</html>