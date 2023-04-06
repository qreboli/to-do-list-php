<?php
    require 'db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main-section">
    <div class="add-section">
        <form action="app/add.php" method="POST" autocomplete="off">
            <?php if (isset($_GET['mess']) && $_GET['mess']=='error'){ ?>
                <input type="text"
                       name="title"
                       style="border-color: red"
                       placeholder="this field is required" />
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php }else{ ?>
            <input type="text"
                   name="title"
                   placeholder="What do you need to do ?" />
            <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php } ?>
        </form>
    </div>
    <?php
    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
    ?>
    <div class="show-todo-section">
        <?php if ($todos->rowCount() <= 0){?>
        <div class="todo-item">
            <div class="empty">
                <img src="img/f.png" alt="background" width="100%">
                <img src="img/Ellipsis.gif" alt="loader gif" width="80px">
            </div>
        </div>
        <?php } ?>

<?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)){ ?>
        <div class="todo-item">
            <span id="<?php echo $todo['id']; ?>"
               class="remove-to-do">x</span>
            <?php if ($todo['checked']){ ?>
            <input type="checkbox"
                   class="check-box"
                   checked />
            <h2 class="checked"><?php echo $todo['title'] ?></h2>
            <?php }else{ ?>
                <input type="checkbox"
                       class="check-box"/>
                <h2><?php echo $todo['title'] ?></h2>
            <?php } ?>
            <br>
            <small><?php echo $todo['date_time'] ?></small>
        </div>
        <?php } ?>
    </div>

</div>
</body>
</html>

