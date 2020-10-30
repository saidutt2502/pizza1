<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Current Orders Report</h1>
        <h2>Orders Baked but not delivered</h2>
        <?php if(count($baked_orders) > 0) { ?>
            <table>
            <tr>
                <th>Order Id</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php foreach ($baked_orders as $each_order) { ?>
                <tr>
                    <td><?php echo $each_order['id']; ?></td>
                    <td><?php echo $each_order['username']; ?></td>
                    <td><?php echo $each_order['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php }else{ ?>
            <h3>No Baked Orders</h3>
        <?php } ?>
        
        <h2>Orders Preparing (in the oven)</h2>
        <?php if(count($preparing_orders) > 0) { ?>
            <table>
            <tr>
                <th>Order Id</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <?php foreach ($preparing_orders as $each_order) { ?>
                <tr>
                    <td><?php echo $each_order['id']; ?></td>
                    <td><?php echo $each_order['username']; ?></td>
                    <td><?php echo $each_order['status']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php }else{ ?>
            <h3>No Preparing Orders</h3>
        <?php } ?>
        <br> 
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="mark_oldest_baked">
            <input type="submit" value="Mark Oldest Pizza As Baked" />
        </form>
        <br>  
    </section>
</main>
<?php include '../view/footer.php'; 