<?php 
    require_once dirname(__FILE__) .'/../config.php';
    include _ROOT_PATH.'/templates/top.php';
?>

<!DOCTYPE HTML>

<!--<body style="margin: auto;
    width: 500px;
    padding: 50px;
    vertical-align: middle";>-->

<div id="main" class="wrapper style1">
    <div class="container">
        <a href="<?php print(_APP_ROOT);?>/app/security/logout.php"  class="pure-button">Logout</a>
        <br/><br/>
        <header class="major">
            <h2>Kalkulator</h2>
        </header>

        <form class="cta" action="<?php print(_APP_URL);?>/app/credit_calc.php" method="post">
            <div>
                <div class="col-6 col-12-xsmall">    
                    <label for="id_amount">Kwota jaką chcesz otrzymać: </label>
                    <input id="id_amount" type="text" name="amount" value="<?php echo out($values['amount']); ?>" />
                <br /><br/>
                    <label for="id_year">Na ile lat?: </label>
                    <input id="id_year" type="text" name="year" value="<?php echo out($values['year']); ?>" />
                <br /><br/>
                    <label for="id_percent">Oprocentowanie: </label>
                    <input id="id_percent" type="text" name="percent" value="<?php echo out($values['percent']); ?>" />
                    <br /><br/>
                </div>
            </div>
                <input type="submit" value="Oblicz" class="pure-button-primary pure-button"/>

        </form>	
        
        <?php
            if (isset($CalcMessages)) {
                if (count ( $CalcMessages ) > 0) {
                    echo '<ol style="margin: auto; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:400px;">';
                    foreach ( $CalcMessages as $key => $CalcMessage ) {
                        echo '<li>'.$CalcMessage.'</li>';
                    }
                    echo '</ol>';
                }
            }
        ?>
        
        <?php if (isset($monthlyRate)){ ?>
        <div style="margin: auto; padding: 10px; border-radius: 5px; background-color: #ff0; width:500px; color: #000" >
            <?php echo 'Miesięczna rata do zapłaty: '.round($monthlyRate,2).'zł'; ?>
                     <?php } ?>
                     <br>
            <?php 
            if (isset($allRates)){ 
            echo 'Całkowita kwota do zapłaty w ciągu całego okresu kredytowego: '.round($allRates,2).'zł'; ?>	
        </div>
        <?php } ?>
    </div>
</div>    
    
<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>
