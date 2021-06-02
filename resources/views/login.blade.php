@extends('layout.layout')
@section('content')
    <section class="form">
        @if($errors->any())
            <div class="alert-denger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('user.login')}}" method="post">
            @csrf
            <input type="email" name="email" class="register__input" placeholder="Login">
            <input type="text" name="password" class="register__input" placeholder="Password">
            <button type="submit">Sig-in</button>
        </form>
    </section>
@endsection