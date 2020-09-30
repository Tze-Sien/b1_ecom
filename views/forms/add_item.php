<?php	
		

		require "../../middleware/auth.php";
		check_admin();

		$title = "Add Item";
		function get_content() {
			require "../../controllers/connection.php";
			$query = "SELECT * FROM categories";
			$items = mysqli_query($cn, $query);
?>
			<form class="col-md-6 mx-auto" method="POST" action="/controllers/add_item.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="product_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" class="form-control">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" rows="3" class="form-control" placeholder="Enter your description here..."></textarea>
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" class="form-control">
				</div>

				<div class="form-group">
					<select class="form-control" name="category_id">
						<?php foreach($items as $item): ?>
							<option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<button>Submit</button>
			</form>
<?php
	}
	require '../partials/layout.php';
?>