@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="">
              <div class="card-body">
         <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
                <strong><h4>Recent</h4></strong>
               </div>
               <div class="float-start">
                 @include('inc.people')
               </div>
            <div class="srch_bar float-end">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
            <div class="inbox_chat">
                  <div class="list-group">

               @foreach($userMessages as $user)
                @php
                    $unreadCount = 0; // Initialize the count of unread messages
                @endphp

                @foreach($user['user']->messages as $message)
                    @if(!$message->is_read)
                        @php
                            $unreadCount++; // Increment the count for each unread message
                        @endphp
                    @endif
                @endforeach

                <a href="{{ url($user['user']->id.'/chat') }}" class="list-group-item list-group-item-action bg-white" aria-current="true">
                    <div class="rounded-circle overflow-hidden me-2 float-start" style="width: 60px; height: 60px; border: 2px solid #fff;">
                          <img src="{!! asset('images/amos.png') !!}" alt="Avatar" style="width: 100%; height: 100%;">
                     </div>

                      <small class="float-end">{{ $user['message']->created_at->diffForHumans() }}</small>
                      <h5 class="mb-1">{{ $user['user']->username }}</h5>

                   @if($unreadCount > 0 && $user['message']->recipient_id === Auth::user()->id)
                        <div class="">
                            <div class="bg-chat float-end rounded-circle" style="height: 25px; width: 25px;">
                                <p class="mb-1 text-center text-white">{{ $unreadCount }}</p>
                            </div>
                            <p class="mb-1"><strong>{{ $user['message']->message }}</strong></p>
                        </div>
                    @else
                        <p class="mb-1">{{ $user['message']->message }}</p>
                    @endif
                </a>
            @endforeach


              </div>

                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>



    </script>
@endsection

