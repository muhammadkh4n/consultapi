@extends('layouts.admin.master')

@section('dashboard-title', 'University List')

@section('dashboard-content')
  <div class="col-sm-12">
    @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ Session::get('success') }}</p>
      </div>
    @endif
    <table class="table table-striped">
      <tr>
        <th>id</th>
        <th>University Name</th>
        <th>Website</th>
        <th>Rank</th>
      </tr>
      @foreach($universities as $uni)
        <tr>
          <td>{{ $uni->id }}</td>
          <td>{{ $uni->name }}</td>
          <td>{{ $uni->website }}</td>
          <td>{{ $uni->university_info->rank }}</td>
        </tr>
      @endforeach
    </table>
  </div>
@endsection