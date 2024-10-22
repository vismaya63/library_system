<?php
include 'db.php';

// Handle new book submission
if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $published_date = $_POST['published_date'];
    $copies_available = $_POST['copies_available'];

    $sql = "INSERT INTO books (title, author, isbn, published_date, copies_available) VALUES ('$title', '$author', '$isbn', '$published_date', $copies_available)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?msg=Book added successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
</head>
<body>
    <h1>Library Management System</h1>

    <h2>Add a new book</h2>
    <form action="index.php" method="POST">
        <label>Title: </label><input type="text" name="title" required><br>
        <label>Author: </label><input type="text" name="author" required><br>
        <label>ISBN: </label><input type="text" name="isbn" required><br>
        <label>Published Date: </label><input type="date" name="published_date" required><br>
        <label>Copies Available: </label><input type="number" name="copies_available" required><br>
        <button type="submit" name="add_book">Add Book</button>
    </form>

    <h2>List of Books</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Published Date</th>
                <th>Copies Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['isbn']; ?></td>
                    <td><?php echo $row['published_date']; ?></td>
                    <td><?php echo $row['copies_available']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
