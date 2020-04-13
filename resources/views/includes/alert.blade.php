@foreach (['danger','success','info','warning'] as $message)
@if (Session::has('alert-'.$message))
<div class="alert alert-{{ $message }} alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> {{ Session::get('alert-'.$message) }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endforeach