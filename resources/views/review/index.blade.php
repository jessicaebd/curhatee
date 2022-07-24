@extends($view == 'User' ? 'layouts.main' : 'layouts.main-psychologist')

@section('title', 'Review')

@section('content')

    {{-- psychologist details --}}
    {{-- div bar paling atas, isinya data si psychologist
    ratingny brp. total transaksi gtu deh. --}}
    <div class="col-md-4">
        <img src="{{ asset('storage/images/psychologists/' . $psychologist->image) }}" style="width: 90%; height: 250px">

        <h5 class="card-title mt-3 fw-bold">{{ $psychologist->name }}</h5>
        <h5 class="card-title">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $psychologist->rating)
                    <i class="bi bi-star-fill text-warning"></i>
                @else
                    <i class="bi bi-star text-warning"></i>
                @endif
            @endfor
            {{ $psychologist->rating }}
            </p>
        </h5>
        <p class="card-text text-justify">{{ $psychologist->description }}</p>
        <p class="card-title fw-bold">@lang('show_consultation.working_at')</p>
        <a href="/hospitals/{{ $psychologist->hospital->id }}" class="card-link text-decoration-underline">
            {{ $psychologist->hospital->name }}
        </a>
        @lang('index_review.Total Transactions') {{ $psychologist->transaction->count() }}
    </div>

    {{-- psychologist some reviews --}}
    <div class="user-header d-flex justify-content-between ">
        @foreach ($reviews as $review)
            <div class="d-flex align-items-center">
                <div class="user-header-avatar">
                    <img src="{{ asset('storage/images/users/' . $review->user->image) }}" alt="user"
                        class="img-fluid rounded rounded-circle me-2" width="30px" height="30px">
                </div>
                <h6 class="user-header-name fw-bolder">{{ $review->user->name }}</h6>
                @lang('index_review.tgl konsultasi') <h5>{{ $review->transaction->time }}</h5>
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $review->rating)
                        <i class="bi bi-star-fill text-warning"></i>
                    @else
                        <i class="bi bi-star text-warning"></i>
                    @endif
                @endfor
                {{-- angka review rating bisa koma, jd dbuat tampil jg slain ikon star --}}
                {{ $review->rating }}
            </div>
            {{ $review->comment }}
            @lang('index_review.tgl review') {{ $review->created_at }}
        @endforeach
    </div>
@endsection
