@extends('layouts.admin')
@section('title', 'Edit Buyer')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<div class="content">


    <div class="container-fluid">
        <div class="card mt-3 mb-2">
            <div class="card-body">

                <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    
                    <fieldset>
                        <legend><strong>Login Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Email* (Username)</label>
                            <div class="col-sm-12">
                                <input id="email" type="email"  class="form-control" name="email" value="{{ $brand->email }}" required  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Password*</label>
                            <div class="col-sm-12">
                                <input id="password" type="password"  class="form-control" name="password" value="{{ $brand->password }}" required >
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Business Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Category*</label>
                            <div class="col-sm-12">

                                <select name="category" value="{{ $brand->category }}" class="form-control">
                                    @foreach($categories as $category)
                                    <option @if($brand->category == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>





                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Name*</label>
                            <div class="col-sm-12">
                                <input id="brandname" type="text"  class="form-control" name="brandname" value="{{ $brand->brandname }}" required >
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand URL*</label>
                            <div class="col-sm-12">
                                <input id="brandurl" type="text"  class="form-control" name="brandurl" value="{{ $brand->brandurl }}" required >
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Type*</label>
                            <div class="col-sm-12">
                                <input id="brandtype" type="text"  class="form-control" name="brandtype" value="{{ $brand->brandtype }}" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Established*</label>
                            <div class="col-sm-12">
                                <select name="established" value="{{ $brand->established }}" class="form-control">
                                    <option @if($brand->established == '2024') selected @endif value="2024">2024</option>
                                    <option @if($brand->established == '2023') selected @endif value="2023">2023</option>
                                    <option @if($brand->established == '2022') selected @endif value="2022">2022</option>
                                    <option @if($brand->established == '2021') selected @endif value="2021">2021</option>
                                    <option @if($brand->established == '2020') selected @endif value="2020">2020</option>
                                    <option @if($brand->established == '2019') selected @endif value="2019">2019</option>
                                    <option @if($brand->established == '2018') selected @endif value="2018">2018</option>
                                    <option @if($brand->established == '2017') selected @endif value="2017">2017</option>
                                    <option @if($brand->established == '2016') selected @endif value="2016">2016</option>
                                    <option @if($brand->established == '2015') selected @endif value="2015">2015</option>
                                    <option @if($brand->established == '2014') selected @endif value="2014">2014</option>
                                    <option @if($brand->established == '2013') selected @endif value="2013">2013</option>
                                    <option @if($brand->established == '2012') selected @endif value="2012">2012</option>
                                    <option @if($brand->established == '2011') selected @endif value="2011">2011</option>
                                    <option @if($brand->established == '2010') selected @endif value="2010">2010</option>
                                    <option @if($brand->established == '2009') selected @endif value="2009">2009</option>
                                    <option @if($brand->established == '2008') selected @endif value="2008">2008</option>
                                    <option @if($brand->established == '2007') selected @endif value="2007">2007</option>
                                    <option @if($brand->established == '2006') selected @endif value="2006">2006</option>
                                    <option @if($brand->established == '2005') selected @endif value="2005">2005</option>
                                    <option @if($brand->established == '2004') selected @endif value="2004">2004</option>
                                    <option @if($brand->established == '2003') selected @endif value="2003">2003</option>
                                    <option @if($brand->established == '2002') selected @endif value="2002">2002</option>
                                    <option @if($brand->established == '2001') selected @endif value="2001">2001</option>
                                    <option @if($brand->established == '2000') selected @endif value="2000">2000</option>
                                    <option @if($brand->established == '1999') selected @endif value="1999">1999</option>
                                    <option @if($brand->established == '1998') selected @endif value="1998">1998</option>
                                    <option @if($brand->established == '1997') selected @endif value="1997">1997</option>
                                    <option @if($brand->established == '1996') selected @endif value="1996">1996</option>
                                    <option @if($brand->established == '1995') selected @endif value="1995">1995</option>
                                    <option @if($brand->established == '1994') selected @endif value="1994">1994</option>
                                    <option @if($brand->established == '1993') selected @endif value="1993">1993</option>
                                    <option @if($brand->established == '1992') selected @endif value="1992">1992</option>
                                    <option @if($brand->established == '1991') selected @endif value="1991">1991</option>
                                    <option @if($brand->established == '1990') selected @endif value="1990">1990</option>
                                    <option @if($brand->established == '1989') selected @endif value="1989">1989</option>
                                    <option @if($brand->established == '1988') selected @endif value="1988">1988</option>
                                    <option @if($brand->established == '1987') selected @endif value="1987">1987</option>
                                    <option @if($brand->established == '1986') selected @endif value="1986">1986</option>
                                    <option @if($brand->established == '1985') selected @endif value="1985">1985</option>
                                    <option @if($brand->established == '1984') selected @endif value="1984">1984</option>
                                    <option @if($brand->established == '1983') selected @endif value="1983">1983</option>
                                    <option @if($brand->established == '1982') selected @endif value="1982">1982</option>
                                    <option @if($brand->established == '1981') selected @endif value="1981">1981</option>
                                    <option @if($brand->established == '1980') selected @endif value="1980">1980</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="basicText" class="form-label">Description*</label>
                            <div class="col-sm-12">
                                <input id="bdescr" type="text"  class="form-control" name="bdescr" value="{{ $brand->bdescr }}" required >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Started*</label>
                            <div class="col-sm-12">
                                <select name="brandstarted" value="{{ $brand->brandstarted }}" class="form-control">
                                    <option  @if($brand->brandstarted == '2024') selected @endif  value="2024">2024</option>
                                    <option  @if($brand->brandstarted == '2023') selected @endif  value="2023">2023</option>
                                    <option  @if($brand->brandstarted == '2022') selected @endif  value="2022">2022</option>
                                    <option  @if($brand->brandstarted == '2021') selected @endif  value="2021">2021</option>
                                    <option  @if($brand->brandstarted == '2020') selected @endif  value="2020">2020</option>
                                    <option  @if($brand->brandstarted == '2019') selected @endif  value="2019">2019</option>
                                    <option  @if($brand->brandstarted == '2018') selected @endif  value="2018">2018</option>
                                    <option  @if($brand->brandstarted == '2017') selected @endif  value="2017">2017</option>
                                    <option  @if($brand->brandstarted == '2016') selected @endif  value="2016">2016</option>
                                    <option  @if($brand->brandstarted == '2015') selected @endif  value="2015">2015</option>
                                    <option  @if($brand->brandstarted == '2014') selected @endif  value="2014">2014</option>
                                    <option  @if($brand->brandstarted == '2013') selected @endif  value="2013">2013</option>
                                    <option  @if($brand->brandstarted == '2012') selected @endif  value="2012">2012</option>
                                    <option  @if($brand->brandstarted == '2011') selected @endif  value="2011">2011</option>
                                    <option  @if($brand->brandstarted == '2010') selected @endif  value="2010">2010</option>
                                    <option  @if($brand->brandstarted == '2009') selected @endif  value="2009">2009</option>
                                    <option  @if($brand->brandstarted == '2008') selected @endif  value="2008">2008</option>
                                    <option  @if($brand->brandstarted == '2007') selected @endif  value="2007">2007</option>
                                    <option  @if($brand->brandstarted == '2006') selected @endif  value="2006">2006</option>
                                    <option  @if($brand->brandstarted == '2005') selected @endif  value="2005">2005</option>
                                    <option  @if($brand->brandstarted == '2004') selected @endif  value="2004">2004</option>
                                    <option  @if($brand->brandstarted == '2003') selected @endif  value="2003">2003</option>
                                    <option  @if($brand->brandstarted == '2002') selected @endif  value="2002">2002</option>
                                    <option  @if($brand->brandstarted == '2001') selected @endif  value="2001">2001</option>
                                    <option  @if($brand->brandstarted == '2000') selected @endif  value="2000">2000</option>
                                    <option  @if($brand->brandstarted == '1999') selected @endif  value="1999">1999</option>
                                    <option  @if($brand->brandstarted == '1998') selected @endif  value="1998">1998</option>
                                    <option  @if($brand->brandstarted == '1997') selected @endif  value="1997">1997</option>
                                    <option  @if($brand->brandstarted == '1996') selected @endif  value="1996">1996</option>
                                    <option  @if($brand->brandstarted == '1995') selected @endif  value="1995">1995</option>
                                    <option  @if($brand->brandstarted == '1994') selected @endif  value="1994">1994</option>
                                    <option  @if($brand->brandstarted == '1993') selected @endif  value="1993">1993</option>
                                    <option  @if($brand->brandstarted == '1992') selected @endif  value="1992">1992</option>
                                    <option  @if($brand->brandstarted == '1991') selected @endif  value="1991">1991</option>
                                    <option  @if($brand->brandstarted == '1990') selected @endif  value="1990">1990</option>
                                    <option  @if($brand->brandstarted == '1989') selected @endif  value="1989">1989</option>
                                    <option  @if($brand->brandstarted == '1988') selected @endif  value="1988">1988</option>
                                    <option  @if($brand->brandstarted == '1987') selected @endif  value="1987">1987</option>
                                    <option  @if($brand->brandstarted == '1986') selected @endif  value="1986">1986</option>
                                    <option  @if($brand->brandstarted == '1985') selected @endif  value="1985">1985</option>
                                    <option  @if($brand->brandstarted == '1984') selected @endif  value="1984">1984</option>
                                    <option  @if($brand->brandstarted == '1983') selected @endif  value="1983">1983</option>
                                    <option  @if($brand->brandstarted == '1982') selected @endif  value="1982">1982</option>
                                    <option  @if($brand->brandstarted == '1981') selected @endif  value="1981">1981</option>
                                    <option  @if($brand->brandstarted == '1980') selected @endif  value="1980">1980</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Investment </label>
                            <div class="col-sm-12">
                                <input id="investment" type="text"  class="form-control" name="investment" value="{{ $brand->investment }}" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Space required </label>
                            <div class="col-sm-12">
                                <input id="space_req" type="text"  class="form-control" name="space_req" value="{{ $brand->space_req }}" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Outlets </label>
                            <div class="col-sm-12">
                                <input id="boutlats" type="text"  class="form-control" name="boutlats" value="{{ $brand->boutlats }}" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Search Price Range*</label>
                            <div class="col-sm-12">

                                <select name="prange" value="{{ $brand->prange }}" class="form-control">
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
                                <input id="memberofbrand" type="text"  class="form-control" name="memberofbrand" value="{{ $brand->memberofbrand }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Mobile Number</label>
                            <div class="col-sm-12">
                                <input id="anumber" type="number"  class="form-control" name="brandnumber" value="{{ $brand->brandnumber }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">State*</label>
                            <div class="col-sm-12">
                                <select name="state" value="{{ $brand->state }}" class="form-control">

                                    <option value="">Select State</option>
                                    <option @if($brand->state == 'Andhra Pradesh') selected @endif value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option @if($brand->state == 'Arunachal Pradesh') selected @endif value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option @if($brand->state == 'Assam') selected @endif value="Assam">Assam</option>
                                    <option @if($brand->state == 'Bihar') selected @endif value="Bihar">Bihar</option>
                                    <option @if($brand->state == 'Chandigarh') selected @endif value="Chandigarh">Chandigarh</option>
                                    <option @if($brand->state == 'Chhattisgarh') selected @endif value="Chhattisgarh">Chhattisgarh</option>
                                    <option @if($brand->state == 'Daman &amp; Diu') selected @endif value="Daman &amp; Diu">Daman &amp; Diu</option>
                                    <option @if($brand->state == 'Goa') selected @endif value="Goa">Goa</option>
                                    <option @if($brand->state == 'Gujarat') selected @endif value="Gujarat">Gujarat</option>
                                    <option @if($brand->state == 'Haryana') selected @endif value="Haryana">Haryana</option>
                                    <option @if($brand->state == 'Himachal&nbsp;Pradesh') selected @endif value="Himachal&nbsp;Pradesh">Himachal&nbsp;Pradesh</option>
                                    <option @if($brand->state == 'Jammu &amp;&nbsp;Kashmir') selected @endif value="Jammu &amp;&nbsp;Kashmir">Jammu &amp;&nbsp;Kashmir</option>
                                    <option @if($brand->state == 'Jharkhand') selected @endif value="Jharkhand">Jharkhand</option>
                                    <option @if($brand->state == 'Karnataka') selected @endif value="Karnataka">Karnataka</option>
                                    <option @if($brand->state == 'Kerala') selected @endif value="Kerala">Kerala</option>
                                    <option @if($brand->state == 'Lakshadweep') selected @endif value="Lakshadweep">Lakshadweep</option>
                                    <option @if($brand->state == 'Madhya Pradesh') selected @endif value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option @if($brand->state == 'Maharashtra') selected @endif value="Maharashtra">Maharashtra</option>
                                    <option @if($brand->state == 'Manipur') selected @endif value="Manipur">Manipur</option>
                                    <option @if($brand->state == 'Meghalaya') selected @endif value="Meghalaya">Meghalaya</option>
                                    <option @if($brand->state == 'Mizoram') selected @endif value="Mizoram">Mizoram</option>
                                    <option @if($brand->state == 'Nagaland') selected @endif value="Nagaland">Nagaland</option>
                                    <option @if($brand->state == 'New Delhi') selected @endif value="New Delhi">New Delhi</option>
                                    <option @if($brand->state == 'Orissa') selected @endif value="Orissa">Orissa</option>
                                    <option @if($brand->state == 'Pondicherry') selected @endif value="Pondicherry">Pondicherry</option>
                                    <option @if($brand->state == 'Punjab') selected @endif value="Punjab">Punjab</option>
                                    <option @if($brand->state == 'Rajasthan') selected @endif value="Rajasthan">Rajasthan</option>
                                    <option @if($brand->state == 'Sikkim') selected @endif value="Sikkim">Sikkim</option>
                                    <option @if($brand->state == 'Tamil Nadu') selected @endif value="Tamil Nadu">Tamil Nadu</option>
                                    <option @if($brand->state == 'Tripura') selected @endif value="Tripura">Tripura</option>
                                    <option @if($brand->state == 'Uttaranchal') selected @endif value="Uttaranchal">Uttaranchal</option>
                                    <option @if($brand->state == 'Uttar Pradesh') selected @endif value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option @if($brand->state == 'West Bengal') selected @endif value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Investment Requirements :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Single Unit</label>
                            <div class="col-sm-12">
                                <input id="singleunit" type="text"  class="form-control" name="singleunit" value="{{ $brand->singleunit }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Franchise Fee</label>
                            <div class="col-sm-12">
                                <input id="brandfee" type="text"  class="form-control" name="brandfee" value="{{ $brand->brandfee }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Equipments</label>
                            <div class="col-sm-12">
                                <input id="equipments" type="text"  class="form-control" name="equipments" value="{{ $brand->equipments }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Furniture and Fixture</label>
                            <div class="col-sm-12">
                                <input id="furniture" type="text"  class="form-control" name="furniture" value="{{ $brand->furniture }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Advertising / Marketing</label>
                            <div class="col-sm-12">
                                <input id="advertising" type="text"  class="form-control" name="advertising" value="{{ $brand->advertising }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Expected Pay Back Period</label>
                            <div class="col-sm-12">
                                <input id="paybackp" type="text"  class="form-control" name="paybackp" value="{{ $brand->paybackp }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Any other investment Needed</label>
                            <div class="col-sm-12">
                                <input id="anyotherinvi" type="text"  class="form-control" name="anyotherinvi" value="{{ $brand->anyotherinvi }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Looking Expansion in Areas</label>
                            <div class="col-sm-12">
                                <input id="lookexpansion" type="text"  class="form-control" name="lookexpansion" value="{{ $brand->lookexpansion }}"  >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="basicText" class="form-label">The expected return on investment to the Brand</label>
                            <div class="col-sm-12">
                                <input id="returnoninv" type="text"  class="form-control" name="returnoninv" value="{{ $brand->returnoninv }}"  >
                            </div>
                        </div> 

                    </fieldset>   


                    <fieldset>  <legend><strong>Brand Property Details :</strong></legend>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Required Property for this brand opportunity</label>
                            <div class="col-sm-12">
                                <input id="reqproperty" type="text"  class="form-control" name="reqproperty" value="{{ $brand->reqproperty }}"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <!--<label for="basicText" class="form-label">Required Floor Area</label>-->
                            <label for="basicText" class="form-label">Single unit space required</label>
                            <div class="col-sm-12">
                                <input id="floorarea" type="text"  class="form-control" name="floorarea" value="{{ $brand->floorarea }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Preferred Location for Unit Brand</label>
                            <div class="col-sm-12">
                                <input id="locationbrand" type="text"  class="form-control" name="locationbrand" value="{{ $brand->locationbrand }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Office Staff Required</label>
                            <div class="col-sm-12">
                                <input id="officestaff" type="text"  class="form-control" name="officestaff" value="{{ $brand->officestaff }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Computer System</label>
                            <div class="col-sm-12">
                                <input id="comsyatem" type="text"  class="form-control" name="comsyatem" value="{{ $brand->comsyatem }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Internet Connection</label>
                            <div class="col-sm-12">
                                <input id="internetreq" type="text"  class="form-control" name="internetreq" value="{{ $brand->internetreq }}"  >
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Training Details :</strong></legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Field assistance available for brand</label>
                            <div class="col-sm-12">
                                <input id="fieldassis" type="text"  class="form-control" name="fieldassis" value="{{ $brand->fieldassis }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Brand Traning programme</label>
                            <div class="col-sm-12">
                                <input id="trainingprogm" type="text"  class="form-control" name="trainingprogm" value="{{ $brand->trainingprogm }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Detailed Operating Manuals for Brand</label>
                            <div class="col-sm-12">
                                <input id="opermanual" type="text"  class="form-control" name="opermanual" value="{{ $brand->opermanual }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Need of IT Systems</label>
                            <div class="col-sm-12">
                                <input id="needit" type="text"  class="form-control" name="needit" value="{{ $brand->needit }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Assistance from Head office to Brand</label>
                            <div class="col-sm-12">
                                <input id="headofficeassis" type="text"  class="form-control" name="headofficeassis" value="{{ $brand->headofficeassis }}"  >
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend><strong>Brand Website Details :</strong> </legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Website </label>
                            <div class="col-sm-12">
                                <input id="website" type="text" value="http://"  class="form-control" name="website" value="{{ $brand->website }}"  >
                            </div>
                        </div>
                    </fieldset> <fieldset>
                        <legend><strong>Brand Other Details :</strong> </legend>
                        <div class="form-group">
                            <label for="basicText" class="form-label">Franchise Term</label>
                            <div class="col-sm-12">
                                <input id="brandterm" type="text"  class="form-control" name="brandterm" value="{{ $brand->brandterm }}"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="basicText" class="form-label">Priority</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="proirity" value="{{ $brand->proirity }}">
                                @foreach (range(0, 5000) as $item) {
                                    <option @if($brand->proirity == $item) selected @endif  value="{{ $item }}">{{ $item }}</option>
                                @endforeach               
                                </select>  
                            </div>
                        </div>





                            <div class="form-group">
                                <label for="basicText" class="form-label">Have standard Brand Agreement {{ $brand->brandagreement }}</label>
                                <div class="col-sm-12">
                                    <input id="brandagreement" type="radio" value="Yes"   name="brandagreement" @if($brand->brandagreement == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandagreement" type="radio" value="No"  name="brandagreement" @if($brand->brandagreement == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Growing Business Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="busiopertunity" type="radio" value="Yes"   name="busiopertunity" @if($brand->busiopertunity == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="busiopertunity" type="radio" value="No"  name="busiopertunity" @if($brand->busiopertunity == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this whats new</label>
                                <div class="col-sm-12">
                                    <input id="whatsnew" type="radio" value="Yes"   name="whatsnew" @if($brand->whatsnew == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="whatsnew" type="radio" value="No"  name="whatsnew" @if($brand->whatsnew == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Featured Brand Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="brandopon" type="radio" value="Yes"   name="brandopon" @if($brand->brandopon == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandopon" type="radio" value="No"  name="brandopon" @if($brand->brandopon == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Home Page Brand</label>
                                <div class="col-sm-12">
                                    <input id="brandhomepage" type="radio" value="Yes"   name="brandhomepage" @if($brand->brandhomepage == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="brandhomepage" type="radio" value="No"  name="brandhomepage" @if($brand->brandhomepage == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="basicText" class="form-label">Top Logo Brand</label>
                                <div class="col-sm-12">
                                    <input id="toplogo" type="radio" value="Yes"   name="toplogo" @if($brand->toplogo == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="toplogo" type="radio" value="No"  name="toplogo" @if($brand->toplogo == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Is This popular Brand</label>
                                <div class="col-sm-12">
                                    <input id="popubrand" type="radio" value="Yes"   name="popubrand" @if($brand->popubrand == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="popubrand" type="radio" value="No"  name="popubrand" @if($brand->popubrand == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this premium</label>
                                <div class="col-sm-12">
                                    <input id="ispremium" type="radio" value="Yes"   name="ispremium" @if($brand->ispremium == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="ispremium" type="radio" value="No"  name="ispremium" @if($brand->ispremium == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this new arrival brand</label>
                                <div class="col-sm-12">
                                    <input id="isnewarrival" type="radio" value="Yes"   name="isnewarrival" @if($brand->isnewarrival == 'Yes') checked @endif style=" margin:10px 0 0;"> &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="isnewarrival" type="radio" value="No"  name="isnewarrival" @if($brand->isnewarrival == 'No') checked @endif  style=" margin:10px 0 0;"> &nbsp;&nbsp;No
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Is this top premium</label>
                                <div class="col-sm-12">
                                    <input id="ispremiumtop" type="radio" value="Yes"   name="ispremiumtop" @if($brand->ispremiumtop == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="ispremiumtop" type="radio" value="No"  name="ispremiumtop" @if($brand->ispremiumtop == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Master Brand Opportunities</label>
                                <div class="col-sm-12">
                                    <input id="masterbrand" type="radio" value="Yes"   name="masterbrand" @if($brand->masterbrand == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="masterbrand" type="radio" value="No"  name="masterbrand" @if($brand->masterbrand == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div><div class="form-group">
                                <label for="basicText" class="form-label">Verified Brand</label>
                                <div class="col-sm-12">
                                    <input id="verifybrand" type="radio" value="Yes"   name="verifybrand" @if($brand->verifybrand == 'Yes') checked @endif style=" margin:10px 0 0;"  > &nbsp;&nbsp;Yes &nbsp;&nbsp;
                                    <input id="verifybrand" type="radio" value="No"  name="verifybrand" @if($brand->verifybrand == 'No') checked @endif  style=" margin:10px 0 0;" > &nbsp;&nbsp;No
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="basicText" class="form-label">Business Overview</label>
                                <div class="col-sm-12">
                                    <textarea id="detailx" name="busioverview" class="form-control summernote" >{{ $brand->busioverview }}</textarea>

                                </div>
                            </div>

                        </fieldset> <fieldset>
                            <legend><strong>Brand Video :</strong> </legend>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Video Url <small>(embeded you tube url)</small></label>
                                <div class="col-sm-12">
                                    <input id="anumber" type="text"  name="video_url" value="{{ $brand->video_url }}"  class="form-control">

                                </div>
                            </div>
                        </fieldset> <fieldset>
                            <legend><strong>Brand Images :</strong> </legend>
     

                            <div class="col-md-12 mb-2">
                                <label for="logo" class="form-label">Logo (png,jpg)(103 X 55)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="logo" name="logo"
                                    onchange="loadPreview(this, 'logo');">
                                </div>
                                @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                                @endif
                                @if($brand->logo)
                                <img id="preview_img_logo" src="{{ asset('storage/uploads/brands/'.$brand->id.'/logo/'.$brand->logo)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_logo" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="banner" class="form-label">Animated Image (png,jpg,gif) (220 X 112)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="banner" name="banner"
                                    onchange="loadPreview(this, 'banner');">
                                </div>
                                @if ($errors->has('banner'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('banner') }}</strong>
                                </span>
                                @endif
                                @if($brand->banner)
                                <img id="preview_img_banner" src="{{ asset('storage/uploads/brands/'.$brand->id.'/banner/'.$brand->banner)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_banner" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="basicText" class="form-label">Banner Image (png,jpg) (1600 X 500)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner" name="tbanner"
                                    onchange="loadPreview(this, 'tbanner');">
                                </div>
                                @if ($errors->has('tbanner'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner)
                                <img id="preview_img_tbanner" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner/'.$brand->tbanner)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 1 (png,jpg)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner1" name="tbanner1"
                                    onchange="loadPreview(this, 'tbanner1');">
                                </div>
                                @if ($errors->has('tbanner1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner1') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner1)
                                <img id="preview_img_tbanner1" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner1/'.$brand->tbanner1)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner1" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 2 (png,jpg)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner2" name="tbanner2"
                                    onchange="loadPreview(this, 'tbanner2');">
                                </div>
                                @if ($errors->has('tbanner2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner2') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner2)
                                <img id="preview_img_tbanner2" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner2/'.$brand->tbanner2)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner2" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 3 (png,jpg)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner3" name="tbanner3"
                                    onchange="loadPreview(this, 'tbanner3');">
                                </div>
                                @if ($errors->has('tbanner3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner3') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner3)
                                <img id="preview_img_tbanner3" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner3/'.$brand->tbanner3)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner3" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 4 (png,jpg)</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner4" name="tbanner4"
                                    onchange="loadPreview(this, 'tbanner4');">
                                </div>
                                @if ($errors->has('tbanner4'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner4') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner4)
                                <img id="preview_img_tbanner4" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner4/'.$brand->tbanner4)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner4" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="basicText" class="form-label">Image 5 (png,jpg)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="tbanner5" name="tbanner5"
                                    onchange="loadPreview(this, 'tbanner5');">
                                </div>
                                @if ($errors->has('tbanner5'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tbanner5') }}</strong>
                                </span>
                                @endif
                                @if($brand->tbanner5)
                                <img id="preview_img_tbanner5" src="{{ asset('storage/uploads/brands/'.$brand->id.'/tbanner5/'.$brand->tbanner5)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_tbanner5" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="basicText" class="form-label">Brand PPT (pdf)</label>
                                <div class="col-sm-12">

                                    <div class="input-group">
                                    <input type="file" class="form-control" id="ppt" name="ppt"
                                    onchange="loadPreview(this, 'ppt');">
                                </div>
                                @if ($errors->has('ppt'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ppt') }}</strong>
                                </span>
                                @endif
                                @if($brand->ppt)
                                <img id="preview_img_ppt" src="{{ asset('storage/uploads/brands/'.$brand->id.'/ppt/'.$brand->ppt)  }}" class="mt-2" width="100"
                                height="100" />
                                @else
                                <img id="preview_img_ppt" src="{{ asset('assets/images/thumbnails/profile-placeholder.png') }}" class="mt-2" width="100"
                                height="100" />
                                @endif
                                </div>
                            </div>
                            <div class="col-sm-3">Home Page Priority

                                    <select class="form-control" name="priorityhome" value="{{ $brand->priorityhome }}">
                                @foreach (range(0, 5000) as $item) {
                                        <option @if($brand->priorityhome == $item) selected @endif  value="{{ $item }}">{{ $item }}</option>
                                @endforeach  
                                    </select> 
                            </div>

                            <div class="col-sm-3">Category Priority
                                    <select class="form-control" name="prioritycat" value="{{ $brand->prioritycat }}">
                                 @foreach (range(0, 5000) as $item) {
                                        <option @if($brand->prioritycat == $item) selected @endif  value="{{ $item }}">{{ $item }}</option>
                                @endforeach 
                                    </select> 
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">Status</label>
                                <select class="form-control" name="status" id="example-select">
                                    <option value="">Select Status</option>
                                    <option @if(old('status', $brand->status) == 1 ) selected @endif value="1">Enable</option>
                                    <option @if(old('status', $brand->status) == 0 ) selected @endif value="0">Disable</option>
                                </select>
                                @error('status')
                                    <code id="name-error" class="text-danger">{{ $message }}</code>
                                @enderror
                            </div>


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


    <script>
        function loadPreview(input, id) {
            id = '#preview_img_'+id;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>
@endpush