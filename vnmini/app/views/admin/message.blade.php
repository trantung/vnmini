@if(Session::has('message'))
    <div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>{{ Session::get('message') }}</strong>
    </div>
@endif