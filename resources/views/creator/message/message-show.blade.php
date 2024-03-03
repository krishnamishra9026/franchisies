@extends('layouts.creator')
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
                                                <a href="{{ route('creator.message.show', $user->id) }}" class="text-body filter_names filterlist">
                                                    <div class="d-flex chatuserlist align-items-start @if($id == $user->id) bg-active @endif mt-1 p-2">
                                                        <div class="proimg">
                                                            <div class="user-profile-image">
                                                                @if(isset($user->avatar))
                                                                <img src="{{ asset('storage/uploads/sponsors/'.$user->avatar) }}" class="me-2 rounded-circle" height="48" alt="{{ $user->first_name }}" />
                                                                @else
                                                                <img src="/assets/images/thumbnails/user-profile-placeholder.png" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
                                                                @endif
                                                            </div>
                                                            <span class="online"></span>
                                                        </div>
                                                        <div class="w-100 overflow-hidden" style="margin-left: 10px">
                                                            <h5 class="mt-1 mb-0 font-13">
                                                                <span class="float-end font-11 usertime">{{ $user->last_message_at }}</span>
                                                                {{ $user->first_name }} {{ $user->last_name }}
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
                                    <h5>{{@$creator->first_name}} {{@$creator->last_name}}</h5>
                                    <p><span>@</span>{{@$creator->username}}</p>
                                </div>
                                <ul class="conversation-list" data-simplebar>
                                    @foreach($messages as $message)
                                    @if($message->sender == 'sponsor')
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <div class="avtra-profile-image">
                                                @if(isset($creator->avatar))
                                                <img src="{{ asset('storage/uploads/sponsors/'.$creator->avatar) }}" class="rounded-circle" alt="Shreyu N" />
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
                                                   @if(checkFileTypeIsImage(asset('/storage/uploads/messages/sponsors/'.$message->user_id.'/'.$message->file)))
                                                   <img height="45" src="{{ asset('/storage/uploads/messages/sponsors/'.$message->user_id.'/'.$message->file) }}">
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
                                    @else
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            @if(isset(auth()->user()->avatar))
                                            <img src="{{ asset('storage/uploads/creators/'.auth()->user()->avatar) }}" class="rounded-circle" alt="Shreyu N" />
                                            @else
                                            <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" class="rounded-circle" alt="dominic" />
                                            @endif
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <p>
                                                    {{$message->message}}
                                                    @if($message->file)
                                                    @if(checkFileTypeIsImage(asset('/storage/uploads/messages/creators/'.auth()->user()->id.'/'.$message->file)))
                                                    <p>
                                                        <img height="55" src="{{ asset('/storage/uploads/messages/creators/'.auth()->user()->id.'/'.$message->file) }}">
                                                    </p>
                                                    @else
                                                    <a style="color: white;" href="{{ asset('/storage/uploads/messages/creators/'.auth()->user()->id.'/'.$message->file) }}" download><i class="fa fa-download"></i></a>
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
                                            <form  class="needs-validation chatform" novalidate="" name="chat-form" id="chat-form" method="POST" action="{{ route('creator.message.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="receiver_id" value="{{ $id }}">
                                                <div class="flex-chat">
                                                    <div class="f-width">
                                                        <input type="text" name="message" id="messsage" class="form-control border-0" placeholder="Enter your message here" required="">
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
                        <div class="col-sm-2 col-12 Creator-Details">
                            <div class="collabD">
                                <h5>Sponsor Details</h5>
                                <div class="FProfile">
                                    <div class="image">
                                        @if(isset($creator->campaign()->image))
                                        <img src="{{ asset('storage/uploads/campaigns/'.$creator->campaign()->image) }}" class="img-fluid" alt="Featured Profile">
                                        @elseif(isset($creator->campaignLast()->image))
                                        <img src="{{ asset('storage/uploads/campaigns/'.$creator->campaignLast()->image) }}" class="img-fluid" alt="Featured Profile">
                                        @else
                                        <img src="{{ asset('assets/images/thumbnails/user-profile-placeholder.png') }}" class="img-fluid" alt="Featured Profile">
                                        @endif
                                    </div>
                                    <div class="caption cc-chat">
                                        <h4>{{ $creator->first_name }} {{ $creator->last_name }}</h4>
                                        <p><span>@</span>{{ $creator->username }}</p>

                                    </div>

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
                url: "{{ route('creator.storeConversations') }}",
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
            url: "{{ route('creator.getConversations') }}",
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
