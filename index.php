<?php require ('database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<h1>TEST<h1>

 
<?php 

    $query = 'SELECT * from vehicles';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    
    ?>

<h2> Test </h2><br>
                <section>
                
                <?php foreach ($results as $result) : ?>
                <table>
                <tr>
                    <td><?php echo $result['year']; ?></td>
                    <td><?php echo $result['model']; ?></td>
                    <td><?php echo $result['price']; ?></td>
                    <td><?php echo $result['type_id']; ?></td>
                    <td><?php echo $result['class_id']; ?></td>
                    <td><?php echo $result['make_id']; ?></td>
                </tr>
                </table>
                <?php endforeach; ?>
                </section>
    
</body>
</html>

