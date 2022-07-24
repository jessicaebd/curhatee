<div class="col-md-6">
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="card-title border-bottom">
                <h5 class="m-font fw-bold mb-0">@lang('consultation.Transaction')
                    #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                </h5>
                <small
                    class="text-muted xs-font">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d F Y, H:i') }}</small>
            </div>

            <div class="transaction d-flex mb-2">
                <img class="rounded rounded-pill"
                    src="{{ asset('storage/images/psychologists/' . $transaction->schedule->psychologist->image) }}"
                    alt="" style="width: 50px;height: 50px;">
                <div class="fw-bolder ms-3">
                    <small class="card-text">{{ $transaction->schedule->psychologist->name }}</small>
                    <br>
                    <small
                        class="card-text s-font">{{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}</small>
                </div>
            </div>

            <div class="transaction-status d-flex mb-2">
                <div class="">
                    <h6 class="fw-bolder mb-0">
                        @if ($transaction->status == 'Pending')
                            <span class="badge bg-warning">@lang('consultation.Pending')</span>
                        @elseif ($transaction->status == 'Confirmed')
                            <span class="badge bg-success">@lang('consultation.Confirmed')</span>
                        @elseif ($transaction->status == 'Finished')
                            <span class="badge bg-secondary">@lang('consultation.Finished')</span>
                        @elseif ($transaction->status == 'Rejected')
                            <span class="badge bg-danger">@lang('consultation.Rejected')</span>
                        @endif
                    </h6>
                </div>
                <div class="ms-2">
                    <h6>
                        <span
                            class="{{ $transaction->consultation_type_id == $online_consultation_id ? 'badge bg-green' : 'badge bg-blue' }}">{{ $transaction->consultationType->name }}
                        </span>
                    </h6>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                @if ($transaction->status == 'Confirmed')
                    @if ($transaction->consultationType->name == 'Online Consultation')
                        <a class="btn btn-blue s-font fw-bolder py-1 px-3"
                            href="{{ route('chat_page_user', $transaction->id) }}">
                            @lang('consultation.Chat')
                        </a>
                    @endif
                @elseif ($transaction->status == 'Finished')
                    @if ($transaction->review == null)
                        <a class="btn btn-secondary s-font fw-bolder py-1 px-3" type="button" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#reviewModal">
                            @lang('consultation.Review_tr')
                        </a>

                        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="reviewModalLabel">@lang('consultation.Rate your experience') </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="input-container mt-3">
                                            <form action="{{ route('store_review', $transaction->id) }}" method="post">
                                                @csrf
                                                <div class="d-flex justify-content-center">
                                                    <div class="rating mb-5">
                                                        <label>
                                                            <input type="radio" name="stars" value="1" />
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="2" />
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="3" />
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="4" />
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="stars" value="5" />
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                            <span class="icon"><i class="bi bi-star-fill"></i></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="input-group">
                                                        <input
                                                            class="form-control @error('comment') is-invalid @enderror"
                                                            type="text" name="comment" id="comment"
                                                            placeholder="Type a comment..." style="height: 100px;">

                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="send-comment">@lang('index_chat.send_review')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @if ($transaction->consultationType->name == 'Online Consultation')
                            <a class="btn btn-secondary s-font fw-bolder py-1 px-3"
                                href="{{ route('chat_page_user', $transaction->id) }}">
                                @lang('consultation.See Chat History')
                            </a>
                        @endif
                    @endif
                @endif

                <div class="ms-2">
                    @if ($transaction->status == 'Pending' || $transaction->status == 'Confirmed')
                        <a class="btn btn-outline-blue s-font fw-bolder py-1 px-3" type="button"
                            class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#transactionDetailModal-{{ $transaction->id }}">
                            @lang('my_index.see_detail')
                        </a>

                        <div class="modal fade" id="transactionDetailModal-{{ $transaction->id }}" tabindex="-1"
                            aria-labelledby="transactionDetailModal-{{ $transaction->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bolder"
                                            id="transactionDetailModal-{{ $transaction->id }}Label">
                                            @lang('consultation.Transaction History Detail')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="detail mb-3">
                                            <table class="s-font">
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                                    <td>: #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.psychologist')</td>
                                                    <td>: {{ $transaction->schedule->psychologist->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.date')</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                                    <td>: {{ $transaction->consultationType->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.status')</td>
                                                    <td>: {{ $transaction->status }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.fee')</td>
                                                    <td>: Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.paid_with')</td>
                                                    <td>: {{ $transaction->paymentType->type_name }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @if ($transaction->status == 'Confirmed' && $transaction->consultationType->name == 'Offline Consultation')
                                            <div class="d-flex flex-column fw-bolder align-items-center mt-3">
                                                <p class="text-muted mb-2 s-font">@lang('consultation.Show the QR Code below to the receptionist')</p>
                                                {{ QrCode::size(100)->generate($transaction->id) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <a class="btn btn-outline-blue s-font fw-bolder py-1 px-3" type="button"
                            class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#transactionHistoryModal-{{ $transaction->id }}">
                            @lang('consultation.See History')
                        </a>

                        <div class="modal fade" id="transactionHistoryModal-{{ $transaction->id }}" tabindex="-1"
                            aria-labelledby="transactionHistoryModal-{{ $transaction->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bolder"
                                            id="transactionHistoryModal-{{ $transaction->id }}Label">
                                            @lang('consultation.Transaction History Detail')</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="detail mb-3">
                                            <table class="s-font">
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                                    <td>: #{{ Str::limit(Str::substr($transaction->id, -5), 5, '') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.psychologist')</td>
                                                    <td>: {{ $transaction->schedule->psychologist->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.date')</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($transaction->time)->format('l, d F Y @ H:i') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.transaction_id')</td>
                                                    <td>: {{ $transaction->consultationType->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.status')</td>
                                                    <td>: {{ $transaction->status }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.fee')</td>
                                                    <td>: Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="fw-bolder">@lang('my_show.paid_with')</td>
                                                    <td>: {{ $transaction->paymentType->type_name }}</td>
                                                </tr>
                                            </table>

                                        </div>

                                        <div class="note s-font card px-3 py-2 mb-3">
                                            <span class="text-muted s-font"><span
                                                    class="fw-bolder">@lang('consultation.Note')</span>
                                                @if ($transaction->note != null)
                                                    {{ $transaction->note }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </div>

                                        @if ($transaction->review != null)
                                            <h5 class="fw-bolder s-font">@lang('consultation.Review')</h5>
                                            <div class="my-review s-font card px-3 py-2">
                                                <div class="pe-2">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $transaction->review->rating)
                                                            <i class="bi bi-star-fill text-warning"></i>
                                                        @else
                                                            <i class="bi bi-star text-warning"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p class="text-muted">{{ $transaction->review->comment }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
