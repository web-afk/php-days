<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cuantos dias has vivido</title>
</head>
<body>

<header class="header">

    <h1 class="title">
        <?php if(!isset($_POST['dates'])):?>
        ¿Cuántos días has vivido?
        <?php else:?>
        Cálculo Completado
        <?php endif;?>
    </h1>
</header>

<div class="container">

<?php  if(!isset($_POST['dates'])):   ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="option">
            <label for="day" name="day" class="label">Dia : </label>
            <input type="number" name="day"  class="input" placeholder="Día de nacimiento" min="1" max="31" required>
        </div>
        <div class="option">
            <label for="month" name="month" class="label">Mes : </label>
            <input type="number" name="month"  class="input" placeholder="Mes de nacimiento" min="1" max="12" required>
        </div>
        <div class="option">
            <label for="year" name="year" class="label">Año :</label>
            <input type="number" name="year"  class="input" placeholder="Año de nacimiento" min="1880" max="2100" required>
        </div>
        <input type="submit" name="dates" id="submit" value="Enviar">
    </form>

    <?php  else:   
        
        //Obteniendo los datos
        $day = isset($_POST['day']) ? $_POST['day'] : 0;
        $month = isset($_POST['month']) ? $_POST['month'] : 0;
        $year = isset($_POST['year']) ? $_POST['year'] : 0;

        //Creando una fecha de los datos obtenidos
        $dateBorn = date_create_from_format("Y-m-d","$year-$month-$day");

        //Obteniendo la fecha actual
        $dateNow = date_create_from_format("Y-m-d",date("Y-m-d"));

        //Obteniendo un aareglo con todas sus diferencias
        $diff = (array) date_diff($dateBorn,$dateNow);

        $daysLived = $diff['days'];
    ?>

    <p class="parrafo">Usted ha vivido un total de : <span class="time"><?php echo $daysLived;?></span> dias</p>

    <?php  endif;   ?>
</div>

</body>
</html>
