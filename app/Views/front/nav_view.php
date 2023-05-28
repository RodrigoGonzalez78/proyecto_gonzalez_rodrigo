<body>

    <!-- Barra de navegacion -->
    <nav class="navbar  navbar-expand-md  bg-dark" data-bs-theme="dark">
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
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/products") ?>">Productos</a>
                    </li>

                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/contact") ?>">Contacto</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/about") ?>">About</a>
                    </li>


                    <?php if (session()->get('access') == 1) {

                    ?>
                    <li class="nav-item m-1">
                        <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/users") ?>">Usuarios</a>
                    </li>
                    
                        <li class="nav-item  m-1">
                            <a href="<?php echo base_url("/login-out") ?>"><button type="button" class="btn btn-danger  fw-bold">
                            <img src="assets/img/icons/logout.svg" alt="" height="20%" width="20%" >    
                            Logout</button></a>
                        </li>

                    <?php

                    } elseif (session()->get('access') == 2) {
                    ?>

                        <li class="nav-item m-1">
                            <a class="my-navbar-link" aria-current="page" href="<?php echo base_url("/contact") ?>">Carrito</a>
                        </li>
                        <li class="nav-item  m-1">
                            <a href="<?php echo base_url("/login-out") ?>"><button type="button" class="btn btn-danger  fw-bold">Logout</button></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item m-1">
                            <a href="<?php echo base_url("/login") ?>"><button type="button" class="btn my-btn-outline-primary  fw-bold">Login</button></a>
                        </li>

                        <li class="nav-item  m-1">
                            <a href="<?php echo base_url("/signup") ?>"><button type="button" class="btn my-btn-primary  fw-bold">Sign-up</button></a>
                        </li>
                    <?php
                    } ?>
                </ul>

            </div>
        </div>
    </nav>