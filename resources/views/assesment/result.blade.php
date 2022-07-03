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