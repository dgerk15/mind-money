@extends('helpers.layout')

@section('title')@parent:: Добавление категории @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('categories.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            </div>


            <button type="submit" class="btn btn-outline-primary">Сохранить</button>
        </form>
    </div>
@endsection

{{--<script>--}}
{{--    var x = 0;--}}

{{--    function addInput() {--}}
{{--        if (x < 10) {--}}

{{--            let str = document.querySelector('.first_input');--}}
{{--            document.querySelector('.new').innerHTML = str;--}}
{{--            // x++;--}}
{{--        } else--}}
{{--        {--}}
{{--            alert('STOP it!');--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
