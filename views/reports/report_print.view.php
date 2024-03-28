<?php
if (!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
require "layouts/header.php";

?>

<script>
function GetPrint() {
    window.print();
}
</script>
<div class="container px-6">
    <h1 class="d-flex justify-content-center mt-4"><span class="text-primary"><b>24/7</b></span>POS System</h1>
    <div class="card mt-4">
        <h4 class="d-flex justify-content-center mt-3">SALES RECEIPT</h4>
        <hr class="bg-light">
        <div class="card-body">
            <table class="table table-bordered table-sendary">
                <thead>
                    <tr>
                        <td scope="col" class="bg-light"><b>Order Number: <?=$orders[0]?></b></td>
                        <td scope="col" class="bg-light"><b>Cashier: <?=$orders['userName']?></b></tdz>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Date: <?=$orders['date']?></td>
                        <td>time: <?=$time?></td>
                    </tr> 
                </tbody>
            </table>

            <div class="form-table">
                <form action="">
                    <table class="table table-bordered table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							foreach ($orderDetails as $key => $value):
								?>
                            <tr>
                                <th>
                                    <?= $key + 1 ?>
                                </th>
                                <td>
                                    <?= $value[2] ?>
                                </td>
                                <td>
                                    <?= $value[3] ?>
                                </td>
                                <td>
                                    <?php echo '$ ' . $value[4] ?>
                                </td>
                                <td>
                                    <?php echo '$ ' . $value[3] * $value[4] ?>
                                </td>
                            </tr>
                            <tr>
                                <?php endforeach; ?>
                        </tbody>
                        <tr class="bg-primary">
                            <td class="bg-white"></td>
                            <td class="bg-white"></td>
                            <td class="bg-white"></td>
                            <td class="text-white">
                                <b>Items:</b> <?= $orders[4]?>
                            </td>
                            <td  class="text-white">
                                <b>Total:</b> <?php echo '$ '. $orders[2] ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary w-60" onclick="GetPrint()"><b>Print</b></button>
            </div>
            <span class="d-flex justify-content-center text-secondary size-2">Thank you for shopping with us!</span>
        </div>
    </div>
    <?php
require "layouts/footer.php"
?>
</div>