<section class="container  my-5">
    <div>
        <!--recuperamos datos con la función Flashdata para mostrarlos-->
        <?php if (session()->getFlashdata('success')) {
            echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
        } ?>
    </div>
    <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
    <?php $validation = \Config\Services::validation(); ?>

    <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-12">
            <div class="card shadow-lg">
                <div class="card-body p-5 ">
                    <h1 class="fs-4 card-title fw-bold mb-4 text-center">Sign Up</h1>

                    <form method="post" action="<?php echo base_url('/register-user') ?>">
                        <div class="card-body" media="(max-width:768px)">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nombre</label>
                                <!-- ingreso sel nombre-->
                                <input name="name" type="text" class="form-control" value="<?php echo set_value('name') ?>" placeholder="Nombre">
                                <!-- Error -->
                                <?php if ($validation->getError('name')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('name'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Apellido</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name') ?>" placeholder="Apellido">
                                <!-- Error -->
                                <?php if ($validation->getError('last_name')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('last_name'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" value="<?php echo set_value('email') ?>" placeholder="correo@algo.com">
                                <!-- Error -->
                                <?php if ($validation->getError('email')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('email'); ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Contraseña (mínimo 5 caracteres)">
                                <!-- Error -->
                                <?php if ($validation->getError('password')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('password'); ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="d-flex align-items-center">
                                <input type="reset" value="cancelar" class="btn btn-danger">
                                <input type="submit" value="Guardar" class="btn btn-success ms-auto">

                            </div>

                        </div>
                    </form>



                    <div class=" py-3 border-0">
                        <div class="text-center">
                            Tiene una cuenta? <a href="<?php echo base_url("/login") ?>" class="text-dark">Inicie sesión</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</section>