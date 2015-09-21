@if ($errors->has() || Session::has('message'))
    @foreach($errors->all() as $message)
        <div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>{{ $message }}</strong>
	    </div>
    @endforeach
    @if (Session::has('message'))
        <div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>{{ Session::get('message') }}</strong>
	    </div>
    @endif
@endif