@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @if($users->count()>0)
                    @foreach($users as $user)
                        <tr>
                            <td><img class="img-fluid" src="{{ asset($user->profile->avatar) }}" alt="{{$user->name}}" width="50"></td>
                            <td>{{$user->name}}</td>
                            <td>
                            @if($user->admin)
                                <a href="{{route('user.removeadmin',['id'=>$user->id])}}" class="btn btn-sm btn-danger">Remove Admin</a>
                            @else
                                <a href="{{route('user.makeadmin',['id'=>$user->id])}}" class="btn btn-sm btn-success">Make Admin</a>
                            @endif
                            </td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                @else
                   <tr><td colspan="4" class="text-center">No user</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection