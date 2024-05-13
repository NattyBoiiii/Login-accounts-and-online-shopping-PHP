<?php  
function addUser($conn, $username, $password) {
	$sql = "SELECT * FROM userinputs WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$username]);

	if($stmt->rowCount()==0) {
		$sql = "INSERT INTO userinputs (username,password) VALUES (?,?)";
		$stmt = $conn->prepare($sql);
		return $stmt->execute([$username, $password]);
	}
}

function login($conn, $username, $password) {
	$query = "SELECT * FROM userinputs WHERE username=?";
	$stmt = $conn->prepare($query);
	$stmt->execute([$username]);

	if($stmt->rowCount() == 1) {
		// returns associative array
		$row = $stmt->fetch();

		// store user info as a session variable
		$_SESSION['userInfo'] = $row;

		// get values from the session variable
		$uid = $row['user_id'];
		$uname = $row['username'];
		$passHash = $row['password'];

		// validate password 
		if(password_verify($password, $passHash)) {
			$_SESSION['user_id'] = $uid;
			$_SESSION['username'] = $uname;
			return true;
		}
		else {
			return false;
		}
	}
}

function usernameExists($conn, $username) {
    // Prepare SQL statement
    $query = "SELECT * FROM userinputs WHERE username=:username";
    $stmt = $conn->prepare($query);

    // Bind parameters and execute query
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Get result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if any row with the given username exists
    if ($result) {
        return true; // Username exists
    } else {
        return false; // Username does not exist
    }
}
?>
