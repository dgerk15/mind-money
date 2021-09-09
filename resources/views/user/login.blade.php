@extends('helpers.layout')

@section('title')@parent:: Login @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">

        <form method="post" action="{{ route('user.login') }}">

            @csrf

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Войти</button>

        </form>

    </div>
@endsection

