<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Welcome Student!</h1>
        <h2>Available Sizes</h2>
        <table>
            <tr>
                <th>Size</th>
                <th>Diameter</th>
            </tr>
            <?php foreach ($sizes as $each_size) { ?>
                <tr>
                    <td><?php echo $each_size['size']; ?></td>
                    <td><?php echo $each_size['diameter']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Available Toppings</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Toppings</th>
            </tr>
            <?php foreach ($toppings as $each_toppings) { ?>
                <tr>
                    <td><?php echo $each_toppings['id']; ?></td>
                    <td><?php echo $each_toppings['topping']; ?></td>
                </tr>
            <?php } ?>
        </table>

            <form method="POST" >
            <label for="room">Username:</label>
            <select name="user_id" id="user_id">
            <?php foreach ($users as $each_user) { ?>
                <option value=<?php echo $each_user['id']; ?>><?php echo $each_user['username']; ?></option>
                <?php } ?>
            </select> 
            <input type="hidden" id="action" name="action" value="select_user">
            <input type="submit" value="Select Username" />
            </form>

        <?php if($user_orders != null) { ?>
            <br>
            <h2>Selected User: <?php echo $user_orders[0]['username']; ?></h2>
            <br>
            <table>
            <tr>
                <th>Order Id</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php foreach ($user_orders as $each_order) { ?>
                <tr>
                    <td><?php echo $each_order['id']; ?></td>
                    <td><?php echo $each_order['username']; ?></td>
                    <td><?php echo $each_order['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php }else{ ?>
            <h3>No User Selected</h3>
        <?php } ?>

            <form method="POST" >
            <input type="hidden" id="acknowledge" name="action" value="acknowledge">
            <input type="hidden" id="selected_user" name="selected_user" value=<?php echo $selected_user; ?>>
            <input type="submit" value="Acknowledge Receipt of baked Pizza" />
            </form>

        <p>
            <li><a href="?action=show_order_form&user_id=<?php echo $selected_user; ?>">Order Pizza</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 