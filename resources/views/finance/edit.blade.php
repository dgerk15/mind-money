@extends('helpers.layout')

@section('title')@parent:: Добавление категории @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('finance.update', $finance->id) }}">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $finance->title }}" id="title" name="title">
                <label for="title">Название</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="category_id" name="category_id" aria-label="Floating label select example">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($finance->category->id == $category->id) selected="selected" @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                <label for="category_id">Выберите категорию</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="type" name="type" aria-label="Floating label select example">
                    <option value="expense">Расход</option>
                    <option value="income">Доход</option>
                </select>
                <label for="type">Расход или доход</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control @error('title') is-invalid @enderror" value="{{ $finance->cost }}" id="cost" name="cost">
                <label for="cost">Цена</label>
            </div>

            <div class="mb-3 form-floating">
                <textarea class="form-control" style="height: 100px" id="description" name="description">{{ $finance->description }}</textarea>
                <label for="description">Комментарий</label>
            </div>

            <button type="submit" class="btn btn-outline-primary">Сохранить</button>
        </form>
    </div>
@endsection
