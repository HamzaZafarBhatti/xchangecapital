<div class="verified">
    <h5 class="text-success">
        <strong>
            {{ $trader->name ?? 'N/A' }} is an APPROVED & LEGITIMATE VERIFIED CURRENCY AGENT<img src="https://arbyvest.com/asset/front/img/uploads/check0marke3-removebg-preview.png" width="44" height="44" />
        </strong>
    </h5>
    <p><span style="color: #ffffff;"><strong>You may proceed to trade US Dollars &amp; British Pounds with {{ $trader->name ?? 'N/A' }} - CURRENCY AGENT based on the available balance as displayed below.</strong></span></p>
    <ul>
        <li><strong>Full Names:</strong> {{ $trader->name ?? 'N/A' }}<img src="https://arbyvest.com/asset/front/img/uploads/istockphoto-1396933001-170667a-removebg-preview.png" width="24" height="24" /></li>
        <li><strong>WhatsApp Number:</strong> {{ $trader->phone ?? 'N/A' }}</li>
        <li><strong>Phone Number:</strong> {{ $trader->phone ?? 'N/A' }}</li>
        <li><strong>Available USD Balance:</strong> {{ $trader->get_usd_wallet ?? 'N/A' }}</li>
        <li><strong>Available GBP Balance:</strong> {{ $trader->get_gbp_wallet ?? 'N/A' }}</li>
    </ul>
    <a href="{{ route('user.trader.verify') }}" type="button" class="btn btn-primary">Try Another</a>
</div>
