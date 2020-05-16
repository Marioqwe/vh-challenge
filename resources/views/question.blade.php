@extends('base')

@section('title', 'Question '.$question->id)

@section('content')

    <a href="/">Questions</a>

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

    <form action="/question/{{ $question->id }}/answer" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="text" name="text" value="{{ old('text') }}" placeholder="Enter you answer">
        <button type="submit">Submit</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
