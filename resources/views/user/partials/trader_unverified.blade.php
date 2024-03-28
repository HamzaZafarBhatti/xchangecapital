<div class="unverified">
    <h5 class="text-danger">
        <strong>
            {{ $trader->name ?? 'N/A' }} is not an APPROVED CURRENCY AGENT!<img src="https://arbyvest.com/asset/front/img/uploads/bad-mark6628-removebg-preview.png" width="46" height="46" /> <br><br>Do not trade US Dollars or British Pound with {{ $trader->name ?? 'N/A' }}.
        </strong>
    </h5>
    <a href="{{ route('user.trader.verify') }}" type="button" class="btn btn-primary mt-2">Try Another</a>
</div>
