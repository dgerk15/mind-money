@extends('helpers.layout')

@section('title')@parent:: Добавление категории @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('finance.store') }}">
            @csrf

            <input type="hidden" name="type" value="{{ $type }}">

            {{var_dump( $type)}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Название" id="title" name="title">
                <label for="title">Название</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <label for="category_id">Выберите категорию</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control @error('title') is-invalid @enderror" placeholder="Цена" id="cost" name="cost">
                <label for="cost">Цена</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" placeholder="Комментарий" style="height: 100px" id="description" name="description"></textarea>
                <label for="description">Комментарий</label>
            </div>


            <button type="submit" class="btn btn-outline-primary">Сохранить</button>
        </form>
    </div>
@endsection
