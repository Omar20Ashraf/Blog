<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- @if(session()->has('message')) -->
<!-- {{ session()->get('message')[0]['key1'] }}
{{ session()->get('message1')}}
{{ session()->flush() }} -->
<!-- @endif -->


{!! Form::open( ['url'=>'insert/news1'] ) !!}
	{!! Form::text('title',old('title'), [ 'placeholder'=>'Title News' ]) !!}<br/>
	{!! Form::text('desc',old('desc'), [ 'placeholder'=>'desc News' ]) !!}<br/>
	{!! Form::text('add_by',old('add_by'), [ 'placeholder'=>'add_by' ]) !!}<br/>
	{!! Form::select('status',
	['active'=>'active',
	'deactive'=>'deactive',
	'panding'=>'panding'],old('status'),['placeholder'=>'Choose Status'] )
	!!}

	{!! Form::submit('submit') !!}

	<!-- {!! Form::input('text','news') !!} -->

{!! Form::close() !!}
	<hr/>
<!-- 	<center>News</center>
	<form method="post" action="{{ url('insert/news1') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="title" value="{{ old('title') }}" placeholder="Title"><br>
		<input type="text" name="desc"  value="{{ old('desc') }}" placeholder="Desc"><br>
		<input type="text" name="add_by"  value="{{ old('add_by') }}" placeholder="add_by"><br>
		<select name="status">
			<option value="">choose status</option>
			<option value="active">active</option>
			<option value="pending">pending</option>
			<option value="deactive">deactive</option>
		</select>
		<input type="submit" value="sudmit" >
	</form> -->
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>Title</th>
			<th>addby</th>
			<th>Desc</th>
			<th>status</th>
			<th>deleted status</th>
			<th>action</th>
		</tr>
		<form method="post" action="{{ url('del/news')}}">
			@foreach($all_news as $news)
				<tr>
					<td>{{ $news->title }}</td>
					<td>{{ $news->add_by }}</td>
					<td>{{ $news->desc }}</td>
					<td>{{ !empty($news->deleted_at)?'Trached':'Publiched' }}</td>
					<td>{{ $news->status }}</td>
					<td>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="checkbox" name="id[]" value="{{ $news->id }}">
					</td>
				</tr>
			@endforeach
	</table>
			<input type="submit" name="fulldelete" value="Dellte multible">
			<input type="submit" name="force" value="force Dellte">
		</form>
	<!-- {!! $all_news->render() !!}	 -->

<hr/>
<center>Trashed Data</center>
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>Title</th>
			<th>addby</th>
			<th>Desc</th>
			<th>status</th>
			<th>action</th>
		</tr>
		<form method="post" action="{{ url('del/news')}}">
			@foreach($soft_deletes as $trash)
				<tr>
					<td>{{ $trash->title }}</td>
					<td>{{ $trash->add_by }}</td>
					<td>{{ $trash->desc }}</td>
					<td>{{ $trash->status }}</td>
					<td>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="DELETE">
						<input type="checkbox" name="id[]" value="{{ $trash->id }}">
					</td>
				</tr>
			@endforeach
	</table>
			<input type="submit" name="restore" value="restore">
			<input type="submit" name="force" value="force Dellte">
		</form>

</body>
</html>