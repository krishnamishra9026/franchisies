@extends('layouts.franchisor')
@section('title', 'Add Buyer')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<div class="content">

    <div class="container-fluid">
        <div class="card mt-3 mb-2">
            <div class="card-body">
                <form method="POST" action="{{ route('franchisor.brands.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <fieldset>
                        <legend><strong>Login Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Email* (Username)</label>
                            <div class="col-sm-12">
                                <input id="email" type="email"  class="form-control" name="email" required  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Password*</label>
                            <div class="col-sm-12">
                                <input id="password" type="text"  class="form-control" name="password" required >
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Business Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Category*</label>
                            <div class="col-sm-12">

                                <select name="category" class="form-control" required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>





                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Name*</label>
                            <div class="col-sm-12">
                                <input id="brandname" type="text"  class="form-control" name="brandname" required >
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand URL*</label>
                            <div class="col-sm-12">
                                <input id="brandurl" type="text"  class="form-control" name="brandurl" required >
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Type*</label>
                            <div class="col-sm-12">
                                <input id="brandtype" type="text"  class="form-control" name="brandtype" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Established*</label>
                            <div class="col-sm-12">
                                <select name="established" class="form-control">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="basicText" class="form-label">Description*</label>
                            <div class="col-sm-12">
                                <input id="bdescr" type="text"  class="form-control" name="bdescr" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Started*</label>
                            <div class="col-sm-12">
                                <select name="brandstarted" class="form-control">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Investment </label>
                            <div class="col-sm-12">
                                <input id="investment" type="text"  class="form-control" name="investment" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Space required </label>
                            <div class="col-sm-12">
                                <input id="space_req" type="text"  class="form-control" name="space_req" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Outlets </label>
                            <div class="col-sm-12">
                                <input id="boutlats" type="text"  class="form-control" name="boutlats" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Search Price Range*</label>
                            <div class="col-sm-12">

                                <select name="prange" class="form-control">
                                    <option value="10,000 to 3 Lacs">10,000 to 3 Lacs</option>
                                    <option value="3 lacs to 5 lacs">3 lacs to 5 lacs</option>
                                    <option value="5 lacs to 10 lacs">5 lacs to 10 lacs</option>
                                    <option value="10 lacs to 20 lacs">10 lacs to 20 lacs</option>
                                    <option value="20 lacs to 50 lacs">20 lacs to 50 lacs</option>
                                    <option value="More Than 50 lacs">More Than 50 lacs</option>
                                </select>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="basicText" class="form-label">Member Of Brand</label>
                            <div class="col-sm-12">
                                <input id="memberofbrand" type="text"  class="form-control" name="memberofbrand"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Mobile Number</label>
                            <div class="col-sm-12">
                                <input id="anumber" type="number"  class="form-control" name="brandnumber"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">State*</label>
                            <div class="col-sm-12">
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
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Investment Requirements :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Single Unit</label>
                            <div class="col-sm-12">
                                <input id="singleunit" type="text"  class="form-control" name="singleunit"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Franchise Fee</label>
                            <div class="col-sm-12">
                                <input id="brandfee" type="text"  class="form-control" name="brandfee"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Equipments</label>
                            <div class="col-sm-12">
                                <input id="equipments" type="text"  class="form-control" name="equipments"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Furniture and Fixture</label>
                            <div class="col-sm-12">
                                <input id="furniture" type="text"  class="form-control" name="furniture"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Advertising / Marketing</label>
                            <div class="col-sm-12">
                                <input id="advertising" type="text"  class="form-control" name="advertising"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Expected Pay Back Period</label>
                            <div class="col-sm-12">
                                <input id="paybackp" type="text"  class="form-control" name="paybackp"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Any other investment Needed</label>
                            <div class="col-sm-12">
                                <input id="anyotherinvi" type="text"  class="form-control" name="anyotherinvi"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Looking Expansion in Areas</label>
                            <div class="col-sm-12">
                                <input id="lookexpansion" type="text"  class="form-control" name="lookexpansion"  >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="basicText" class="form-label">The expected return on investment to the Brand</label>
                            <div class="col-sm-12">
                                <input id="returnoninv" type="text"  class="form-control" name="returnoninv"  >
                            </div>
                        </div> 

                    </fieldset>   


                    <fieldset>  <legend><strong>Brand Property Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Required Property for this brand opportunity</label>
                            <div class="col-sm-12">
                                <input id="reqproperty" type="text"  class="form-control" name="reqproperty"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label for="basicText" class="form-label">Required Floor Area</label>-->
                            <label for="basicText" class="form-label">Single unit space required</label>
                            <div class="col-sm-12">
                                <input id="floorarea" type="text"  class="form-control" name="floorarea"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Preferred Location for Unit Brand</label>
                            <div class="col-sm-12">
                                <input id="locationbrand" type="text"  class="form-control" name="locationbrand"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Office Staff Required</label>
                            <div class="col-sm-12">
                                <input id="officestaff" type="text"  class="form-control" name="officestaff"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Computer System</label>
                            <div class="col-sm-12">
                                <input id="comsyatem" type="text"  class="form-control" name="comsyatem"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Internet Connection</label>
                            <div class="col-sm-12">
                                <input id="internetreq" type="text"  class="form-control" name="internetreq"  >
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Training Details :</strong></legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Field assistance available for brand</label>
                            <div class="col-sm-12">
                                <input id="fieldassis" type="text"  class="form-control" name="fieldassis"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Traning programme</label>
                            <div class="col-sm-12">
                                <input id="trainingprogm" type="text"  class="form-control" name="trainingprogm"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Detailed Operating Manuals for Brand</label>
                            <div class="col-sm-12">
                                <input id="opermanual" type="text"  class="form-control" name="opermanual"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Need of IT Systems</label>
                            <div class="col-sm-12">
                                <input id="needit" type="text"  class="form-control" name="needit"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Assistance from Head office to Brand</label>
                            <div class="col-sm-12">
                                <input id="headofficeassis" type="text"  class="form-control" name="headofficeassis"  >
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Website Details :</strong> </legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Website </label>
                            <div class="col-sm-12">
                                <input id="website" type="text" value="http://"  class="form-control" name="website"  >
                            </div>
                        </div>
                    </fieldset> <fieldset>
                        <legend><strong>Brand Other Details :</strong> </legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Franchise Term</label>
                            <div class="col-sm-12">
                                <input id="brandterm" type="text"  class="form-control" name="brandterm"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Priority</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="proirity">
                                @foreach (range(0, 5000) as $item) {
                                    <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>                 
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Have standard Brand Agreement</label>
                                <div class="col-sm-12">
                                    <input id="brandagreement" type="radio" value="Yes"   name="brandagreement" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandagreement" type="radio" value="No"  name="brandagreement"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Growing Business Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="busiopertunity" type="radio" value="Yes"   name="busiopertunity" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="busiopertunity" type="radio" value="No"  name="busiopertunity"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this whats new</label>
                                <div class="col-sm-12">
                                    <input id="whatsnew" type="radio" value="Yes"   name="whatsnew" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="whatsnew" type="radio" value="No"  name="whatsnew"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Featured Brand Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="brandopon" type="radio" value="Yes"   name="brandopon" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandopon" type="radio" value="No"  name="brandopon"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Home Page Brand</label>
                                <div class="col-sm-12">
                                    <input id="brandhomepage" type="radio" value="Yes"   name="brandhomepage" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandhomepage" type="radio" value="No"  name="brandhomepage"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Top Logo Brand</label>
                                <div class="col-sm-12">
                                    <input id="toplogo" type="radio" value="Yes"   name="toplogo" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="toplogo" type="radio" value="No"  name="toplogo"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Is This popular Brand</label>
                                <div class="col-sm-12">
                                    <input id="popubrand" type="radio" value="Yes"   name="popubrand" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="popubrand" type="radio" value="No"  name="popubrand"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this premium</label>
                                <div class="col-sm-12">
                                    <input id="ispremium" type="radio" value="Yes"   name="ispremium" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="ispremium" type="radio" value="No"  name="ispremium"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this new arrival brand</label>
                                <div class="col-sm-12">
                                    <input id="isnewarrival" type="radio" value="Yes"   name="isnewarrival" style=" margin:10px 0 0;"> &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="isnewarrival" type="radio" value="No"  name="isnewarrival"  style=" margin:10px 0 0;"> &nbsp;&nbsp;No
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this top premium</label>
                                <div class="col-sm-12">
                                    <input id="ispremiumtop" type="radio" value="Yes"   name="ispremiumtop" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="ispremiumtop" type="radio" value="No"  name="ispremiumtop"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Master Brand Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="masterbrand" type="radio" value="Yes"   name="masterbrand" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="masterbrand" type="radio" value="No"  name="masterbrand"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div><div class="form-group">
                                <label for="basicText" class="form-label">Verified Brand</label>
                                <div class="col-sm-12">
                                    <input id="verifybrand" type="radio" value="Yes"   name="verifybrand" style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="verifybrand" type="radio" value="No"  name="verifybrand"  style=" margin:10px 0 0;"  checked > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Business Overview</label>
                                <div class="col-sm-12">
                                    <textarea id="detailx" name="busioverview" class="form-control summernote" ></textarea>

                                </div>
                            </div>

                        </fieldset> <fieldset>
                            <legend><strong>Brand Video :</strong> </legend>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Video Url <small>(embeded you tube url)</small></label>
                                <div class="col-sm-12">
                                    <input id="anumber" type="text"  name="video_url"  class="form-control">

                                </div>
                            </div>
                        </fieldset> <fieldset>
                            <legend><strong>Brand Images :</strong> </legend>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Logo (png,jpg)(103 X 55)</label>
                                <div class="col-sm-12">
                                    <input id="anumber" type="file"  name="logo"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Animated Image (png,jpg,gif) (220 X 112)</label>
                                <div class="col-sm-12">
                                    <input id="anumber" type="file"   name="banner"  >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Banner Image (png,jpg) (1600 X 500)</label>
                                <div class="col-sm-3">
                                    <input id="anumber" type="file"   name="tbanner"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 1 (png,jpg)</label>
                                <div class="col-sm-3">
                                    <input id="" type="file"   name="tbanner1"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 2 (png,jpg)</label>
                                <div class="col-sm-3">
                                    <input id="" type="file"   name="tbanner2"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 3 (png,jpg)</label>
                                <div class="col-sm-3">
                                    <input id="" type="file"   name="tbanner3"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 4 (png,jpg)</label>
                                <div class="col-sm-3">
                                    <input id="" type="file"   name="tbanner4"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 5 (png,jpg)</label>
                                <div class="col-sm-3">
                                    <input id="" type="file"   name="tbanner5"  >
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="basicText" class="form-label">Brand PPT (pdf)</label>
                                <div class="col-sm-3">
                                    <input id="ppt" type="file"   name="ppt"  >
                                </div>
                            </div>
                            <div class="col-sm-3">Home Page Priority

                                    <select class="form-control" name="priorityhome">
                                @foreach (range(0, 5000) as $item) {
                                        <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach  
                                    </select> 
                            </div>

                            <div class="col-sm-3">Category Priority
                                    <select class="form-control" name="prioritycat">
                                 @foreach (range(0, 5000) as $item) {
                                        <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach 
                                    </select> 
                            </div>


                        </div>

                        <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status') == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status') == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


                    </fieldset>

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">

        $(document).ready(function() {

          $('.summernote').summernote();

        });

    </script>

@endpush