<div class="container ms-auto mt-2">

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <button>Editar</button>
                        <button>Editar</button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>