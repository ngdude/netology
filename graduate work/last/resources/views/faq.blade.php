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
                <li class="active"><a href="/">Список вопросов</a></li>
                <li><a href="/ask">Задать вопросы</a></li>
                <li><a href="{{route('login')}}">Авторизоваться</a></li>
            </ul>
        </div>
    </nav>
</div>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <div class="col-lg-5 centered"></div>
        <div class="col-lg-4 centered">
            {{ Session::get('flash_message') }}
        </div>
    </div>
@endif
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-6">
            <section class="cd-faq">
                <ul class="cd-faq-categories">
                    @foreach($topics as $topic)
                        <li><a href="#{{$topic->topic_name}}">{{$topic->topic_name}}</a></li>
                    @endforeach
                </ul> <!-- cd-faq-categories -->
                @foreach($topics as $topic)
                    <div class="cd-faq-items">
                        <ul id="{{$topic->topic_name}}" class="cd-faq-group">
                            <li class="cd-faq-title"><h4>{{$topic->topic_name}}</h4></li>
                            @foreach($questions as $question)
                                @if($question->topic_id == $topic->id)
                                    @if($question->status == 1)
                                        <li>
                                            <a class="cd-faq-trigger" href="#0">{{ $question->question }}</a>
                                            <div class="cd-faq-content">
                                                <p>{{ $question->answer }}</p>
                                            </div> <!-- cd-faq-content -->
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul> <!-- cd-faq-group -->
                    </div> <!-- cd-faq-items -->
                    <a href="#0" class="cd-close-panel">Close</a>
                @endforeach
            </section>
    </div>
</div>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>	<ul class="cd-faq-categories">
