<section class="container  my-5">

    <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-12">

            <div class="card shadow-lg">
                <div class="card-body p-5 ">
                    <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1>
                    <form method="" class="needs-validation" novalidate="" autocomplete="off">
                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email">Correo electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password">Contaseña</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <button type="submit" class="btn my-btn-primary ms-auto">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        No tiene una cuenta? <a href="<?php echo base_url("/signup") ?>" class="text-dark">Crea una</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>