@extends('user.layout.app')

@section('title', 'Verify Account')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h3 class="card-title pb-3">ACCOUNT ID VERIFICATION</h3>
                <p><strong>In order to ensure we comply with best Financial practicies against Money Laundering with the Financial Conduct Authority in South Africa, you are required to verify your account with us (KYC). </strong></p>
<p><strong>Account ID Verification allows you to manage your account, Withdraw in NAIRA or RAND to your Local Bank account, Transfer US Dollars and Pounds, Sell Currencies on the Black market.</strong></p>
<p><span style="background-color: #ffff99; color: #ff0000;">Account Verification takes less than few minutes.</span></p><br>
<h4 class="card-title pb-3">Begin your ACCOUNT ID VERIFICATION</h4>
            </div>
        </div>
                        

        <div class="card-body">
            <form action="{{ route('user.do_verify_account') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthdate" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required
                                onfocus="this.showPicker()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthdate" class="form-label">Document Type</label>
                            <select name="document_type_id" class="form-select" required>
                                <option value="">Select Document Type</option>
                                @foreach ($documentTypes as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="document_pic">Upload Document</label>
                            <input type="file" class="form-control" id="document_pic" name="document_pic" required
                                accept="image/*,.pdf">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="selfie">Upload Picture of you or Selfie to confirm
                                Document</label>
                            <input type="file" class="form-control" id="selfie" name="selfie" required
                                accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="pt-2 text-center text-md-start">
                    <button class="btn btn-primary" type="submit">
                        Submit for Account Verification
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
