@if(session('success'))
    <h3 class="alert alert-success">{{ session('success') }}<span class="float-end"><i class="bi bi-x-circle-fill"></i></span></h3>
@elseif(session('error'))
    <h3 class="alert alert-danger">{{ session('error') }}<span class="float-end"><i class="bi bi-x-circle-fill"></i></span></h3>
@endif
