<?php 
    session_start();
    $title = "Transaction";
    function get_content(){
        require '../controllers/connection.php';	
        //1. Find out all orders
        $allOrdersQr = "SELECT * FROM `orders`";
        $allOrders = mysqli_query($cn, $allOrdersQr);
?>
	<div class="container py-5">
        <?php if($_SESSION['user_details']['isAdmin'] == 1 ):?>
            <?php 
                $count = 1;
                foreach($allOrders as $order):?>
                <table class="table table-hover">   
                        
                        <thead class="thead-light">
                            Order <?php echo $count; $count++; ?>
                            <small>
                                <?php
                                    $user_id = $order['user_id'];
                                    $userQr = "SELECT * FROM users WHERE id = $user_id";
                                    $user = mysqli_fetch_assoc(mysqli_query($cn, $userQr));
                                    echo "<b>User: ".$user['firstname'].$user['lastname']."</b>";
                                ?>
                            </small>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>    
                                <?php
                                    $total = 0;
                                    $order_id = $order['id'];
                                    $item_orderQr = "SELECT * FROM item_order WHERE order_id = $order_id";
                                    $item_orders = mysqli_query($cn, $item_orderQr);
                                    
                                    foreach($item_orders as $item_order_details):
                                        $item_id = $item_order_details['item_id'];
                                        $item_detailsQr = "SELECT * FROM items WHERE id = $item_id";
                                        $item_details = mysqli_fetch_assoc(mysqli_query($cn, $item_detailsQr));
                                ?>
                                    <td><?php echo $item_details['name']?></td>
                                    <td><?php echo $item_details['price']?></td>
                                    <td><?php echo $item_order_details['quantity']?></td>
                                    <td>
                                        <?php 
                                            $subtotal = $item_order_details['quantity'] * $item_details['price'];   
                                            echo $subtotal;
                                            $total += $subtotal;
                                        ?>
                                    </td>
                                    <td><?php echo $order['date_purchased']?></td>
                                <?php endforeach;?>
                            </tr>
                            <tr>
                                <td>Total: <?php echo $total;?></td>
                            </tr>
                        </tbody>
                </table>
            <?php endforeach;?>
        <?php else:?>
            <?php 
                $count = 1;
                foreach($allOrders as $order):?>
                    <?php if($_SESSION['user_details']['id'] == $order['user_id']):?>
                        <table class="table table-hover">   
                                
                                <thead class="thead-light">
                                    Order <?php echo $count; $count++; ?>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>    
                                        <?php
                                            $total = 0;
                                            $order_id = $order['id'];
                                            $item_orderQr = "SELECT * FROM item_order WHERE order_id = $order_id";
                                            $item_orders = mysqli_query($cn, $item_orderQr);
                                            
                                            foreach($item_orders as $item_order_details):
                                                $item_id = $item_order_details['item_id'];
                                                $item_detailsQr = "SELECT * FROM items WHERE id = $item_id";
                                                $item_details = mysqli_fetch_assoc(mysqli_query($cn, $item_detailsQr));
                                        ?>
                                            <td><?php echo $item_details['name']?></td>
                                            <td><?php echo $item_details['price']?></td>
                                            <td><?php echo $item_order_details['quantity']?></td>
                                            <td>
                                                <?php 
                                                    $subtotal = $item_order_details['quantity'] * $item_details['price'];   
                                                    echo $subtotal;
                                                    $total += $subtotal;
                                                ?>
                                            </td>
                                        <?php endforeach;?>
                                    </tr>
                                    <tr>
                                        <td>Total: <?php echo $total;?></td>
                                    </tr>
                                </tbody>
                        </table>
                    <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>
    </div>
<?php
    } 
    require 'partials/layout.php'; 
?>