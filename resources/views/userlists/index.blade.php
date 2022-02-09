@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('userlists.create') }}"> Create New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Region</th>
            <th>Province</th>
            <th>City</th>
            <th>Barangay</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($userlists as $userlist)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $userlist->name }}</td>
            <td>{{ $userlist->region_name }}</td>
            <td>{{ $userlist->province_name }}</td>
            <td>{{ $userlist->city_name }}</td>
            <td>{{ $userlist->barangay_name }}</td>
            <td>
                <form action="{{ route('userlists.destroy',$userlist->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('userlists.show',$userlist->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('userlists.edit',$userlist->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $userlists->links() !!}

@endsection
