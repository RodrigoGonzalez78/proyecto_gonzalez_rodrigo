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
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="card shadow-lg">
                <div class="card-body p-5 ">
                    <h1 class="fs-4 card-title fw-bold mb-4 text-center">Producto Nuevo</h1>

                    <form method="post" action="<?php echo base_url('/register-user') ?>">



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

                        <div class="mb-2">
                            <label for="name" class="form-label">Precio</label>
                            <!-- ingreso sel nombre-->
                            <input name="name" type="text" class="form-control" value="<?php echo set_value('name') ?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('name')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('name'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-2">
                            <label for="name" class="form-label">Stock</label>
                            <!-- ingreso sel nombre-->
                            <input name="name" type="text" class="form-control" value="<?php echo set_value('name') ?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('name')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('name'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-2">
                            <label for="name" class="form-label">Categoria</label>
                            <!-- ingreso sel nombre-->
                            <input name="name" type="text" class="form-control"  value="<?php echo set_value('name') ?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('name')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('name'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-2">
                            <label for="name" class="form-label">Descripcion</label>
                            <!-- ingreso sel nombre-->
                            <input name="name" type="text" class="form-control" value="<?php echo set_value('name') ?>" placeholder="Nombre">
                            <!-- Error -->
                            <?php if ($validation->getError('name')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('name'); ?>
                                </div>
                            <?php } ?>
                        </div>





                        <div class="d-flex align-items-center">
                            <div class="col-1">
                                <a href="<?php echo base_url("/products") ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </div>
                            <input type="submit" value="Guardar" class="btn btn-success ms-auto">

                        </div>


                    </form>




                </div>

            </div>
        </div>

</section>