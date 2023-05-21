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

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12  mt-5">
            <div class="card h-100 text-center p-1">
                <img src="assets/img/products/1.jpg" class="card-img-top" alt="Imagen del producto">
                <div class="card-body">
                    <h4 class="card-title">Gigabyte RTX 3060 TI </h4>
                    <h5 class="fw-bold">Precio: <span class="my-text-color">165.000</span></h5>
                    <h5 class="fw-bold">Stock: <span class="my-text-color">10</span></h5>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Cantidad</span>
                        <input type="number w-30" class="form-control form-control-sm" value="1">
                    </div>

                    <div class="container">
                        <div class="row">

                            <?php
                            if (session()->get('access') == 1) {
                            ?>
                                <div class="col-6">

                                    <button type="button" class="btn my-btn-primary">Editar</button>
                                </div>

                                <div class="col-6">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </div>
                            <?php

                            } else {
                            ?>
                                <div class="col-6">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn my-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Ampliar</button>
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
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Gigabyte Geforce Rtx 3060 Ti</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p>
                                        Interfaz PCI-Express 4.0.
                                        Bus de memoria: 256bit.
                                        Cantidad de núcleos: 4864.
                                        Resolución máxima: 7680x4320.
                                        Compatible con directX y openGL.
                                        Requiere de 750W de alimentación.
                                        Con iluminación LED blanca.
                                        Permite la conexión de hasta 4 pantallas simultáneas.
                                        Formatos de conexión: 2 HDMI 2.1, 3 DisplayPort 1.4a.
                                        Incluye accesorios.
                                        Ideal para trabajar a alta velocidad.</p>

                                    <h3>Tipos de entregas</h3>
                                    <p>Los tiempos de entregas van normalmente de 2 a 5 dias.</p>

                                    <h3>Formas de envío</h3>
                                    <p>Los envíos se realizan a través de nuestra compañía de envíos asociada. Los precios y tiempos de entrega pueden variar dependiendo de la dirección de entrega.</p>

                                    <h3>Formas de pago</h3>
                                    <p>Aceptamos tarjetas de débito y crédito, así como también Mercado Pago. Puedes realizar tu compra de forma segura y cómoda utilizando cualquiera de estos métodos de pago.</p>

                                    <h5 class="fw-bold">Precio: <span class="my-text-color">165.000</span></h5>
                                    <h5 class="fw-bold">Stock: <span class="my-text-color">10</span></h5>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text">Cantidad</span>
                                        <input type="number w-30" class="form-control form-control-sm" value="1">
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








    </div>
</div>