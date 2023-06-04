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
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Desactivado</th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['down']; ?></td>
                    <td>
                        <a href="<?php echo base_url("/edit-user?id=" . $user['id']) ?>">
                            <button class="btn my-btn-primary">
                                <img src="assets/img/icons/edit.svg" alt="" height="60%" width="60%">
                            </button>
                        </a>
                        <?php
                        if ($user['down'] == 'SI') {
                        ?>
                            <a href="<?php echo base_url("/enable-user?id=" . $user['id']) ?>">
                                <button class="btn btn-danger">
                                    <img src="assets/img/icons/delete.svg" alt="" height="60%" width="60%">
                                </button>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href="<?php echo base_url("/disable-user?id=" . $user['id']) ?>">
                                <button class="btn btn-danger">
                                    <img src="assets/img/icons/delete.svg" alt="" height="60%" width="60%">
                                </button>
                            </a>
                        <?php
                        }
                        ?>

                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>