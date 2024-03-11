@if(session('message'))
    <div class="alert alert-success mb-2">{{ session('message') }},</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif