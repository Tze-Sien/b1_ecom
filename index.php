<?php
	session_start();
	$title = "Catalog";
	function get_content() {
	require "controllers/connection.php";
	$query = "SELECT * FROM items";
	$items = mysqli_query($cn, $query);
	?>
	<div class="container">
		<h2 class="py-5">Catalog</h2>
		<div class="row">
			<?php foreach($items as $item): ?>
				<div class="col-md-4 py-5">
					<div class="card">
						<img src="<?php echo $item['image']?>" class="img-fluid">
						<div class="card-body">
							<a href="/views/item_details.php?id=<?php echo $item['id']?>">
								<h5 class="card-title"><?php echo $item['name']; ?></h5>
							</a>
							<p class="card-text"><?php echo $item['description']; ?></p>
							<small class="font-weight-bold"><?php echo $item['price']; ?></small>
							<form>
								<div class="input-group">
									<input type="number" name="quantity" class="form-control" min="1" >
									<div class="input-group-append">
										<button class="btn btn-primary addToCart" data-id="<?php echo $item['id']?>"> + </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

    <script>
		let addToCartButtons = document.querySelectorAll('.addToCart');
		addToCartButtons.forEach( element => {
			element.addEventListener('click', () => {
				let id = element.getAttribute("data-id");
				let quantity = element.parentElement.previousElementSibling.value;

				let formBody = new FormData;
				formBody.append('id', id);
				formBody.append('quantity', quantity);


				fetch('controllers/add_to_cart.php',{
					method: "POST",
					body: formBody
				})
				.then(res => res.text())
				.then(data => {
					let cartCount = document.getElementById('cart_count');
					if(cartCount.innerHTML == ''){
						cartCount.innerHTML = parseInt(quantity);
					}else{
						cartCount.innerHTML = parseInt(cartCount.innerHTML) + parseInt(quantity);
					}
				})
			})
		})
	</script>

<?php
}
require_once 'views/partials/layout.php';
?>