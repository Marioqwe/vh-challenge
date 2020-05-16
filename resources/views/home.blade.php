@extends('base')

@section('title', 'Questions')

@section('content')

    Ask a question:

    <form action="/questions" method="post">
        {{ csrf_field() }}
        <input type="text" name="text" value="{{ old('text') }}" placeholder="{{ $sampleQuestion }}">
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

    <br />
    <br />

    Questions

    <br />

    <ul>
        @foreach($questions as $question)
            <li>
                <a href="/questions/{{ $question->id }}">{{ $question->text }}</a>  <span>{{ $question->answers_count }}</span>
            </li>
        @endforeach
    </ul>

@endsection
