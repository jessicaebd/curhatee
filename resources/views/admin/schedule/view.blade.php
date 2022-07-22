@extends('layouts.main-admin')

@section('content')
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-11 col-xl-11">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="fw-bolder">Schedule for {{ $psychologist->name }}</h3>

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

                        <div class="row">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Hour</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                        <th>Sunday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules_time as $time)
                                        <tr>
                                            <th>{{ \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $time)->addHours(1)->format('H:i') }}</th>
                                            @foreach ($days as $day)
                                                @foreach($schedules as $schedule)
                                                    <td>
                                                        test
                                                    </td>
                                                @endforeach
                                            @endforeach
                                            <td>
                                            {{-- @foreach ($schedules as $schedule)
                                                @for ($i = 0; $i < count($schedule_days); $i++)
                                                    @for ($j = 0; $j < count($schedule_time); $j++)

                                                    @endfor
                                                @endfor
                                                @if ($schedule->day == 'Monday' && \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s') == $schedule_time[$i])
                                                    @if ($schedule->isActive == true)
                                                        <div class="bg-success">
                                                            <span class="text-black">Active</span>
                                                            <form action="{{ route('update_schedule', $schedule->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="bi bi-x-circle"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div class="bg-danger">
                                                            <span class="text-white">Inactive</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach --}}
                                            test
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>09.00-10.00</th>
                                        <td>
                                        {{-- @foreach ($schedules as $schedule)
                                            @for ($i = 0; $i < count($schedule_days); $i++)
                                                @for ($j = 0; $j < count($schedule_time); $j++)

                                                @endfor
                                            @endfor
                                            @if ($schedule->day == 'Monday' && \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $schedule->startTime)->format('H:i:s') == $schedule_time[])
                                                @if ($schedule->isActive == true)
                                                    <div class="bg-success">
                                                        <span class="text-black">Active</span>
                                                        <form action="{{ route('update_schedule', $schedule->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="bi bi-x-circle"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="bg-danger">
                                                        <span class="text-white">Inactive</span>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>10.00-11.00</th>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011-07-25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <th>11.00-12.00</th>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009-01-12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <th>12.00-13.00</th>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012-03-29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <th>13.00-14.00</th>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008-11-28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <th>14.00-15.00</th>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012-12-02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <th>15.00-16.00</th>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>2012-08-06</td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <th>16.00-17.00</th>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>2010-10-14</td>
                                        <td>$327,900</td>
                                    </tr>
                                    <tr>
                                        <th>17.00-18.00</th>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>2009-09-15</td>
                                        <td>$205,500</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>


                        <div class="d-flex justify-content-center mt-5 pt-2">
                            <input class="btn btn-primary btn-lg px-5" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
