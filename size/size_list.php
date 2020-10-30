<?php include '../view/header.php'; ?>

<main>
    <section>
        <h1>Size List</h1>
        <h2>Size</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($ize as $each_size) { ?>
                <form method="POST" >
                <tr>
                    <td><?php echo $each_size['size']; ?></td>
                    <td><?php echo $each_size['diameter']; ?></td>
                    <input type="hidden" name="action" value="delete_size">
                    <input type="hidden" name="size_id" value="<?php echo $each_size['id']; ?>">
                    <td><input type="submit" value="Delete" /></td>
                </tr>
            </form>
            <?php } ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php';
