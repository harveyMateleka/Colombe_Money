@extends('layouts.header')
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liste des agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table card-table" id='tab_personnelle'>
                    <thead class="thead-light">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>PostNom</th>
                            <th>Prenom</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid flex-grow-1 container-p-y">
    <h3 class="font-weight-bold py-3 mb-0">Page Utilisateur</h3>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">

    </div>

    <div class="card col-md-12">
        <h3 class="card-header">Créer Un Utilisateur</h3>
        <div class="card-body">
            <form action="#" method="POST" id="form_utilisateur">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-row">
                                    <input type="text" class="form-control" name="name_matr" disabled placeholder="Afficher le matricule" id="name_matr">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" name="btnsave_smenu" id="btnsave_smenu">
                                    Personnel
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="name_email" placeholder="Saisir votre Email" id="name_email">
                        <div class="clearfix"></div>
                    </div>

                </div>
                </br>
                <div class="form-row">
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control" name="name_password" placeholder="" id="name_password" value="{!! $result_users !!}">
                        <div class="clearfix"></div>
                    </div>
                </div>

                <hr class="border-light container-m--x my-4">

                <span id="divBtn">
                    <button type="button" class="btn btn-success saveUser" name="btnsave_users" id="btnsave_users">
                        Créer
                    </button>
                </span>

                <button type="button" class="btn btn-danger" id="btnreset_users">Annuler</button>
                <input type="hidden" class="form-control" id="code_users">
                <input type="hidden" class="form-control" id="matr_users">
            </form>
        </div>
    </div>
    <hr class="border-light container-m--x my-4">
    <div class="card col-md-12">
        <h6 class="card-header">Liste des Utilisateur</h6>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table card-table" id="tab_users">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nom du Personnel</th>
                        <th>Email</th>
                        <th>Etat Con</th>
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

$('body').delegate('.afficher_matr','click',function(){
var ids=$(this).data('id');
$("#name_matr").val(ids);
$("#matr_users").val(ids);
});

// CREATION USER

$('.saveUser').click(function() {
if($("#name_matr").val()!='' && $("#name_email").val()!='' && $("#name_password").val()!=''){
if ($("#code_users").val()=='') {
$.ajax({
url : "{{route('save_users')}}",
type : 'POST',
async : false,
data : {name_matr:$("#matr_users").val(),
name_email:$("#name_email").val(),
name_passe:$("#name_password").val()
},
success:function(data)
{
console.log('DATA ::: ', data);
if(data.success == "1"){
Swal.fire(
'Ajouté',
'L\'utilisateur a été bien ajouté.',
'success'
)
$("#name_matr").val('');
$("#name_email").val('');
$("#matr_users").val('');
affiche_users();
}

else{
$('#affichage_message').html("l'utilisateur existe deja");
$('#modal_message').modal('show');
$("#name_matr").val('');
$("#name_email").val('');
$("#matr_users").val('');
}

},
error:function(data){

alert(data.success);
}
});
}
}
else{
$('#affichage_message').html('Remplissez toutes les zones');
$('#modal_message').modal('show');
}
});

$('#btnreset_users').click(function() {
window.location.href=("{{route('index_users')}}");
});

// EDITER USER

let num = 0;

$('body').delegate('.editUser', 'click', function(){
let ids=$(this).data('id');

num++;

if(num==1){
$('#divBtn').append($('<button type="button" class="btn btn-success editerUtilisateur">Modifier</button>'));
}

$('.saveUser').remove();

$.ajax({
url:'{{route('get_id_user')}}',
method:'POST',
data:{
id: ids,
},
success: function(res){

$("#name_matr").val(res.matricule);
$("#name_email").val(res.email);
$("#matr_users").val(res.matricule);
}
});

});

// UPDATE FUNCTION USER

$('body').delegate('.editerUtilisateur', 'click', function(){
let dataUser = {};

let email = $("#name_email").val();
let pwd = $("#name_password").val();
let new_password = 'Mtp-' + parseInt(Math.random() * 10000);

dataUser.email = email;
dataUser.password = new_password;

document.querySelector('.waves-effect').innerHTML = 'Modification <i class="fa fa-spinner fa-spin"></i> ';

$.ajax({
url: '{{'update_users'}}',
method: 'POST',
data: dataUser,
success:function(res){
    console.log(res);
}
});

});

// DELETE USER

$('body').delegate('.supprimer_users','click',function(){
var ids=$(this).data('id');

Swal.fire({

title: 'Etes-vous sûr ?',
text: 'Cette opération est irréversible.',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Oui, je supprime',

}).then((result)=>{
if(result.isConfirmed){
$.ajax({
url : "{{route('destroy_users')}}",
type : 'POST',
async : false,
data : {code:ids},
success:function(data){
Swal.fire(
'Supprimé',
'L\'utilisateur a été bien supprimé.',
'success'
)
if(data.success=='1'){
affiche_users();
}
else{
}
},
error:function(error){
console('Erreur :::: ', error);
}
});
}
});

});

@endsection