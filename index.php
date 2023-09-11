<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Calendar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>

    <?php
    $arr = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
    if (isset($_POST['month'])) {
        $m = $_POST['month'] + 1;
    }
    ?>

    <form method="POST" action="index.php">
        <select name="month">
        <?php
        foreach ($arr as $key => $value) {
                ?><option value="<?= $key ?>" <?php if ($key == $m - 1) {?> selected <?php } ?> ><?= $value ?></option><?php
        }
        ?>
        </select>
        
        <input type="submit" class="btn btn-primary" data-toggle="popover" title="Показать" data-content="Показать"  value="Показать"/>
    </form>

    <?php
    include("functions.php");
    $calendar = monthCalendar($m);
    ?>
    <table class="table table-striped table-bordered" style="width: 50%; caption-side: top;">
        <caption>
            <?= $calendar[0] . " " . $calendar[3]?>
        </caption>
        <tr>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th>Сб</th>
            <th>Вс</th>
        </tr>
        <?php
        $k = 1;
        $N = 1 + ($calendar[2] - (7 - $calendar[1] + 1)) / 7 + 1; //округление вверх
        for ($i = 0; $i < $N; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($i == 0 && $j < $calendar[1] - 1) {
                    echo "<td></td>";
                } else {

                    if ($k <= $calendar[2]) {
                        echo "<td>$k</td>";
                        $k++;
                    } else {
                        break;
                    }
                }
            }
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover({ trigger: 'hover' });
        });
    </script>


    <script src="~/lib/jquery/dist/jquery.min.js"></script>
    <script src="~/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

