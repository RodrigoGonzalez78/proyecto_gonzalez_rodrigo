<div>
    <?php if (session()->getFlashdata('success')) {
        echo "
      <div class='mt-3 mb-3 ms-3 me-3 h4 text-center alert alert-success alert-dismissible'>
      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>" . session()->getFlashdata('success') . "
  </div>";
    }
    ?>
</div>


<div class="container ms-auto mt-2">

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Precio Total</th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['qty']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['price'] * $product['qty']; ?></td>

                    <td>
                        <a href="<?php echo base_url('/sum-cart-element') ?>">
                            <button class="btn my-btn-primary">
                                +
                            </button>
                        </a>
                        <a href="<?php echo base_url('/rest-cart-element') ?>">
                            <button class="btn btn-danger">
                                -
                            </button>
                        </a>

                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div>
        <a href="<?php echo base_url('/clear-cart') ?>">
        <button class="btn my-btn-primary">
            Vaciar Carrito
        </button>


        </a>
    
        <button class="btn my-btn-primary">
            Terminar compra
        </button>
    </div>
</div>

