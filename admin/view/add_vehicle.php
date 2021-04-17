<?php include('admin_header.php'); ?>
<header class="list__row list__header">
        <h3> Add New Vehicle: </h3>
    </header>


<section class="dropdowns" id="dropdowns" >
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_vehicle">
        <div class="add__inputs">
        
        <select name="make_id" required>
            <option value="0">Select Vehicle Make</option>
            <?php foreach ($makes as $make) : ?>
            <?php if ($make_id == $make['make_id']) { ?>
                <option value="<?= $make['make_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $make['make_id'] ?>">
                    <?php } ?>
                    <?= $make['make'] ?>
                </option> 
                <?php endforeach; ?>
        </select><br>

        <select name="class_id" required>
        <option value="0">Select Vehicle Class</option>
        <?php foreach ($classes as $class) : ?>
        <?php if ($class_id == $class['class_id']) { ?>
            <option value="<?= $class['class_id'] ?>" selected>
                <?php } else { ?>
            <option value="<?= $class['class_id'] ?>">
                <?php } ?>
                <?= $class['class'] ?>
            </option> 
            <?php endforeach; ?>
        </select><br>
        
            <select name="type_id" required>
            <option value="0">Select Vehicle Type</option>
            <?php foreach ($types as $type) : ?>
            <?php if ($type_id == $type['type_id']) { ?>
                <option value="<?= $type['type_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $type['type_id'] ?>">
                    <?php } ?>
                    <?= $type['type'] ?>
                </option> 
                <?php endforeach; ?>
        </select><br>

        <br>
<section id="add_vehicle_inputs">
        <label>Year:</label>
        <input type="text" name="year" maxLength="4" placeholder="Year" required><br>
            
        <label>Model:</label>
        <input type="text" name="model" maxLength="50" placeholder="Model" required><br>

        <label>Price:</label>
        <input type="text" name="price" maxLength="10" placeholder="Price" required><br>

        </div>
        <div class="add__addVehicle">
            <button class="add_button">Add</button>
        </div>
    </form>
</section>



<p><a href=".">Home</a></p>
