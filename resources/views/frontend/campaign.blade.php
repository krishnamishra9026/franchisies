@extends('layouts.app')

@section('title', 'Welcome to Collab Marketplace Ad Campaigns')

@section('content')


<div class="campaigns">
    <div class="MSearch">
        <div class="container">
            <h1>Sponsor Ad Campaigns</h1>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="searchbar BoxShadow">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search for Campaign">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text"><img src="{{ asset('assets/images/frontend/icons/search-black.png') }}" alt="Search" /></button>
                            </div>
                        </div>
                        <div class="creators-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ url('/marketplace') }}">Content Creators</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link active" href="{{ url('/campaign') }}">Ad Campaigns</a>
                                </li>
                              </ul>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-12">
                    <div class="search-creators">
                        <div class="BoxShadow">
                            <div class="row">
                                <div class="col-sm-3 col-12" id="filter">
                                    <div class="filter">
                                        <h4>Filter </h4>
                                        <div class="filter-content">
                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Quotation Price</span></li>
                                                    <li><a href="#">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <div class="pricerange">
                                                    <input id="range" name="range" type="range" min="0" max="100" value="50"/>
                                                    <div class="minmax-price">
                                                        <div class="form-group">
                                                            <label for="label" class="form-label">Min</label>
                                                            <input type="text" class="form-control" placeholder="$0">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="label" class="form-label">Max</label>
                                                            <input type="text" class="form-control" placeholder="$1000">
                                                          </div>
                                                    </div>
                                                    </div>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Category</span></li>
                                                    <li><a href="#">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <div class="Csearch">
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" placeholder="Search by category">
                                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                    Music
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                Fitness
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                Animation
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                Games
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                Photography
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Location</span></li>
                                                    <li><a href="#">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group">
                                                            <select class="form-select" id="country" name="country">
                                                                <option>Select Country</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Aland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua and Barbuda</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                                <option value="BA">Bosnia and Herzegovina</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean Territory</option>
                                                                <option value="BN">Brunei Darussalam</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>
                                                                <option value="BI">Burundi</option>
                                                                <option value="KH">Cambodia</option>
                                                                <option value="CM">Cameroon</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CV">Cape Verde</option>
                                                                <option value="KY">Cayman Islands</option>
                                                                <option value="CF">Central African Republic</option>
                                                                <option value="TD">Chad</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CX">Christmas Island</option>
                                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="KM">Comoros</option>
                                                                <option value="CG">Congo</option>
                                                                <option value="CD">Congo, Democratic Republic of the Congo</option>
                                                                <option value="CK">Cook Islands</option>
                                                                <option value="CR">Costa Rica</option>
                                                                <option value="CI">Cote D'Ivoire</option>
                                                                <option value="HR">Croatia</option>
                                                                <option value="CU">Cuba</option>
                                                                <option value="CW">Curacao</option>
                                                                <option value="CY">Cyprus</option>
                                                                <option value="CZ">Czech Republic</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="DM">Dominica</option>
                                                                <option value="DO">Dominican Republic</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="GQ">Equatorial Guinea</option>
                                                                <option value="ER">Eritrea</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                                <option value="FO">Faroe Islands</option>
                                                                <option value="FJ">Fiji</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="TF">French Southern Territories</option>
                                                                <option value="GA">Gabon</option>
                                                                <option value="GM">Gambia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GP">Guadeloupe</option>
                                                                <option value="GU">Guam</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="GG">Guernsey</option>
                                                                <option value="GN">Guinea</option>
                                                                <option value="GW">Guinea-Bissau</option>
                                                                <option value="GY">Guyana</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HM">Heard Island and Mcdonald Islands</option>
                                                                <option value="VA">Holy See (Vatican City State)</option>
                                                                <option value="HN">Honduras</option>
                                                                <option value="HK">Hong Kong</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IR">Iran, Islamic Republic of</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IM">Isle of Man</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="JE">Jersey</option>
                                                                <option value="JO">Jordan</option>
                                                                <option value="KZ">Kazakhstan</option>
                                                                <option value="KE">Kenya</option>
                                                                <option value="KI">Kiribati</option>
                                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                                <option value="KR">Korea, Republic of</option>
                                                                <option value="XK">Kosovo</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="KG">Kyrgyzstan</option>
                                                                <option value="LA">Lao People's Democratic Republic</option>
                                                                <option value="LV">Latvia</option>
                                                                <option value="LB">Lebanon</option>
                                                                <option value="LS">Lesotho</option>
                                                                <option value="LR">Liberia</option>
                                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                                <option value="LI">Liechtenstein</option>
                                                                <option value="LT">Lithuania</option>
                                                                <option value="LU">Luxembourg</option>
                                                                <option value="MO">Macao</option>
                                                                <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MW">Malawi</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="ML">Mali</option>
                                                                <option value="MT">Malta</option>
                                                                <option value="MH">Marshall Islands</option>
                                                                <option value="MQ">Martinique</option>
                                                                <option value="MR">Mauritania</option>
                                                                <option value="MU">Mauritius</option>
                                                                <option value="YT">Mayotte</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="FM">Micronesia, Federated States of</option>
                                                                <option value="MD">Moldova, Republic of</option>
                                                                <option value="MC">Monaco</option>
                                                                <option value="MN">Mongolia</option>
                                                                <option value="ME">Montenegro</option>
                                                                <option value="MS">Montserrat</option>
                                                                <option value="MA">Morocco</option>
                                                                <option value="MZ">Mozambique</option>
                                                                <option value="MM">Myanmar</option>
                                                                <option value="NA">Namibia</option>
                                                                <option value="NR">Nauru</option>
                                                                <option value="NP">Nepal</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="AN">Netherlands Antilles</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NI">Nicaragua</option>
                                                                <option value="NE">Niger</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="NU">Niue</option>
                                                                <option value="NF">Norfolk Island</option>
                                                                <option value="MP">Northern Mariana Islands</option>
                                                                <option value="NO">Norway</option>
                                                                <option value="OM">Oman</option>
                                                                <option value="PK">Pakistan</option>
                                                                <option value="PW">Palau</option>
                                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                                <option value="PA">Panama</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PN">Pitcairn</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="PR">Puerto Rico</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Reunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russian Federation</option>
                                                                <option value="RW">Rwanda</option>
                                                                <option value="BL">Saint Barthelemy</option>
                                                                <option value="SH">Saint Helena</option>
                                                                <option value="KN">Saint Kitts and Nevis</option>
                                                                <option value="LC">Saint Lucia</option>
                                                                <option value="MF">Saint Martin</option>
                                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                                <option value="WS">Samoa</option>
                                                                <option value="SM">San Marino</option>
                                                                <option value="ST">Sao Tome and Principe</option>
                                                                <option value="SA">Saudi Arabia</option>
                                                                <option value="SN">Senegal</option>
                                                                <option value="RS">Serbia</option>
                                                                <option value="CS">Serbia and Montenegro</option>
                                                                <option value="SC">Seychelles</option>
                                                                <option value="SL">Sierra Leone</option>
                                                                <option value="SG">Singapore</option>
                                                                <option value="SX">Sint Maarten</option>
                                                                <option value="SK">Slovakia</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="ZA">South Africa</option>
                                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                <option value="SS">South Sudan</option>
                                                                <option value="ES">Spain</option>
                                                                <option value="LK">Sri Lanka</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="SE">Sweden</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="SY">Syrian Arab Republic</option>
                                                                <option value="TW">Taiwan, Province of China</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania, United Republic of</option>
                                                                <option value="TH">Thailand</option>
                                                                <option value="TL">Timor-Leste</option>
                                                                <option value="TG">Togo</option>
                                                                <option value="TK">Tokelau</option>
                                                                <option value="TO">Tonga</option>
                                                                <option value="TT">Trinidad and Tobago</option>
                                                                <option value="TN">Tunisia</option>
                                                                <option value="TR">Turkey</option>
                                                                <option value="TM">Turkmenistan</option>
                                                                <option value="TC">Turks and Caicos Islands</option>
                                                                <option value="TV">Tuvalu</option>
                                                                <option value="UG">Uganda</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="US">United States</option>
                                                                <option value="UM">United States Minor Outlying Islands</option>
                                                                <option value="UY">Uruguay</option>
                                                                <option value="UZ">Uzbekistan</option>
                                                                <option value="VU">Vanuatu</option>
                                                                <option value="VE">Venezuela</option>
                                                                <option value="VN">Viet Nam</option>
                                                                <option value="VG">Virgin Islands, British</option>
                                                                <option value="VI">Virgin Islands, U.s.</option>
                                                                <option value="WF">Wallis and Futuna</option>
                                                                <option value="EH">Western Sahara</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group mt-2">
                                                            <select class="form-select" id="inputState">
                                                                <option value="SelectState">Select State</option>
                                                                <option value="Andra Pradesh">Andra Pradesh</option>
                                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                                <option value="Assam">Assam</option>
                                                                <option value="Bihar">Bihar</option>
                                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                                <option value="Goa">Goa</option>
                                                                <option value="Gujarat">Gujarat</option>
                                                                <option value="Haryana">Haryana</option>
                                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                                <option value="Jharkhand">Jharkhand</option>
                                                                <option value="Karnataka">Karnataka</option>
                                                                <option value="Kerala">Kerala</option>
                                                                <option value="Madya Pradesh">Madya Pradesh</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                                                <option value="Manipur">Manipur</option>
                                                                <option value="Meghalaya">Meghalaya</option>
                                                                <option value="Mizoram">Mizoram</option>
                                                                <option value="Nagaland">Nagaland</option>
                                                                <option value="Orissa">Orissa</option>
                                                                <option value="Punjab">Punjab</option>
                                                                <option value="Rajasthan">Rajasthan</option>
                                                                <option value="Sikkim">Sikkim</option>
                                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                                <option value="Telangana">Telangana</option>
                                                                <option value="Tripura">Tripura</option>
                                                                <option value="Uttaranchal">Uttaranchal</option>
                                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                                <option value="West Bengal">West Bengal</option>
                                                                <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                                <option value="Chandigarh">Chandigarh</option>
                                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                                <option value="Daman and Diu">Daman and Diu</option>
                                                                <option value="Delhi">Delhi</option>
                                                                <option value="Lakshadeep">Lakshadeep</option>
                                                                <option value="Pondicherry">Pondicherry</option>
                                                                </select>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>


                                            <div class="filtertitle">
                                                <ul class="list-inline">
                                                    <li><span>Rating</span></li>
                                                    <li><a href="#">Clear</a></li>
                                                </ul>
                                            </div>
                                            <div class="filterlist">
                                                <ul>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                    1 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                2 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                3 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                4 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-label">
                                                                5 Star
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12" id="Creator-list">
                                    <div class="row display-control">
                                        <div class="col-sm-3 col-12">
                                            <div class="result">
                                                <span>Top results 1-20 of 625</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="sortby">
                                                <select id="input-sort" class="form-select">
                                                    <option value="Sort by (Default)" selected>Sort by (Default)</option>
                                                    <option value="Price (Low &gt; High)">Price (Low &gt; High)</option>
                                                    <option value="Price (High &gt; Low)">Price (High &gt; Low)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row creatorlist Sponsorlist">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/frontend/Profile4.jpg') }}" class="img-fluid" alt="Featured Profile">
                                                    <div class="open-collabs">
                                                        <img src="{{ asset('assets/images/frontend/icons/shield.png') }}" alt="Featured Sponsor">
                                                        <span>Featured Sponsor</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 paddingleft paddingright">
                                            <div class="Lcaption">
                                                <h2>Create Tiktok videos, YouTube video, Instagram reel</h2>
                                                <div class="user">
                                                    <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                    <div class="userN">
                                                        <h5 class="username">Hudson Hanson</h5>
                                                        <div class="rating">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-o"></span>
                                                            4.1
                                                        </div>
                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span>@joney123</span></li>
                                                                <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> Qatar, Doha</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="disc">
                                                    <p>My name is Jessica, I'm a video creator with a TikTok channel (10,3 million followers) and YouTube channel (8.2 million followers)....<a href="#">more</a></p>
                                                </div>

                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><span> Reels</span></a></li>
                                                        <li><a href="#"><span> Feed</span></a></li>
                                                        <li><a href="#"><span> Story</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">

                                                <div class="price">
                                                    <p><span>$150 USD</span></p>
                                                </div>

                                                <div class="viewbtn">
                                                    <a href="#" class="btn btn-primary btn-lg">Send Quote</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row creatorlist Sponsorlist">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/frontend/Profile1.jpg') }}" class="img-fluid" alt="Featured Profile">
                                                    <div class="open-collabs">
                                                        <img src="{{ asset('assets/images/frontend/icons/shield.png') }}" alt="Featured Sponsor">
                                                        <span>Featured Sponsor</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 paddingleft paddingright">
                                            <div class="Lcaption">
                                                <h2>Create Tiktok videos, YouTube video, Instagram reel</h2>
                                                <div class="user">
                                                    <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                    <div class="userN">
                                                        <h5 class="username">Hudson Hanson</h5>
                                                        <div class="rating">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-o"></span>
                                                            4.1
                                                        </div>
                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span>@joney123</span></li>
                                                                <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> Qatar, Doha</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="disc">
                                                    <p>My name is Jessica, I'm a video creator with a TikTok channel (10,3 million followers) and YouTube channel (8.2 million followers)....<a href="#">more</a></p>
                                                </div>

                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><span> Reels</span></a></li>
                                                        <li><a href="#"><span> Feed</span></a></li>
                                                        <li><a href="#"><span> Story</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">

                                                <div class="price">
                                                    <p><span>$150 USD</span></p>
                                                </div>

                                                <div class="viewbtn">
                                                    <a href="#" class="btn btn-primary btn-lg">Send Quote</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row creatorlist Sponsorlist">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/frontend/Profile3.jpg') }}" class="img-fluid" alt="Featured Profile">
                                                    <div class="open-collabs">
                                                        <img src="{{ asset('assets/images/frontend/icons/shield.png') }}" alt="Featured Sponsor">
                                                        <span>Featured Sponsor</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 paddingleft paddingright">
                                            <div class="Lcaption">
                                                <h2>Create Tiktok videos, YouTube video, Instagram reel</h2>
                                                <div class="user">
                                                    <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                    <div class="userN">
                                                        <h5 class="username">Hudson Hanson</h5>
                                                        <div class="rating">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-o"></span>
                                                            4.1
                                                        </div>
                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span>@joney123</span></li>
                                                                <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> Qatar, Doha</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="disc">
                                                    <p>My name is Jessica, I'm a video creator with a TikTok channel (10,3 million followers) and YouTube channel (8.2 million followers)....<a href="#">more</a></p>
                                                </div>

                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><span> Reels</span></a></li>
                                                        <li><a href="#"><span> Feed</span></a></li>
                                                        <li><a href="#"><span> Story</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">

                                                <div class="price">
                                                    <p><span>$150 USD</span></p>
                                                </div>

                                                <div class="viewbtn">
                                                    <a href="#" class="btn btn-primary btn-lg">Send Quote</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row creatorlist Sponsorlist">
                                        <div class="col-sm-3 col-12 paddingleft">
                                            <div class="LProfile">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/frontend/Profile2.jpg') }}" class="img-fluid" alt="Featured Profile">
                                                    <div class="open-collabs">
                                                        <img src="{{ asset('assets/images/frontend/icons/shield.png') }}" alt="Featured Sponsor">
                                                        <span>Featured Sponsor</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 paddingleft paddingright">
                                            <div class="Lcaption">
                                                <h2>Create Tiktok videos, YouTube video, Instagram reel</h2>
                                                <div class="user">
                                                    <img src="{{ asset('assets/images/frontend/profile-img.jpg') }}" alt="Andreidu">
                                                    <div class="userN">
                                                        <h5 class="username">Hudson Hanson</h5>
                                                        <div class="rating">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-o"></span>
                                                            4.1
                                                        </div>
                                                        <div class="location">
                                                            <ul class="list-inline">
                                                                <li><span>@joney123</span></li>
                                                                <li><span><img src="{{ asset('assets/images/frontend/icons/map.png') }}" alt="Location"> Qatar, Doha</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="disc">
                                                    <p>My name is Jessica, I'm a video creator with a TikTok channel (10,3 million followers) and YouTube channel (8.2 million followers)....<a href="#">more</a></p>
                                                </div>

                                                <div class="creator-Category">
                                                    <ul class="list-inline">
                                                        <li><a href="#"><span> Reels</span></a></li>
                                                        <li><a href="#"><span> Feed</span></a></li>
                                                        <li><a href="#"><span> Story</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                            <div class="LRight">

                                                <div class="price">
                                                    <p><span>$150 USD</span></p>
                                                </div>

                                                <div class="viewbtn">
                                                    <a href="#" class="btn btn-primary btn-lg">Send Quote</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="pagination">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                      <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-caret-left"></i></a></li>
                                                      <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                      <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-caret-right"></i></a></li>
                                                    </ul>
                                                  </nav>
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
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(".wishlist").click(function() {
        $(this).toggleClass('fa-heart-o');
        $(this).toggleClass('fa-heart');
    });
</script>
@endpush
