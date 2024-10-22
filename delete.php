<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM books WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Book deleted successfully");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
