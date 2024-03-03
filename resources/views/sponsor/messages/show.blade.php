@extends('layouts.app')
@section('title', 'Welcome to Collab Marketplace Messages')

@section('content')
<style>
    #file-select{
      display: none;
  }
  #icon{
      width: 100px;
      cursor: pointer;
  }
</style>
<div class="messages">
    <div class="container">
        <h1>Messages</h1>
        <div class="row">
            <div class="col-sm-12 col-12">
                <div class="chat-app BoxShadow">
                    <div class="row">
                        <!-- start chat users-->
                        <div class="col-sm-4 col-12">
                            <div class="card @if(!empty(request()->segment(2))) mobile-hide @endif">
                                <div class="card-body">
                                    <!-- start search box -->
                                    <div class="app-search">
                                        <form>
                                            <div class="mb-2 position-relative">
                                                <input type="text" class="form-control filter-records"
                                                    placeholder="Search people" />
                                                <span class="mdi mdi-magnify search-icon"></span>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end search box -->



                                    <!-- users -->
                                    <div class="row chat-list @if(!empty(request()->segment(2))) mobile-hide @endif">
                                        <div class="col">
                                            <div data-simplebar style="max-height: 550px">

                                               @foreach($users as $key => $user)
                                                <a href="{{ route('message.show', $user->id) }}" class="text-body filter_names filterlist">
                                                    <div class="d-flex chatuserlist align-items-start @if(isset($id) && $id == $user->id) bg-active @endif mt-1 p-2">
                                                        <div class="proimg">
                                                            <div class="user-profile-image">
                                                                @if(isset($user->avatar))
                                                                <img src="{{ asset('storage/uploads/creators/'.$user->avatar) }}" class="me-2 rounded-circle" height="48" alt="{{ $user->firstname }}" />
                                                                @else
                                                                <img src="{{ asset('assets/images/frontend/user-profile-placeholder.png') }}" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                                                @endif
                                                                <span class="online"></span>
                                                            </div>
                                                        </div>
                                                        <div class="w-100 overflow-hidden">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">{{ $user->last_message_at }}</span>
                                                                {{$user->firstname}} {{$user->lastname}}
                                                                <p><span>@</span>{{ $user->username }}</p>
                                                            </h5>
                                                            <p class="mb-0 text-muted font-11">
                                                                <span class="w-75 userid">{{ \Str::limit(@$user->message, $limit = 30, $end = '...') }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach

                                            </div> <!-- end slimscroll-->
                                        </div> <!-- End col -->
                                    </div>
                                    <!-- end users -->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                        <!-- end chat users-->

                        <!-- chat area -->
                        <div class="col-sm-6 col-12 borderleftright">
                            <div class="conversation">
                                <div class="chatuser">
                                    <h5>{{$sponsor->firstname}} {{$sponsor->lastname}}</h5>
                                    <p><span>@</span>{{$sponsor->username}}</p>
                                </div>
                                <ul class="conversation-list" data-simplebar>

                                    @foreach($messages as $message)
                                    @if($message->sender == 'creator')
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <div class="avtar-profile-image">
                                                @if(isset($sponsor->avatar))
                                                <img src="{{ asset('storage/uploads/creators/'.$sponsor->avatar) }}" class="rounded-circle" alt="Shreyu N" />
                                                @else
                                                <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" class="rounded-circle" alt="Shreyu N" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                   {{$message->message}}
                                                    @if($message->file)

                                                    @php
                                                    $file_ext = false;
                                                    $extension = pathinfo(asset('/storage/uploads/messages/creators/'.$message->user_id.'/'.$message->file), PATHINFO_EXTENSION);
                                                    $imgExtArr = ['jpg', 'jpeg', 'png'];
                                                    if(in_array($extension, $imgExtArr)){
                                                        $file_ext = true;
                                                    }
                                                    @endphp
                                                    @if($file_ext)
                                                   <img height="55" src="{{ asset('/storage/uploads/messages/creators/'.$message->user_id.'/'.$message->file) }}">
                                                   @else
                                                   <a style="color: white;" href="{{ asset('/storage/uploads/messages/creators/'.$message->user_id.'/'.$message->file) }}" download><i class="fa fa-download"></i></a>
                                                   <p>{{ $message->file }}</p>
                                                   @endif
                                                   @endif
                                                </p>
                                            </div>
                                            <p class="messtime font-12">{{ date('d-m-Y H:m a', strtotime($message->created_at)) }}</p>
                                        </div>
                                    </li>
                                    @else
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <div class="avtar-profile-image">
                                                @if(isset(auth()->user()->avatar))
                                                <img src="{{ asset('storage/uploads/sponsors/'.auth()->user()->avatar) }}" class="rounded-circle" alt="Shreyu N" />
                                                @else
                                                <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" class="rounded-circle" alt="dominic" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    {{$message->message}}
                                                    @if($message->file)

                                                    @php
                                                   $file_ext = false;
                                                    $extension = pathinfo(asset('/storage/uploads/messages/sponsors/'.auth()->user()->id.'/'.$message->file), PATHINFO_EXTENSION);
                                                    $imgExtArr = ['jpg', 'jpeg', 'png'];
                                                    if(in_array($extension, $imgExtArr)){
                                                        $file_ext = true;
                                                    }
                                                    @endphp
                                                    @if($file_ext)
                                                   <img height="55" src="{{ asset('/storage/uploads/messages/sponsors/'.auth()->user()->id.'/'.$message->file) }}">
                                                   @else
                                                   <a style="color: white;" href="{{ asset('/storage/uploads/messages/sponsors/'.auth()->user()->id.'/'.$message->file) }}" download><i class="fa fa-download"></i></a>
                                                   <p>{{ $message->file }}</p>
                                                   @endif
                                                    @endif
                                                </p>
                                            </div>
                                            <p class="messtime font-12">{{ date('d-m-Y H:m a', strtotime($message->created_at)) }}</p>
                                        </div>

                                    </li>
                                    @endif
                                    @endforeach

                                </ul>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-2 p-2">
                                            <div class="show-privew"></div>
                                            <form  class="needs-validation chatform" novalidate="" name="chat-form" id="chat-form" method="POST" action="{{ route('message.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="receiver_id" value="{{ $id }}">
                                                <div class="flex-chat">
                                                    <div class="f-width">
                                                        <input type="text" class="form-control border-0" id="messsage" name="message" placeholder="Enter your message here" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter your messsage
                                                        </div>
                                                    </div>


                                                        <div class="btn-group chatbtn">
                                                            <a href="#" class="btn btn-light">
                                                                <label for="file-select"> <i class="uil uil-paperclip" id="icon"></i> </label>
                                                                <input id="file-select"  type="file" name="file" />
                                                            </a>
                                                            <div class="d-grid">
                                                                <button type="submit" id="submitMessage" class="btn btn-primary chat-send"><i class='uil uil-message'></i></button>
                                                            </div>
                                                        </div>
       
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end chat area-->

                        <!-- start user detail -->
                        <div class="col-sm-2 col-12 paddingleft Creator-Details">
                            <div class="collabD">
                                <h5>Creator Details</h5>
                               <div class="FProfile">
                                        <div class="image">
                                            @if(isset($sponsor->showCaseData) && isset($sponsor->showCaseData[0]))
                                        <img src="{{ asset('storage/uploads/creators/service/showcase/'.$sponsor->showCaseData[0]->image_video) }}" class="img-fluid" alt="Featured Profile">
                                        @else
                                        <img src="{{ asset('assets/images/frontend/creator-placeholder.jpeg') }}" class="img-fluid" alt="Featured Profile">
                                        @endif
                                        </div>
                                        <div class="caption cc-chat">
                                            <h4>{{$sponsor->firstname}} {{$sponsor->lastname}}</h4>
                                            <p><span>@</span>{{$sponsor->username}}</p>
                                            <div class="followers">
                                                <ul class="list-inline">
                                                     @if($sponsor->instagram)
                                                     <li class="list-inline-item"><a href="https://www.instagram.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/instagram.svg') }}" alt="instagram" />{{ $sponsor->instagram_subscribers_or_followers }}</span></a></li>
                                                     @endif
                                                     @if($sponsor->youtube)
                                                     <li class="list-inline-item"><a href="https://youtube.com/" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/youtube-icon.svg') }}" alt="instagram" />{{ $sponsor->youtube_subscribers_or_followers }}</span></a></li>
                                                     @endif
                                                     @if($sponsor->tiktok)
                                                     <li class="list-inline-item"><a href="https://www.tiktok.com/login" target="_blank"><span><img src="{{ asset('assets/images/frontend/icons/tiktok-icon.svg') }}" alt="instagram" />{{ $sponsor->tiktok_subscribers_or_followers }}</span></a></li>
                                                     @endif
                                                </ul>
                                            </div>
                                        </div>

                                        @if($sponsor->categories && count($sponsor->categories))
                                        <div class="category">
                                            <p><b>Category:</b>
                                                <ul class="list-inline">
                                                    @foreach($sponsor->categories as $category)
                                                    <li><a href="#"><span>{{ @$category->category->name }}</span></a></li>
                                                    @endforeach
                                                </ul>
                                            </p>
                                        </div>
                                        @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">

    $( document ).ready(function() {
        $('.simplebar-content-wrapper').scrollTop($('.conversation .simplebar-content').height());
    });

    $('.filter-records').on('keyup', function () {
        var content1 = $(this).val();
        if(content1.length > 0){
            var content = content1.charAt(0) + content1.slice(1);
        }else{
            var content = content1.charAt(0);
        }
        $('.chat-list').find('a.filter_names:contains(' + content + ')').show();
        $('.chat-list').find('a.filter_names:not(:contains(' + content + '))').hide();
    });

</script>

<script type="text/javascript">

    $(document).on('change', '#file-select', function(event) {
        $("#messsage").attr('required', false);
         $(".show-privew").html('');
        if($(this).prop('files').length > 0)
        {
            file =$(this).prop('files')[0];
            $(".show-privew").html('Selected file: '+file.name);
        }
    });


    $('#submitMessage').click(function(e){
        $(".show-privew").html('');
        $(".invalid-feedback").hide();
            e.preventDefault();
            var message = $('[name="message"]').val();
            var receiver_id = $('[name="receiver_id"]').val();
            var file = $('[name="file"]').prop('files')[0];

            if (file == '' || file == undefined) {
                if (message == '') {
                    $(".invalid-feedback").show();
                    return false;
                }
            }else{
                $(".invalid-feedback").hide();
            }

            formdata = new FormData();
            if($('[name="file"]').prop('files').length > 0)
            {
                formdata.append("_token", "{{ csrf_token() }}");
                formdata.append("file", file);
            }
            formdata.append("message", message);
            formdata.append("receiver_id", receiver_id);

            jQuery.ajax({
                url: "{{ route('storeConversations') }}",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (result) {
                    $(".show-privew").html('');
                    $('[name="message"]').val('');
                    $('[name="file"]').val(null);
                    $(".conversation-list .simplebar-content").append(result);
                    $('.simplebar-content-wrapper').scrollTop($('.conversation .simplebar-content').height());
                }
            });
        });

    setInterval(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var value = $('[name="receiver_id"]').val();
        var user = "{{Auth::user()->id}}";
        $.ajax({
            url: "{{ url('getConversations') }}",
            method: "get",
            data: {
                id: value
            },
            success: function(data){
                $(".conversation-list .simplebar-content").append(data);
            }
        })
    }, 2500);
</script>

@endpush
