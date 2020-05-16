@extends('base')

@section('title', 'Homepage')

@section('content')

    <a href="/">Home</a>

    <br />
    <br />

    {{ $question->text }}

    <br />

    <ul>
        @foreach($answers as $answer)
            <li> {{ $answer->text }} </li>
        @endforeach
    </ul>

    <br />
    <br />

    Answer the question:

    <form action="/answer" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="text" name="text" placeholder="Enter you answer">
        <button type="submit">Submit</button>
    </form>

@endsection
