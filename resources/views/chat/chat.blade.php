@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="">

                <div class="position-fixed top-0 end-0 p-3">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 70px;">
                        <span class="material-icons">check_circle</span>
                        <h7 class="float-end mx-2">{{ session('status') }}</h7>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 70px;">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>


                    <div class="mesgs">

                    @if ($messages->count() > 0)
    @foreach ($messages->sortBy('created_at') as $message)
        <div class="msg_history">
            @if ($message->recipient_id === $users->id)
                <div class="incoming_msg">
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{ $message->message }}</p>
                            <span class="time_date">{{ $message->created_at->format('h:i A') }}  |  {{ $message->created_at->isToday() ? 'Today' : $message->created_at->format('M j, Y') }}</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>{{ $message->message }}</p>
                        <span class="time_date">{{ $message->created_at->format('h:i A') }}  |  {{ $message->created_at->isToday() ? 'Today' : $message->created_at->format('M j, Y') }}</span>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
@else
    <div class="card">
        <div class="card-body text-md-center">
            <strong><h8>No Messages</h8></strong>
        </div>
    </div>
@endif




    <form action="{{ url('/p') }}"method="POST">
                          @csrf

          <div class="form-floating mt-3 fixed-bottom mx-5" style="padding-bottom: 57px;">
                  <textarea class="form-control @error('message') is-invalid @enderror " id="message" type="text" name="message"  placeholder="message"></textarea>
                         <input type="hidden" name="recipient_id" value="{{ $recipientId }}">
                              <button class="msg_send_btn" type="submit"><span class="material-symbols-outlined">
                              send
                              </span></button>
                              @error('message')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                    <label for="message">Type a message</label>
                     </form>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

  // Get the textarea element
  const messageTextarea = document.getElementById('message');

  // Add an event listener for key press event
  messageTextarea.addEventListener('keydown', function(event) {
    // Check if Enter key is pressed (event.keyCode === 13)
    if (event.keyCode === 13 && !event.shiftKey) {
      // Prevent the default form submission
      event.preventDefault();

      // Submit the form
      this.form.submit();
    }
  })

             // Function to scroll the chat container to the bottom
        function scrollToBottom() {
          var chatContainer = document.querySelector('.mesgs');
          chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Call the scrollToBottom function when the page is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
          scrollToBottom();
        });

        // Function to handle message submission
        function handleSubmit() {
          // Your message submission code here...

          // Delay the scroll operation to ensure the message is added to the chat container
          setTimeout(scrollToBottom, 100);
        }





</script>

@endsection
