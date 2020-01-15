
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show mb-0 mx-3 mt-3">
    @foreach ($errors->all() as $error)
    {{ $error }} <br/>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @endforeach
</div>
@endif
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show mb-0 mx-3 mt-3">
        {{ session('status') }}                      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif  
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-0 mx-3 mt-3">
        {{ session('error') }}                      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif  