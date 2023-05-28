<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12  mt-5">
    <div class="card h-100 text-center p-1">
        <img src="<?php echo base_url('assets/uploads/' . $product['image']); ?>" class="card-img-top" alt="Imagen del producto">
        <div class="card-body">

            <h4 class="card-title"><?php echo ($product['name']); ?></h4>
            <h5 class="fw-bold">Precio: <span class="my-text-color"><?php echo ($product['price']); ?></span></h5>
            <h5 class="fw-bold">Stock: <span class="my-text-color"><?php echo ($product['stock']); ?></span></h5>
            
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text">Cantidad</span>
                <input type="number w-30" class="form-control form-control-sm" value="1" max="<?php echo ($product['stock']); ?>" >
            </div>

            <div class="container">
                <div class="row">

                    <?php
                    if (session()->get('access') == 1) {
                    ?>
                        <div class="col-6">
                        <a href="<?php echo base_url('/edit-product?id='.$product['id']) ?>"><button type="button" class="btn my-btn-primary">Editar</button></a>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    <?php

                    } else {
                    ?>
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn my-btn-primary" data-bs-toggle="modal" data-bs-target="<?php echo ("#modal".$product['id']); ?>">Ampliar</button>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-danger">Comprar</button>
                        </div>
                    <?php
                    }
                    ?>


                </div>
            </div>
            <!-- Modal -->
            <!-- exampleModal1 -->
            <div class="modal fade" id="<?php echo ("modal".$product['id']); ?>" tabindex="-1" aria-labelledby="<?php echo ("modalLabel".$product['id']); ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="<?php echo ("modalLabel".$product['id']); ?>"><?php echo ($product['name']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <p>
                            <?php echo($product['description']); ?>
                            </p>

                            <h3>Tipos de entregas</h3>
                            <p>Los tiempos de entregas van normalmente de 2 a 5 dias.</p>

                            <h3>Formas de envío</h3>
                            <p>Los envíos se realizan a través de nuestra compañía de envíos asociada. Los precios y tiempos de entrega pueden variar dependiendo de la dirección de entrega.</p>

                            <h3>Formas de pago</h3>
                            <p>Aceptamos tarjetas de débito y crédito, así como también Mercado Pago. Puedes realizar tu compra de forma segura y cómoda utilizando cualquiera de estos métodos de pago.</p>

                            <h5 class="fw-bold">Precio: <span class="my-text-color"><?php echo($product['price']); ?></span></h5>
                            <h5 class="fw-bold">Stock: <span class="my-text-color"><?php echo($product['stock']); ?></span></h5>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text">Cantidad</span>
                                <input type="number" class="form-control form-control-sm" value="1" min='1' max='<?php echo ($product['stock']); ?>'>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>