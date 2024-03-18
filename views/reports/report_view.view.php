<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container px-4">
	<div class="card mt-4">
		<div class="card-body">
			<table style="width:100%; margin-bottom:20px;">
				<tbody>
					<tr>
						<td class="text-align:center" align="start">
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Seller Name : <?php echo ' '.$orders[7];?></h4>
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Seller Email : <?=$orders[8]?></h4>
						</td>
						<td align="end">
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Transaction #2345678</h4>
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Encoder: 123</h4>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="form-table">
				<form action="">
					<table class="table table-bordered">
						<thead>
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
								<th><?=$key + 1?></th>
								<td><?=$value[13]?></td>
								<td><?=$value[3]?></td>
								<td><?php echo '$ '.$value[4]?></td>
								<td><?php echo '$ '.$value[3]*$value[4]?></td>
							</tr>
						    <?php endforeach;?>
						</tbody>
					</table>
				</form>
				<div style="text-align:left;margin-left:70%" class="">
					<h5 style="font-size:15px">Items: <?=$orders[4]?></h5>
					<h5 style="font-size:15px">Total : <?php echo '$ '.$orders[2]?></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require "layouts/footer.php"
	?>