<form action="{{ route('user.trader.do_verify') }}" method="post" class="traderVerificationForm">
    @csrf
    <h5 class="text-primary">Enter the ACCOUNT ID of the CURRENCY AGENT to verify them if they are LEGITIMATE to trade US Dollars and British Pounds with.</h5>
    <div class="form-group mt-3">
        <label class="form-label">
            <h6 class="text-primary">Enter CURRENCY AGENT ACCOUNT ID</h6>
        </label>
        <input type="text" class="form-control" name="account_id" />
    </div>
    <div class="pt-2 text-center text-md-start">
        <button class="btn btn-primary" type="submit">
            Verify CURRENCY AGENT
        </button>
    </div>
</form>
