@extends('base')

@section('title', 'Question '.$question->id)

@section('content')

    <a href="/">Show me all questions</a>
    <hr />

    <h2 class="text-center mb-4">{{ $question->text }}</h2>

    <br />

    <div class="container mb-5">
        @forelse($answers as $answer)
            <div class="row">
                <div class="col mb-2">
                    <div class="card">
                        <div class="card-body">
                            {{ $answer->text }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col mb-2">
                    <div class="card">
                        <div class="card-body">
                            No answers yet! Be the first to answer by using the form below.
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <hr />

    <h2 class="text-center mb-4">Answer the Question</h2>

    <form action="/questions/{{ $question->id }}/answer" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <div class="form-group">
            <textarea class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" name="text" placeholder="Enter your answer">{{ old('text') }}</textarea>
            <div class="invalid-feedback">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        @if ($loop->first)
                            {{ $error }}
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary mb-2">Submit answer</button>
        </div>
    </form>

@endsection
