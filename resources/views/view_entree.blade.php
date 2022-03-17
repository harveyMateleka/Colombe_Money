@extends('layouts.header')
@section('content')
<div class="modal fade" id="modal_entree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="message">
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btn_saveT">ok</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid flex-grow-1 container-p-y">
   <h3 class="font-weight-bold py-3 mb-0">DEPOT</h3>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">   
   </div>
   <div class="card col-md-10">
      <div class="card -header">    
      </div>
      <div class="card-body">
         <form action="#" method="POST" id="form_affectation">
            {{csrf_field()}}
            <div class="row">
               <div class="col-md-4">
                  <select class="custom-select flex-grow-1" id='name_agence' name="agence">
                     <option value='-1'>Agence de provenance</option>
                     @foreach($don as $ligne_agence)
                     <option value='{!! $ligne_agence->numagence !!}'>{!! $ligne_agence->nomagence !!}</option>
                     @endforeach
                  </select>
                  @foreach($don as $ligne_agence)
                  <input type="hidden"  class="form-control"  name="{{'agence'.$ligne_agence->numagence}}"  id="{{'agence'.$ligne_agence->numagence}}" value="{{$ligne_agence->nomagence}}">
                   <input type="hidden"  class="form-control"  name="{{'ag_init'.$ligne_agence->numagence}}"  id="{{'ag_init'.$ligne_agence->numagence}}" value="{{$ligne_agence->initial}}">
                  @endforeach
               </div>

               <div class="col-md-4">
                           <select  class="custom-select flex-grow-1" id='name_ville' name="name_ville">
                              <option value='-1'>Agence Destination</option>
                              @foreach($tab_ville as $ligne_tab_ville)
                              <option value='{!! $ligne_tab_ville->id_ville !!}'>{!! $ligne_tab_ville->ville !!}</option>
                              @endforeach
                           </select>
                           @foreach($tab_ville as $ligne_tab_ville)
                           <input type="hidden"  class="form-control"  name="{{'ville'.$ligne_tab_ville->id_ville}}"  id="{{'ville'.$ligne_tab_ville->id_ville}}" value="{{$ligne_tab_ville->ville}}">
                           <input type="hidden"  class="form-control"  name="{{'vil_init'.$ligne_tab_ville->id_ville}}"  id="{{'vil_init'.$ligne_tab_ville->id_ville}}" value="{{$ligne_tab_ville->initial}}">
                         
                           @endforeach
                </div>
               <div class="col-md-3"> 
                     <input type="text" class="form-control"  name="transact" placeholder="" id="name_transact" value="" readonly>
                     <div class="clearfix"></div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-row">
                          <label class="form-label">Nom Expediteur</label>
                              <input type="text" style="text-transform:uppercase;" class="form-control"  name="expedieteur" placeholder="" id="name_expedit">
                              <div id="mes_naex" style="color:red; font-size:10px;" class="clearfix"></div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-row">
                          <label class="form-label"><NAV>Phone Expediteur</NAV></label>
                              <input type="tel" maxlength="12" class="form-control" min="0" max="2"  name="telexpedit" placeholder="" id="tel_expedit" required>
                              <div id="mes_ex" style="color:red; font-size:10px;" class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-row">
                          <label class="form-label">Nom Beneficiaire</label>
                              <input type="text" style="text-transform:uppercase;" class="form-control"  name="ben" placeholder="" id="name_benefic">
                              <div id="id_ben"class="clearfix"></div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-row">
                        <label class="form-label">Phone Beneficiere</label>                              
                        <input type="tel" maxlength="12" class="form-control"  name="tel_benefic" placeholder="" id="tel_benefic">
                        <div id="mes_ben" style="color:red; font-size:10px;" class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div class="row">
                     
                        <div class="form-group col-md-4">
                           <select class="custom-select flex-grow-1" style="padding-bottom:100%;"   id='name_devise' name="name_devise">
                              <option  class="form-label" value='-1'>Devise</option>
                              @foreach($tab_devise as $ligne_devise)
                              <option value='{!! $ligne_devise->id !!}'>{!! $ligne_devise->intitule !!}</option>
                              @endforeach
                           </select>
                           @foreach($tab_devise as $ligne_devise)
                           <input type="hidden"  class="form-control"  name="{{'taux'.$ligne_devise->id}}"  id="{{'taux'.$ligne_devise->id}}" value="{{$ligne_devise->taux}}">
                           <input type="hidden"  class="form-control"  name="{{'devise'.$ligne_devise->id}}"  id="{{'devise'.$ligne_devise->id}}" value="{{$ligne_devise->intitule}}">
                           @endforeach
                     
                     </div>
                       
                      
                        <div class="form-group col-md-4">
                          <label class="form-label">Montant a Envoyer</label>
                              <input type="text" class="form-control"  name="name_montexp" placeholder=""   id="name_montexp">
                              <div class="clearfix"></div>
                        </div>

                         <div class="form-group col-md-4">
                             <label class="form-label">Pourcentage</label>
                              <input type="text"  class="form-control"  name="telexpedit" placeholder="" id="name_montcom" readonly>
                              <div class="clearfix"></div>
                        </div>
                     
            </div>
           
            <br>
            <button type="button" class="btn btn-success" name="btnsave_users" id="btnsave_envois">Envoyez</button>
            <button type="reset" class="btn btn-danger" id="btnreset_affectation">annule</button>
            <input type="hidden" class="form-control"  id="name_occupation">
         </form>
      </div>
   </div>
   <hr class="border-light container-m--x my-4">
   <div class="card col-md-12">
      <h6 class="card-header">Liste de depots</h6>
      <div class="card-body">
         <table class="table card-table" id="tab_entree">
            <thead class="thead-light">
               <tr>
                  <th>CODE.</th>
                  <th>PROV.</th>
                  <th>DESTINA.</th>
                  <th>DEVISE</th>
                  <th>MONTANT ENV.</th>
                  <th>%</th>
                   <th>DATE.</th> 
                  <th>ACTION</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
