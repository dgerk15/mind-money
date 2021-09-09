@extends('helpers.layout')

@section('title')@parent:: Registration @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('settings.update', ['setting' => $settings->id]) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="use_rounding" value="0">
            <input type="hidden" name="use_system_category" value="0">

            <div class="mb-3">
                <label for="chart_type" class="form-label">Тип графика</label>
                <select class="form-select" name="chart_type" id="chart_type">
                    @foreach($chart_types as $chart_type)
                        <option value="{{ $chart_type }}" @if ($settings->chart_type == $chart_type) selected="selected" @endif>{{ $chart_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="currency" class="form-label">Валюта</label>
                <input type="text" class="form-control" id="currency" name="currency"value="{{ $settings->currency }}">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox"
                       class="form-check-input"
                       id="use_system_category"
                       name="use_system_category"
                       @if ($settings->use_system_category) checked @endif
                       value="1">
                <label for="use_system_category" class="form-check-label">Использовать системные категории</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox"
                       class="form-check-input"
                       id="use_rounding"
                       name="use_rounding"
                       @if ($settings->use_rounding) checked @endif
                       value="1">
                <label class="form-check-label" for="use_rounding">Использовать "Инвесткопилку"</label>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

    </div>
@endsection
