<?php
// update-user.php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $kategori_user = $_POST['kategori_user'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

    // Query pembaruan
    if ($password) {
        $query = "UPDATE users SET name = ?, username = ?, email = ?, kategori_user = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $name, $username, $email, $kategori_user, $password, $id);
    } else {
        $query = "UPDATE users SET name = ?, username = ?, email = ?, kategori_user = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $username, $email, $kategori_user, $id);
    }

    if ($stmt->execute()) {
        header("Location: user.php?success=User updated successfully");
    } else {
        header("Location: user.php?error=Failed to update user");
    }

    $stmt->close();
    $conn->close();
}
?>
