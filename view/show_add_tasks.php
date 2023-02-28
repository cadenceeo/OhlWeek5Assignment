<?php include('header.php') ?>

<body class="container">
    <br>
    <section id="list" class="list">
    <h1>Todo List</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <label for="todolitems">Title:</label>
                <input type="text" id="todoitems" name="title" required>
                <label for="todolitems">Description:</label>
                <input type="text" id="todoitems" name="description" required>
                <button class="remove-button">Submit</button>
    </form>
</section>
<section>
    <h2>Current Todos</h2>
    <table class="table table-striped">
        <h3>Task</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="action" value="insert">
            <button class="remove-button">X</button>
            </form>
    </table>
</section>
</body>