@section('script')

$('#name_montexp').on("keyup", function() {
  

});

$("#tel_expedit").focusout(function(){
   if(regexPhoneNumber($("#tel_expedit").val())){
     return '';   
   }
   else{
      $("#mes_ex").html("respectez le format de phone 243......");
   } 
});

$("#tel_benefic").focusout(function(){
   if(regexPhoneNumber($("#tel_benefic").val())){
     return '';   
   }
   else{
      $("#mes_ben").html("respectez le format de phone 243........");
   } 
});

$("#name_expedit").focusout(function(){
   if(regexverification($("#name_expedit").val())){
      return $("#mes_naex").html("");
   }
   else{
      
      $("#mes_naex").html("ecrivez toutes l'identité tout en le separant par espace");
   }
});
$("#name_expedit").focusin(function(){
   return $("#mes_naex").html("");
});

$("#name_benefic").focusout(function(){
   if(regexverification($("#name_benefic").val())){
      return $("#id_ben").html("");
   }
   else{
      
      $("#id_ben").html("ecrivez toutes l'identité tout en le separant par espace");
   }
});
$("#name_expedit").focusin(function(){
   return $("#mes_naex").html("");
});

$("#name_benefic").focusin(function(){
   return $("#mes_naex").html("");
});


function regexPhoneNumber(str) {
	const regexPhoneNumber = /^[\+]?[1-4]{3}?[0-9]{9}$/; 
  
	if (str.match(regexPhoneNumber)) {
		return true;
	} else {
		return false;
	}
}

function regexverification(str) {
	const regexPhoneNumber = /^[a-z]{3,}?[\s]?[a-z]{3,}?[\s]?[a-z]{3,}$/; 
  
	if (str.match(regexPhoneNumber)) {
		return true;
	} else {
		return false;
	}
}

$('#name_devise').change(function() {
  $('#name_montcom').val(calcul_com());
});

$('#name_agence').change(function() {
  if ($('#name_agence').val() != '-1') {
    affiche_entree($('#name_agence').val());
    code_transfert();
  } else {
    return '';
  }
});
$("#name_agence").select2();
$("#name_ville").select2();
$('#name_montexp').on('input', function() {
  if (!isNaN($('#name_montexp').val())) {
    $('#name_montcom').val(calcul_com());
  } else {
    $('#name_montexp').val('');
  }
});
$('#tel_benefic').on('input', function() {
  if (!isNaN($('#tel_benefic').val())) {} else {
    $('#tel_benefic').val('');
  }
});
$('#tel_expedit').on('input', function() {
  if (!isNaN($('#tel_expedit').val())) {} else {
    $('#tel_expedit').val('');
  }
});

