@extends('layouts.login')
@section('login')
<!-- [ Preloader ] End -->
<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-1 ">
    <div class="authentication-inner">

        <!-- [ Logo ] Start -->
        <h2 class="mt-4" style="text-align:center">S'authentifier</h2>
        <div style=" text-align:center; ">

            <img src="/img/colombelogo.jpeg" alt="Logo Lacolombe" style="max-width:100%; 
            width: 40%; border-radius:100%; ">
        </div>
        <hr />

        <!-- [ Logo ] End -->

        <!-- [ Form ] Start -->
        <form class="my-3" action="{{route('create_login')}}" method="POST">
            {{ csrf_field() }}
            @if(empty($message))
            @else
            <div class="alert alert-danger" style="color: black">{{$message}}</div>
            @endif
            <div class="form-group">
                <label class="form-label">Renseigner votre adresse email<br /> <br /></label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Saisir votre email">
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label class="form-label d-flex justify-content-between align-items-end">
                    <span>Renseigner votre mot de passe <br /> <br /></span>
                </label>
                <input type="password" class="form-control fadeIn second" id="password" name="password" placeholder="Saisir votre mot de passe">
                <div class="clearfix"></div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <label class="custom-control custom-checkbox ">
                    <input type="checkbox" class="custom-control-input" id="checking">
                    <span class="custom-control-label">Mot de passe oublié</span>
                </label>
                <button type="submit" class="btn btn-success" name="login" id='login' style='margin-bottom: 40px; margin-top:10px'>
                    Se connecter</button>
            </div>
        </form>
        <!-- [ Form ] End -->
    </div>
</div>
<!-- meme une horloge en pangne donne lheure deux fois par jours-->
@endsection