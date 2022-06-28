@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{Doctor name}</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/random/720x480/?doctor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center">Dr. Bujang Marijuana</h5>
                        <h5 class="card-title text-center">Rating 5</h5>
                        <h5 class="card-title text-center">Rp. 50.000</h5>
                    </div>
                </div>
            </div>
        </div>
    @endsection
