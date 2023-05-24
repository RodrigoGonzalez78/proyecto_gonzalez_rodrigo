<section class="container  my-5">

    <!-- php $validación = \Config\Services::validación(); Esto carga automáticamente el archivo Config\Validation que contiene configuraciones para incluir múltiples conjuntos de reglas -->
    <?php $validation = \Config\Services::validation(); ?>

    <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12">
            <div class="card shadow-lg">
                <div class="card-body p-5 ">
                    <h1 class="fs-4 card-title fw-bold mb-4 text-center">Producto Nuevo</h1>

                    <form method="post" action="<?php echo base_url('/store-product') ?>" enctype="multipart/form-data">



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
                            <label for="price" class="form-label">Precio</label>
                            <!-- ingreso sel nombre-->
                            <input name="price" type="number" min='1' class="form-control" value="<?php echo set_value('price') ?>" placeholder="100.000,00">
                            <!-- Error -->
                            <?php if ($validation->getError('price')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('price'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-2">
                            <label for="stock" class="form-label">Stock</label>
                            <!-- ingreso sel nombre-->
                            <input name="stock" type="number" min='1' class="form-control" value="<?php echo set_value('stock') ?>" placeholder="10">
                            <!-- Error -->
                            <?php if ($validation->getError('stock')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('stock'); ?>
                                </div>
                            <?php } ?>
                        </div>



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="id_categorie">Categoria</label>
                            </div>
                            <select class="custom-select" name="id_categorie">
                                <option selected>Elije una...</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?php if ($validation->getError('id_categorie')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('id_categorie'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="mb-2">
                            <label for="description" class="form-label">Descripcion</label>
                            <!-- ingreso sel nombre-->
                            <textarea name="description" value="<?php echo set_value('stock') ?>" class="form-control" rows="3"></textarea>
                            <!-- Error -->
                            <?php if ($validation->getError('description')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('description'); ?>
                                </div>
                            <?php } ?>
                        </div>



                        <div class="mb-2">
                            <label for="image" class="form-label">Imagen del producto</label>
                            <input name="image" class="form-control"  type="file">
                            <?php if ($validation->getError('image')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('image'); ?>
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