<?php require APPROOT . '/views/inc/header.php' ; ?>
<link rel="stylesheet" href="../css/style.css">

<!-- Display Content IF NO Error -->
<?php if(empty($_SESSION['logindetails']['errorMessage'])){ ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Header-->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 style="color:lightslategrey">ASM Ürünü Teklif İşlemi</h5>
                </div>
                <!-- Show Product Detail-->
                <div class="card-body">
                    <form id="form_abonman" action="../users/login" method="post">
                        <div style="float: left; width: 32.5% !important">
                            <fieldset  class="product_border fieldsetClass">
                                <legend class="product_border">Genel Bilgiler ( Abonman )</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigorta_Ettiren" >Sigorta Ettiren : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_abon_1" value='<?php echo($_SESSION['policyScreen']['sie_must']['must_unvani']) ?>' readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">Sigortalı : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" title="Dikkat" data-toggle="popover"  data-placement="top" data-content="Arama yapabilmek için yan taraftaki arama iconunun üzerine tıklayınız !" data-trigger="hover" name="edt_abon_2" id="edt_abon_2" type="text" <?php if(isset($_SESSION['customerDetails']['must_kod'])){ ?> value='<?php echo(($_SESSION['customerDetails']['must_kod'])); ?>'
                                                <?php } ?> placeholder="Müşteri No" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor" data-toggle="modal" data-target="#tcknoModal"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="hidden" class="form-control form-control-sm is-valid" id="" value='' readonly>
                                            <?php if(isset($_SESSION['customerDetails']['must_kod'])){ ?>
                                            <div class="valid-feedback">
                                               <?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['adi']) ?> <?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['soyadi']) ?>

                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="police_cinsi">Poliçe Cinsi : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_abon_3" value='<?php echo($_SESSION['policyScreen']['police_cinsi']) ?>' readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="islem_yapilan_acente">İşlem Yapılan Acente : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_abon_4" value='<?php echo($_SESSION['policyScreen']['acn_must']['must_unvani']) ?>' readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="abonman_flotan_no">Abonman / Flotan No : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_abon_5" value='<?php echo($_SESSION['policyScreen']['productId']) ?>' readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teklif_tarihi">Teklif Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm"  id="datepicker" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_datepicker();" class="input-group-text cursor"><i class="fas fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="tanzim_tarihi">Tanzim Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm"  id="datepicker_tanzim" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_tanzim();" class="input-group-text cursor"><i class="fas fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yükleme_tarihi">Yükleme Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm"  id="datepicker_yükleme" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_yükleme();" class="input-group-text cursor"><i class="fas fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="döviz_cinci_kuru" >Döviz Cinsi/Kuru : </label>
                                        <select <?php foreach($_SESSION['policyScreen']['doviz_kurlari'] as $key => $value) ?> id="inputState" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['doviz_kurlari'] as $doviz_kurlari) {
                                                    
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="" value="<?= $doviz_kurlari['doviz_kodu'] ?>"><?= $doviz_kurlari['doviz_kodu']  ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="ist_bil" style="display:inline-block;margin-left: 1.3% !important; width: 32.5% !important">
                            <fieldset  class="product_border fieldsetClass">
                                <legend class="product_border">İstatistik Bilgiler</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigorta_Ettiren" >Teminat Tipi : </label>
                                        <select id="edt_ist_TDG" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $teminat_tipi) {
                                                    if($teminat_tipi['ist_adi'] == "Teminat Tipi"){
                                                    foreach($teminat_tipi['ist_deger_tab'] as $key => $teminat_tipiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $teminat_tipiList['deger_kod'] ?>" value="<?= $teminat_tipiList['deger_adi'] ?>"><?= $teminat_tipiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">Emtea Cinsi : </label>
                                        <div class="input-group mb-1">
                                            <select id="edt_ist_EMK" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $emtea_cinsi) {
                                                    if($emtea_cinsi['ist_adi'] == "Emtia Cinsi"){
                                                    foreach($emtea_cinsi['ist_deger_tab'] as $key => $emtea_cinsiList){ 
                                                    $selected='273';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $emtea_cinsiList['deger_kod'] ?>" value="<?= $emtea_cinsiList['deger_adi'] ?>"><?= $emtea_cinsiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="tasima_türü" >Taşıma Türü : </label>
                                        <select id="edt_ist_TT7" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $tasima_turu) {
                                                    if($tasima_turu['ist_adi'] == "Taşima Türü"){
                                                    foreach($tasima_turu['ist_deger_tab'] as $key => $tasima_turuList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $tasima_turuList['deger_kod'] ?>" value="<?= $tasima_turuList['deger_adi'] ?>"><?= $tasima_turuList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="ilave_bedel">İlave Bedel : </label>
                                        <div class="input-group mb-1">
                                            <select id="edt_ist_IBO" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $ilave_bedel) {
                                                    if($ilave_bedel['ist_adi'] == "İlave Bedel Orani"){
                                                    foreach($ilave_bedel['ist_deger_tab'] as $key => $ilave_bedelList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $ilave_bedelList['deger_kod'] ?>" value="<?= $ilave_bedelList['deger_adi'] ?>"><?= $ilave_bedelList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teklif_tarihi">Yurtiçi-Yurtdışı : </label>
                                        <select id="edt_ist_YIY" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $yurticdis) {
                                                    if($yurticdis['ist_adi'] == "Yurt İçi-Y.Dişi"){
                                                    foreach($yurticdis['ist_deger_tab'] as $key => $yurticdisList){ 
                                                    $selected='1';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $yurticdisList['deger_kod'] ?>" value="<?= $yurticdisList['deger_adi'] ?>"><?= $yurticdisList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teklif_tarihi">Kalkış Ülkesi : </label>
                                        <select id="edt_ist_BAU" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $policeDetail) {
                                                    if($policeDetail['ist_adi'] == "Kalkiş Ülkesi"){
                                                    foreach($policeDetail['ist_deger_tab'] as $key => $policeList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $policeList['deger_kod'] ?>" value="<?= $policeList['deger_adi'] ?>"><?= $policeList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="tanzim_tarihi">Kalkış İli : </label>
                                        <select id="edt_ist_BIL" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $kalkis_ili) {
                                                    if($kalkis_ili['ist_adi'] == "Kalkiş İli"){
                                                    foreach($kalkis_ili['ist_deger_tab'] as $key => $kalkis_iliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $kalkis_iliList['deger_kod'] ?>" value="<?= $kalkis_iliList['deger_adi'] ?>"><?= $kalkis_iliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yükleme_tarihi">Varış Ülkesi : </label>
                                        <select id="edt_ist_BTU" data-toggle="popover" data-placement="top" data-content="Bu alan doldurulması zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $kalkis_ili) {
                                                    if($kalkis_ili['ist_adi'] == "Variş Ülkesi"){
                                                    foreach($kalkis_ili['ist_deger_tab'] as $key => $kalkis_iliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $kalkis_iliList['deger_kod'] ?>" value="<?= $kalkis_iliList['deger_adi'] ?>"><?= $kalkis_iliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="döviz_cinci_kuru" >Varış İli : </label>
                                        <select id="edt_ist_BIS" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $varisIli) {
                                                    if($varisIli['ist_adi'] == "Variş İli"){
                                                    foreach($varisIli['ist_deger_tab'] as $key => $varisIliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $varisIliList['deger_kod'] ?>" value="<?= $varisIliList['deger_adi'] ?>"><?= $varisIliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yükleme_tarihi">Ambalaj Cinsi : </label>
                                        <select id="edt_ist_AMC" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $amb_cinsi) {
                                                    if($amb_cinsi['ist_adi'] == "Ambalaj Cinsi"){
                                                    foreach($amb_cinsi['ist_deger_tab'] as $key => $amb_cinsiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $amb_cinsiList['deger_kod'] ?>" value="<?= $amb_cinsiList['deger_adi'] ?>"><?= $amb_cinsiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="döviz_cinci_kuru" >Gemi İMO No : </label>
                                        <select id="edt_ist_GEM" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $gemi_adi) {
                                                    if($gemi_adi['ist_adi'] == "Gemi Adi/Imo"){
                                                    foreach($gemi_adi['ist_deger_tab'] as $key => $gemi_adiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $gemi_adiList['deger_kod'] ?>" value="<?= $gemi_adiList['deger_adi'] ?>"><?= $gemi_adiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button style="float: right !important" id="ist_btn" type="submit" class="btn btn-secondary btn-sm">Kontrol Et</button>
                            </fieldset>
                        </div>
                        <div id="matbu_bil" style="float:right; width: 32.5% !important">
                            <fieldset class="product_border fieldsetClass">
                                <legend class="product_border">Matbu Bilgiler</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigorta_Ettiren" >Kalkış Yeri : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_4" value="İZMİR">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">Varış Yeri : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" id="edt_matbu_7" type="text" value="BERLİN">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="police_cinsi">Emtea Açıklama : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_11" value="C">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="islem_yapilan_acente">Vasıta Cinsi : </label>
                                        <input type="text" class="form-control form-control-sm" id="keyvalue" name="keyvalue" value="GEMİ">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="abonman_flotan_no">Adet : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_22" value="22">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="abonman_flotan_no">Ağırlık : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_24" value="3000">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teklif_tarihi">Kalkış Yeri (İNG.) : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_8" value="İZMİR">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="tanzim_tarihi">Varış Yeri (İNG.) : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_9" value="BERLİN">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yükleme_tarihi">Emtea Açıklama (İNG) : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_12" value="1.1.1990">
                                    </div>
                                </div>
                                <br>
                                <button style="float: right !important" id="matbu_btn" type="button" class="btn btn-secondary btn-sm">Kontrol et</button>
                            </fieldset>
                        </div>
                        <div id="teminat_div" style="float: left; width: 32.5% !important">
                            <fieldset class="product_border">
                                <legend class="product_border">TEMİNATLAR</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="temimatlar">I.C.C.(A) : </label>
                                        <input class="form-control form-control-sm" id="edt_tem_2" type="number" value="100.000" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">I.C.C.(AİR) : </label>
                                        <input type="number" class="form-control form-control-sm" id="edt_tem_3" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">I.C.C.(C) : </label>
                                        <input type="number" class="form-control form-control-sm" id="edt_tem_4" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">GREV : </label>
                                        <input type="number" class="form-control form-control-sm" id="edt_tem_5" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">HARP/GREV (Abonman Teminat) : </label>
                                        <input type="number" class="form-control form-control-sm" id="edt_tem_6" value="" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{} ?>
<?php Modal::GetModal('Müşteri Arama','tcknoModal','kimlikno')?>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
    });
</script>
<script>
    $('select').on('change', function() {
        //var optSelect = $('#edt_ist_TDG option:selected').val();
        alert( this.value );
    });
</script>
<script>
    $( function() {
      $( "#datepicker" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
       $("#datepicker").datepicker("setDate", new Date());
    } );
</script>

<script>
    $( function() {
      $( "#datepicker_tanzim" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
      $("#datepicker_tanzim").datepicker("setDate", new Date());

    } );
</script>
<script>
    $( function() {
      $( "#datepicker_yükleme" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
      $("#datepicker_yükleme").datepicker("setDate", new Date());

    } );
</script>
<script>
    function show_datepicker(){
        $('#datepicker').datepicker('show');
    }
</script>
<script>
    function show_tanzim(){
        $('#datepicker_tanzim').datepicker('show');
    }
</script>
<script>
    function show_yükleme(){
        $('#datepicker_yükleme').datepicker('show');
    }
</script>
<?php require APPROOT . '/views/inc/footer.php' ; ?>
<!-- Display Error Message When Error Occured -->
<div id="errorDiv" class="alert alert-danger" role="alert">
    <h6 class="alert-heading">Dikkat !</h6>
    <?php echo $_SESSION['logindetails']['errorMessage'] ?>
</div>
<script>
    <?php if(empty($_SESSION['logindetails']['errorMessage'])){ ?>
        document.getElementById("errorDiv").style.visibility = "hidden";
    <?php }else{ ?>
        document.getElementById("errorDiv").style.visibility = "none";
    <?php }; ?>
</script>
<!-- Sigortalı Value --> <!-- Empty ? --> <!-- Display None -->
<script>
    $("#edt_abon_2").on("change paste keyup", function() {
    var sigortaliVal = $(this).val();
    if(sigortaliVal == ""){
        //$("#ist_bil").css("display", "none  ");
        $("#matbu_bil").css("display", "none  ");
        $("#teminat_div").css("display", "none  ");
    } 
    });
</script>
<!-- Matbu Bilgileri Show/Hide-->
<script>
    $("#matbu_bil").css("display", "none");
    $("#ist_btn").click(function(){
        var showDiv = 1;
        if(showDiv = 1){
            $("#matbu_bil").css("display", "inline-block");
        }else{
            $("#matbu_bil").css("display", "none  ");
        }
    });
    
</script>
<!-- Teminat Bilgileri Show/Hide-->
<script>
    $("#teminat_div").css("display", "none");
    $("#matbu_btn").click(function(){
        var showDiv = 1;
        if(showDiv = 1){
            $("#teminat_div").css("display", "inline-block");
            $('html,body').animate({
                scrollTop: $("#teminat_div").offset().top},
                'slow');
        }else{
            $("#teminat_div").css("display", "none  ");
        }
    });
</script>