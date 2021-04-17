<?php include ('admin_header.php'); 
?>


 <section id="dropdowns">
 <form action="." method="get" id="select_make" class="select_make">
        <input type="hidden" name="action" value="search_cars">
        <select name="make_id">
            <option value="0">Vehicle Make</option>
            <?php foreach ($makes as $make) : ?>
            <?php if ($make_id == $make['make_id']) { ?>
                <option value="<?= $make['make_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $make['make_id'] ?>">
                    <?php } ?>
                    <?= $make['make'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
        <select name="type_id">
            <option value="0">Vehicle Type</option>
            <?php foreach ($types as $type) : ?>
            <?php if ($type_id == $type['type_id']) { ?>
                <option value="<?= $type['type_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $type['type_id'] ?>">
                    <?php } ?>
                    <?= $type['type'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
        <select name="class_id">
            <option value="0">Vehicle Class</option>
            <?php foreach ($classes as $class) : ?>
            <?php if ($class_id == $class['class_id']) { ?>
                <option value="<?= $class['class_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $class['class_id'] ?>">
                    <?php } ?>
                    <?= $class['class'] ?>
                </option> 
                <?php endforeach; ?>
        </select>   
        <br>
        <input type="radio" id="price" name="order" value="price">
        <label for="price">Price</label>
        <input type="radio" id="year" name="order" value="year">
        <label for="year">Year</label><br>
        <button type="submit" id="submitbutton">Submit</button><hr>

    </form>     
            <br>
            </div>
</section> 



<div class = "vehiclelist">
                <section>
                <?php if($vehicles) { ?>
                
                <table id="vehiclelist">
                <tr id ="tablehead">
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Class</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Remove</th>
                    
                </tr><br>
                
                <tr>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <td><?php echo $vehicle['year']; ?></td>
                    <td><?php echo $vehicle['make']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo $vehicle['class']; ?></td>
                    <td><?php echo $vehicle['type']; ?></td>
                    <td>$<?php echo number_format($vehicle['price']); ?></td>
                    <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?=
                    $vehicle['vehicle_id'] ?>">
                    <button class="delete_button">Delete</button>
                </form></td>
                </tr>
                <?php endforeach; ?>
                </table>
                </section><br><hr>
                    </div>
                    <?php }  ?>
<div id="manage_buttons">
                    <section id="manageMakes" class="manageMakes">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_makes">
        <button class="manage">Manage Makes</button>
    </form><br>
    
    </section>
    <section id="manageClasses" class="manageClasses">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_classes">
        <button class="manage">Manage Classes</button>
    </form><br>
    
    </section>
    <section id="manageTypes" class="manageTypes">
    <form action="." method="post">
        <input type="hidden" name="action" value="manage_types">
        <button class="manage">Manage Types</button>
    </form><br>
    
    </section>
    <section id="addVehicles" class="addVehicles">
    <form action="." method="post">
        <input type="hidden" name="action" value="add_vehicle_page">
        <button class="manage">Add Vehicles</button>
    </form><br>
    <p><a href=".?action=show_register">Register New Admin User </a></p>
    </section>
                </div>

                <?php include ('admin_footer.php'); 
?>          
                    

 
