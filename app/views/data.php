<?php $this->layout('template', ['title' => 'list']) ?>
<?php
    $salaryToHour = 29.15;
    function hoursToMoney($time,$pay4hour){
        $hms = explode(":", $time);
        $dHours = ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
        return number_format ($dHours*$pay4hour,2);
    }
    function hashlama($hours, $credit, $cash, $pay4hour){
        $salary = hoursToMoney ($hours,$pay4hour);
        return ($salary - ($cash + $credit)) ;
    }
    ?>
<div class="container">
    <div class="jumbotron">
        <p class="display-4"> <h1>רשימה שלי היום</h1></p>

        <table class="table table-striped">

            <p>

                <thead>
                <tr>
                    <th scope="col">שם</th>
                    <th scope="col">משמרת</th>
                    <th scope="col">שעות</th>
                    <th scope="col">שכר</th>
                    <th scope="col">הפקדה/(-)מהקופה</th>
                    <th scope="col">השלמה/(-)כסף ביד</th>
                    <th scope="col">אשראי</th>
                    <th scope="col">מזומן</th>
                    <th scope="col">סהכ למשמרת</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $line): ?>
                    <tr>
                        <th scope="row"><?php
                            echo $line['username']      ?></th>
                        <td><?php echo $line['when']?></td>
                        <td><?php echo $line['workHours']?></td>
                        <td><?php echo hoursToMoney ($line['workHours'],$salaryToHour)?></td>
                        <td><?php echo hoursToMoney ($line['workHours'],$salaryToHour)-($line['creditTip']+0)?></td>
                        <td><?php echo hashlama($line['workHours'],$line['creditTip'],$line['cashTip'],$salaryToHour)?></td>
                        <td><?php echo $line['creditTip']?></td>
                        <td><?php echo $line['cashTip']?></td>
                        <td><?php echo ($line['cashTip']+0)+($line['creditTip']+0)?></td>
                    </tr>

                <?php endforeach;?>
                </tbody>
        </table>

        <a class="btn btn-primary btn-lg" role="button" href="/test?logout=true" >סיים</a>
    </div>


</div>
<script src="../app/js/particles.js/"></script>
<script src="../app/js/app.js/"></script>
