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
            <div class="form-group">
                <label for="chart_type">chart_type</label>
                <select class="form-control" name="chart_type" id="chart_type">
                    <option value="pie" @if ($settings->chart_type == 'pie') selected="selected" @endif>pie</option>
                    <option value="column" @if ($settings->chart_type == 'column') selected="selected" @endif>column</option>
                </select>
            </div>

            <div class="form-group">
                <label for="use_rounding">use_rounding</label>
                <input type="checkbox"
                       class="form-control"
                       id="use_rounding"
                       name="use_rounding"
                       @if ($settings->use_rounding) checked @endif
                       value="1">

            </div>

            <div class="form-group">
                <label for="use_system_category">use_system_category</label>
                <input type="checkbox"
                       class="form-control"
                       id="use_system_category"
                       name="use_system_category"
                       @if ($settings->use_system_category) checked @endif
                       value="1">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>

    </div>
@endsection
