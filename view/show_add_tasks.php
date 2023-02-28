<?php include('header.php') ?>

<!-- Display fields to add a task -->
<body class="container">
    <br>
    <section id="add" class="add">
        <h1>Todo List</h1>
        <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_task">
            <div class="add__inputs">
                    <label>Title:</label>
                    <input type="text" id="todoitems" name="title" required>
                    <label>Description:</label>
                    <input type="text" name="description" required>
            </div>
            <div class="add_addItem">
                <button class="add-button bold">Submit</button>
            </div>
        </form>
    </section>

<!-- Display tasks from database on screen -->
<?php if ($todoitems) { ?>
<section id="list" class="list">
        <header>
            <h1>Current Todos</h1>
        </header>
        <table class="table table-striped">
            <?php foreach ($todoitems as $count) : ?>
                <div class="list__row">
                    <div class="list__item">
                        <p class="bold"><?= $count['Title, Description'] ?></p>
                    </div>
                    <div class="delete_task">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_task">
                            <input type="hidden" name="title" value="<?= $count['title'] ?>">
                            <button class="remove-button">X</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </table>
    </section>
<?php } else { ?>
    <p>No Categories exist yet</p>
<?php } ?>
</body>