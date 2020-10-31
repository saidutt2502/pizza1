<?php include '../view/header.php'; ?>

<main>
    <section>
        <h1>Size List</h1>
        <h2>Size</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Diameter</th>
            </tr>
            <?php foreach ($ize as $each_size) { ?>
                <form method="POST" >
                <tr>
                    <td><?php echo $each_size['size']; ?></td>
                    <td><?php echo $each_size['diameter']; ?></td>
                </tr>
            </form>
            <?php } ?>
        </table>
    </section>
</main>
<?php include '../view/footer.php';
