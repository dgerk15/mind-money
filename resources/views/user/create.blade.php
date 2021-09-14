@extends('helpers.layout')

@section('title')@parent:: Registration @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">

        <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation">Подтвердить пароль</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Фото</label>
                <input class="form-control" type="file" name="photo" id="photo">
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

        </form>

    </div>
@endsection
