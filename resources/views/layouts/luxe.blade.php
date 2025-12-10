<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-1: #0f1024;
            --bg-2: #191a33;
            --accent: #c9a646;
            --accent-2: #7dd1ff;
            --text: #f7f8ff;
            --muted: #c9ccdc;
            --card: rgba(24, 26, 48, 0.85);
            --stroke: rgba(255, 255, 255, 0.08);
            --shadow: 0 24px 80px rgba(0,0,0,0.35), 0 0 0 1px rgba(255,255,255,0.02);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at 12% 18%, rgba(125, 209, 255, 0.2), transparent 22%),
                        radial-gradient(circle at 82% 12%, rgba(201, 166, 70, 0.22), transparent 20%),
                        radial-gradient(circle at 20% 82%, rgba(125, 209, 255, 0.16), transparent 24%),
                        linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }
        header {
            position: sticky;
            top: 0;
            z-index: 10;
            backdrop-filter: blur(12px);
            background: rgba(15, 16, 36, 0.75);
            border-bottom: 1px solid var(--stroke);
        }
        .nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.3px;
            font-size: 20px;
            color: #fdfbf5;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }
        .nav-links a, .nav-links button {
            color: var(--text);
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            border: 1px solid transparent;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .nav-links a:hover, .nav-links button:hover {
            background: rgba(255,255,255,0.07);
            border-color: rgba(255,255,255,0.08);
        }
        .nav-links .primary {
            background: linear-gradient(120deg, #7dd1ff, #c9a646);
            color: #0f0f17;
            box-shadow: 0 12px 30px rgba(125,209,255,0.28);
        }
        main {
            max-width: 1200px;
            margin: 32px auto 48px;
            padding: 0 24px;
        }
        .grid {
            display: grid;
            gap: 18px;
        }
        .card {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 16px;
            padding: 22px;
            box-shadow: var(--shadow);
        }
        .card h2, .card h3 {
            margin: 0 0 10px;
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.2px;
        }
        .muted { color: var(--muted); }
        table {
            width: 100%;
            border-collapse: collapse;
            color: var(--text);
        }
        th, td {
            padding: 12px 14px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            text-align: left;
        }
        th {
            font-weight: 700;
            background: rgba(255,255,255,0.03);
        }
        tr:hover td { background: rgba(255,255,255,0.02); }
        .btn {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }
        .btn-primary {
            background: linear-gradient(120deg, #7dd1ff, #c9a646);
            color: #0f0f17;
            box-shadow: 0 10px 26px rgba(125,209,255,0.28);
        }
        .btn-ghost {
            background: rgba(255,255,255,0.06);
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.08);
        }
        .btn-danger {
            background: linear-gradient(120deg, #ff7b7b, #d24d4d);
            color: #0f0f17;
            box-shadow: 0 10px 24px rgba(255,123,123,0.3);
        }
        .btn:hover { transform: translateY(-1px); }
        form.inline { display: inline; }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            color: var(--text);
            font-size: 12px;
        }
        .fields {
            display: grid;
            gap: 14px;
        }
        label { font-weight: 600; margin-bottom: 6px; display: block; }
        input, textarea, select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--stroke);
            background: rgba(255,255,255,0.03);
            color: var(--text);
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #7dd1ff;
            box-shadow: 0 0 0 3px rgba(125,209,255,0.18);
        }
        .actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .alert {
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
            color: #f9dede;
            margin-bottom: 14px;
        }
        .success { color: #d6ffd6; border-color: rgba(125,209,255,0.35); }
    </style>
    @stack('styles')
</head>
<body>
<header>
    <div class="nav">
        <div class="brand">E-Commerce</div>
        <div class="nav-links">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('products.index') }}">Produk</a>
                <a href="{{ route('toko.index') }}">Toko</a>
                <a href="{{ route('stok.index') }}">Stok</a>
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="btn btn-ghost">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>

<main>
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>
</body>
</html>
