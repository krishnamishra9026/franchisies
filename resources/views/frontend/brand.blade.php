@extends('layouts.app')
@section('title', @$brand->firstname.' '. @$brand->lastname.' - '.@$brand->talent_title.' | Winwinpromo')
@section('description', \Str::limit(@$brand->bio, 200))

@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
<style type="text/css">

/*++++++++++++ 10-03-2024 ++++++++++++*/
.brand_fea{
    color: #333;
    margin: 20px 0 0;
    background: #fee8fe;
    border-radius: 4px;
    border: 1px solid #dbdbdb;
    padding: 30px;
    text-align: center;
}
.borderRight{
    border-right: 1px solid #000;
}
.tableUpperDiv p{
    margin: 0 !important;
}
.formSticky{
    position: sticky;
    top: 10px;
}
.scrollFix{
    max-height: 320px;
    overflow: auto;
}
</style>
@endsection

@section('content')

<div class="Profileshow">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="FDetails BoxShadow">
                    <div class="row">

                            <div class="col-3">

                                <div class="user-profile">
                                    @if(isset($brand->logo))
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/logo/'.$brand->logo) }}" class="img-fluid" alt="Featured Profile">
                                    @else
                                    <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                    @endif
                                </div>

                            </div>

                            <div class="col-9">
                                <h3>Brand Name: {{ @$brand->brandname }}</h3>
                                <h5>Brand Category: {{ @$brand->categoryData->name }}</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row brand_fea" style="">
                    <div class="col-md-4 borderRight" style="">
                        <strong>Investment Required  </strong> <br><span>{{ $brand->investment }}</span>
                    </div>
                    <div class="col-md-4 borderRight" style="">
                     <strong>Space Required  </strong> <br> <span>{{ $brand->space_req }}</span>
                 </div>
                 <div class="col-md-4">
                     <strong>Franchise Outlets  </strong> <br> <span> {{ $brand->boutlats }} </span>
                 </div>
             </div>
         </div>

         <!-- <div class=" "> -->
            <div class="col-sm-12 col-12 margintop">
                <div class="mywork BoxShadow">
                    <div class="panel-heading">My work showcase</div>
                    <div id="mywork" class="splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                <div class="splide__slide">
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner1/'.$brand->tbanner1) }}" class="img-fluid w-100">                                    
                                </div>
                                <div class="splide__slide">
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner2/'.$brand->tbanner2) }}" class="img-fluid w-100">                                    
                                </div>
                                <div class="splide__slide">
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner3/'.$brand->tbanner3) }}" class="img-fluid w-100">                                    
                                </div>
                                <div class="splide__slide">
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner4/'.$brand->tbanner4) }}" class="img-fluid w-100">                                    
                                </div>

                                <div class="splide__slide">
                                    <img src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner5/'.$brand->tbanner5) }}" class="img-fluid w-100">                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->

            <div class="col-md-12 margintop">
                <div class="row">
                    <div class="col-md-9">
                        <div class="BoxShadow p-3">
                            <h4>BUSINESS DETAILS</h4>
                            <div class="scrollFix">
                                {!! $brand->busioverview !!}
                            </div>
                        </div>

                        <div class="BoxShadow p-3 margintop">
                            <h4>FRANCHISE INVESTMENT REQUIREMENTS:</h4>
                            <div class="table table-responsive tableUpperDiv">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td valign="center"><p><strong>Single Unit :</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->singleunit }}</p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Brand Fee : </strong></p></td>
                                            <td valign="center"><p>{{ $brand->brandfee }} </p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Equipments :</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->equipments }}</p></td> 
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Furniture And Fixtures:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->furniture }} </p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Advertising / Marketing :</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->advertising }}</p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Expected Pay Back Period:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->paybackp }}</p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>The Expected Return <br>On Investment To The Franchisee: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->paybackp }} </p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Any Other Investment Needed:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->anyotherinvi }}</p></td>
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Looking Expansion In Areas: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->lookexpansion }}</p></td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="BoxShadow p-3 margintop">
                            <h4>FRANCHISEE TRAINING DETAILS::</h4>
                            <div class="table table-responsive tableUpperDiv">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-7" valign="center"><p><strong>Field  Assistance Available  For  Franchisees:</strong> </p></td>
                                            <td class="col-md-5" valign="center"><p>{{ $brand->fieldassis }} </p></td>   
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Franchise   Traning programme: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->trainingprogm }}  </p></td>  
                                        </tr>

                                        <tr>
                                            <td valign="center"><p><strong>Detailed  Operating Manuals  For Franchisees: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->opermanual }}  </p></td> 
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Need  of IT System:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->needit }}   </p></td>   
                                        </tr>
                                        <tr>
                                            <td><p><strong>Assistance  From Head Office To Franchisee:</strong> </p></td>
                                            <td><p>{{ $brand->headofficeassis }}</p></td>  
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="BoxShadow p-3 margintop">
                            <h4>FRANCHISE INVESTMENT REQUIREMENTS:</h4>
                            <div class="table table-responsive tableUpperDiv">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="" valign="center"><p><strong>Required Property For This Franchise Opportunity:</strong> </p></td>
                                            <td class="" valign="center"><p>{{ $brand->reqproperty }} </p></td>  
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Required  &nbsp;Floor&nbsp;Area:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->floorarea }}</p></td> 
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Preferred  &nbsp;Location  &nbsp;For Unit  &nbsp;Franchise:</strong> </p></td>
                                            <td valign="center"><p>{{ $brand->locationbrand }} </p></td> 
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Office  &nbsp;Staff&nbsp;Required: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->officestaff }}</p></td>   
                                        </tr>
                                        <tr>
                                            <td valign="center"><p><strong>Computer &nbsp;/&nbsp;System&nbsp;: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->comsyatem }}</p></td>  
                                        </tr>

                                        <tr>
                                            <td valign="center"><p><strong>Internet &nbsp;Connection&nbsp;: </strong></p></td>
                                            <td valign="center"><p>{{ $brand->internetreq }} </p></td>  
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--  -->
                        <div class="BoxShadow p-3 margintop">
                            <h4>FRANCHISE INVESTMENT REQUIREMENTS:</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="">Franchise Website Details:</h5>
                                    <div class="table table-responsive tableUpperDiv">
                                        <table class="table table-bordered">
                                            <tbody><tr>
                                                <td class="" valign="center"><p><strong>Email</strong> </p></td>
                                                <td class="" valign="center"><p>{{ $brand->email }}</p></td>    </tr>
                                                <tr>
                                                    <td valign="center"><p><strong>Website Url</strong> </p></td>
                                                    <td valign="center"><p><a href="{{ $brand->brandurl }}" target="_blank" rel="nofollow"> {{ $brand->website }}</a> </p></td> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <section id="5">
                                        <div class="des_main_box">
                                            <h5 class="">Franchisee Other Details:</h5>
                                            <div class="table table-responsive tableUpperDiv">
                                                <table class="table table-bordered">
                                                    <tbody><tr>
                                                        <td class="" valign="center"><p><strong>Have  standard Franchise  Agreement: </strong> </p></td>
                                                        <td class="" valign="center"><p>{{ $brand->brandagreement }}</p></td>    </tr>
                                                        <tr>
                                                            <td valign="center"><p><strong>Franchise  Term: </strong></p></td>
                                                            <td valign="center"><p>{{ $brand->brandterm }}</p></td> 
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                </div>    
                            </div>
                        </div>
                        <!--  -->
              </div>
              <div class="col-md-3">
                <div class="BoxShadow p-3 formSticky">
                    <h4>APPLY FOR FRANCHISE:</h4>
                    <form>
                        <div class="form-group mb-2">
                            <input type="text" name="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" name="" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group mb-2">
                            <input type="number" name="" class="form-control" placeholder="Mobile no.">
                        </div>
                        <div class="form-group mb-2">
                            <select class="form-control">
                                <option>India</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <select name="state" class="form-control">
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Daman &amp; Diu">Daman &amp; Diu</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal&nbsp;Pradesh">Himachal&nbsp;Pradesh</option>
                                <option value="Jammu &amp;&nbsp;Kashmir">Jammu &amp;&nbsp;Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                             </select>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="" class="form-control" placeholder="City">
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" name="" class="form-control" placeholder="Zip Code">
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control" placeholder="Address"></textarea>
                        </div>
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input border" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I/We have carefully read and agree to the terms and conditions .</label>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary w-100 mt-2" id="applynow" name="applynow" value="APPLY NOW">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(@$brand->pricingData || @$brand->categories)
    <div class="row margintop">
        <div class="col-sm-12 col-12">
            <div class="ContentType BoxShadow">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h5>Content Type</h5>
                        @if(@$brand->pricingData && count(@$brand->pricingData))
                        <div class="creator-Category">
                            <ul class="list-inline">
                                @foreach(@$brand->pricingData as $charges)
                                <li>{{ $charges->service_detail }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-12">
                        <h5>About my Social Media Platform</h5>
                        @if(@$brand->categories && count(@$brand->categories))
                        <div class="creator-Category">
                            <ul class="list-inline">
                                @foreach(@$brand->categories as $category)
                                <li>{{ @$category->category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
     new Splide('#mywork', {
        perPage: 1,
        perMove: 1,
        gap    : '1rem',
        pagination: false,
        breakpoints: {
            767: {
                perPage: 2,
                gap    : '.8rem',
            },
            575: {
                perPage: 1,
                gap    : '.8rem',
            },
        },
    }).mount();

 } );
</script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        new Splide('#consumers', {
            perPage: 4,
            perMove: 1,
            gap    : '1rem',
            pagination: false,
            breakpoints: {
                767: {
                    perPage: 2,
                    gap    : '.8rem',
                },
                575: {
                    perPage: 1,
                    gap    : '.8rem',
                },
            },
        }).mount();
    } );
</script>

<script type="text/javascript">



    $(document).on('submit','#contactForm',function(e){
        e.preventDefault();
        console.log($(this).serialize())
        $.ajax({
            method: 'post',
            url: "{{ route('save-conatct-us') }}",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg.success){
                    $(".show-sucess-message").show().html(msg.message);
                    setTimeout(() => {
                        $("#contactForm")[0].reset();
                        $(".show-sucess-message").hide().html('');
                        $("#click-close").trigger('click');
                    }, 2000)
                }else{
                    alert('Something went wrong!');
                }
                console.log(msg);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("some error");
            }
        });
    });


</script>
@endpush
