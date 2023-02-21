<?php include('header.php') ?>
<section>
        <h2>Update or Delete</h2>
    
    <?php 

    ?>
        <form action="update" action="." method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="itemNum" value="<?php echo $itemNum ?>">
            <label for="title<?php echo $todoitems ?>">Title:</label>
            <input type="text" name="todolist" value="<?php echo $todoitems ?>">
        </form>
        <form action="delete" action="." method="POST">
            <input type="hidden" name="itemNum" value="<?php echo $itemNum ?>">
            <input type="hidden" name="action" value="delete">
            <button>Delete</button>
        </form>
</section>

<?php if (!empty($results)) { ?>
                <?php } else { ?>
                <p>Sorry No Results!</p>
            <?php } ?>
            
<?php include('status.php') ?>
<a href="."> Back to Request form</a>
<br>
<?php include('footer.php') ?>