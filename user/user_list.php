<?php include '../view/header.php'; ?>

<main>
    <section>
        <h1>User List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Room</th>
                <th></th>
            </tr>
            <?php foreach ($user_list as $each_user) { ?>
                <tr>
                    <td><?php echo $each_user['username']; ?></td>
                    <td><?php echo $each_user['room']; ?></td>
                    <td><button type="button">Delete</button></td>
                </tr>
            <?php } ?>
        </table>
        <p>
            <li><a href="?action=show_add_form">Add Users</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php';
