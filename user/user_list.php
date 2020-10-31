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
                <form method="POST" >
                <tr>
                    <td><?php echo $each_user['username']; ?></td>
                    <td><?php echo $each_user['room']; ?></td>
                    <input type="hidden" name="action" value="delete_user">
                    <input type="hidden" name="user_id" value="<?php echo $each_user['id']; ?>">
                    <td><input type="submit" value="Delete" /></td>
                </tr>
                </form>
            <?php } ?>
        </table>
        <p>
            <li><a href="?action=show_add_form">Add Users</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php';
