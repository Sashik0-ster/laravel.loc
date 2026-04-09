<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/main.css', 'resources/js/app.js'])
    <title>Реєстрація</title>
</head>

<body class="auth-body">

<div class="auth-card">
    <div class="text-center mb-4">
        <div class="logo-hp" style="font-size: 28px;">Sashik0<span style="color: var(--accent-teal);">Product</span></div>
        <div style="font-size: 11px; color: var(--text-muted); margin-top: 4px;">Produce by Ukraine</div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h5 class="text-center mb-4 fw-bold">Створити акаунт</h5>

            <form action="{{ route('registration.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Ім'я</label>
                    <input type="text" name="name" class="form-control custom-input"
                           value="{{ old('name') }}" placeholder="Ваше ім'я">
                    @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control custom-input"
                           value="{{ old('email') }}" placeholder="your@email.com">
                    @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control custom-input"
                           placeholder="••••••••">
                    @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-2 mt-4">
                    <button type="submit" class="btn btn-teal">Зареєструватися</button>
                    <a href="{{ route('login') }}" class="btn btn-outline">Вже є акаунт? Увійти</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
