@extends('welcome')
@section('content')
    <form action="{{route('question', $data['quiz'])}}" class="form" method="post">
        <h1>{{$data['answer']->question->year}}</h1>
        <fieldset id="responder">
            <legend>{{$data['answer']->question->title}}</legend>
            <div class="form-group">
                <label class="btn btn-success btn-block btn-large btn-option">
                    <input type="radio" name="answer" value="a"> {{$data['answer']->question->alt_a}}
                </label>
            </div>
            <div class="form-group">
                <label class="btn btn-success btn-block btn-large btn-option">
                    <input type="radio" name="answer" value="b"> {{$data['answer']->question->alt_b}}
                </label>
            </div>
            <div class="form-group">
                <label class="btn btn-success btn-block btn-large btn-option">
                    <input type="radio" name="answer" value="c"> {{$data['answer']->question->alt_c}}
                </label>
            </div>
            <div class="form-group">
                <label class="btn btn-success btn-block btn-large btn-option">
                    <input type="radio" name="answer" value="d"> {{$data['answer']->question->alt_d}}
                </label>
            </div>
            <input id="correta" type="hidden" value="{{$data['answer']->question->correct_answer}}">
        </fieldset>
        {{ csrf_field() }}
        {{$data['quiz']->goals}}
    </form>
    <h2>{{$data['quiz']->answers()->count()}}/{{\App\Quiz::MAX_QUESTIONS}}</h2>
@endsection

@push('scripts')
    <script>
        $(".btn-option").click(function (event) {
            $("#responder").children().attr("disabled", "disabled");

            var correta = $("#correta").val()
            console.log(correta, $(this).val())

            $('.btn-option').each(function (i, obj) {
                if ($(event.target).val() != correta && $(obj).val() == $(event.target).val()) {
                    $(event.target).addClass('btn-danger')
                }
            })
            $('[value="' + correta + '"]').parent('label').addClass('btn-info');

            setTimeout(function () {
                $('form').submit()
            }, 2000)
        })
    </script>
@endpush