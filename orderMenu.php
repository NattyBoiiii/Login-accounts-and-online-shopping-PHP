<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sizzling 100</title>
</head>
<body>

<h2>Sizzling 100 (unli rice)</h2>
<h2> Welcome <span style="color:darkblue;"><?php echo $_SESSION['username']; ?></span>!, choose and select the items that you want to purchase!</h2>
<p>Restaurant na para sa mga gutom pero gustong makatikim ng masarap na pagkain!</p>
<p>Bayad muna bago intay hinay hinay sa kanin mga boss madam!</p>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
    </tr>
    <tr>
        <td>Crispy Pata with Rice (unli rice)</td>
        <td>₱120</td>
    </tr>
    <tr>
        <td>chicharong bulaklak with Rice (unli rice)</td>
        <td>₱100</td>
    </tr>
    <tr>
        <td>Liempo with Rice (unli rice)</td>
        <td>₱110</td>
    </tr>
    <tr>
        <td>Softdrinks</td>
        <td>₱15</td>
    </tr>
</table>
<p> </p>
<form method="post" action="calculatingOrders.php">
    <label for="order">Select Item:</label>
    <select id="order" name="order">
        <option value="crispy pata">Crispy Pata with Rice (unli rice)</option>
        <option value="chicharong bulaklak">chicharong bulaklak with Rice (unli rice)</option>
        <option value="liempo">Liempo with Rice (unli rice)</option>
        <option value="softdrinks">Softdrinks</option>
    </select><br><br>
    
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" required><br><br>
    
    <label for="cash">Cash Amount:</label>
    <input type="number" id="cash" name="cash" min="1" required><br><br>
    
    <input type="submit" name="submit" value="Place Order">
</form>

</body>
</html>

