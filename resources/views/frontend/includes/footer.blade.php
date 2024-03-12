@php
$setting = \DB::table('website_settings')->first();
$pages = \DB::table('information_page_management')->get(['slug', 'name', 'id']);

@endphp

@php
use App\Models\WebsiteSetting;
$setting = WebsiteSetting::first();
$logo = $setting ? asset('storage/uploads/logo/'.$setting->logo) : asset('assets/images/frontend/winlogo-white.png');
$footer_logo = $setting ? asset('storage/uploads/logo/'.$setting->footer_logo) : asset('assets/images/frontend/winlogo-black.png');
@endphp
<footer class="Hfooter">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="footerinfo footerinfoM">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <ul class="list-inline">
                            <li><a target="_blank" href="/blogs">Blogs</a></li>
                            @if(count($pages))
                            @foreach($pages as $page)
                            <li><a href="{{ route('pages',$page->slug) }}">{{$page->name}}</a></li>
                            @endforeach
                            @endif
                            <li><a href="{{ route('support') }}">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
   
        </div>
    </div>
    <div class="row footerB">
        <div class="col-sm-5">
            <div class="copyright">
                <p>&copy; {{ $setting->copyright_text }} </p>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="footerinfo footerinfoD">
                <ul class="list-inline">
                    <li><a target="_blank" href="/blogs">Blogs</a></li>
                    @if(count($pages))
                    @foreach($pages as $page)
                    <li><a href="{{ route('pages',$page->slug) }}">{{$page->name}}</a></li>
                    @endforeach
                    @endif
                    <li><a href="{{ route('support') }}">Support</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
</footer>
