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
	<center>Form</center>
	<form method="post" action="{{ url('form') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="title" value="{{old('title')}}" placeholder="Title"><br>
		<input type="text" name="desc" value="{{old('desc')}}" placeholder="Desc"><br>
		<input type="text" name="add_by" value="{{old('add_by')}}" placeholder="Add_by"><br>
		<select name="status">
			<option value=""> Choose Status </option>
			<option value='active' >
				active</option>
			<option value="pending" >pending</option>
			<option value="deactive" >deactive</option>
		</select>
		<input type="submit" name="submit" value="submit">
	</form>

	<hr/>
	<center>Table</center>
	<form method="post" action="{{ url('del/try')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">
		<table border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>Title</th>
				<th>addby</th>
				<th>Desc</th>
				<th>Deleted Status</th>
				<th>status</th>
				<th>id</th>
			</tr>
			@foreach($all_data as $data)
				<tr>
					<td>{{$data ->title}}</td>
					<td>{{$data ->add_by}}</td>
					<td>{{$data ->desc}}</td>
					<td>{{ !empty($data->deleted_at)?'Trached':'Publiched' }}</td>
					<td>{{$data ->status}}</td>
					<!-- <td>{{$data ->id}}</td> -->
					<!-- to delete one item -->
		<!-- 			<td>
						<form method="post" action="{{ url('del/try/'.$data->id) }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" name="" value="DELETE">	
						</form>
					</td> -->
					<!-- to delete multible -->
					<td>
						<input type="checkbox" name="id[]" value="{{$data->id}}">
					</td>			
				</tr>
			@endforeach
		</table>
		<input type="submit" name="fulldelete" value="ForceDelete">
		<input type="submit" name="softdelete" value="soft delete">
	</form>

<hr/>
<center>Trashed Data</center>
	<form method="post" action="{{ url('del/try')}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">
		<table border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>Title</th>
				<th>addby</th>
				<th>Desc</th>
				<th>status</th>
				<th>id</th>
			</tr>
			@foreach($soft_deletes as $soft)
				<tr>
					<td>{{$soft ->title}}</td>
					<td>{{$soft ->add_by}}</td>
					<td>{{$soft ->desc}}</td>
					<td>{{$soft ->status}}</td>
					<td>
						<input type="checkbox" name="id[]" value="{{$soft->id}}">
					</td>			
				</tr>
			@endforeach
		</table>
		<input type="submit" name="fulldelete" value="forceDelete">
		<input type="submit" name="restore" value="Restore">
	</form>	
</body>
</html>

<?php
	// <!-- use with the paginate method -->
	// <!-- {!! $var->render() !!} -->

?>

