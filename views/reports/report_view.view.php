<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container px-4">
	<div class="card mt-4">
		<h4 class="d-flex justify-content-center mt-3">SALES RECEIPT</h4>
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
                        <td>Time: <?=$time?></td>
                    </tr> 
                </tbody>
            </table>

			<div class="form-table">
				<form action="">
					<table class="table table-bordered table-sendary">
						<thead>
							<tr>
								<th scope="col" class="bg-primary text-white">ID</th>
								<th scope="col" class="bg-primary text-white">Product</th>
								<th scope="col" class="bg-primary text-white">Qty</th>
								<th scope="col" class="bg-primary text-white">Price</th>
								<th scope="col" class="bg-primary text-white">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($orderDetails as $key => $value):
							?>
							<tr>
								<th><?=$key + 1?></th>
								<td><?=$value[13]?></td>
								<td><?=$value[3]?></td>
								<td><?php echo '$ '.$value[4]?></td>
								<td><?php echo '$ '.$value[3]*$value[4]?></td>
							</tr>
						    <?php endforeach;?>
						</tbody>
						<tr class="bg-primary" style="text-align:left;margin-left:70%">
                            <td class="bg-white"></td>
                            <td class="bg-white"></td>
                            <td class="bg-white"></td>
                            <td class="text-white">
                                <b>Items:</b> <?= $orders[4]?>
                            </td>
                            <td class="text-white">
                                <b>Total:</b> <?php echo '$ '. $orders[2] ?>
                            </td>
                        </tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require "layouts/footer.php"
	?>