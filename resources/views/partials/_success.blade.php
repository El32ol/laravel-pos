 @if(session()->has('success'))
<div class="alert alert-primary" role="alert">
   
            {{ session()->get('success') }}
    @endif
</div>