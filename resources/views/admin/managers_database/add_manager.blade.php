@extends('admin.admin_app')

@section('content')

    <div class="container">
        <h1>Add Managers</h1>
    </div>

    @if(Session::has("manager_added_status"))
        <div class="container">
            <div class="alert">
                @if(Session::get("manager_added_status") == "partial_successful")
                    <p class="alert alert-warning">Not all managers saved in the database, because they might already exists in the database.</p>
                @endif

                @if(Session::get("manager_added_status") == "successful")
                    <p class="alert alert-success">All managers saved successfully</p>
                @endif

                @if(Session::has("managers_not_added"))
                    <div class="alert alert-danger">
                        <h3>Managers not saved in the database are:-</h3>
                        @foreach(Session::get("managers_not_added") as $key=>$manager)
                            <div class="row">
                                <div class="col-xs-3 col-lg-2">
                                    Name: <strong>{{$manager["coach_name"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Email: <strong>{{$manager["email"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Contact Number: <strong>{{$manager["contact_no"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Manager Type: <strong>{{$manager["manager_type"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Management Level: <strong>{{$manager["management_level"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Sport: <strong>{{$manager["sport_type"]}}</strong>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-3 col-lg-2">
                                    Sport Gender: <strong>{{$manager["sport_gender"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Designation: <strong>{{$manager["designation"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    Country: <strong>{{$manager["country"]}}</strong>
                                </div>
                                <div class="col-xs-3 col-lg-2">
                                    State: <strong>{{$manager["state"]}}</strong>
                                </div>
                                <!--div class="col-xs-3 col-lg-2">
                                    Institution Type: <strong></strong>
                                </div-->
                            </div>
                            <hr>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="container">
        {!! Form::open(['method'=>'post','url'=>'admin/addManagers']) !!}

        <div class="duplicate_content_container">
            <div class="duplicate_this_content manager_data">
                    <h4 class="heading">Manager's Data</h4>
                    <div class="row form_container">

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('coach_name[]','Coach Name:') !!}
                            {!! Form::text('coach_name[]',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Name is required", 'autocomplete'=>'on']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('manager_type[]','Manager Type:') !!}
                            {!! Form::select('manager_type[]',$manager_type,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('management_level[]','Management Level:') !!}
                            {!! Form::select('management_level[]',$management_level,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('sport_type[]','Sport:') !!}
                            {!! Form::select('sport_type[]',$sport_type,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('sport_gender[]','Sport Gender:') !!}
                            {!! Form::select('sport_gender[]',$sport_gender,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('designation[]','Designation:') !!}
                            {!! Form::text('designation[]',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Designation is required", 'autocomplete'=>'on' ]) !!}
                        </div>
                    </div>

                    <div class="row form_container">

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('email[]','Email:') !!}
                            {!! Form::text('email[]',null,['class'=>'form-control','data-validate'=>'require|email',
                            'data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Email must be in correct format", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('contact_no[]','Contact No:') !!}
                            {!! Form::text('contact_no[]',null,['class'=>'form-control','data-validate'=>'require|phoneNumber',
                            'data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Contact number should be in correct format", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('country[]','Country:') !!}
                            {!! Form::select('country[]',$country,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('state[]','State:') !!}
                            {!! Form::select('state[]',$american_state,null,['class'=>'form-control','data-validate'=>'require_with|select',
                            'data-require-with-fields'=>'country[]','data-invalid-value'=>'','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option, if in Country 'United States' selected.", 'autocomplete'=>'on' ]) !!}
                        </div>

                        <!--div class="col-xs-6 col-lg-2">
                            {!! Form::label('institution_type[]','Institution Type:') !!}
                            {!! Form::select('institution_type[]',$institution_type,null,['class'=>'form-control','data-validate'=>'require|select',
                            'data-invalid-value'=>'0','data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Select a valid option", 'autocomplete'=>'on' ]) !!}
                        </div-->

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('institution_name[]','Institution Name:') !!}
                            {!! Form::text('institution_name[]',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>"tooltip" , 'data-placement'=>"bottom" , 'title'=>"Institute Name is required", 'autocomplete'=>'on' ]) !!}
                        </div>
                    </div>

            </div>

            <div class="place_duplicate_content_here duplicated_manager_data">
            </div>

            <br>
            <div class="text-center">
                <button class="btn duplicate_content_button" type="button"
                        data-target-duplicate-content=".manager_data"
                        data-place-duplicate-content=".duplicated_manager_data">Add more</button>
            </div>

        </div>

        <br>
        <hr>
        <div class="row form_container">
            <div class="col-xs-12 col-lg-6 col-lg-onset-3 text-center">
                {!! Form::submit('Add All Managers',['class'=>'btn btn-primary t-button']) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>



    <!-- Script for Validating required_with data validation option on this page-->
    <script>

        $(document).ready(function(){
            var forms = $('form');
            $(forms).each(function(i,form){
                $(form).submit(function(event) {

                    var elements = $(form).find('[data-validate*="require_with"]');

                    $(elements).each(function(index,element){

                        var element_Has_Value = false;

                        if(($(element).data('validate')).indexOf("require_with") < 0)
                        {
                            return false;
                        }

//                        alert("Condition :" + !($(element).val()==0 || whitespace.test($(element).val())) + " -- Whitespace:  " + whitespace.test($(element).val()) + " \n Value: " + $(element).val() );

                        if($(element).data('validate').indexOf('select') > 0 && !($(element).val()==0 || $(element).val() == null))
                        {
                            element_Has_Value = true;
                        }
                        else if($(element).data('validate').indexOf('select') <0 && !whitespace.test($(element).val()))
                        {
                            element_Has_Value = true;
                        }

                        var requiredWithElements = $(element).data('requireWithFields') !=undefined ? $(element).data('requireWithFields') : null;

                        var name="";
                        var focusedIndex = null;
                        var raiseError=false;
                        if(requiredWithElements == null)
                        {
                            return true;
                        }
                        name = $(element).attr('name');
                        focusedIndex = index;       //parseInt((name.replace(/\w*\s*/,"")).replace(/\D*/g,""));
                        requiredWithElements = requiredWithElements.split(",");

                        for(i=0;i<requiredWithElements.length;i++)
                        {
                            var elem = requiredWithElements[i].replace(/(\s*)*(\r\n|\n|\r)*/gm,"");
                            var requiredElem = $("[name='" + elem + "']");

                            var validate_type = $(requiredElem[focusedIndex]).data('validate') != undefined ? ($(requiredElem[focusedIndex]).data('validate')).toLowerCase() : "";

                            if(validate_type.indexOf("select") >= 0 && requiredElem.val() > 0)
                            {
                                raiseError = true;
                            }
                            else if(validate_type.indexOf("select") == -1 && !whitespace.test($(requiredElem[focusedIndex]).val()))
                            {
                                raiseError = true;
                            }



                            switch(elem)
                            {
                                case 'country[]':
                                            if($(requiredElem[focusedIndex]).val() == 244 && element_Has_Value == false)   //Selected option in Country is "United States"
                                            {
                                                raiseError=true;
                                            }
                                            else if($(requiredElem[focusedIndex]).val() != 244 && element_Has_Value == true)
                                            {
                                                raiseError=true;
                                            }
                                            else
                                            {
                                                raiseError = false;
                                            }
                                    break;

                            }

                        }

                        if(raiseError)
                        {
                            $(element).addClass(errorClassName);
                            $(element).tooltip();
                            $(document).scrollTop(($(element).offset()).top-100);
                            event.preventDefault();
                        }
                    });

                });
            });
        });
    </script>

@stop