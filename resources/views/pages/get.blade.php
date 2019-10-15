@extends('layout')

@section('content')
    <section class="main-content">

        <div class="container">
            <h1>Получение данных</h1>
            <div class="row">
                <p>Этот скрипт получает 5000 объявлений. Данные получены. Вернуться на страницу с <a href="{{route('index')}}">гистограммой</a></p>
            </div>
        </div>
    </section>
@endsection