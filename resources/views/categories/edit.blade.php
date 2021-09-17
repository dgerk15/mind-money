@extends('helpers.layout')

@section('title')@parent:: Добавление категории @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $category->title }}">
            </div>


            <button type="submit" class="btn btn-outline-primary">Сохранить</button>
        </form>
    </div>
@endsection
