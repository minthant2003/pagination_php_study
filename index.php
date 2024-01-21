<?php
    include 'db_config.php';

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    
    $row_nums = mysqli_num_rows($result);
    $limit = 3;
    $page_nums = ceil($row_nums / $limit);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $init = $limit * ($page - 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Pagination Study</title>

    <link rel="stylesheet" href="my_style.css">
    <script src="app.js"></script>
</head>
<body>
    
    <?php if(mysqli_num_rows($result) > 0) { ?>
        
        <table>
            <thead>
                <tr>
                    <th>Student_ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Major</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM students LIMIT $init, $limit";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) { ?>            
                        <tr>
                            <td><?= $row['Student_ID'] ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Age'] ?></td>
                            <td><?= $row['Major'] ?></td>
                        </tr>
                <?php } ?>            
            </tbody>
        </table>

        <p>Showing <?= $page ?> of <?= $page_nums ?> pages</p>

        <a href="index.php?page=1">First</a>
        <a href="index.php" id="previous" data-page="<?= $page ?>">Previous</a>            
            <? for ($i = max(1, $page - 1); $i <= min($page_nums, $page + 1); $i++) { ?>
                <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
            <? } ?>
        <a href="index.php" id="next" data-page="<?= $page ?>" data-page_nums="<?= $page_nums ?>">Next</a>
        <a href="index.php?page=<?= $page_nums ?>">Last</a>

    <?php } ?>

</body>
</html>

<?php
    mysqli_close($conn);
?>