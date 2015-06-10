@extends('app')

@section('content')


    <div class="message_page_container">
        <div class="container heading_container">
            <h1><span class="glyphicon glyphicon-envelope"></span> Message</h1>
        </div>


        <div class="container">
            <div class="row">
                <!-- For Left Hand Side menu -->
                <div class="col-xs-12 col-lg-3 messages_left_side_menu">
                    <?php
                    $active_link=0;
                    ?>
                    @include('message.template.left_hand_side_menu',compact('active_link'))
                </div>

                <!-- For Showing messages -->
                <div class="col-xs-12 col-lg-9 messages_container">
                    {!! Form::open(['method'=>'put','url'=>'moveTrash','name'=>'moveMessageToTrashForm']) !!}
                        {!! Form::hidden('message_id',$message->message_id) !!}
                        {!! Form::hidden('message_type',Input::get('message_type')) !!}
                    {!! Form::close() !!}
                    <div class="message_operations_container">
                        <a href="#replyMessage" class="message_operation" data-toggle="collapse">
                            <span class="glyphicon glyphicon-transfer"></span> Reply
                        </a>
                        <a href class="message_operation" data-toggle="modal" data-target="#move_message_to_trash_confirmation">
                            <span class="glyphicon glyphicon-trash"></span> Trash
                        </a>
                    </div>

                    @if(Session::get('status')=="successfull")
                        <div class="alert alert-success">
                            <p>You have successfully replied.</p>
                        </div>
                    @endif

                    @if(Session::get('move_message_trash_status')=='error')
                        <div class="alert alert-error">
                            <p>Some error occured while moving to trash. Please try again later.</p>
                        </div>
                    @endif

                    <div class="message">
                        <div class="row">
                            <div class="col-xs-3 col-lg-2">
                                <a href="{{url('profile/'.$message->to_user_id)}}">
                                    <img src="{{$message->profile_small_image_path}}" >
                                </a>
                            </div>

                            <div class="col-xs-9 col-lg-10">

                                <h4 class="message_by">
                                    <a href="{{url('profile/'.$message->to_user_id)}}">{{$message->first_name. " " . $message->last_name}}</a>
                                </h4>
                                <h4 class="subject">{{$message->subject}}</h4>
                                <p>{{Carbon\Carbon::parse($message->sent_on)->diffForHumans()}}</p>
                            </div>
                        </div>
                        <br>
                        <p>{!! preg_replace("/\r?\n/","<br>",$message->message) !!}</p>
                    </div>


                    @include('errors.error_raw_list')



                    <div class="collapse" id="replyMessage">
                        {!! Form::open(['method'=>'post','url'=>'reply-forward-Message']) !!}
                        {!! Form::hidden('to_user_id',$reply_forward_to_id) !!}
                        {!! Form::hidden('subject',$message->subject) !!}
                        <div class="row form_container">
                            <div class="col-xs-12 col-lg-12">
                                <div class="form-group">
                                    {!! Form::label('message','Message:') !!}
                                    {!! Form::textarea('message',null,['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Reply',['class'=>'btn t-button'])!!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>



        <!-- Moodals for User Messages Operations -->
        <div>

            <!-- Modal for confirming from user, if he/she wants to move the message to Trash-->
            <div class="modal fade" id="move_message_to_trash_confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Confirm!!</h4>
                        </div>
                        <div class="modal-body alert alert-warning">
                            <p>Are you sure to move this message to trash?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="document.moveMessageToTrashForm.submit();">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>


@stop