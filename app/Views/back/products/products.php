<div>
    <?php if (session()->getFlashdata('success')) {
        echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    }
    ?>
</div>


<div class="container">

    <?php
    if (session()->get('access') == 1) {
    ?>

        <div class="row m-2">
            <div class="col-2 ms-auto">
                <a href="<?php echo base_url("/new-product") ?>" class="text-dark"><button type="button" class="btn my-btn-primary fw-bold">Agregar Producto</button></a>

            </div>
            <div class="col-1">
                <a href="<?php echo base_url("/new-product") ?>"><button type="button" class="btn my-btn-primary fw-bold">Eliminados</button></a>

            </div>
        </div>

        <hr>
    <?php

    } ?>


    <div class="row m-2">


        <?php

        foreach ($products as $product) {
        ?>
            <!-- Incluir la vista product_card para cada producto -->
            <?php echo view('back/products/component/product_card', ['product' => $product]); ?>
        <?php
        }

        ?>



    </div>
</div>