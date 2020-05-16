@extends('base')

@section('title', 'Homepage')

@section('content')

    Ask a question:

    <form action="/question" method="post">
        {{ csrf_field() }}
        <input type="text" name="text" placeholder="Enter you question">
        <button type="submit">Submit</button>
    </form>

    <br />
    <br />

    Questions

    <br />

    <ul>
        @foreach($questions as $question)
            <li>
                <a href="/question/{{ $question->id }}">{{ $question->text }}</a>  <span>{{ $question->answers_count }}</span>
            </li>
        @endforeach
    </ul>

@endsection
