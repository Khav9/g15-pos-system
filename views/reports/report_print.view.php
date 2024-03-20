<?php
require "layouts/header.php";

?>

<script>
	function GetPrint() {
		window.print();
	}
</script>
<div class="container px-4">
	<div class="card mt-4">
		<div class="card-body">
			<table style="width:100%; margin-bottom:20px;">
				<tbody>
					<tr>
						<td class="text-align:center" align="start">
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Customer Name :
								<?php echo ' ' . $orders[6] . ' ' . $orders[7]; ?>
							</h4>
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Customer Phone :
								<?= $orders[8] ?>
							</h4>
						</td>
						<td align="end">
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Transaction #2345678
							</h4>
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
							<?php endforeach; ?>
						</tbody>
					</table>
				</form>
				<div style="text-align:left;margin-left:70%" class="">
					<h5 style="font-size:15px">Items:
						<?= $orders[4] ?>
					</h5>
					<h5 style="font-size:15px">Total :
						<?php echo '$ ' . $orders[2] ?>
					</h5>
				</div>
			</div>
			<!-- <div class="back-button">
				<a href="/reports" type="" class="btn btn-danger btn-sm ">Back</a>
			</div> -->
			<div class="d-flex justify-content-between">
				<button  href="/reports" type="button" class="btn btn-danger btn-sm" onclick="history.back()">Back</button>
				<button type="button" class="btn btn-primary btn-sm" onclick="GetPrint()">Print</button>
			</div>



		</div>

	</div>
</div>