<?php include ('admin_header.php'); 
?>
<?php if($makes) { ?>
<section class="list" id="list" ?>
    <header class="list__row list__header">
        <h3> Vehicle Make Manager </h3>
    </header>

    <?php foreach ($makes as $make) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $make['make'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_make">
                <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">  
                <button class="delete_button">Delete</button>          
            </form>
        </div>
    </div>
    <?php endforeach ?>
</section>
<?php } else { ?>

<?php } ?>

<section id="add" class="add">
    <h3>Add Make</h3>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>Make:</label>
            <input type="text" name="make_name" maxLength="50" placeholder="Make" autofocus required>
        </div><br>
        <div class="add__addMake">
            <button class="add_button">Add</button>
        </div>
    </form>
</section>

<p><a href=".">Home</a></p>



