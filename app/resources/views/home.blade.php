<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rastreio.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Background Video-->
<video class="bg-video"
       playsinline="playsinline"
       autoplay="autoplay"
       muted="muted"
       loop="loop">
    <source src="{{ asset('/img/bg.mp4') }}" type="video/mp4" />
</video>
<!-- Masthead-->
<div class="masthead">
    <div class="masthead-content text-white">
        <div class="container-fluid px-4 px-lg-0">
            <h1 class="fst-italic lh-1 mb-4">Rastreio de Encomendas</h1>
            <p class="mb-5">Busque por sua encomenda na Rastrios.Com</p>

                <!-- Email address input-->
                <div class="row input-group-newsletter">
                    <div class="col">
                        <input class="form-control" id="cpf" type="text"
                               placeholder="000.000.000-00" aria-label="Digite seu CPF"
                               data-sb-validations="required" />
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" onclick="searchOrders()">Procurar</button>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- Social Icons-->
<!-- For more icon options, visit https://fontawesome.com/icons?d=gallery&p=2&s=brands-->
<div class="social-icons">
    <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
        <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
