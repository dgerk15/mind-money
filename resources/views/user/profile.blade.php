@extends('helpers.layout')

@section('title')@parent:: Registration @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <h1>Профиль</h1>
        <form method="post" action="{{ route('user.profileEdit') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{ $user->getImage() }}" class="card-img-top" alt="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Изменить фото</label>
                <input class="form-control" type="file" name="photo" id="photo">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Сохранить</button>

        </form>

    </div>
@endsection
