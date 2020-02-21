<?php
/*
   * App Dropdown Class
*/
class Dropdown {
    //Alert Modal
    public function GetDropdown($txtName){
    ?>
    <script>

    json_PolicyScreen = '<?php echo json_encode($_SESSION['policyScreen']) ?>'; //Get JSON
    json_object = JSON.parse(json_PolicyScreen); // JSON Parse
        
    var x = document.createElement("LI");
    var creA =document.createElement('A');//Create Div for Width of Input
    var newDiv = document.createElement("div"); 

    x.appendChild(creA);
    x.appendChild(newDiv);

    x.setAttribute("class","nav-item dropdown");

    creA.innerHTML= '<?php echo($txtName) ?>';
    for(var j=0; j<json_object.police_ist.length; j++){

        var creLiA = document.createElement('A');
        var creHr = document.createElement('HR');

        newDiv.appendChild(creLiA);
        newDiv.appendChild(creHr);
        
        creLiA.innerHTML= json_object.police_ist[j].ist_adi;
        creLiA.setAttribute("class","dropdown-item");
        creLiA.setAttribute("name",json_object.police_ist[j].ist_adi);
        creLiA.setAttribute("style","font-size: small !important");
        if(json_object.police_ist[j].ist_adi == 'Yurt İçi-Y.Dişi'){
            creLiA.setAttribute("href","../users/getProductDetailAbonman");
        }else if(json_object.police_ist[j].ist_adi == 'Kalkiş Ülkesi'){
            creLiA.setAttribute("href","../users/getProductDetailKati");
        }else{
            creLiA.setAttribute("href","../users/getProductDetailKaskomAtlas");
        }
        creHr.setAttribute("style","margin-top: 0rem !important; margin-bottom: 0rem !important;");
    }

    newDiv.setAttribute("class","dropdown-menu");

    creA.setAttribute("class","nav-link dropdown-toggle");
    creA.setAttribute("data-toggle","dropdown");
    creA.setAttribute("role","button");
    creA.setAttribute("aria-haspopup","true");
    creA.setAttribute("href","#");
    creA.setAttribute("style","color:snow");

    document.getElementById("productList").appendChild(x);

    </script>
    <?php 
    }
}
?>


