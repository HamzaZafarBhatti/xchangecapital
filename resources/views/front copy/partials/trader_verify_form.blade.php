<form action="{{ route('front.do_verify_trader') }}" method="post">
    @csrf
    <h5>Enter the ACCOUNT ID of the CURRENCY AGENT to verify them if they are LEGITIMATE to trade US Dollars and
        British Pounds with.</h5>
    <div class="form-group">
        <label>Enter CURRENCY AGENT ACCOUNT ID</label>
        <input type="text" name="account_id" class="form-control">
    </div>
    <button class="btn btn-primary mt-2" type="submit">Verify CURRENCY AGENT!</button>
    </div>
</form>
