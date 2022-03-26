@extends('layouts.login')
@section('login')
<div class="page-loader">
    <div class="bg-primary"></div>
</div>
<!-- [ Preloader ] End -->
<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-1 ">
    <div class="authentication-inner">

        <!-- [ Logo ] Start -->
        <h5 style="text-align:center">Connectez-vous</h5> <br /><br />
        <div style=" text-align:center; margin-top:-10px">
            <img src="/img/colombelogo.jpeg" alt="Logo Lacolombe" style="max-width:100%; 
            width: 40%; border-radius:100%; ">

        </div>


        <!-- [ Logo ] End -->

        <!-- [ Form ] Start -->
        <form class="my-5" action="{{route('create_login')}}" method="POST">
            {{ csrf_field() }}
            @if(empty($message))
            @else
            <p style="font-size :10px; color:red"> {{$message}}</p>
            @endif
            <div class="form-group" style="margin-top: -25px">
                <label class="form-label">Email<br /> <br /></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Saisir votre email">
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="form-label d-flex justify-content-between align-items-end">
                    <span>Mot de passe <br /> <br /></span>
                </label>
                <input type="password" class="form-control fadeIn second" id="password" name="password" placeholder="Saisir votre mot de passe">
                <div class="clearfix"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <label class="custom-control custom-checkbox ">
                </label>
                <button type="submit" class="btn btn-success" name="login" id='login' style='margin-bottom: 40px; margin-top:10px'>Se connecter</button>
            </div>
        </form>
        <!-- [ Form ] End -->
    </div>
</div>
<!-- meme une horloge en pangne donne lheure deux fois par jours-->
@endsection