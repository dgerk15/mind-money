@extends('helpers.layout')

@section('header')
    @parent
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="container">
            <form action="{{route('finance.index')}}" method="GET">
                <div class="col-5 mb-3">
                    <div class="input-daterange input-group pt-5" id="datepicker">
                        <span class="input-group-text" id="addon-wrapping">с</span>
                        <input type="text" class="input-sm form-control" name="start_at" />
                        <span class="input-group-text">по</span>
                        <input type="text" class="input-sm form-control" name="end_at" />
                    </div>
                </div>
                <button class="btn btn-outline-primary">Выбрать</button>
            </form>
            @if (count($finances))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Комментарий</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($finances as $finance)
                        <tr>
                            <td>{{ $finance->title }}</td>
                            <td>{{ $finance->category->title }}</td>
                            <td>{{ $finance->type }}</td>
                            <td>{{ $finance->cost }}</td>
                            <td>{{ $finance->getRecordDate() }}</td>
                            <td>
                                <span class="area-body">
                                    {{ $finance->description }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('finance.edit', ['finance' => $finance->id]) }}" class="btn btn-outline-primary">&#9998;</a>
                                <form style="display: inline-block" method="post" action="{{ route('finance.destroy', ['finance' => $finance]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы действительно хотите удалить запись?')" class="btn btn-outline-danger">&#10008;</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="mt-3 mb-3">
                    Тут еще ничего нет
                </div>
            @endif

            <a href="{{ route('finance.create') }}" class="btn btn-outline-primary">Добавить</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.ru.min.js"></script>
    <script>
        //Инициализация календаря
        $('.input-daterange').datepicker({
            format: "dd-mm-yyyy",
            language: "ru",
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection
