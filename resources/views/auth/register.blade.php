<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Commerce</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(125, 209, 255, 0.1) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .container {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
        }
        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            background: linear-gradient(135deg, #7dd1ff 0%, #c9a646 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }
        .logo p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }
        input {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        input:focus {
            outline: none;
            border-color: #7dd1ff;
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 0 0 3px rgba(125, 209, 255, 0.1);
        }
        input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #7dd1ff 0%, #5fb9e6 100%);
            border: none;
            border-radius: 10px;
            color: #0f0c29;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(125, 209, 255, 0.3);
            margin-top: 8px;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(125, 209, 255, 0.4);
        }
        .btn:active {
            transform: translateY(0);
        }
        .error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .error ul {
            margin: 0;
            padding-left: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 24px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }
        .footer a {
            color: #7dd1ff;
            text-decoration: none;
            font-weight: 600;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .decorative-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <div class="decorative-icon">✨</div>
                <h1>Buat Akun Baru</h1>
                <p>Daftar untuk memulai</p>
            </div>

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <button type="submit" class="btn">Daftar Sekarang</button>
            </form>

            <div class="footer">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
