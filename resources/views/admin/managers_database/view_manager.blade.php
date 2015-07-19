@extends('admin.admin_app')

@section('content')

    <div class="container">
        <h1>View Managers</h1>
    </div>


    <div class="container">
        {!! Form::open(['method'=>'post','url'=>'admin/searchManagers']) !!}
            <div class="row form_container">
                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('coach_name','Manager Name:') !!}
                        {!! Form::text('coach_name',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('manager_type','Manager Type:') !!}
                        {!! Form::select('manager_type',$manager_type,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('sport_type','Sport Type:') !!}
                        {!! Form::select('sport_type',$sport_type,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('sport_gender','Sport Gender:') !!}
                        {!! Form::select('sport_gender',$sport_gender,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('country','Country:') !!}
                        {!! Form::select('country',$country,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::label('state','State:') !!}
                        {!! Form::select('state',$state,null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-3 col-lg-2">
                    <div class="form-group">
                        {!! Form::submit('Go',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

    </div>

    @if(Session::has("manager_delete_status") && Session::get("manager_delete_status") == "successful")
        <div class="container">
            <p class="alert alert-success">Manager Deleted successfully</p>
        </div>
    @endif

    <div class="container">
        @foreach($managers as $key=>$manager)
            <h4>{{$manager->coach_name}}
                <div class="pull-right">
                    {!! Form::open(['method'=>'delete','url'=>'admin/deleteManager']) !!}
                        <!--a href=""><span class="glyphicon glyphicon-edit"></span> Edit</a-->
                        <button class="btn glyphicon glyphicon-remove" type="submit" onclick="if(!confirm('Are you sure you want to delete?')){event.preventDefault();}"> Delete</button>
                        {!! Form::hidden('manager_id',$manager->id) !!}
                    {!! Form::close() !!}
                </div>
            </h4>

            <div class="row">
                <div class="col-xs-3 col-lg-2">
                    <label>Sport:</label>
                    {{$manager->sport_type}}
                </div>
                <div class="col-xs-3 col-lg-2">
                    <label>Sport Gender:</label>
                    {{$manager->sport_gender}}
                </div>
                <div class="col-xs-3 col-lg-2">
                    <label>Designation:</label>
                    {{$manager->designation}}
                </div>
                <div class="col-xs-3 col-lg-3">
                    <label>Management Level:</label>
                    {{$manager->management_level}}
                </div>
                <div class="col-xs-3 col-lg-2">
                    <label>Institution Name:</label>
                    {{$manager->institution_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-lg-4">
                    <label>Email:</label>
                    {{$manager->email}}
                </div>
                <div class="col-xs-3 col-lg-3">
                    <label>Contact Number:</label>
                    {{$manager->contact_no}}
                </div>

                <div class="col-xs-3 col-lg-2">
                    <label>Country:</label>
                    {{$manager->country}}
                </div>
                @if($manager->state != "")
                    <div class="col-xs-3 col-lg-2">
                        <label>State:</label>
                        {{$manager->state}}
                    </div>
                @endif
            </div>
            <hr>
        @endforeach
    </div>

    <div class="container">
        {!! $managers->appends(Input::all())->render() !!}
    </div>

@stop