<body>
    <script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin=""></script>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-md  bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">KrakenHard</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item m-1">
                        <a class="nav-link active fw-bold color-font-prymary" aria-current="page" href="<?php echo base_url("/") ?>">Inicio</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link active fw-bold" aria-current="page" href="<?php echo base_url("/about") ?>">Quienes somos</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link active fw-bold" aria-current="page" href="<?php echo base_url("/comercialization") ?>">Comercialización</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link active fw-bold" aria-current="page" href="<?php echo base_url("/contact") ?>">Contacto</a>
                    </li>

                    <li class="nav-item m-1">
                        <button type="button" class="btn btn-outline-primary me-2 fw-bold">Login</button>
                    </li>

                    <li class="nav-item  ">
                        <button type="button" class="btn btn-primary m-1 fw-bold">Sign-up</button>
                    </li>
                </ul>



            </div>
        </div>
    </nav>