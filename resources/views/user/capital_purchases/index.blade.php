@extends('user.layout.app')

@section('title', 'SCT Purchase Requests')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h4 class="card-title">SCT Purchase Requests</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">Order #</th>
                            <th scope="col">Proof</th>
                            <th scope="col">User</th>
                            <th scope="col">SCT Amount</th>
                            <th scope="col">NGN Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase">#{{ $item->order_id }}</td>
                                <td>
                                    <img src="{{ url('/') . '/' . $item->getTransactionPath() . $item->image }}"
                                        alt="" style="height: 50px;">
                                </td>
                                <td>{{ $item->user->name }}</td>
                                <td class="text-uppercase">SCT {{ $item->sct_amount }}</td>
                                <td class="text-uppercase">NGN {{ $item->ngn_amount }}</td>
                                <td>
                                    {{ ucfirst($item->status) }}
                                    {{-- @php
                                        $created_at_time = new Carbon\Carbon($item->created_at);
                                        $time_diff = $created_at_time->diffInHours(Carbon\Carbon::now());
                                    @endphp
                                    @if (!$item->is_reversed)
                                        @if ($time_diff < 1)
                                            <a href="{{ route('user.reverse_transfer_balance', $item->id) }}"
                                                class="btn btn-primary" type="submit">
                                                Reverse Transfer
                                            </a>
                                        @else
                                            COMPLETED
                                        @endif
                                    @else
                                        REVERSED
                                    @endif --}}
                                </td>
                                <td>{{ $item->created_at->format('M d, Y H:i A') }}</td>
                                <td>
                                    <div>
                                        @if ($item->status == 'pending')
                                            <a href="{{ route('user.sct_requests.accept', $item->id) }}" type="button"
                                                class="btn btn-success">
                                                Accept
                                            </a>
                                            <a href="{{ route('user.sct_requests.reject', $item->id) }}" type="button"
                                                class="btn btn-danger ms-2">
                                                Reject
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No Data Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
