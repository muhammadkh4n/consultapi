@extends('layouts.admin.master')

@section('dashboard-title', 'Add University')

@section('dashboard-content')

  <form class="form-horizontal col-sm-12 col-lg-11" id="uni-form" method="post">

    <div class="form-group row">
      <label for="uni-name" class="col-sm-2 control-label">University Name</label>
      <div class="col-sm-10">
        <input name="name" type="text" class="form-control" id="uni-name" placeholder="University Name">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label" for="uni-address">Address</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input name="address" type="text" class="form-control" id="uni-address" placeholder="Address">
          <div class="input-group-addon">City</div>
          <input name="city" type="text" class="form-control" id="uni-city" placeholder="City">
          <div class="input-group-addon">Country</div>
          <select class="form-control" name="country">
            @foreach($countries as $country)
              <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="uni-est" class="col-sm-2 control-label">Established In</label>
      <div class="col-sm-10">
        <input name="est" type="text" class="form-control" id="uni-est" placeholder="Established In">
      </div>
    </div>

    <div class="form-group row">
      <label for="uni-rank" class="col-sm-2 control-label">Rank</label>
      <div class="col-sm-10">
        <input name="rank" type="text" class="form-control" id="uni-rank" placeholder="University Rank">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 control-label" for="uni-pop">Student Population</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input name="pop" type="text" class="form-control" id="uni-pop" placeholder="Total">
          <div class="input-group-addon">INT</div>
          <input name="intpop" type="text" class="form-control" id="uni-intpop" placeholder="International">
          <div class="input-group-addon">PK</div>
          <input name="pkpop" type="text" class="form-control" id="uni-pkpop" placeholder="Pakistani">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="uni-extra" class="col-sm-2 control-label">Extracurricular</label>
      <div class="col-sm-10">
        <textarea name="extra" class="form-control" id="uni-extra" placeholder="Extracurricular" rows="5"></textarea>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary btn-lg">Add</button>
      </div>
    </div>
    {{ csrf_field() }}
  </form>

  <div>

  </div>

@endsection