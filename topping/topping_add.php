<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Add Toppings</h1>
        <form method="POST" >
        <label for="topping_name">Topping Name:</label>
        <input type="text" id="topping_name" name="topping_name"><br>
        <input type="hidden" id="topping_name" name="action" value="add_topping"><br>
        <button type="submit">Add</button>
        </form>
        <br>
        <p>
            <li><a href="./">View Toppings List</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 