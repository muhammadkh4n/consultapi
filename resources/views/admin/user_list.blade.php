@extends('layouts.dashboard.master')

@section('dashboard-title', 'User List')

@section('dashboard-content')

  <div class="col-sm-12">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif

    @if (session('fail'))
      <div class="alert alert-danger" role="alert">
        <p>{{ session('fail') }}</p>
      </div>
    @endif

    <table class="table table-striped">
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Set Privilege</th>
      </tr>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
          <td>{{ $user->admin ? 'Yes' : 'No' }}</td>
          <td>
            @if ($user->admin)
              <a href="{{ route('admin.dashboard.demote', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Demote</a>
            @else
              <a href="{{ route('admin.dashboard.promote', ['id' => $user->id]) }}" class="btn btn-warning btn-sm">Promote</a>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>

@endsection