@if(session('message'))
    <div class="alert alert-success mb-2" id="autoCloseAlert">{{ session('message') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger" id="autoCloseAlert">{{ session('error') }}</div>
@endif

<script>
    window.setTimeout(function() {
        $("#autoCloseAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000);
</script>