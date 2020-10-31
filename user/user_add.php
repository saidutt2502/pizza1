<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Add User</h1>
        <form method="POST" >
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name"><br><br>
        <label class = "label" for="room">Room:</label>
        <select class = "input" name="room" id="room">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="7">7</option>
        </select> 
        <input type="hidden" id="action" name="action" value="add_user"><br><br>
        <button type="submit">Add User</button>
        </form>
        <br>
        <p>
            <li><a href="./">View Users List</a></li>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; 