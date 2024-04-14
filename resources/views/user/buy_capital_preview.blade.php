@extends('user.layout.app')

@section('title', 'Fund Wallet')

@section('css')
    <style>
        .vr {
            width: 2px;
        }

        .text-yellow {
            color: yellow;
        }

        .container {
            padding: 20px 20px;
            background: darkblue;
            border-radius: .5rem;
            margin-bottom: 1rem;
        }

        .card {
            width: 50%;
        }

        .flex-display {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Buy Capital Token Order Details</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="flex-display">
                    <h6>Buying</h6>
                    <h6>SCT12</h6>
                </div>
            </div>
            <div class="container">
                <div class="flex-display">
                    <h6>Please Pay</h6>
                    <h6>NGN 21312</h6>
                </div>
            </div>
            <div class="container">
                <h6>Merchant Username</h6>
                <p>John Doe</p>
                <h6>Merchant WhatsApp</h6>
                <p>+2313123123</p>
                <h6>Merchant Terms</h6>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt magnam placeat, nobis eius eos sunt
                    fuga rerum cumque? Neque maxime nemo culpa corrupti quo sit debitis quod corporis obcaecati consectetur
                    expedita recusandae qui magni reiciendis aperiam eius voluptas impedit voluptatum modi sint quidem,
                    similique fugit voluptates incidunt! Et, libero illo.</p>
                <h6>Order Created</h6>
                <p>1 second ago</p>
                <h6>Order ID</h6>
                <p>44567234ddfbf</p>
                <h6>Order Status</h6>
                <p>Pending</p>
                <h6>Payment Time Limit</h6>
                <p class="mb-0">13 minutes</p>
                <h5>
                    <span class="badge text-bg-success rounded-pill">00:12:12</span>
                </h5>
            </div>
            <div class="container">
                <p>Transfer amount to the merchant account provided below.</p>
                <h6>Merchant Bank Name</h6>
                <p>Guarranty Trust Bank</p>
                <h6>Merchant Account Name</h6>
                <p>John doe</p>
                <h6>Merchant Account Number</h6>
                <p>1234123123124</p>
            </div>
            <div class="container">
                <p>After Transferring the amount, upload screenshot and click on "Transferred, Notify Merchant" Button.</p>
                <form action="{{ route('user.buy_capital.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="proof" id="proof" required class="form-control">
                    </div>
                    <div class="d-md-flex gap-3">
                        <button type="submit" class="btn btn-success">Transferred, Notify Merchant</button>
                    <button type="reset" class="btn btn-danger mt-sm-0 mt-3">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
