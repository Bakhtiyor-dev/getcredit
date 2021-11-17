@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="p-3 bg-light">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <span class="fs-4">GetCredit API</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
             
              <li class="nav-item">
                <a href="?doc=getting-tests" class="nav-link" aria-current="page">
                    Getting tests
                </a>
              </li>

              <li class="nav-item">
                <a href="?doc=storing-tests" class="nav-link" aria-current="page">
                    Storing tests
                </a>
              </li>
            
              <li class="nav-item">
                <a href="?doc=updating-tests" class="nav-link" aria-current="page">
                    Updating tests
                </a>
              </li>
            
            </ul>
            <hr>
          </div>
        
    </div>

    <div class="col-lg-8">
        @include('docs.'.request()->doc)
    </div>
</div>
  


@endsection