@extends('layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
               
                     Dashboard
                     <div class="btn-group pull-right">
                         <a href="posts/create" class="btn btn-default btn-sm">
                             <i class="fas fa-plus"></i>
                             New Post
                         </a>
                     </div>
            </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Posts</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>created</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                         <a href="/posts/{{ $post->id }}/edit" class="btn btn-info btn-sm">Edit Post</a>        
                                    </td>
                                    <td>
                                        {!! Form::open(
                                            ['action'=>['PostsController@destroy',$post->id], 'method'=>'Post'])
                                         !!}

                                        {{ Form::hidden('_method','DELETE') }}
                                        <button class="btn btn-danger btn-sm" type="submit">
                                          Delete Post
                                        </button>
                                         {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
