@extends('layouts.main')

@section('title', 'Consultation')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Choose your Psychologist</h2>
        <div class="row">
            <div class="col-md-3">
                <a href="/consultation/psychologists/" class="text-decoration-none text-dark">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?doctor" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Dr. Bujang Marijuana</h5>
                            <h5 class="card-title text-center">Rating 5</h5>
                            <h5 class="card-title text-center">Rp. 50.000</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="" class="text-decoration-none text-dark">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/random/720x480/?doctor" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Dr. Bujang Marijuana</h5>
                            <h5 class="card-title text-center">Rating 5</h5>
                            <h5 class="card-title text-center">Rp. 50.000</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection
