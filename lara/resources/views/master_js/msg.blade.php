<div class="row justify-content-center mt-4">
    <div class="col-md-9">
        @if(isset($success_message))
            <div class="alert alert-success" role="alert">
                {{$success_message}}
            </div>
        @endif
    </div>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-md-9">
        @if(isset($info_message))
            <div class="alert alert-info" role="alert">
                {{$info_message}}
            </div>
        @endif
    </div>
</div>