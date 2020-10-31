<?php include '../view/header.php'; ?>
<main>
<section>
        <h1>Order Pizza</h1>
        <h2>Build Your Pizza</h2>

        <form method="POST" >
            <h3>Pizza Size</h3>
            <?php foreach ($sizes as $each_size) { ?>
                <input type="radio" id="size" name="size" value=<?php echo $each_size['id']; ?>>
                <label><?php echo $each_size['size']; ?></label>
            <?php } ?>

            <h3>Toppings</h3>
            <?php foreach ($toppings as $each_toppings) { ?>
                <input type="checkbox" id="toppings" name="toppings[]" value=<?php echo $each_toppings['id']; ?>>
                <label><?php echo $each_toppings['topping']; ?></label><br>
            <?php } ?>
            <br><br>

            <label for="room">Username:</label>
            <select name="user_id" id="user_id">
            <?php foreach ($users as $each_user) { ?>
                <option value=<?php echo $each_user['id']; ?>><?php echo $each_user['username']; ?></option>
                <?php } ?>
            </select> 
            <br><br>
            <input type="hidden" id="action" name="action" value="order_pizza">
            <input type="submit" value="Order Pizza" />
            <br><br>
        </form>
</section>
</main>
<?php include '../view/footer.php'; 