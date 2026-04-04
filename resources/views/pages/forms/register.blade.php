<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/main.css'])

    <title>{{'Мій Додаток' }}</title>

</head>

<body>

<main class="main">

    <header>
        <x-header/>
    </header>

    <div class="d-flex">
        <div style="margin-left: 250px; width: calc(100% - 650px);">

            <div class="d-flex justify-content-center m-5" style="min-height: 100vh;">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow border-1">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4">Реєстрація</h3>

                            <form action="{{ route('registration.store') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Ім'я</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                           value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                           id="exampleInputPassword1 " value="{{ old('password') }}">
                                    @error('password')
                                    <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit"
                                        class="btn btn-primary w-100 py-2 d-flex justify-content-center align-items-center">
                                    Зареєструватися
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


