@if(session('success'))
    <h3 class="container alert alert-success">{{ session('success') }}<span class="float-end"><i class="bi bi-x-circle-fill"></i></span></h3>
@elseif(session('error'))
    <h3 class="container alert alert-danger">{{ session('error') }}<span class="float-end"><i class="bi bi-x-circle-fill"></i></span></h3>
@endif
