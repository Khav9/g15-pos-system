<?php
require "layouts/header.php";
require "layouts/navbar.php";
?>
<div class="container px-4">
	<div class="card mt-4">
    <div class="card-header d-flex justify-content-between">
            <h4 class="">Invoice</h4>
            <button type="" class="btn btn-danger btn-sm">Back</button>

        </div>
		<div class="card-body">
			<table style="width:100%; margin-bottom:20px;">
				<tbody>
					<tr>
						<td class="text-align:center" align="start">
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Customer Name:</h4>
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Customer Phone:</h4>
							<h4 style="font-size:13px; line-height:30px; margin:0px; padding:0;">Customer Email:</h4>
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
								<th scope="col">Product</th>
								<th scope="col">Qty</th>
								<th scope="col">Price</th>
								<th scope="col">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>1</th>
								<td>12</td>
								<td>100$</td>
								<td>15,000$</td>
							</tr>
							<tr>
								<th>2</th>
								<td>20</td>
								<td>50$</td>
								<td>1000$</td>
							</tr>
							<tr>
								<th>3</th>
								<td>50</td>
								<td>500$</td>
								<td>50,000$</td>
							</tr>
						</tbody>
					</table>
				</form>
                <div style="text-align:left" class="">
					<p>Payment by : OnlinePayment</p>
				</div>
				<div style="text-align:left;margin-left:70%; " class="">
					<h5 style="font-size:15px">Grand Total: 5000$</h5>
				</div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-sm ">Print</button>
                </div>
                
			</div>
		</div>
	</div>
</div>
<?php
require "layouts/footer.php"
	?>