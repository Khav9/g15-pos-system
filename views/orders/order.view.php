<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Begin Page Content -->
<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow ">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="/order_form" class="btn btn-primary">Add order</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>customerName</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'database/database.php';
                        $statement = $connection->prepare('SELECT * FROM orders');
                        $statement->execute();
                        $orders = $statement->fetchAll();
                        
                        foreach ($orders as $order) :
                        ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['customerName'] ?></td>
                                <td><?= $order['product'] ?></td>
                                <td><?= $order['date'] ?></td>
                                <td><?= $order['price'] ?></td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['discount'] ?></td>
                                <td><?= $order['total'] ?></td>
                                <td>
                                    <a href="../../controllers/items/edit.item.controller.php?id=<?= $order['id'] ?>" class="fas fa-pen "></a>
                                    <a href="../../controllers//orders/delete.order.controller.php?id=<?= $order['id'] ?>" class="fas fa-trash text-danger ml-4"></a>
                                    <a href="../../controllers//items/delete.item.controller.php?id=<?= $order['id'] ?>"" <i class=" fa fa-print text-dark ml-4" "></i></a>
                                 
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
<?php
require "layouts/footer.php"
?>