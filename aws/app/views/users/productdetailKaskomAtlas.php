<?php require APPROOT . '/views/inc/header.php' ; ?>
<?php require APPROOT .'/controllers/Components.php'; ?>
<div id="wrapper">

    <!-- Sidebar -->
    <?php require APPROOT . '/views/inc/sidebar.php' ; ?>
    <?php
        if(isset($_SESSION['productDetailKaskomAtlas']['errorMessage'])){ 
            Errors::WebServiceError($_SESSION['productDetailKaskomAtlas']['errorMessage'],$_SESSION['productDetailKaskomAtlas']['errorCode'],"dbError");
        }else{
        ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Header-->
            <div class="card mb-3">
                <div class="card-header">
                    Kaskom Atlas
                </div>
                <!-- Show Product Detail-->
                <div class="card-body">
                    <form id="appKaskomAtlas" class="needs-validation" method="post" novalidate>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                            <label for="policyType">Poliçe Türü</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].policyType" id="policyType" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="productId">Ürün Kimliği</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].productId" id="productId" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="tarife_adi">Tarife Adı</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].tarife_adi" id="tarife_adi" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="tarife_grup_aciklamasi">Tarife Grup Açıklaması</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].tarife_grup_aciklamasi" id="tarife_grup_aciklamasi" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="tarife_ing_adi">Tarife İngilizce Adı</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].tarife_ing_adi" id="tarife_ing_adi" readonly>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="userName">Kullanıcı Adı</label>
                            <input type="text" class="form-control form-control-sm" :value="mydataKaskomAtlas[0].userName" id="userName" readonly>
                            </div>
                        </div>
                        <hr>
                        <v-row>
                            <template v-for="(item, index) in mydataKaskomAtlas[0].tarife_ist">
                                <v-col v-if="item.is_readonly == 0" cols="4" md="3">
                                    <label v-text="item.ist_adi"></label>
                                    <span v-for="(option,index) in item.ist_deger_tab"> </span>
                                    <select class="custom-select custom-select-sm deneme" :name="item.ist_kod" v-if="item.is_editable == 0" v-model="item.def_deger_adi" :required="item.is_required == 1">
                                        <option v-for="slc_opt in item.ist_deger_tab" value="slc_opt.deger_adi" :value="slc_opt.deger_adi" >{{ slc_opt.deger_adi }}</option>
                                    </select>
                                    <b-select class="custom-select custom-select-sm deneme deger_adi" :name="item.ist_kod" data-toggle="popover" data-trigger="focus" data-content="Bu alana manuel olarak değer girebilirsiniz!" v-if="(item.is_readonly == 0) && (item.is_editable == 1)" :value ="item.def_deger_adi" :required="item.is_required == 1">
                                        <option v-for="slc_opt in item.ist_deger_tab" value="slc_opt.deger_adi" :value="slc_opt.deger_adi" >{{ slc_opt.deger_adi }}</option> 
                                    </b-select>
                                        <div class="invalid-feedback">
                                            Bu alan doldurulması zorunludur!
                                            <template v-if="item.alertCode == 1">
                                                <span v-bind:value="item.alertMessage">{{ item.alertMessage }}
                                            </template>
                                        </div>
                                        <template v-if="item.alertCode == 1">
                                            <div class="invalid-feedback">  
                                                <span v-bind:value="item.alertMessage">{{ item.alertMessage }}
                                            </div>
                                        </template>
                                </v-col>
                            </template>
                        </v-row>
                        <v-row class="form-group">
                            <div class="form-group col-md-2">   
                                <label></label>
                                <button class="btn btn-secondary" type="submit">Git</button>
                            </div>
                        </v-row>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
        ?>
    <!-- /.content-wrapper -->
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>
<script type="text/javascript">
    console.clear()
    var appKaskomAtlas = new Vue({
    el:'#appKaskomAtlas',
    data: function(){
        return {
            mydataKaskomAtlas: [],
        }
        },
        created() {
            this.getDataKaskomAtlas();
        },
        methods: {
        getDataKaskomAtlas: function(){
             let vardataKaskomAtlas = <?php echo json_encode($_SESSION['productDetailKaskomAtlas']) ?> 
             this.mydataKaskomAtlas.push(vardataKaskomAtlas);
        },
    }
 });


 $('.deger_adi').editableSelect();
 $(function () {
  $('[data-toggle="popover"]').popover()
})

/*
$(".deger_adi").bind('input', function () {
   var stt = $(this).val();
   alert(this.value);
});
*/

</script>

