@extends('app')

@section('content')


    <div class="message_page_container">
        <div class="container heading_container">
            <h1><span class="glyphicon glyphicon-send"></span> Sent</h1>
        </div>


        <div class="container">
            <div class="row">
                <!-- For Left Hand Side menu -->
                <div class="col-xs-12 col-lg-3 messages_left_side_menu">
                    <?php
                    $active_link=2; //For Inbox
                    ?>
                    @include('message.template.left_hand_side_menu',compact('active_link'))
                </div>

                <!-- For Showing messages -->
                <div class="col-xs-12 col-lg-9 messages_container">

                    @if(Session::get('move_message_trash_status')=='successful')
                        <div class="alert alert-success">
                            <p>Your message moved to trash.</p>
                        </div>
                    @endif

                    @foreach($sentMessages as $key=>$message)
                        <a href="{{ route("viewMessage",['message_id'=>$message->message_id,'message_type'=>'sent']) }}" class="message">
                            <div class="row">
                                <div class="col-xs-4 col-lg-2">

                                    <img src="{{$message->profile_small_image_path}}" class="img-responsive">

                                </div>
                                <div class="col-xs-8 col-lg-8">
                                    <h4 class="message_by">

                                        {{$message->first_name. " " . $message->last_name}}

                                    </h4>
                                    <h4 class="subject">{{$message->subject}}</h4>
                                    <p>{{substr($message->message,0,100)}}</p>
                                </div>
                                <div class="col-xs-12 col-lg-2">
                                    {{Carbon\Carbon::parse($message->sent_on)->diffForHumans()}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @if(count($sentMessages)==0)
                        <p class="alert alert-warning">No message available</p>
                    @endif

                    {!! $sentMessages->render() !!}
                </div>
            </div>
        </div>

    </div>


@stop