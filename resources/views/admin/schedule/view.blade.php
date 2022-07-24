@extends($view == 'Psychologist' ? 'layouts.main-psychologist' : 'layouts.main-admin')

@section('content')
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="fw-bolder">@lang('view_admin_schedule.Schedule for') {{ $psychologist->name }}</h3>

                        <hr class="mb-4 pb-2 pb-md-0 mb-md-5" style="color: #2934d0;">

                        @if ($errors->any())
                            <div class="alert
                            alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row table-responsive">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>@lang('view_admin_schedule.Hour')</th>
                                        <th>@lang('view_admin_schedule.Monday')</th>
                                        <th>@lang('view_admin_schedule.Tuesday')</th>
                                        <th>@lang('view_admin_schedule.Wednesday')</th>
                                        <th>@lang('view_admin_schedule.Thursday')</th>
                                        <th>@lang('view_admin_schedule.Friday')</th>
                                        <th>@lang('view_admin_schedule.Saturday')</th>
                                        <th>@lang('view_admin_schedule.Sunday')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules_time as $time)
                                        <tr>
                                            <th>{{ \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i') }} -
                                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $time)->addHours(1)->format('H:i') }}
                                            </th>
                                            @foreach ($days as $day)
                                                <td>
                                                    @foreach ($schedules as $schedule)
                                                        @if ($schedule->day == $day &&
                                                            \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s') == $time)
                                                            @if ($schedule->isActive == true)
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="text-white bg-success text-center mx-2 border"
                                                                        style="min-width:75px; border-radius: 8px;">
                                                                        <span class="align-middle">@lang('view_admin_schedule.Active')</span>
                                                                    </div>
                                                                    <form
                                                                        action="{{ Auth::guard('webpsychologist')->user() != null ? route('update_schedule_psychologist', $schedule->id) : route('update_schedule_admin', $schedule->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger">
                                                                            <i class="bi bi-x-circle"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @continue
                                                            @else
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="text-white bg-danger text-center mx-2 border"
                                                                        style="min-width:75px; border-radius: 8px;">
                                                                        <span class="align-middle">@lang('view_admin_schedule.Inactive')</span>
                                                                    </div>
                                                                    <form
                                                                        action="{{ Auth::guard('webpsychologist')->user() != null ? route('update_schedule_psychologist', $schedule->id) : route('update_schedule_admin', $schedule->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-success">
                                                                            <i class="bi bi-check-circle"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
