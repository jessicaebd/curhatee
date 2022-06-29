@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <a href="/consultation/psychologists">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/consultation.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Consultation</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/forum.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Forum</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/diary.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Diary</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/consultation">
                    <div class="card home-menu" style="width: 14rem;">
                        <img src="{{ asset('images/menu/podcast.png') }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Podcast</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
