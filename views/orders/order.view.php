<script src="../../vendor/insert_order/insert.order.vendor.js" defer></script>
<?php
require "layouts/header.php";
require "layouts/navbar.php";
require_once("models/product.model.php");
require_once("models/order.model.php");
require_once("models/customer.model.php");
require_once("database/database.php");

$products = [];
$productData = $_SESSION['productData'] ?? [];
if (!empty($_POST['code']) && !empty($_POST['quantity'])) {
    $productcode = $_POST['code'];
    $productqty = $_POST['quantity'];
    $availableQty = getProductQuantity($connection, $productcode);
    if ($availableQty !== false) {
        if ($productqty > $availableQty) {
            $_SESSION['status'] = "Cannot order more than the available quantity  $availableQty.";
        } else {
            $productData = $_SESSION['productData'] ?? [];
            $isProductFound = false;
            foreach ($productData as $key => $order) {
                if (isset($order['code']) && $order['code'] == $productcode) {
                    $totalQuantity = $order['quantity'] + $productqty;
                    if ($totalQuantity > $availableQty) {
                        $_SESSION['status'] = "Cannot increase quantity beyond the available quantity.";
                        $isProductFound = true;
                    } else {
                        $productData[$key]['quantity'] = $totalQuantity;
                        $isProductFound = true;
                    }
                }
            }
            if (!$isProductFound) {
                $productBarcode =  getBarcode($connection, $productcode);
                if ($productBarcode) {
                    $productData[] = [
                        "code" => $productBarcode['code'],
                        "name" => $productBarcode['name'],
                        "image" => $productBarcode['image'],
                        "quantity" => $productqty,
                        "price" => intval($productBarcode['price']),

                    ];
                }
            }
            $_SESSION['productData'] = $productData;
        };
    } else {
        $_SESSION['status'] = "No product with the entered  barcord $productcode. Please enter a valid product code.";
    }
}
// Display status message if set
if (isset($_SESSION['status'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
        <strong class="text-danger"><?= $_SESSION['status']; ?></strong>
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['status']);
}
?>
<div class="container-fluid px-4">
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="#" method="post" class="form-group row ml-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Barcode</label>
                        <input type="number" name="code" class="form-control" value="<?php echo isset($_POST['code']) ? $_POST['code'] : ''; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : '1'; ?>" min="1" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <br>
                    <button id="addItemBtn" name="addItem" class="btn btn-primary">Add Item</button>
                </div>
            </form>
            <div class="form-group row text-top	">
                <div class="col-md-4 mb-3 ml-auto">
                    <form action="#" class="form-group row ml-4">
                        <label for="customer">Payment Method</label>
                        <div class="input-group mr-3 ">
                            <select name="payment" id="payment" class="form-control">
                                <option value="" selected disabled>Choose Pyment</option>;
                                <option value="cash">CASH</option>
                                <option value="online">ONLINE</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow p-4 mt-4">
        <form action="../../controllers/orders/insert.order.controller.php" method="post" id="orderform">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <tr>
                    <th width="5%">ID</th>
                    <th width="15%">Image</th>
                    <th width="15%">Product Name</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                $orders = $_SESSION['productData'] ?? [];
                $total = 0;
                foreach ($productData as $key => $order) :
                    $subtotal = $order['quantity'] * $order['price'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><img src="../../assets/products/<?php echo $order['image']; ?>" style="width: 80px;"></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo "$" . number_format($order['price'], 2); ?></td>
                        <td><?php echo  "$" . number_format($order['quantity'] * $order['price'], 2); ?></td>
                        <td>
                            <a href="/order_delete?action=delete&id=<?php echo $key; ?>">
                                <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                            </a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
            <div class="col-md-4 mb-3">
                <label for="payment"></label>
                <div>
                    <input type="text" hidden id="pay" class="form-control" name="firstName">
                </div>
            </div>
            <div class="input-group  col-md-4  ">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-primary text-light" for="total">Total</label>
                </div>
                <input type="number" placeholder="$" class="text-center" name="totalGood" value="<?php echo  ($total); ?>">
            </div>
            <div class="col-md-4 mb-2 ">
                <br>
                <?php if (isset($_SESSION['error_order'])) : ?>
                    <button type="button" class="btn btn-block btn-success  ">Proceed Order</button>
                    <div class="alert alert-warning alert-dismissible col-5 mx-auto fade show mt-4 fixed-top " ; role="alert">
                        <strong class="text-danger"><?= $_SESSION['error_order']; ?></strong>
                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php else : ?>
                    <button type="button" data-toggle="modal" data-target="#paymentOrder" class="btn btn-block btn-success text-top float-right">Proceed Order</button>
                <?php endif;
                unset($_SESSION['error_order']);
                ?>
            </div>
            <div class="modal fade" id="paymentOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="controllers/orders/insert.order.controller.php" method="post">
                                <input type="hidden" id="payID" name="userId">
                                <div class="form-group row text-left mb-2">
                                    <div class="col-md-12 text-center">
                                        <h3 class="py-0">
                                            Order success !!!
                                        </h3>
                                        <i class="fa fa-check-circle text-success" style="font-size: 60px;"></i>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    require 'layouts/footer.php';
    ?>
</div>