
  <form class="form-horizontal col-sm-12" id="uni-form" method="post" action="{{ route('add.university') }}">

    <div class="form-group row {{ $errors->has('name') ? 'has-error has-feedback' : null }}">
      <label for="uni-name" class="col-sm-2 control-label">University Name</label>
      <div class="col-sm-10">
        <input name="name" type="text" class="form-control" id="uni-name" placeholder="University Name" value="{{ old('name') }}">
        @if($errors->has('name'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('address') || $errors->has('city') || $errors->has('country') ? 'has-error has-feedback' : null }}">
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
        @if($errors->has('address') || $errors->has('city'))
          <span id="help-uniname" class="help-block">
            {{ $errors->has('address') ? $errors->first('address') : null }} {{ $errors->has('city') ? $errors->first('city') : null }}
          </span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('email') ? 'has-error has-feedback' : null }}">
      <label for="uni-email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input name="email" type="text" class="form-control" id="uni-email" placeholder="University Email" value="{{ old('email') }}">
        @if($errors->has('email'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('website') ? 'has-error has-feedback' : null }}">
      <label for="uni-site" class="col-sm-2 control-label">Website</label>
      <div class="col-sm-10">
        <input name="website" type="text" class="form-control" id="uni-site" placeholder="University Website" value="{{ old('website') }}">
        @if($errors->has('website'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('website') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('established') ? 'has-error has-feedback' : null }}">
      <label for="uni-est" class="col-sm-2 control-label">Established In</label>
      <div class="col-sm-10">
        <input name="established" type="text" class="form-control" id="uni-est" placeholder="Established In" value="{{ old('established') }}">
        @if($errors->has('established'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('established') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('rank') ? 'has-error has-feedback' : null }}">
      <label for="uni-rank" class="col-sm-2 control-label">Rank</label>
      <div class="col-sm-10">
        <input name="rank" type="text" class="form-control" id="uni-rank" placeholder="University Rank" value="{{ old('rank') }}">
        @if($errors->has('rank'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('rank') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('population') || $errors->has('intpopulation') || $errors->has('pkpopulation') ? 'has-error has-feedback' : null }}">
      <label class="col-sm-2 control-label" for="uni-pop">Student Population</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input name="population" type="text" class="form-control" id="uni-pop" placeholder="Total" value="{{ old('population') }}">
          <div class="input-group-addon">INT</div>
          <input name="intpopulation" type="text" class="form-control" id="uni-intpop" placeholder="International" value="{{ old('intpopulation') }}">
          <div class="input-group-addon">PK</div>
          <input name="pkpopulation" type="text" class="form-control" id="uni-pkpop" placeholder="Pakistani" value="{{ old('pkpopulation') }}">
        </div>
        @if($errors->has('population') || $errors->has('intpopulation') || $errors->has('pkpopulation'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">
            {{ $errors->has('population') ? $errors->first('population') : null }} {{ $errors->has('intpopulation') ? $errors->first('intpopulation') : null }} {{ $errors->has('pkpopulation') ? $errors->first('pkpopulation') : null }}
          </span>
        @endif
      </div>
    </div>

    <div class="form-group row {{ $errors->has('extracur') ? 'has-error has-feedback' : null }}">
      <label for="uni-extra" class="col-sm-2 control-label">Extracurricular</label>
      <div class="col-sm-10">
        <textarea name="extracur" class="form-control" id="uni-extra" placeholder="Extracurricular" rows="5">{{ old('extracur') }}</textarea>
        @if($errors->has('extracur'))
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <span id="help-uniname" class="help-block">{{ $errors->first('extracur') }}</span>
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