<div class="container">
    @foreach($errors->all() as $error)
<div class="container col-md-6 offset-md-3 my-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$error}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</div>
@endforeach @if(session('success'))
<div class="container col-md-6 offset-md-3 my-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</div>
@endif

@if(session('error'))
<div class="container col-md-6 offset-md-3 my-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
</div>
@endif

</div>
