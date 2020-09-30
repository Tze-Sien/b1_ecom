<?php 
session_start();
$title = "Cart";
function get_content(){
	require '../controllers/connection.php';	
	if(isset($_SESSION['cart']) && count($_SESSION['cart'])):
		?>
	<div class="container py-5">
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$total = 0; 
					foreach($_SESSION['cart'] as $id => $quantity):
					$query = "SELECT * FROM items WHERE id = $id";
					$item = mysqli_fetch_assoc(mysqli_query($cn, $query));
					$subtotal = $item['price'] * $quantity;
					$total += $subtotal;
					?>
					<tr>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['price']; ?></td>
						<td>
							<form method="POST" action="/controllers/update_cart.php">
								<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
								<input type="number" name="quantity" value="<?php echo $quantity?>" class = "form-control quantity_input">
							</form>
						</td>
						<td><?php echo $subtotal; ?></td>
						<td><a href="/controllers/delete_cart_item.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Delete</a></td>
				</tr>
				<?php endforeach; ?>	
				</tr>
                <tr>
					<td><a href="/controllers/empty_cart.php" class="btn btn-danger">Empty Cart</a></td>
					<td>
                        <button href="/controlers/checkout.php" 
                                class="btn btn-success" 
                                data-toggle="modal" 
                                data-target="#checkout_modal">
                                Checkout
                        </button>
                    </td>
					<td id="paypal-button-container"></td>
					<td>Total :MYR <?php echo number_format($total, 2); ?></td>
				</tr>
			</tbody>
		</table>

		<div class="modal fade" id="checkout_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Confirm Checkout
						</h5>
					</div>
					<div class="modal-body">
						<p>Are you really sure about your orders?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Close</button>
						<a href="/controllers/checkout.php" class="btn btn-sucess">Checkout</a>
					</div>
				</div>
			</div>
		</div>

		<?php else: ?>
			<h2>Your cart is empty</h2>
		</div>

		<?php endif; ?>	

		<script src="https://www.paypal.com/sdk/js?client-id=AUuyXmhQ3nc76Hlgz5GPdcaTt1UE4IcKYNumk1Da-VoSm4fK7rGKihgQ1eZgQXWJqwVakPjzUYXHkFNi"></script>
		
		<script>
			paypal.Buttons({
				createOrder: function(data, actions) {
					return actions.order.create({
						purchase_units: [{
							amount: {
								value: <?php echo $total; ?>
							}
						}]
					})
				},
				onApprove: function(data, actions) {
					return actions.order.capture().then(function(details) {
						alert('Transaction Completed by ' + details.payer.name.given_name);
						console.log(data);
					})
				}
			}).render('#paypal-button-container');
		</script>

		<script type="text/javascript">
			let quantityInputs = document.querySelectorAll('.quantity_input');
			quantityInputs.forEach( input => {
				input.addEventListener('change', () => {
					input.parentElement.submit();
				})
			})
		</script>

	<?php 
		} 
		require 'partials/layout.php';
	?>