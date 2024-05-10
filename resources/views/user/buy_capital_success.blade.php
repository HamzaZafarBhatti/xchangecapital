@extends('user.layout.app')
@section('title', 'ORDER SUCCESSFULLY SUBMITTED')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mb-5 pt-5">
                                <h3 class="error-title mt-5"><span>ORDER SUCCESSFULLY SUBMITTED TO MERCHANT</span></h3>
                                <h4 class="text-uppercase mt-5">Name: {{ $vendor->name }} - Phone Number: {{ $vendor->phone }}</h4>
                                <h4 class="mt-5">Please contact MERCHANT and SUBMIT your Funding ORDER ID: {{ $transaction->order_id }}</h4>
                                <div class="mt-5 text-center">
                                    {{-- <a class="btn btn-primary waves-effect waves-light"
                                        href="{{ back() }}">Back to Market Page</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
