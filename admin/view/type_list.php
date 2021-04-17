<?php include ('admin_header.php'); 
?>
<?php if($types) { ?>
<section class="list" id="list" ?>
    <header class="list__row list__header">
        <h3> Vehicle Type Manager </h3>
    </header>

    <?php foreach ($types as $type) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $type['type'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_type">
                <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">  
                <button class="delete_button">Delete</button>          
            </form>
        </div>
    </div>
    <?php endforeach ?>
</section>
<?php } else { ?>

<?php } ?>

<section id="add" class="add">
    <h3>Add Type</h3>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>Type:</label>
            <input type="text" name="type_name" maxLength="50" placeholder="Type" autofocus required>
        </div><br>
        <div class="add__addType">
            <button class="add_button">Add</button>
        </div>
    </form>
</section>

<p><a href=".">Home</a></p>








