@extends('layouts.header')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
                        <h3 class="font-weight-bold py-3 mb-0">Page de Sortie</h3>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">   
                        </div>
                        <div class="card col-md-12">
                        <div class="card -header">    
                        </div>
                            <div class="card-body">
                            <div id="message" style='color:red; font-size:15px;'>
                </div>
                <form action="#" method="POST" id="form_sortie">
                {{csrf_field()}}
                <div class="form-row">
        
                    <div class="form-group col-md-6">         
                          <select class="custom-select flex-grow-1" id='agence' name="agence">
                          <option value='-1'>Sectionnez l'agence</option>
                          @foreach($sortie_agence as $ligne_agence)
                          <option value='{!! $ligne_agence->numagence !!}'>{!! $ligne_agence->nomagence !!}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">         
                                    <div class="input-group col-md-6">
                                                    <input type="text" class="form-control"  name="name_transact" placeholder="Saisir le code ici" id="name_transact" value="">
                                                <div class="clearfix"></div>
                                                </div>
                                     </div>
                                     <div class="form-group col-md-4">         
                                     <button type="button" class="btn btn-success" name="btnsave_users" id="btn_check">Verifier</button>     
                                     </div>
                               </div>
                               <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label class="form-label">Nom d'expediteur</label>         
                                              <div class="input-group col-md-6">
                                                <input type="text" class="form-control"  name="name_expedit" placeholder="Expediteur" id="name_expedit" value="" readonly>
                                                <div class="clearfix"></div>
                                                </div>
                                     </div>
                                     <div class="form-group col-md-6">
                                     <label class="form-label">Nom Beneficiaire</label>         
                                                <div class="input-group col-md-6">
                                                            <input type="text" class="form-control"  name="name_ben" placeholder="Beneficiaire" id="name_ben" value="" readonly>
                                                            <div class="clearfix"></div>
                                                </div>
                                     </div>
                               </div>
                               <div class="form-row">
                               <div class="form-group col-md-4">
                                     <label class="form-label">Devise</label>         
                                                <div class="input-group col-md-6">
                                                            <input type="text" class="form-control" placeholder="la devise" name="name_devise"  id="devise" value="" readonly>
                                                            <div class="clearfix"></div>
                                                </div>
                                     </div>
                                    <div class="form-group col-md-4">
                                    <label class="form-label">Montant envoyé</label>         
                                              <div class="input-group col-md-6">
                                                <input type="text" class="form-control"  name="name_expedit" placeholder="le Montant" id="name_montant" value="" readonly>
                                                <div class="clearfix"></div>
                                                </div>
                                     </div>
                                      <div class="form-group col-md-4">
                                      <label class="form-label">Pourcentage</label>         
                                                <div class="input-group col-md-6">
                                                      <input type="text" class="form-control"  name="name_pourc" placeholder="montant Pourc." id="name_pourc" value="" readonly>
                                                      <div class="clearfix"></div>
                                                  </div>
                                      </div>
                                     </div>
                                     <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label class="form-label">Agence d'envois</label>         
                                                  <div class="input-group col-md-6">
                                                    <input type="text" class="form-control"  name="name_agence" placeholder="Agence d'envois" id="name_agence" value="" readonly>
                                                    <div class="clearfix"></div>
                                                    </div>
                                        </div>
                                        <div class="form-group col-md-6"> 
                                        <label class="form-label">Date de l'envois</label>        
                                                <div class="input-group col-md-6">
                                                            <input type="date" class="form-control"  name="name_date"  id="name_date" value="" readonly>
                                                            <div class="clearfix"></div>
                                                </div>
                                     </div>
                                     </div>
                                     
                                   
                               
                               <button type="button" class="btn btn-success" id="btn_servir">Servir</button>
                               <input type="hidden" class="form-control" placeholder="la devise" name="name_devise"  id="name_devise">
                               <button type="reset" class="btn btn-danger">Annuler</button>
                </form>
                               
                            </div>
                        </div>
                        <hr class="border-light container-m--x my-4">
                        <div class="card col-md-12">
                            <h6 class="card-header">Liste de Sortie</h6>
                            <div class="card-body">
                            <table class="table card-table" id="tab_sortie">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Agence Envois</th>
                                        <th>Ville </th>
                                        <th>Date.</th>
                                        <th>Devise</th>
                                        <th>Montant Env.</th>
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
$("#agence").select2();
$('#name_transact').on('input', function () {
  if($("#agence").val()=='-1'){
    $("#message").html("selectionnez l'agence");
    $('#name_transact').val("");
    return false; 
  }
 
});

$('#agence').change(function () {
  if ($('#agence').val() != '-1') {
    affiche_sortie($('#agence').val());
  } else {
    $('#tab_sortie').dataTable().clear();
  }
});

$('#btn_check').click(function() { 

       if($("#name_transact").val()!='' && $("#agence").val()!='-1'){ 
        $.ajax({
                     url   : "{{route('route_check')}}",
                     type  : 'POST',
                     async : false,
                     data  : {code:$("#name_transact").val(),
                              agence:$("#agence").val()
                     },
                     success:function(data)
                     {
                      if(data.success=='1'){
                        transact=data.data.numdepot;
                        document.getElementById('name_transact').readOnly = true;
                        $("#name_ben").val(data.data.nomben);
                        $("#devise").val(data.data.intitule);
                        $("#name_expedit").val(data.data.nomclient);
                        $("#name_montant").val(data.data.montenvoi);
                        $("#name_agence").val(data.data.nomagence);
                        $("#name_date").val(data.data.created_at);
                        $("#name_devise").val(data.data.id_devise);
                        $("#name_pourc").val(data.data.montpour);
                        
                     
                      }
                      else{
                        $("#message").html(data.success);  
                      }
                        
                       
                     },
                     error:function(data){

                       alert(data.success);                              
                       }
                 });  
        }
        else{
            $('#message').html('Veuillez saisir le numero de transaction');
        }
   });


   $('#btn_servir').click(function() { 
    if($("#name_transact").val()!='' && $("#name_montant").val()!='' && $("#agence").val()!='-1'){
      $.ajax({
                     url   : "{{route('save_sortie')}}",
                     type  : 'POST',
                     async : false,
                     data  : {code:$("#name_transact").val(),
                              montant:$("#name_montant").val(),
                              devise:$("#name_devise").val(),
                              agence:$("#agence").val()
                     },
                     success:function(data)
                     {
                      if(data.success=='1'){
                        document.getElementById('name_transact').readOnly = false;
                        var tab=['2',$("#name_agence").val(),'ville',
                        $("#name_transact").val(),$("#name_expedit").val(),'tel',
                        $("#name_ben").val(),'telben', $("#name_montant").val(),$("#name_pourc").val(),$("#devise").val()];
                        window.location.href=("/pdf/generate/"+ tab);
                            $("#name_ben").val("");
                            $("#devise").val("");
                            $("#name_expedit").val("");
                            $("#name_montant").val("");
                            $("#name_agence").val("");
                            $("#name_date").val("");
                            $("#name_pourc").val("");
                            $("#name_devise").val("");
                            $("#agence").val("");
                      }else if(data.success=='3'){
                        $("#message").html("le coffre est insuffisant pour faire cette transaction"); 
                      }
                      else{
                           $("#message").html("l'argent est servis");  
                         }
                        
                       
                     },
                     error:function(data){

                       alert(data.success);                              
                       }
                 });
    }
    else{
      $('#message').html('erreur dans le code');
    }
   });
   

@endsection
