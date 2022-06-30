@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Psychologist</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('edit_psychologist', $psychologist->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') ? old('name') : $psychologist->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') ? old('email') : $psychologist->email }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') ? old('phone') : $psychologist->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="hospital_id">Hospital</label>
                                <select class="form-control" id="hospital_id" name="hospital_id">
                                    <option
                                        value="{{ old('hospital_id') ? old('hospital_id') : $psychologist->hospital_id }}">
                                        {{ $psychologist->hospital->name }}</option>
                                    @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fee">Fee</label>
                                <input type="number" class="form-control" id="fee" name="fee" placeholder="0"
                                    value="{{ old('fee') ? old('fee') : $psychologist->fee }}">
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" placeholder="1"
                                    min="1" max="5"
                                    value="{{ old('rating') ? old('rating') : $psychologist->rating }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') ? old('description') : $psychologist->description }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </div>

    </div>
@endsection
