<body>

    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-md  bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?php echo base_url("/") ?>">
                <img class="mx-1 mb-1" src="assets/img/icons/logo.png" alt="" width="25" height="25">
                <span>Mountain<span class="my-text-color">Tech</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/") ?>">Inicio</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/comercialization") ?>">Productos</a>
                    </li>

                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/contact") ?>">Contacto</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/about") ?>">About</a>
                    </li>
                    <li class="nav-item m-1">
                        <button type="button" class="btn my-btn-outline-primary  fw-bold">Login</button>
                    </li>

                    <li class="nav-item  m-1">
                        <button type="button" class="btn my-btn-primary  fw-bold">Sign-up</button>
                    </li>
                </ul>


            </div>
        </div>
    </nav>