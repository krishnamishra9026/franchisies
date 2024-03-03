@foreach($messages as $message)
<li class="clearfix">
    <div class="chat-avatar">
       @if(isset($sponsor->avatar))
       <img src="{{ asset('storage/uploads/sponsors/'.$sponsor->avatar) }}" class="rounded-circle" alt="Shreyu N" />
       @else
       <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" class="rounded-circle" alt="Shreyu N" />
       @endif
   </div>
   <div class="conversation-text">
    <div class="ctext-wrap">
        <p>
           {{$message->message}}
           @if($message->file)

           @if(checkFileTypeIsImage(asset('/storage/uploads/messages/sponsors/'.$message->user_id.'/'.$message->file)))
           <img height="55" src="{{ asset('/storage/uploads/messages/sponsors/'.$message->user_id.'/'.$message->file) }}">        
           @else
           <a style="color: white;" href="{{ asset('/storage/uploads/messages/sponsors/'.$message->user_id.'/'.$message->file) }}" download><i class="fa fa-download"></i></a>
           <p>{{ $message->file }}</p>
           @endif

           @endif
       </p>
   </div>
 <p class="messtime font-12">{{ date('d-m-Y H:m a', strtotime($message->created_at)) }}</p>
</div>
</li>
@endforeach