@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="/consultation/psychologists">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?menu" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Consultation</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?menu" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Forum</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?menu" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Diary</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?menu" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Podcast</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
