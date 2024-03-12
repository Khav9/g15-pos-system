<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
</link>
<script src="../../vendor/insert_order/insert.order.vendor.js" defer></script>
<?php
// session_start();
require "layouts/header.php";
require "layouts/navbar.php";
require_once("models/product.model.php");
require_once("models/order.model.php");
require_once("models/customer.model.php");
require_once("database/database.php");

$products = [];

if (!empty($_POST['code'])) {
    $barcode = $_POST['code'];
    // $products = getProducts();
}
$productData = $_SESSION['productData'] ?? [];
if (!empty($_POST['code']) && !empty($_POST['quantity'])) {
    $productcode = $_POST['code'];
    $productqty = $_POST['quantity'];
    $isProductFound = false;
    // increase quantity
    foreach ($productData as $key => $order) {
        if (isset($order['code']) && $order['code'] == $productcode) {
            $newQuantity = $productData[$key]['quantity'] + intval($productqty);
            $productData[$key]['quantity'] = $newQuantity;
            $isProductFound = true;
        }
    }
    // find barcode of product
    if (!$isProductFound) {
        $checkProduct = $connection->prepare("SELECT * FROM products WHERE code = :code LIMIT 1");
        $checkProduct->bindValue(':code', $productcode);

        if ($checkProduct->execute()) {
            $row = $checkProduct->fetch();

            if ($row) {
                $productData[] = [
                    "code" => $row['code'],
                    "name" => $row['name'],
                    "quantity" => $productqty,
                    "price" => intval($row['price']),
                ];
            } else { // check condition if no product
                $_SESSION['status'] = "No product with the entered name found. Please enter a valid product name.";
                if (isset($_SESSION['status'])) {
?>
                    <div class="alert alert-warning alert-dismissible fade show m-2 " role="alert">
                        <strong class="text-danger"><?= $_SESSION['status']; ?></strong>
                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
            }
        }
        $_SESSION['productData'] = $productData;
    } else { // check condition if available

        $_SESSION['productData'] = $productData;
        $product = getProducts($productcode);
        $productqty = $_POST['quantity'];
        $availableQty = $product[$key]['qty'];
        if ($productqty > $availableQty) {

            // Handle the case when the entered quantity exceeds the available quantity
            $_SESSION['status'] = "Cannot order more than the available quantity.";
            if (isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show m-2 " role="alert">
                    <strong class="text-danger"><?= $_SESSION['status']; ?></strong>
                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
            }
            if (isset($_SESSION['status'])) {
                unset($_SESSION['status']);
            }
        }
    }
};
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
                        <label for="customer">Customer</label>
                        <div class="input-group ">
                            <select name="customer" id="customer" class="form-control">
                                <option value="" selected disabled>choose customer</option>;
                                <?php
                                $customers = getCustomers();
                                 foreach ($customers as $customer) :
                                     ?>
                                    
                                    <option value="<?= $customer['cus_id'] ?>"><?= $customer['firstName'] ?></option>
                                <?php endforeach;?>

                            </select>

                            <div class="input-group-append">
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">
                                    <i class="fas fa-fw fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="controllers/customers/create.customer.controller.php" method="post">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="First Name" name="firstName" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Last Name" name="lastName" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Phone Number" name="phone" required="">
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

    </div>
    <div class="card shadow p-4 mt-4">
        <form action="../../controllers/orders/insert.order.controller.php" method="post" id="orderform">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th width="55%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                $orders = [];
                foreach ($productData as $key => $order) :
                    array_push($orders, $order);
                    $_SESSION['orders'] = $orders;
                ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo ($order['price']); ?></td>
                        <td><?php echo ($order['quantity'] * $order['price']); ?></td>
                        <td>
                            <a href="/order_delete?action=delete&id=<?php echo $key; ?>">
                                <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>

            <div class="col-md-2 mb-3">
                <label for="customer">Customer</label>
                <div>
                    <input type="text" id="customerName" class="form-control" name="firstName">
                    <!-- <input type="hidden" id="customerID" name="cus_id"> -->
                </div>
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
                                <input type="hidden" id="customerID" name="cus_id">

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