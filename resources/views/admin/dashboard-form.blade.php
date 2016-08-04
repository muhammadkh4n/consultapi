@extends('layouts.admin.master')

@section('dashboard-title', 'Add University')

@section('dashboard-content')

  <form class="form-horizontal col-sm-12 col-lg-11" id="uni-form" method="post">

    <div class="form-group row {{ $errors->get('name') ? 'has-error has-feedback' : null }}">
      <label for="uni-name" class="col-sm-2 control-label">University Name</label>
      <div class="col-sm-10">
        <input name="name" type="text" class="form-control" id="uni-name" placeholder="University Name" value="{{ old('name') }}">
        @if($errors->get('name'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('name')[0] }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('address') || $errors->get('city') || $errors->get('country') ? 'has-error has-feedback' : null }}">
      <label class="col-sm-2 control-label" for="uni-address">Address</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input name="address" type="text" class="form-control" id="uni-address" placeholder="Address" value="{{ old('address') }}">
          <span class="input-group-addon">City</span>
          <input name="city" type="text" class="form-control" id="uni-city" placeholder="City" value="{{ old('city') }}">
          <span class="input-group-addon">Country</span>
          <select class="form-control" name="country">
            @foreach($countries as $country)
              <option value="{{ $country }}" {{ $country === old('country') ? 'selected' : null }}>{{ $country }}</option>
            @endforeach
          </select>
        </div>
        @if($errors->get('address') || $errors->get('city'))
          <span id="help-uniname" class="help-block">
            All fields are required.
          </span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('email') ? 'has-error has-feedback' : null }}">
      <label for="uni-email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input name="email" type="text" class="form-control" id="uni-email" placeholder="University Email" value="{{ old('email') }}">
        @if($errors->get('email'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('email')[0] }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('website') ? 'has-error has-feedback' : null }}">
      <label for="uni-site" class="col-sm-2 control-label">Website</label>
      <div class="col-sm-10">
        <input name="website" type="text" class="form-control" id="uni-site" placeholder="University Website" value="{{ old('website') }}">
        @if($errors->get('website'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('website')[0] }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('established') ? 'has-error has-feedback' : null }}">
      <label for="uni-est" class="col-sm-2 control-label">Established In</label>
      <div class="col-sm-10">
        <input name="established" type="text" class="form-control" id="uni-est" placeholder="Established In" value="{{ old('established') }}">
        @if($errors->get('established'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('established')[0] }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('rank') ? 'has-error has-feedback' : null }}">
      <label for="uni-rank" class="col-sm-2 control-label">Rank</label>
      <div class="col-sm-10">
        <input name="rank" type="text" class="form-control" id="uni-rank" placeholder="University Rank" value="{{ old('rank') }}">
        @if($errors->get('rank'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('rank')[0] }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('population') || $errors->get('intpopulation') || $errors->get('pkpopulation') ? 'has-error has-feedback' : null }}">
      <label class="col-sm-2 control-label" for="uni-pop">Student Population</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input name="population" type="text" class="form-control" id="uni-pop" placeholder="Total" value="{{ old('population') }}">
          <div class="input-group-addon">INT</div>
          <input name="intpopulation" type="text" class="form-control" id="uni-intpop" placeholder="International" value="{{ old('intpopulation') }}">
          <div class="input-group-addon">PK</div>
          <input name="pkpopulation" type="text" class="form-control" id="uni-pkpop" placeholder="Pakistani" value="{{ old('pkpopulation') }}">
        </div>
        @if($errors->get('population') || $errors->get('intpopulation') || $errors->get('pkpopulation'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">
            All fields are required and must ne in numeric form. e.g. 9000
          </span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->get('extracur') ? 'has-error has-feedback' : null }}">
      <label for="uni-extra" class="col-sm-2 control-label">Extracurricular</label>
      <div class="col-sm-10">
        <textarea name="extracur" class="form-control" id="uni-extra" placeholder="Extracurricular" rows="5">{{ old('extracur') }}</textarea>
        @if($errors->get('extracur'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->get('extracur')[0] }}</span>
        @endif
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