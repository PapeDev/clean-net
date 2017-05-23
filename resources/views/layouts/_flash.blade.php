<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            @if(Session::has('success'))
                <div class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> {{ Session::get('success') }}.
                </div>
            @elseif(Session::has('info'))
                <div class="alert alert-info fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Information !</strong> {{ Session::get('info') }}.
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Danger !</strong> {{ Session::get('danger') }}.
                </div>
            @elseif(Session::has('warning'))
                <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Attention !</strong> {{ Session::get('warning') }}.
                </div>
            @endif
        </div>
    </div>
</div>