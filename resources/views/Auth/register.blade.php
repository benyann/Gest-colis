<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inscription - DarkPan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-truck me-2"></i>Gest-colis</h3>
                            </a>
                            <h3>S'inscrire</h3>
                        </div>

                        {{-- Affichage des erreurs de validation --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Formulaire d’inscription --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="{{ old('name') }}" required>
                                <label for="name">Nom complet</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                <label for="email">Adresse Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" required>
                                <label for="password">Mot de passe</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmation mot de passe" required>
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Créer mon compte</button>
                        </form>

                        <p class="text-center mb-0">Déjà un compte ? <a href="{{ route('login.form') }}">Connectez-vous ici</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
