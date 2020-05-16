@extends('base')

@section('title', 'Questions')

@section('content')

    <form action="/questions" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <textarea class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" name="text" placeholder="{{ $sampleQuestion }}">{{ old('text') }}</textarea>
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
            <button type="submit" class="btn btn-primary mb-2">Ask Away</button>
        </div>
    </form>

    <hr/>

    <h2 class="text-center mb-4">Questions</h2>
    <div class="container">
        @forelse($questions as $question)
            <div class="row">
                <div class="col mb-2">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between">
                            <a class="pr-4 text-dark" href="/questions/{{ $question->id }}">{{ $question->text }}</a>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="badge badge-primary self-align-center">{{ $question->answers_count }} answers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col mb-2">
                    <div class="card">
                        <div class="card-body">
                            No questions yet! Be the first to ask a question by using the form above.
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

@endsection
