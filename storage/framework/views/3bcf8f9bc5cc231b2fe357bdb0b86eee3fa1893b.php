

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
    <div class="card w-100">
        <div class="card-header">
            <h5>Employee</h5>
        </div>
        <div class="card-body  w-100">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs" id="stepTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab">Basic Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab">Salary and Bank
                        Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab">Personal
                        Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab">Biological
                        Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="step5-tab" data-toggle="tab" href="#step5" role="tab">other
                        Information</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-3">

                <!-- Step 1: Basic Info -->
                <div class="tab-pane fade show active" id="step1" role="tabpanel">
                    <form id="basicInfoForm">
                        <h6 class="mb-3">Basic Info:</h6>
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" placeholder="First name" required>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" placeholder="Middle name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" placeholder="Last name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control">
                                        <option value="">Select country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
                                        <option value="Democratic Republic of the Congo">Democratic Republic of the
                                            Congo</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Eswatini (Swaziland)">Eswatini (Swaziland)</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Holy See">Holy See</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestine State">Palestine State</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                            Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City">Vatican City</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" placeholder="Zip">
                                </div>
                                <div class="form-group">
                                    <label>Alternate Phone</label>
                                    <input type="text" class="form-control" placeholder="Alternate phone">
                                </div>
                                <div class="form-group">
                                    <label>National ID No</label>
                                    <input type="text" class="form-control" placeholder="National ID No">
                                </div>
                                <div class="form-group">
                                    <label>Iqama No</label>
                                    <input type="text" class="form-control" placeholder="Iqama No">
                                </div>
                                <div class="form-group">
                                    <label>Passport No</label>
                                    <input type="text" class="form-control" placeholder="Passport No">
                                </div>
                                <div class="form-group">
                                    <label>Driving License No</label>
                                    <input type="text" class="form-control" placeholder="Driving License No">
                                </div>
                                <div class="form-group">
                                    <label>Attendance Time *</label>
                                    <select class="form-control">
                                        <option value="">Select attendance time</option>
                                        <option value="Normal shift">Normal shift</option>
                                        <option value="General shift">General shift</option>
                                        <option value="Test">Test</option>
                                        <option value="Regular working">Regular working</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success float-right">Next</button>
                    </form>
                </div>

                <!-- Step 2: Salary and Bank Info -->
                <div class="tab-pane fade" id="step2" role="tabpanel">
                    <form id="salaryInfoForm">
                        <h6 class="font-weight-bold">Salary and Bank Info</h6>

                        <!-- Account Number and Bank Name in the same row -->
                        <div class="row">
                            <!-- Bank Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bankName">Bank Name</label>
                                    <input type="text" class="form-control" id="bankName" name="bankName"
                                        placeholder="Enter Bank Name" required>
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="accountNumber">Account Number</label>
                                    <input type="text" class="form-control" id="accountNumber" name="accountNumber"
                                        placeholder="Enter Account Number" required>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Salary, TIN Number, and Transport Allowance in the same row -->
                        <div class="row">
                            <!-- Basic Salary -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicSalary">Basic Salary</label>
                                    <input type="number" class="form-control" id="basicSalary" name="basicSalary"
                                        placeholder="Enter Basic Salary" required>
                                </div>
                            </div>

                            <!-- TIN Number -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tinNumber">TIN Number</label>
                                    <input type="text" class="form-control" id="tinNumber" name="tinNumber"
                                        placeholder="Enter TIN Number" required>
                                </div>
                            </div>

                            <!-- Transport Allowance -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="transportAllowance">Transport Allowance</label>
                                    <input type="number" class="form-control" id="transportAllowance"
                                        name="transportAllowance" placeholder="Enter Transport Allowance" required>
                                </div>
                            </div>
                        </div>

                        <h6 class="font-weight-bold mt-4">Benefits</h6>

                        <!-- Medical Benefit and Transportation Benefit in the same row -->
                        <div class="row">
                            <!-- Medical Benefit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medicalBenefit">Medical Benefit</label>
                                    <input type="number" class="form-control" id="medicalBenefit" name="medicalBenefit"
                                        placeholder="Enter Medical Benefit" required>
                                </div>
                            </div>

                            <!-- Transportation Benefit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transportationBenefit">Transportation Benefit</label>
                                    <input type="number" class="form-control" id="transportationBenefit"
                                        name="transportationBenefit" placeholder="Enter Transportation Benefit"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Branch Address and BBAN Number in the same row -->
                        <div class="row">
                            <!-- Branch Address -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="branchAddress">Branch Address</label>
                                    <input type="text" class="form-control" id="branchAddress" name="branchAddress"
                                        placeholder="Enter Branch Address" required>
                                </div>
                            </div>

                            <!-- BBAN Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bbanNumber">BBAN Number</label>
                                    <input type="text" class="form-control" id="bbanNumber" name="bbanNumber"
                                        placeholder="Enter BBAN Number" required>
                                </div>
                            </div>
                        </div>

                        <!-- Gross Salary and Family Benefit in the same row -->
                        <div class="row">
                            <!-- Gross Salary -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grossSalary">Gross Salary</label>
                                    <input type="number" class="form-control" id="grossSalary" name="grossSalary"
                                        placeholder="Enter Gross Salary" required>
                                </div>
                            </div>

                            <!-- Family Benefit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="familyBenefit">Family Benefit</label>
                                    <input type="number" class="form-control" id="familyBenefit" name="familyBenefit"
                                        placeholder="Enter Family Benefit" required>
                                </div>
                            </div>
                        </div>

                        <!-- Other Benefit in the same row -->
                        <div class="row">
                            <!-- Other Benefit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="otherBenefit">Other Benefit</label>
                                    <input type="text" class="form-control" id="otherBenefit" name="otherBenefit"
                                        placeholder="Enter Other Benefit" required>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary float-left prev-btn">Previous</button>
                            <button type="button" class="btn btn-primary float-right next-btn">Next</button>
                        </div>
                    </form>
                </div>





                <!-- Step 3: Personal Information -->
                <div class="tab-pane fade" id="step3" role="tabpanel">
                    <form id="personalInfoForm">
                        <h6>Personal Information:</h6>

                        <div class="row">
                            <!-- Left side fields -->
                            <div class="col-md-6">
                                <!-- Department Dropdown -->
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department" required>
                                        <option value="">Select Department</option>
                                        <!-- Dynamic department options will be populated here -->
                                    </select>
                                </div>

                                <!-- Sub-Department Dropdown -->
                                <div class="form-group">
                                    <label for="subDepartment">Sub-Department</label>
                                    <select class="form-control" id="subDepartment" name="subDepartment" required>
                                        <option value="">Select Sub-Department</option>
                                        <!-- Dynamic sub-department options will be populated here -->
                                    </select>
                                </div>

                                <!-- Position Dropdown -->
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select class="form-control" id="position" name="position" required>
                                        <option value="">Select Position</option>
                                        <!-- Dynamic position options will be populated here -->
                                    </select>
                                </div>

                                <!-- Duty Type Dropdown -->
                                <div class="form-group">
                                    <label for="dutyType">Duty Type</label>
                                    <select class="form-control" id="dutyType" name="dutyType" required>
                                        <option value="fullTime">Full Time</option>
                                        <option value="partTime">Part Time</option>
                                        <option value="contractual">Contractual</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <!-- Joining Date -->
                                <div class="form-group">
                                    <label for="joiningDate">Joining Date</label>
                                    <input type="date" class="form-control" id="joiningDate" name="joiningDate"
                                        required>
                                </div>

                                <!-- Hire Date -->
                                <div class="form-group">
                                    <label for="hireDate">Hire Date</label>
                                    <input type="date" class="form-control" id="hireDate" name="hireDate" required>
                                </div>

                                <!-- Rehire Date -->
                                <div class="form-group">
                                    <label for="rehireDate">Rehire Date</label>
                                    <input type="date" class="form-control" id="rehireDate" name="rehireDate" required>
                                </div>

                                <!-- Termination Date -->
                                <div class="form-group">
                                    <label for="terminationDate">Termination Date</label>
                                    <input type="date" class="form-control" id="terminationDate" name="terminationDate"
                                        required>
                                </div>

                                <!-- Card Number -->
                                <div class="form-group">
                                    <label for="cardNo">Card No</label>
                                    <input type="text" class="form-control" id="cardNo" name="cardNo"
                                        placeholder="Enter Card Number" required>
                                </div>

                                <!-- Monthly Work Hours -->
                                <div class="form-group">
                                    <label for="monthlyWorkHours">Monthly Work Hours</label>
                                    <input type="number" class="form-control" id="monthlyWorkHours"
                                        name="monthlyWorkHours" placeholder="Enter Monthly Work Hours" required>
                                </div>

                                <!-- Work Permit Radio Buttons -->
                                <div class="form-group">
                                    <label>Work Permit</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="workPermit"
                                            id="workPermitYes" value="yes" required>
                                        <label class="form-check-label" for="workPermitYes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="workPermit" id="workPermitNo"
                                            value="no" required>
                                        <label class="form-check-label" for="workPermitNo">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Right side fields -->
                            <div class="col-md-6">
                                <!-- Pay Frequency Dropdown -->
                                <div class="form-group">
                                    <label for="payFrequency">Pay Frequency</label>
                                    <select class="form-control" id="payFrequency" name="payFrequency" required>
                                        <option value="yearly">Yearly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="biweekly">Bi-Weekly</option>
                                        <option value="weekly">Weekly</option>
                                    </select>
                                </div>

                                <!-- Pay Frequency Text Field -->
                                <div class="form-group">
                                    <label for="payFrequencyText">Pay Frequency Text</label>
                                    <input type="text" class="form-control" id="payFrequencyText"
                                        name="payFrequencyText" placeholder="Enter Pay Frequency Text">
                                </div>

                                <!-- Hourly Rate -->
                                <div class="form-group">
                                    <label for="hourlyRate">Hourly Rate</label>
                                    <input type="number" class="form-control" id="hourlyRate" name="hourlyRate"
                                        placeholder="Enter Hourly Rate" required>
                                </div>

                                <!-- Hourly Rate 2 -->
                                <div class="form-group">
                                    <label for="hourlyRate2">Hourly Rate 2</label>
                                    <input type="number" class="form-control" id="hourlyRate2" name="hourlyRate2"
                                        placeholder="Enter Hourly Rate 2" required>
                                </div>

                                <!-- Employee Grade -->
                                <div class="form-group">
                                    <label for="employeeGrade">Employee Grade</label>
                                    <input type="text" class="form-control" id="employeeGrade" name="employeeGrade"
                                        placeholder="Enter Employee Grade" required>
                                </div>

                                <!-- Termination Reason -->
                                <div class="form-group">
                                    <label for="terminationReason">Termination Reason</label>
                                    <input type="text" class="form-control" id="terminationReason"
                                        name="terminationReason" placeholder="Enter Termination Reason" required>
                                </div>

                                <!-- Work in City -->
                                <div class="form-group">
                                    <label for="workInCity">Work in City</label>
                                    <input type="text" class="form-control" id="workInCity" name="workInCity"
                                        placeholder="Enter Work in City" required>
                                </div>

                                <!-- Employee Type Dropdown -->
                                <div class="form-group">
                                    <label for="employeeType">Employee Type</label>
                                    <select class="form-control" id="employeeType" name="employeeType" required>
                                        <option value="intern">Intern</option>
                                        <option value="contractual">Contractual</option>
                                        <option value="fullTime">Full Time</option>
                                        <option value="remote">Remote</option>
                                    </select>
                                </div>

                                <!-- Voluntary Termination -->
                                <div class="form-group">
                                    <label for="voluntaryTermination">Voluntary Termination</label>
                                    <select class="form-control" id="voluntaryTermination" name="voluntaryTermination"
                                        required>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary float-left prev-btn">Previous</button>
                            <button type="next" class="btn btn-success float-right">NEXT</button>
                        </div>
                    </form>
                </div>


                <!-- Step 4: Biological Info -->
                <div class="tab-pane fade" id="step4" role="tabpanel">
                    <form id="biologicalform">
                        <h6 class="font-weight-bold">Biological Info</h6>
                        <div class="row">
                            <!-- Left Column (Personal and Biological Info) -->
                            <div class="col-md-6">
                                <!-- Date of Birth -->
                                <div class="form-group">
                                    <label for="dob">Date of Birth *</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>

                                <!-- Gender -->
                                <div class="form-group">
                                    <label for="gender">Gender *</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Marital Status -->
                                <div class="form-group">
                                    <label for="maritalStatus">Marital Status</label>
                                    <select class="form-control" id="maritalStatus" name="maritalStatus">
                                        <option value="">Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>

                                <!-- Number of Kids -->
                                <div class="form-group">
                                    <label for="numKids">Number of Kids</label>
                                    <input type="number" class="form-control" id="numKids" name="numKids"
                                        placeholder="Enter Number of Kids">
                                </div>

                                <!-- SOS Contact -->
                                <div class="form-group">
                                    <label for="sos">SOS Contact</label>
                                    <input type="text" class="form-control" id="sos" name="sos"
                                        placeholder="Enter SOS Contact">
                                </div>

                                <!-- Religion -->
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control" id="religion" name="religion"
                                        placeholder="Enter Religion">
                                </div>

                                <!-- Ethnic Group -->
                                <div class="form-group">
                                    <label for="ethnicGroup">Ethnic Group</label>
                                    <input type="text" class="form-control" id="ethnicGroup" name="ethnicGroup"
                                        placeholder="Enter Ethnic Group">
                                </div>

                                <!-- Profile Image -->
                                <div class="form-group">
                                    <label for="profileImage">Profile Image</label>
                                    <input type="file" class="form-control-file" id="profileImage" name="profileImage">
                                </div>
                            </div>

                            <!-- Right Column (Emergency Contact Info) -->
                            <div class="col-md-6">
                                <!-- Emergency Contact Person -->
                                <div class="form-group">
                                    <label for="emergencyContactPerson">Emergency Contact Person</label>
                                    <input type="text" class="form-control" id="emergencyContactPerson"
                                        name="emergencyContactPerson" placeholder="Enter Emergency Contact Person">
                                </div>

                                <!-- Emergency Contact Relationship -->
                                <div class="form-group">
                                    <label for="emergencyContactRelationship">Emergency Contact Relationship</label>
                                    <input type="text" class="form-control" id="emergencyContactRelationship"
                                        name="emergencyContactRelationship" placeholder="Enter Relationship">
                                </div>

                                <!-- Emergency Contact -->
                                <div class="form-group">
                                    <label for="emergencyContact">Emergency Contact</label>
                                    <input type="text" class="form-control" id="emergencyContact"
                                        name="emergencyContact" placeholder="Enter Emergency Contact">
                                </div>

                                <!-- Emergency Home Phone -->
                                <div class="form-group">
                                    <label for="emergencyHomePhone">Emergency Home Phone</label>
                                    <input type="text" class="form-control" id="emergencyHomePhone"
                                        name="emergencyHomePhone" placeholder="Enter Emergency Home Phone">
                                </div>

                                <!-- Emergency Work Phone -->
                                <div class="form-group">
                                    <label for="emergencyWorkPhone">Emergency Work Phone</label>
                                    <input type="text" class="form-control" id="emergencyWorkPhone"
                                        name="emergencyWorkPhone" placeholder="Enter Emergency Work Phone">
                                </div>

                                <!-- Alternative Emergency Contact -->
                                <div class="form-group">
                                    <label for="altEmergencyContact">Alternative Emergency Contact</label>
                                    <input type="text" class="form-control" id="altEmergencyContact"
                                        name="altEmergencyContact" placeholder="Enter Alternative Emergency Contact">
                                </div>

                                <!-- Alternative Emergency Home Phone -->
                                <div class="form-group">
                                    <label for="altEmergencyHomePhone">Alternative Emergency Home Phone</label>
                                    <input type="text" class="form-control" id="altEmergencyHomePhone"
                                        name="altEmergencyHomePhone"
                                        placeholder="Enter Alternative Emergency Home Phone">
                                </div>

                                <!-- Alternative Emergency Work Phone -->
                                <div class="form-group">
                                    <label for="altEmergencyWorkPhone">Alternative Emergency Work Phone</label>
                                    <input type="text" class="form-control" id="altEmergencyWorkPhone"
                                        name="altEmergencyWorkPhone"
                                        placeholder="Enter Alternative Emergency Work Phone">
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary float-left prev-btn">Previous</button>
                            <button type="next" class="btn btn-success float-right">NEXT</button>
                        </div>
                    </form>
                </div>



                <div class="tab-pane fade" id="step5" role="tabpanel">
    <form id="biologicalform">
        <h6 class="font-weight-bold">Other Info</h6>
        <div class="row">
            <!-- Left Column (Personal and Biological Info) -->
            <div class="col-md-6">
                <!-- Blood Group -->
                <div class="form-group">
                    <label for="bloodGroup">Blood Group</label>
                    <select class="form-control" id="bloodGroup" name="bloodGroup">
                        <option value="">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <!-- Health Condition -->
                <div class="form-group">
                    <label for="healthCondition">Health Condition</label>
                    <input type="text" class="form-control" id="healthCondition" name="healthCondition" placeholder="Enter Health Condition">
                </div>

                <!-- Is Disabled (Radio buttons: Yes / No) -->
                <div class="form-group">
                    <label>Is Disabled?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="isDisabled" id="isDisabledYes" value="yes">
                        <label class="form-check-label" for="isDisabledYes">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="isDisabled" id="isDisabledNo" value="no">
                        <label class="form-check-label" for="isDisabledNo">No</label>
                    </div>
                </div>

                <!-- Disabilities Description -->
                <div class="form-group">
                    <label for="disabilitiesDesc">Disabilities Description</label>
                    <input type="text" class="form-control" id="disabilitiesDesc" name="disabilitiesDesc" placeholder="Describe Disabilities (if any)">
                </div>
            </div>

            <!-- Right Column (Contact Info) -->
            <div class="col-md-6">
                <!-- Home Email -->
                <div class="form-group">
                    <label for="homeEmail">Home Email</label>
                    <input type="email" class="form-control" id="homeEmail" name="homeEmail" placeholder="Enter Home Email">
                </div>

                <!-- Home Phone -->
                <div class="form-group">
                    <label for="homePhone">Home Phone</label>
                    <input type="tel" class="form-control" id="homePhone" name="homePhone" placeholder="Enter Home Phone">
                </div>

                <!-- Cell Phone -->
                <div class="form-group">
                    <label for="cellPhone">Cell Phone</label>
                    <input type="tel" class="form-control" id="cellPhone" name="cellPhone" placeholder="Enter Cell Phone">
                </div>

                <!-- Document Title -->
                <div class="form-group">
                    <label for="docTitle">Document Title *</label>
                    <input type="text" class="form-control" id="docTitle" name="docTitle" placeholder="Enter Document Title" required>
                </div>

                <!-- File Upload -->
                <div class="form-group">
                    <label for="fileUpload">File *</label>
                    <input type="file" class="form-control-file" id="fileUpload" name="fileUpload" required>
                </div>

                <!-- Expiry Date -->
                <div class="form-group">
                    <label for="expiryDate">Expiry Date *</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="form-group">
            <button type="button" class="btn btn-secondary float-left prev-btn">Previous</button>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
    </form>
</div>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    $(document).ready(function () {
        // Move to the next tab
        $(".next-btn").click(function () {
            let activeTab = $(".nav-tabs .active");
            let nextTab = activeTab.parent().next("li").find("a");
            nextTab.trigger("click");
        });

        // Move to the previous tab
        $(".prev-btn").click(function () {
            let activeTab = $(".nav-tabs .active");
            let prevTab = activeTab.parent().prev("li").find("a");
            prevTab.trigger("click");
        });
    });
</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\company\resources\views/employee/create.blade.php ENDPATH**/ ?>