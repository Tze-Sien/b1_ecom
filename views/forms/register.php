<?php
    $title = "Register";
    function get_content() {
?>

    <form class="col-md-6 mx-auto py-4" method="POST" action="/routes/createuser.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" class="form-control">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" class="form-control">
        </div>
        <button class="btn btn-primary">Register</button>
    </form>

<?php 
    }
    require '../partials/layout.php';
?>