<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>werwigo - Find your next travel vibes</title>
    <link rel="stylesheet" href="{{ asset('/') }}home-assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}home-assets/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @media screen and (max-width: 768px) {
            .inlook-heading {
                font-size: 35px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav
        class="px-2 py-4 navbar navbar-light bg-white/40 backdrop-blur-2xl fixed-top px-lg-5 lg:bg-transparent lg:backdrop-blur-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="sitename">werwigo</div>
            </a>
            <button class="px-3 py-1 btn-download">Soon available</button>
        </div>
    </nav>
    <!-- Main section -->
    <div class="container main-container">
        <div class="row d-flex justify-content-center">
            <div class="text-center col-lg-8">
                <h1 class="inlook-heading ">we are travellers,<br>we are mobile.</h1>
                {{-- <h4 class="mt-4 paragraph"><b>Open werwigo.com</b> on your <b>mobile browser</b> (Chrome or Safari) to
                    get a full experience.</h4> --}}
                <h4 class="mt-4 paragraph">Our App will soon be available to get a full experience.
                </h4>
                <button class="px-4 py-2 mx-auto mt-4 btn-appstore d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill:rgba(255, 255, 255, 1)">
                        <path
                            d="M19.665,16.811c-0.287,0.664-0.627,1.275-1.021,1.837c-0.537,0.767-0.978,1.297-1.316,1.592 c-0.525,0.482-1.089,0.73-1.692,0.744c-0.432,0-0.954-0.123-1.562-0.373c-0.61-0.249-1.17-0.371-1.683-0.371 c-0.537,0-1.113,0.122-1.73,0.371c-0.616,0.25-1.114,0.381-1.495,0.393c-0.577,0.025-1.154-0.229-1.729-0.764 c-0.367-0.32-0.826-0.87-1.377-1.648c-0.59-0.829-1.075-1.794-1.455-2.891c-0.407-1.187-0.611-2.335-0.611-3.447 c0-1.273,0.275-2.372,0.826-3.292c0.434-0.74,1.01-1.323,1.73-1.751C7.271,6.782,8.051,6.563,8.89,6.549 c0.46,0,1.063,0.142,1.81,0.422s1.227,0.422,1.436,0.422c0.158,0,0.689-0.167,1.593-0.498c0.853-0.307,1.573-0.434,2.163-0.384 c1.6,0.129,2.801,0.759,3.6,1.895c-1.43,0.867-2.137,2.08-2.123,3.637c0.012,1.213,0.453,2.222,1.317,3.023 c0.392,0.372,0.829,0.659,1.315,0.863C19.895,16.236,19.783,16.529,19.665,16.811L19.665,16.811z M15.998,2.38 c0,0.95-0.348,1.838-1.039,2.659c-0.836,0.976-1.846,1.541-2.941,1.452c-0.014-0.114-0.021-0.234-0.021-0.36 c0-0.913,0.396-1.889,1.103-2.688c0.352-0.404,0.8-0.741,1.343-1.009c0.542-0.264,1.054-0.41,1.536-0.435 C15.992,2.127,15.998,2.254,15.998,2.38L15.998,2.38z">
                        </path>
                    </svg>
                    <span class="ms-2">Soon on AppStore</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="pt-5 my-4 mt-5 fixed-bottom">
        <ul class="flex-row nav justify-content-center fw-bold">
            <li><a href="#" class="nav-link">Privacy Policy</a></li>
            <li><a href="{{ route('terms-of-service') }}" class="nav-link">Terms of service</a></li>
            @if (app()->isLocale('it'))
                <a href="{{ Route::localizedUrl('en') }}" class="nav-link"><i class="fa fa-globe"></i> English</a>
            @else
                <a href="{{ Route::localizedUrl('it') }}" class="nav-link"><i class="fa fa-globe"></i> Italiano</a>
            @endif
            <li><a href="{{ route('contacts-and-support') }}" class="nav-link">Help</a></li>

        </ul>
    </footer>
    <!-- Bootstrap JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>
