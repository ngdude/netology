<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <title>Вопросы и ответы</title>
</head>
<body>
<header>
    <h1>Создать вопрос</h1>
</header>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="/">Список вопросов</a></li>
                    <li class="active"><a href="/ask">Задать вопросы</a></li>
                    <li><a href="{{route('login')}}">Авторизоваться</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <th class="align-centert">{{ $error }}</th>
            @endforeach

        </ul>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <th class="align-centert">{{ Session::get('flash_message') }}</th>
    </div>
@endif
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-6">
        <form method="POST" action="{{route('questionStore')}}">
            <div class="form-group input-group" >
                <span class="input-group-addon">Имя: </span>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">Почта: </span>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Выберите тему вопроса</label>
                <select name="topic_id"  class="form-control">
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Введите ваш Вопрос</label>
                <textarea class="form-control" name="question" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit Button</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>	<ul class="cd-faq-categories">