function calcul_com() {
  if ($('#name_devise').val() != '-1' && $('#name_montexp').val() != '') {
    var id_devise = $('#name_devise').val();
    var taux = $('#taux' + id_devise).val();
    var montant = $('#name_montexp').val() * taux / 100;
    var montantt = parseFloat(montant).toFixed(2);
    return montantt;
  } else {
    return '';
  }
}
$('#name_ville').change(function() {
  if ($('#name_ville').val() != '-1') {
    code_transfert();
  } else {
    return '';
  }
});
function code_transfert(){

   if($('#name_agence').val()!='-1' && $("#name_ville").val()!='-1'){
      var code_vil=$("#name_ville").val();
      var code_ag=$("#name_agence").val();
      var init_ag = $('#ag_init' + code_ag).val();
      var init_vil = $('#vil_init' + code_vil).val();
      $.ajax({
      url: "{{route('route_generate')}}",
      type: 'POST',
      async: false,
      data:{ 
         initial_ag:init_ag,
         initial_vil:init_vil

      },
      success:function(data){
         $("#name_transact").val(data.success);
      },
      error: function(data) {
         alert(data.success);
      }
   });
   }
  
}
$('#btntest').click(function() {
  window.location.href = ("{{route('index_essaie')}}}}");
});

     $('body').delegate('.print','click',function(e){
            var ids=$(this).data('id');
            window.location.href = ("/admin/print/" + ids);      
         });

$('#btnsave_envois').click(function() {
                  if ($("#name_expedit").val() != '' && $("#tel_expedit").val() != '' && $("#name_benefic").val() != '' && $("#tel_benefic").val() != '' && $("#name_montexp").val() != '' && $("#name_montcom").val() != '') {

                    if ($('#name_devise').val() != '-1' && $('#name_ville').val() != '-1' && $('#name_agence').val() != '-1') {
                      var message = 'vous voulez faire le transfert au montant de ' + $("#name_montexp").val() + ' au numero ' + $("#name_transact").val();

                      swal({
            title: 'ABT-TRANSFERT',
            text: message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,Envoyez!',
            cancelButtonText: 'No, ANNULE!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve, reject) {
                $.ajax({
                  url: "{{route('route_entree')}}",
                  type: 'POST',
                  async: false,
                  data: {
                    agence: $("#name_agence").val(),
                    ville: $("#name_ville").val(),
                    devise: $("#name_devise").val(),
                    expediteur: $("#name_expedit").val(),
                    expeditel: $("#tel_expedit").val(),
                    benefic: $("#name_benefic").val(),
                    tel_ben: $("#tel_benefic").val(),
                    montenv: $("#name_montexp").val(),
                    montcom: $("#name_montcom").val(),
                    transact: $("#name_transact").val(),
                  },
                  success: function(data) {
                    if (data.success == '1') {
                      affiche_entree($('#name_agence').val());
                      var id_ag = $('#name_agence').val();
                      var id_vil = $("#name_ville").val();
                      var dev = $('#name_devise').val();
                      var tab = ['1', $('#agence' + id_ag).val(), $('#ville' + id_vil).val(),
                        $("#name_transact").val(), $("#name_expedit").val(), $("#tel_expedit").val(),
                        $("#name_benefic").val(), $("#tel_benefic").val(), $("#name_montexp").val(), $("#name_montcom").val(), $('#devise' + dev).val()
                      ];
                      window.location.href = ("/pdf/generate/" + tab);
                      $("#name_transact").val(data.data);
                      $("#name_ville").val('-1');
                      $("#name_devise").val('-1');
                      $("#name_expedit").val('');
                      $("#name_montcom").val('');
                      $("#name_benefic").val('');
                      $("#name_montexp").val('');
                      $("#tel_expedit").val('');
                      $("#tel_benefic").val('');
                      $('#modal_entree').modal('hide');

                      swal({
                        title: 'ABT COLOMBE!',
                        text: "Vous avez envoie l'argent avec success!",
                        type: 'success'
                      })
                    }
                  },
                  error: function(data) {
                    alert(data.success);
                  }
                });
            })
        }

      }).then(function() {
        swal({
          type: 'info',
          title: 'ABT COLOMBE',
          html: "le transfert n'est pas effectuer"
        })
      });       
                    
                }
              }
            });
@endsection