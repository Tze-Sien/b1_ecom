<?php
    $title = "Login";
    function get_content() {
?>

    <form class="col-md-6 mx-auto py-4" method="POST" action="/routes/login.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>

<?php 
    }
    require '../partials/layout.php';
?>