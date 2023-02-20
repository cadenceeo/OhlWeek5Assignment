<?php include('header.php') ?>

<body class="container">
    <br>
    <section>
    <h1>Todo List</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <label for="title">Task:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description:</label>
        <input type="text" id="title" name="title" required>
        <button>Submit</button>
    </form>
</section>
<section>
    <h2>Current Todos</h2>
    <table class="table table-striped">
        <h3>Task</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="action" value="insert">
            <button>Delete</button>
            </form>
    </table>
</section>
</body>