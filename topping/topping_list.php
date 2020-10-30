<?php include '../view/header.php'; ?>

<main>
    <section>
        <h1>Topping List</h1>
        <h2>Toppings</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($toppings as $each_topping) { ?>
                <form method="POST" >
                <tr>
                    <td><?php echo $each_topping['topping']; ?></td>
                    <input type="hidden" name="action" value="delete_topping">
                    <input type="hidden" name="topping_id" value="<?php echo $each_topping['id']; ?>" >
                    <td><input type="submit" value="Delete" /></td>
                </tr>
            </form>

            <?php } ?>
        </table>
        <p>
            <li><a href="?action=show_add_form">Add Toppings</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php';
