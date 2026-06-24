<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nasa</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceland&display=swap" rel="stylesheet">
    <!-- Bootstrap-->    <!-- Bootstrap 2-->
    <link href="/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/nasa.css">
    <link rel="shortcut icon" href="/media/logo.png" type="image/x-icon">
  <x-fluid-assets target="head" />
</head>
<body class="bg-sec bg-header">
    <a class="exercise-home-link" href="home.html">Home</a>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-sec shadow-sm sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler text-third" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <img decoding="async" loading="lazy" class="logo" src="/media/logo2.png" alt="Logo Nasa">
                    <li class="nav-item">
                        <a class="botton1 nav-link text-third fw-bold fs-nav-link" aria-current="page" href="https://www.nasa.gov/">Home Nasa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="botton2 nav-link text-third fw-bold fs-nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sections
                        </a>
                        <ul class="dropdown-menu bg-sec">
                            <li><a class="dropdown-item text-third" href="https://www.nasa.gov/gallery/journey-to-the-moon/">Artemis</a></li>
                            <li><a class="dropdown-item text-third" href="https://www.nasa.gov/image-of-the-day/">Daily Image</a></li>
                            <li><a class="dropdown-item text-third" href="https://www.nasa.gov/gallery/hubble/">Hubble</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="botton3 nav-link text-third fw-bold fs-nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu bg-sec">
                            <li><a class="dropdown-item text-third" href="nasa2.html">Register</a></li>
                            <li><a class="dropdown-item text-third" href="nasa1.html">Login</a></li>
                        </ul>
                    </li>
                    <img decoding="async" loading="lazy" class="logo2" src="/media/Logo3.png" alt="Logo Nasa">
                </ul>
            </div>
        </div>
    </nav>
    <!--Form -->
    <main class="container">
        <section class="row vh-100 align-items-center justify-content-center">
            <article class="col-12 col-md-5">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label text-third">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label text-third">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-third">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-third">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-third">Description (your choice)</label>
                        <textarea name="" id="description" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger text-third">Submit</button>
                </form>
            </article>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-sec p-2">
        <div class="container text-third">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-main">No Shipping in Space</h5>
                    <p class="text-sec">DO NOT ASK THERE'S NO BUDGET</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-main">For all the News</h5>
                    <ul class="list-unstyled">
                        <li><a href="nasa2.html" class="text-white text-decoration-none">Register</a></li>
                        <li><a href="nasa1.html" class="text-white text-decoration-none">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-main">Contacts</h5>
                    <p>Email: info-center@hq.nasa.gov</p>
                    <p>Phone N.: +1 281-483-0123</p>
                </div>
            </div>
            <div class="text-center border-top pt-3">
                <p class="mb-0">© 2026 Nasa - All rights are reserved.</p>
            </div>
        </div>
    </footer>
    <script src="/vendor/bootstrap/bootstrap.bundle.min.js"></script>
  <x-fluid-assets target="body" />
</body>
</html>

