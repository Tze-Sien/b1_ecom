AUuyXmhQ3nc76Hlgz5GPdcaTt1UE4IcKYNumk1Da-VoSm4fK7rGKihgQ1eZgQXWJqwVakPjzUYXHkFNi


1. Go to PayPal Developer 
2. Create SandBox App called "B1-ECOM"
3. Copy the sandbox Clien ID and save it somewhere
4. https://developer.paypal.com/docs/checkout/# 
5. copy this script 

    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
    <script>paypal.Buttons().render('#paypal-button-container');</script>

6. Paste the link in cart.php, below </table> tag
7. change the previous paypal button to this 

    <td id="paypal-button-container"></td>

8. now paste the client id to the script ?client-id=<paste your client id here>

    <script src="https://www.paypal.com/sdk/js?client-id=AUuyXmhQ3nc76Hlgz5GPdcaTt1UE4IcKYNumk1Da-VoSm4fK7rGKihgQ1eZgQXWJqwVakPjzUYXHkFNi"></script>

9. Now click the next page of the documentation (https://developer.paypal.com/docs/checkout/integrate/)

10. Go back to cart.php, change the paypal.Buttons script tag to this 

            paypal.Buttons({
				createOrder: function(data, actions){
					return actions.order.create({
						purchase_units:[{
							amount: {
								value: <?php echo number_format($total, 2);?>
							}
						}]
					})
				},
				onApprove: function(data, actions){
					return actions.order.capture().then(function(details){
						alert('Transaction completed by ' + details.payer.name.given_name);
						console.log(data);
					})
				}
			}).render('#paypal-button-container');

11. Go to this link 

https://developer.paypal.com/developer/accounts

12. Copy the 
Email:sb-47irx93336549@business.example.com
Password: bXx<5W$B

13.Add currency to the script tag 

    <script src="https://www.paypal.com/sdk/js?client-id=AUuyXmhQ3nc76Hlgz5GPdcaTt1UE4IcKYNumk1Da-VoSm4fK7rGKihgQ1eZgQXWJqwVakPjzUYXHkFNi&currency=MYR"></script>


<!-- Hosting -->

Credentials
database name: b1ecomchoots
pw: qweqweqwe

    