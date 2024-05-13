<?php
session_start();
if(isset($_POST['submit'])){
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];
    
    $menu = array(
        "crispy pata" => 120,
        "chicharong bulaklak" => 100,
        "liempo" => 110,
        "softdrinks" => 15,
    );
    
    $total_cost = $menu[$order] * $quantity;
    $change = $cash - $total_cost;
    
    if($cash < $total_cost) {
        echo "<p style='color:red;'>Insufficient payment! Please input sufficient cash.</p>";
    } else {
        echo "<h3>Order Summary:</h3>";
        echo "Item: $order<br>";
        echo "Quantity: $quantity<br>";
        echo "Total Cost: ₱$total_cost<br>";
        echo "Cash Paid: ₱$cash<br>";
        echo "Change: ₱$change<br>";
        echo "<h2>THANK YOU FOR ORDERING!, <span style='color: darkblue;'>" . $_SESSION['username'] . "</span> please come again!</h2>";
    }
}
?>
<html>
<head>
    <title>Sizzling 100 (unli rice)</title>
</head>
<body>
    <p><button onclick="returnToMenu()">RETURN TO MENU</button></p>

    <script>
        function returnToMenu() {
            window.location.href = 'orderMenu.php';
        }
    </script>
</body>
</html>