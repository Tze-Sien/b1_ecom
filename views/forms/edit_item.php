<?php	

		require "../../middleware/auth.php";
		check_admin();
		
		$title = "Edit Item";
		function get_content() {
            require "../../controllers/connection.php";
            $id = $_GET['id'];

			$query = "SELECT * FROM items WHERE id = $id";
            $item = mysqli_fetch_assoc(mysqli_query($cn, $query));
            $cateogryqr = "SELECT * FROM categories";
			$categories = mysqli_query($cn, $cateogryqr);
?>
			<form class="col-md-6 mx-auto" method="POST" action="/routes/edit_item.php?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input value="<?php echo $item['name'] ?>" type="text" name="product_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Price</label>
					<input value="<?php echo $item['price'] ?>" type="number" name="price" class="form-control">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea  name="description" rows="3" class="form-control" placeholder="Enter your description here..."><?php echo $item['description'] ?></textarea>
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" class="form-control">
				</div>

				<div class="form-group">
					<select class="form-control" name="category_id">
						<?php foreach($categories as $category): ?>
							<option value="<?php echo $category['id']?>" <?php if($category['id'] == $item['category_id']){echo "selected='selected'"; }  ?>> <?php echo $category['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<button>Submit</button>
			</form>
<?php
	}
	require '../partials/layout.php';
?>