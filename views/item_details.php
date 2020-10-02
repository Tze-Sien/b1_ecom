<?php
session_start();
function get_content() {
	require_once '../controllers/connection.php';
	$id = $_GET['id'];
	$query  = "SELECT * FROM items WHERE id = $id";
	$item = mysqli_fetch_assoc(mysqli_query($cn, $query));
?>
<div class="container py-5">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<img src="<?php echo $item['image'] ?>">
				<div class="card-body">
					<h5 class="card-title"><?php echo $item['name'] ?></h5>
					<p class="card-text"><?php echo $item['description'] ?></p>
					<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']['isAdmin']): ?>
					<a href="/views/forms/edit_item.php?id=<?php echo $item['id']?>" class="btn btn-warning">Edit</a>
					<button href="" class="btn btn-danger" data-toggle="modal" data-target="#delete_modal">Delete</button>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="delete_modal">
		<div class="modal_dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Delete Item
					</h5>
				</div>
				<div class="modal-body">
					<p>Are you sure want to delete <b><?php echo $item['name']; ?></b></p>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" type="button" class="btn btn-secondary">
						Close
					</button>
					<a class="btn btn-danger"
					href="/routes/delete_item.php?id=<?php echo $item['id'] ?>">
						Delete
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	}
	require 'partials/layout.php';
?>