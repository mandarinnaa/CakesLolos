<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lolos Cake - Pastelería y Recetas</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Cardo:400italic|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* Estilos generales */
        body {
            margin: 0;
            background: linear-gradient(135deg, #e4dac4, #f8f3e6);
            font-family: 'Cardo', serif;
            color: #5a3e36;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        .navbar {
            background-color: #ffcccb;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .navbar::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-family: 'Pacifico', cursive;
            font-size: 1.5rem;
            color: #5a3e36;
            animation: fadeInDown 1s ease-in-out;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .navbar-nav {
            display: flex;
            gap: 20px;
            animation: fadeInDown 1s ease-in-out;
        }

        .nav-link {
            color: #5a3e36;
            font-size: 1.1rem;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #8b4513;
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: #8b4513;
            transform: translateY(-3px);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }

        .card-header {
            background: linear-gradient(135deg, #ffcccb, #ffb6b6);
            padding: 20px;
            text-align: center;
        }

        .card-header img {
            width: 100px;
            height: auto;
            margin-bottom: 15px;
        }

        .card-header h1 {
            font-family: 'Pacifico', cursive;
            color: #5a3e36;
            font-size: 2rem;
            margin: 0;
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #ffcccb;
            outline: none;
        }

        .btn {
            border-radius: 20px;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #ff6f61;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff4a3d;
        }

        .btn-danger {
            background-color: #db4437;
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c23321;
        }

        .btn-dark {
            background-color: #333;
            border: none;
            color: white;
        }

        .btn-dark:hover {
            background-color: #222;
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 20px;
        }

        .text-decoration-none {
            text-decoration: none;
        }

        .text-white {
            color: white;
        }

        /* Efectos de estrellas */
        .starsec, .starthird, .starfourth, .starfifth {
            content: " ";
            position: absolute;
            width: 3px;
            height: 3px;
            background: transparent;
            box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
            animation: animStar 150s linear infinite;
        }

        .starthird {
            animation: animStar 10s linear infinite;
        }

        .starfourth {
            animation: animStar 50s linear infinite;
        }

        .starfifth {
            animation: animStar 80s linear infinite;
        }

        @keyframes animStar {
            0% {
                transform: translateY(0px);
            }
            100% {
                transform: translateY(-2000px);
            }
        }
</style>
</head>
<body>
<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('images/Log.png') }}" alt="Logo de Lolos Cake">
        Lolos Cake
    </div>
    <div class="navbar-nav">
        <a class="nav-link" href="{{ route('welcome') }}">Bienvenido</a>
        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
    </div>
</nav>
<div class="register-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-white text-center py-4">
                        <img src="{{ asset('images/Log.png') }}" alt="Lolos Cake Logo" class="register-logo" style="width: 100px;">
                        <h1 class="display-4">Registro</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre:</label>
                                    <input type="name" name="name" id="name" class="form-control" placeholder="Tu nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico:</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="tucorreo@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                                    <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="********" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Registrarse</button>

                        </form>

                        <div class="mt-3 text-center">
                            <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-decoration-none">Incia sesion</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Efectos de estrellas -->
    <div>
        <div class="starsec"></div>
        <div class="starthird"></div>
        <div class="starfourth"></div>
        <div class="starfifth"></div>
    </div>
</body>
</html>