@extends('helpers.layout')

@section('title')@parent:: Registration @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        @if (count($categories))
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">URL имя</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->alias}}</td>
                        <td>
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-outline-primary">&#9998;</a>
                            <form style="display: inline-block" method="post" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Вы действительно хотите удалить категорию?')" class="btn btn-outline-danger">&#10008;</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            Категорий еще нет
        @endif

        <div class="mb-3 mt-3">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">создать категорию</a>
        </div>
    </div>
@endsection
