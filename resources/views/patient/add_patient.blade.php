@extends('layouts.app')

@section('content')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<div class="container">
    <div class="row">
         <div class="col-md-2">
                <a href="{{url('/StudentHome')}}" class="btn btn-success" style="float: left">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back to Dashboard</a>
         </div>
         <div class="col-md-8">
                     <div class="panel panel-default">
                        <div class="panel-heading" style="backgroundd-color: lightblue">
                                <h4>Add New Patient</h4>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ url('add_patient') }}">
                                {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label for="gender" class="col-md-4 control-label">Sex*</label>

                                            <div class="col-md-6">
                                                <input type="radio" class="form-check-input inline" name="gender" value="Male" id="genderMale" checked="checked">&nbsp;Male
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" class="form-check-input inline" name="gender" value="Female" id="genderFemale">&nbsp;Female
                                                @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('module_id') ? ' has-error' : '' }}">
                                            <label for="module_id" class="col-md-4 control-label">Module*</label>

                                            <div class="col-md-6">
                                                <select class="form-control" name="module_id" value="{{ old('module_id') }}">
                                                    @foreach ($modules as $module)
                                                        <option value="{{ $module->module_id }}">
                                                            {{ $module->module_name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('module_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('module_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                                            <label for="room_number" class="col-md-4 control-label">Room Number*</label>
                                            <div class="col-md-6">
                                                <input id="room_number" type="text" class="form-control" name="room_number" value="{{ old('room_number') }}" required>
                                                @if ($errors->has('room_number'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('room_number') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                            <label for="age" class="col-md-4 control-label">Age*</label>
                                            <div class="col-md-6">
                                                <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required>
                                                @if ($errors->has('age'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                            <label for="height" class="col-md-4 control-label">Height*</label>

                                            <div class="col-md-6">
                                                <input id="height" type="text" class="form-control" name="height" value="{{ old('height') }}" required >
                                                <select name="height_unit" value="{{ old('height_unit') }}">
                                                        <option value="cms">cms</option>
                                                        <option value="inches">inches</option>
                                                </select>
                                                @if ($errors->has('height'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('height') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                            <label for="weight" class="col-md-4 control-label">Weight*</label>

                                            <div class="col-md-6">
                                                <input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight') }}" required >
                                                <select name="weight_unit" value="{{ old('weight_unit') }}">
                                                    <option value="kgs">kgs</option>
                                                    <option value="lbs">lbs</option>
                                                </select>
                                                @if ($errors->has('weight'))
                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                <div class="form-group{{ $errors->has('visit_date') ? ' has-error' : '' }}">
                                            <label for="height" class="col-md-4 control-label">Visit Date*</label>

                                            <div class="col-md-6">
                                                <input id="visit_date" type="text" class="form-control" name="visit_date" value="{{ old('visit_date') }}"  required>
                                                @if ($errors->has('visit_date'))
                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('visit_date') }}</strong>
                                                    </span>
                                                @endif
                                                <p class="form-control-label">Note: Date must be in 'YYYY-MM-DD' format</p>
                                            </div>

                                        </div>
                                        <input type=hidden name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                                                </button>
                                            </div>
                                        </div>
                            </form>
                        </div>

                    </div>
                     <!-- After user submits request -->
        </div>
    </div>
</div>
@endsection