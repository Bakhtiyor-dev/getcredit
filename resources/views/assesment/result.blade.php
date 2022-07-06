@extends('layouts.app')
@section('content')
    <div class="container pt-3 pb-5">

        <div class="col-lg-8 p-4 mb-4 bg-light rounded-3">
            <div class="container-fluid">
                <h1 class="display-6 fw-bold">
                    Результат: <span class="ms-3 text-primary">{{$rating}}</span>
                    <hr>
                    <span class="text-primary">{{$percent}}%</span>
                </h1>
                <div class="d-flex justify-content-between">
                    <h4>
                        @if($percent < 60)
                            <span class="text-danger">Не прошел :(</span>
                        @else
                            <span class="text-success">Прошел :)</span>
                        @endif
                    </h4>

                    <div>
                        <form action="{{route('assesment')}}"
                              method="POST"
                              class="col-lg mx-auto d-flex flex-column flex-lg-row">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{$subjectId}}">
                            <button type="submit" class="btn btn-outline-primary mt-3 mt-lg-0 ms-lg-3">
                                <i class="fa fa-recycle"></i>
                                Пересдать
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 order-lg-2 mt-3">
                <div class="sticky-top">
                    @include('partials.navigator',compact('tests'))
                </div>
            </div>

            <div class="col-lg order-lg-1">
                @foreach($tests as $test)
                @include('partials.question-card',compact('test'))
                @endforeach
                </form>
            </div>

        </div>

    </div>
@endsection