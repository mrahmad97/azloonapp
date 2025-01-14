<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AZLOON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>

   <!-- Desktop Navbar (Laptop View) -->
   <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" id="desktop-navbar">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#"><h3>Azloon.com</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-5 search-box">
                <form action="">
                    <input class="form-control" type="search" placeholder="Dynamic title of products change automatically">
                    <i class="bi bi-search search-icon"></i>
                </form>
            </div>
            <ul class="navbar-nav ms-5">
                <li class="nav-item"><a class="nav-link" href="#">Download<br>Azloon App</a></li>
                <li class="nav-item">
                    <div class="welcome-container">
                        <i class="bi bi-person"></i>&nbsp;&nbsp;
                        <span>Welcome<br>Login / Register</span>
                    </div>
                </li>
                <li class="nav-item cart-icon-1">
                    <a class="nav-link" href="#"><i class="bi bi-cart"></i>&nbsp;&nbsp;Cart<span class="badge rounded-pill">2</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
