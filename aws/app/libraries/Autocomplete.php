<?php

class Autocomplete{
    public function AutoComp(){
        ?>
        <script>
        var deneme =<?php foreach($_SESSION['policyScreen']['police_ist'] as $key => $value)
        $fileContent [] = $value['ist_adi'];
        echo json_encode($fileContent) ?> 
        //console.log(<?php echo json_encode($fileContent) ?>) ;
        </script>
        <?php
    }
}