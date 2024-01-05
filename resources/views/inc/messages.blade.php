@if (session('success'))
    <div class="success" data-message="{{ session('success') }}"></div>
@endif
@if (session('error'))
    <div class="error" data-message="{{ session('error') }}"></div>
@endif