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
</head>
<body class="bg-sec">
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
    <!-- Header -->
    <header class="container-fluid">
        <section class="row vh-100 bg-header align-items-center justify-content-between">
            <article class="col-4">
                <img decoding="async" loading="lazy" class="img-custom d-block" src="/media/logo.png" alt="Nasa Logo">
            </article>
            <article class="col-8 col-md-4">
                <h1 class="text-sec text-center h1-font">National <div class="text-main">Aeronautics</div> <div class="text-third">and Space</div> Administration</h1>
            </article>
        </section>
    </header>
    <main class="my-5">
        <!-- Section Discoveries -->
        <section class="container" id="discoveries">
            <div class="row text-third">
                <article class="col-12">
                    <h2 class="h1 text-center mb-5 botton3">LAST DISCOVERIES</h2>
                </article>
                <article class="col-12 col-md-6">
                    <img decoding="async" loading="lazy" src="/media/pulsar.gif" alt="Pulsar gif" class="img-custom d-block mx-auto mx-md-0 ms-md-auto">
                </article>
                <article class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h3 class="h2 botton1 fw-bold">Pulsar</h3>
                    <p class="lead">A pulsar is a highly magnetized, rapidly rotating neutron star that emits beams of electromagnetic radiation from its magnetic poles. As these beams sweep across space like a lighthouse beacon, they create regularly spaced pulses detected on Earth.</p>
                </article>
            </div>
            <div class="row my-3 text-third">
                <article class="col-12 col-md-6">
                    <img decoding="async" loading="lazy" src="/media/magnetar.gif" alt="Magnetar Star gif" class="img-custom d-block mx-auto mx-md-0">
                </article>
                <article class="col-12 col-md-6 d-flex flex-column justify-content-center order-md-first align-items-end">
                    <h3 class="h2 botton2 fw-bold">Magnetar</h3>
                    <p class="lead">A magnetar is a type of young, rapidly spinning neutron star with an ultra-powerful magnetic field, roughly 1,000 times stronger than a typical neutron star and a trillion times stronger than Earth's. Formed from the core-collapse of massive stars, these objects release immense energy via X-ray and gamma-ray flares powered by magnetic field decay.</p>
                </article>
            </div>
            <div class="row text-third">
                <article class="col-12 col-md-6">
                    <img decoding="async" loading="lazy" src="/media/supernovae.gif" alt="Ultra Massive Black Hole gif" class="img-custom d-block mx-auto mx-md-0 ms-md-auto">
                </article>
                <article class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h3 class="h2 botton3 fw-bold">UMBHs</h3>
                    <p class="lead">Ultramassive black holes (UMBHs) are the most massive known objects in the universe, typically defined as having masses exceeding 10 billion solar masses (\(10^{10}\ M_\odot\)). They reside at the centers of massive galaxies, representing the upper limit of black hole growth and are 10,000+ times heavier than our Milky Way’s central black hole.</p>
                </article>
            </div>
        </section>
        <!--Universal Timeline -->
        <section class="container my-5" id="timeline">
            <div class="row">
                <article class="col-12 text-center mb-3 text-speedlight">
                    <h2>Timeline</h2>
                </article>
                <article class="col-6 py-4 timeline-r"></article>
                <article class="col-6 py-4 timeline-l text-third">
                    <p class="h3 circle-l botton1">13.8 Billion Years ago - The Big bang</p>
                </article>
                <article class="col-6 py-4 timeline-r text-third">
                    <p class="h3 circle-r botton2">4.54 Billion Years ago - Earth is Born</p>
                </article>
                <article class="col-6 py-4 timeline-l"></article>
                <article class="col-6 py-4 timeline-r"></article>
                <article class="col-6 py-4 timeline-l text-third">
                    <p class="h3 circle-l botton3">300 Thousand Years ago - The First Human</p>
                </article>
            </div>
        </section>
        <!-- Most Viewed Section -->
        <section class="container-fluid bg-main my-5 py-5" id="Viewed">
            <div class="row justify-content-center">
                <article class="col-12 mb-3 text-sec text-center">
                    <h2>Most Viewed</h2>
                </article>
                <article class="col-12 col-md-3 px-3">
                    <div class="card card-custom">
                        <img decoding="async" loading="lazy" src="/media/ton618.gif" class="card-img-top img-leader" alt="Ton 618 gif">
                        <div class="card-body">
                            <h5 class="card-title h3 fw-bold text-center text-sec">Ton 618</h5>
                            <p class="card-text">TON 618 is an extremely luminous, distant quasar and one of the largest known supermassive black holes in the universe. Located 18.2 billion light-years away in the Canes Venatici constellation, it weighs an estimated 66 billion solar masses, measuring roughly 30–40 times the size of our solar system.</p>
                        </div>
                    </div>
                </article>
                <article class="col-12 col-md-3 px-3">
                    <div class="card card-custom">
                        <img decoding="async" loading="lazy" src="/media/sirio.gif" class="card-img-top img-leader" alt="Sirius b Star gif">
                        <div class="card-body">
                            <h5 class="card-title h3 fw-bold text-center text-sec">Sirius b</h5>
                            <p class="card-text">It is a white dwarf, a remnant of an intermediate-mass star that has exhausted its fuel, and is the closest example to Earth. It is the secondary component of the Sirius binary system, of which the 'A' component is the brightest star in the night sky.[11] Sirius B, on the other hand, cannot be seen to the naked eye as its luminosity is only 2% that of the Sun. Sirius is the fifth-nearest star system to the Sun, 8.6 light-years distant</p>
                        </div>
                    </div>
                </article>
                <article class="col-12 col-md-3 px-3">
                    <div class="card card-custom">
                        <img decoding="async" loading="lazy" src="/media/antares.gif" class="card-img-top img-leader" alt="Antares Star gif">
                        <div class="card-body">
                            <h5 class="card-title h3 fw-bold text-center text-sec">Antares</h5>
                            <p class="card-text">Antares (Alpha Scorpii) is a massive, red supergiant star located roughly 550–600 light-years away, acting as the bright, reddish heart of the constellation Scorpius. As one of the largest known stars—approx. 700 times the sun’s diameter—it is a dying star, shining 10,000 times brighter than the Sun, and is often considered a future supernova candidate</p>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer>
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
</body>
</html>

