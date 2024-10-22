<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}

if (isset($_POST['update_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $published_date = $_POST['published_date'];
    $copies_available = $_POST['copies_available'];

    $sql = "UPDATE books SET title='$title', author='$author', isbn='$isbn', published_date='$published_date', copies_available=$copies_available WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Book updated successfully");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>
<body>
    <h1>Update Book</h1>
    <form action="" method="POST">
        <label>Title: </label><input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
        <label>Author: </label><input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>
        <label>ISBN: </label><input type="text" name="isbn" value="<?php echo $book['isbn']; ?>" required><br>
        <label>Published Date: </label><input type="date" name="published_date" value="<?php echo $book['published_date']; ?>" required><br>
        <label>Copies Available: </label><input type="number" name="copies_available" value="<?php echo $book['copies_available']; ?>" required><br>
        <button type="submit" name="update_book">Update Book</button>
    </form>
</body>
</html>
