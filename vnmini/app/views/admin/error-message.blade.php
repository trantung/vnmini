@if ($errors->has() || Session::has('message'))
    @foreach($errors->all() as $message)
        <div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><center>{{ $message }}</center></strong>
	    </div>
    @endforeach
    @if (Session::has('message'))
        <div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong><center>{{ Session::get('message') }}</center></strong>
	    </div>
    @endif
@endif