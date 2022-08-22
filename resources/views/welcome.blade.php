@extends('layouts.app')
@section('content')

<h2>Добро пожаловать на страницу сервиса данных автомобилей</h2>
<br>
<h4><a href={{ route('parser.data', ['title'=>'automobiles']) }}>Сохранить данные/a><h4>
@endsection