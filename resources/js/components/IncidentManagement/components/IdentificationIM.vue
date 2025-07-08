<template>
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active fs-6" id="nav-detection-tab" data-bs-toggle="tab" data-bs-target="#nav-detection" type="button" role="tab" aria-controls="nav-detection" aria-selected="true">Detection</button>

                <button class="nav-link fs-6" id="nav-assignment-tab" data-bs-toggle="tab" data-bs-target="#nav-assignment" type="button" role="tab" aria-controls="nav-assignment" aria-selected="false">Assignment</button>

                <button class="nav-link fs-6" id="nav-prioritization-tab" data-bs-toggle="tab" data-bs-target="#nav-prioritization" type="button" role="tab" aria-controls="nav-prioritization" aria-selected="false">Prioritization</button>

                <button class="nav-link fs-6" id="nav-location-tab" data-bs-toggle="tab" data-bs-target="#nav-location" type="button" role="tab" aria-controls="nav-location" aria-selected="false">Location</button>

                <button class="nav-link fs-6" id="nav-associations-tab" data-bs-toggle="tab" data-bs-target="#nav-associations" type="button" role="tab" aria-controls="nav-associations" aria-selected="false">Associations</button>
            </div>
        </nav>
        <div class="tab-content ps-10 mt-5" id="nav-tabContent">
            <!-- DETECTION SECTION -->
            <div class="tab-pane fade show active" id="nav-detection" role="tabpanel" aria-labelledby="nav-detection-tab" tabindex="0">
                <div class="form-group" >
                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Summary: </label>
                        <div class="col-sm-8">
                            <input type="text" name="summary" v-model="form.summary" id="summary" class="form-control" placeholder="Summary" autocomplete="off" />
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Details:  </label>
                        <div class="col-sm-8">
                            <input type="text" name="id_details" id="id_details" v-model="form.details" class="form-control" placeholder="Details" autocomplete="off" />
                        </div>
                        <has-error :form="form" field="id_details"></has-error>
                    </div>

                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Occurrence Type: </label>
                        <div class="col-sm-3">
                            <select name="occurrence_type" id="occurrence_type" class="form-control" v-model="form.occurrence_type" >
                                <option value="1" > Incident </option>
                                <option value="2" > Event </option>
                            </select>
                        </div>
                        
                        <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Direction: </label>
                        <div class="col-sm-3">
                            <select name="direction" id="direction" class="form-control" v-model="form.direction" >
                                <option value="1" > Not Specified </option>
                                <option value="2" > Inbound </option>
                                <option value="3" > Outbound </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Attack Vector: </label>
                        <div class="col-sm-3">
                            <select name="attack_vector" id="attack_vector" class="form-control" v-model="form.attack_vector" >
                                <option value="1" selected="">Not Specified</option>
                                <option value="2">External/Removable Media</option>
                                <option value="3">Attrition</option>
                                <option value="4">Web</option>
                                <option value="5">Email</option>
                                <option value="6">Impersonation</option>
                                <option value="7">Improper Usage</option>
                                <option value="8">Loss or Theft of Equipment</option>
                                <option value="9">Other</option>
                            </select>
                        </div>
                        
                        <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Detected By: </label>
                        <div class="col-sm-3">
                            <select name="detected_by" id="detected_by" class="form-control" v-model="form.detected_by" >
                                <option value="1">Not Specified</option>
                                <option value="2">Alert - IDPS</option>
                                <option value="3">Alert - SIEM</option>
                                <option value="4">Alert - Antivirus and antispam software</option>
                                <option value="5">Alert - File integrity checking software</option>
                                <option value="6">Alert - Third-party monitoring services</option>
                                <option value="7">Log - Operating system, service and application logs</option>
                                <option value="8">Log - Network device logs</option>
                                <option value="9">Log - Network flows</option>
                                <option value="10">Publicly Available Information - Information on new vulnerabilities and exploits</option>
                                <option value="12">People - People from other organizations</option>
                                <option value="11">People - People from within the organization</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Detected On: </label>
                        <div class="col-sm-3">
                            <datepicker :bootstrap-styling="true" name="detected_on" id="detected_on" v-model="form.detected_on" format="dd-MM-yyyy">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                        </div>
                        
                        <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Began On: </label>
                        <div class="col-sm-3">
                            <datepicker :bootstrap-styling="true" name="began_on" id="began_on" v-model="form.began_on" format="dd-MM-yyyy">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ASSIGNMENT SECTION -->
            <div class="tab-pane fade" id="nav-assignment" role="tabpanel" aria-labelledby="nav-assignment-tab" tabindex="0">
                <div class="form-group" >
                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Reported By: </label>
                        <div class="col-sm-3">
                            <select name="reported_by" id="reported_by" class="form-control" v-model="form.reported_by" >
                                <option value="" > -- </option>
                            </select>
                        </div>
                        
                        <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Owned By: </label>
                        <div class="col-sm-3">
                            <select name="owned_by" id="owned_by" class="form-control" v-model="form.owned_by" >
                                <option value="" > -- </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-5 d-flex gap-10">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Additional Stakeholders: </label>
                        <div class="col-sm-3">
                            <select name="additional_stakeholder[]" id="additional_stakeholder" class="form-control" v-model="form.additional_stakeholder" >
                                <option value="" > -- </option>
                            </select>
                        </div>
                        
                        <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Team(s): </label>
                        <div class="col-sm-3">
                            <select name="teams[]" id="teams" class="form-control" v-model="form.teams" multiple >
                                <option value="" > -- </option>
                                <option value="1">Branch Management</option>
                                <option value="2">Collaboration</option>
                                <option value="3">Data Center &amp; Storage</option>
                                <option value="4">Database</option>
                                <option value="5">Information Security</option>
                                <option value="6">IT Systems Management</option>
                                <option value="7">Network</option>
                                <option value="8">Unix</option>
                                <option value="9">Web Systems</option>
                                <option value="10">Windows</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRIORITIZATION SECTION -->
            <div class="tab-pane fade" id="nav-prioritization" role="tabpanel" aria-labelledby="nav-prioritization-tab" tabindex="0">
                <input type="hidden" name="priority" id="priority" :value="form.priority">
                <div class="form-group" >
                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Functional Impact: </label>
                        <div class="col-sm-5">
                            <select name="functional_impact" id="functional_impact" class="form-control" @change="calculatePriority" @click="functionalImpactSection" v-model="form.functional_impact" >
                                <option data-score="0" value="1" selected>None</option>
                                <option data-score="3" value="2">Low</option>
                                <option data-score="6" value="3">Medium</option>
                                <option data-score="9" value="4">High</option>
                            </select>
                        </div>
                        <img :src="imageSrc" style="height:24px; width:24px;" @click="functionalImpactSection" />
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Information Impact: </label>
                        <div class="col-sm-5">
                            <select name="information_impact" id="information_impact" class="form-control" @change="calculatePriority" @click="informationImpactSection" v-model="form.information_impact" >
                                <option data-score="0" value="1" selected>None</option>
                                <option data-score="3" value="2">Availability</option>
                                <option data-score="3" value="3">Configuration Breach</option>
                                <option data-score="6" value="4">Proprietary Breach</option>
                                <option data-score="6" value="5">Privacy Breach</option>
                                <option data-score="9" value="6">Integrity Loss</option>
                                <option data-score="12" value="7">Data Disclosure</option>
                            </select>
                        </div>
                        <img :src="imageSrc" style="height:24px; width:24px;" @click="informationImpactSection" />
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Recovery: </label>
                        <div class="col-sm-5">
                            <select name="recovery" id="recovery" class="form-control" @click="recoverySection" @change="calculatePriority" v-model="form.recovery" >
                                <option data-score="3" value="1" selected>Isolated</option>
                                <option data-score="6" value="2">Supplemented</option>
                                <option data-score="9" value="3">Extended</option>
                                <option data-score="12" value="4">Not Recoverable</option>
                            </select>
                        </div>
                        <img :src="imageSrc" style="height:24px; width:24px;" @click="recoverySection" />
                    </div>
                </div>

                <div class="table-responsive functional-impact-section" v-if="functionalImpactDiv">
                    <p class="mt-5"><b>Functional Impact: </b>Impact on the business functionality of the involved object and subject.</p>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>Impact</th>
                                <th>Score</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>None</td>
                                <td>0</td>
                                <td>No effect.</td>
                            </tr>
                            <tr>
                                <td>Low</td>
                                <td>3</td>
                                <td>Minimal effect leading to some efficiency lost, degradation, or partial supply on a given business function.</td>
                            </tr>
                            <tr>
                                <td>Medium</td>
                                <td>6</td>
                                <td>Business function is unavailable.</td>
                            </tr>
                            <tr>
                                <td>High</td>
                                <td>9</td>
                                <td>Critical business function is unavailable.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive information-impact-section" v-if="informationImpactDiv">
                    <p class="mt-5"><b>Information Impact: </b>Impact on confidentiality, integrity, and/or availability of information or IT infrastructure.</p>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>Impact</th>
                                <th>Score</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>None</td>
                                <td>0</td>
                                <td>Private, proprietary, and/or configuration data not affected.</td>
                            </tr>
                            <tr>
                                <td>Availability</td>
                                <td>3</td>
                                <td>Information or IT infrastructure unavailable.</td>
                            </tr>
                            <tr>
                                <td>Configuration Breach</td>
                                <td>3</td>
                                <td>Configuration data breach (passwords, configuration files).</td>
                            </tr>
                            <tr>
                                <td>Proprietary Breach</td>
                                <td>6</td>
                                <td>Proprietary data breach (business intelligence - Company Confidential).</td>
                            </tr>
                            <tr>
                                <td>Privacy Breach</td>
                                <td>6</td>
                                <td>Employee, temp. employee, contractor, partner, vendor, or client data breach (PII).</td>
                            </tr>
                            <tr>
                                <td>Integrity Loss</td>
                                <td>9</td>
                                <td>Integrity lost on private, proprietary, and/or configuration data.</td>
                            </tr>
                            <tr>
                                <td>Data Disclosure</td>
                                <td>12</td>
                                <td>Public disclosure of private, proprietary, and/or configuration data.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive recovery-section" v-if="recoveryDiv">
                    <p class="mt-5"><b>Recovery: </b>Amount of time and resources needed for investigation and remediation.</p>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>Impact</th>
                                <th>Score</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Isolated</td>
                                <td>3</td>
                                <td>Predictable effort; SIRT and subject.</td>
                            </tr>
                            <tr>
                                <td>Supplemented</td>
                                <td>6</td>
                                <td>Predictable effort; SIRT, subject, and technology or service owners, might include vendor.</td>
                            </tr>
                            <tr>
                                <td>Extended</td>
                                <td>9</td>
                                <td>Unpredictable effort; SIRT, subject, technology or service owners, interdepartmental collaboration, might include vendor.</td>
                            </tr>
                            <tr>
                                <td>Not Recoverable</td>
                                <td>12</td>
                                <td>Unpredictable effort or unable to recover; SIRT, subject, technology or service owners, interdepartmental collaboration, vendor, other external resources, technology replacement.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- LOCATION SECTION -->
            <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab" tabindex="0">
                <div class="form-group" >
                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Regions: </label>
                        <div class="col-sm-5">
                            <select name="regions[]" id="regions" class="form-control" multiple v-model="form.regions" >
                                <option value="1">Global</option>
                                <option value="2">External</option>
                                <option value="3">AMER</option>
                                <option value="4">APAC</option>
                                <option value="5">EMEIA</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Countries: </label>
                        <div class="col-sm-5">
                            <select name="countries[]" id="countries" class="form-control" multiple v-model="form.countries" >
                                <option value="4">Afghanistan</option>
                                <option value="7">Albania</option>
                                <option value="60">Algeria</option>
                                <option value="13">American Samoa</option>
                                <option value="2">Andorra</option>
                                <option value="10">Angola</option>
                                <option value="6">Anguilla</option>
                                <option value="11">Antarctica</option>
                                <option value="5">Antigua and Barbuda</option>
                                <option value="12">Argentina</option>
                                <option value="8">Armenia</option>
                                <option value="16">Aruba</option>
                                <option value="15">Australia</option>
                                <option value="14">Austria</option>
                                <option value="17">Azerbaijan</option>
                                <option value="31">Bahamas</option>
                                <option value="24">Bahrain</option>
                                <option value="20">Bangladesh</option>
                                <option value="19">Barbados</option>
                                <option value="35">Belarus</option>
                                <option value="21">Belgium</option>
                                <option value="36">Belize</option>
                                <option value="26">Benin</option>
                                <option value="27">Bermuda</option>
                                <option value="32">Bhutan</option>
                                <option value="29">Bolivia</option>
                                <option value="18">Bosnia and Herzegovina</option>
                                <option value="34">Botswana</option>
                                <option value="33">Bouvet Island</option>
                                <option value="30">Brazil</option>
                                <option value="105">British Indian Ocean Territory</option>
                                <option value="235">British Virgin Islands</option>
                                <option value="28">Brunei</option>
                                <option value="23">Bulgaria</option>
                                <option value="22">Burkina Faso</option>
                                <option value="25">Burundi</option>
                                <option value="116">Cambodia</option>
                                <option value="46">Cameroon</option>
                                <option value="37">Canada</option>
                                <option value="51">Cape Verde</option>
                                <option value="123">Cayman Islands</option>
                                <option value="40">Central African Republic</option>
                                <option value="211">Chad</option>
                                <option value="45">Chile</option>
                                <option value="47">China</option>
                                <option value="52">Christmas Island</option>
                                <option value="38">Cocos [Keeling] Islands</option>
                                <option value="48">Colombia</option>
                                <option value="118">Comoros</option>
                                <option value="39">Congo [DRC]</option>
                                <option value="41">Congo [Republic]</option>
                                <option value="44">Cook Islands</option>
                                <option value="49">Costa Rica</option>
                                <option value="97">Croatia</option>
                                <option value="50">Cuba</option>
                                <option value="53">Cyprus</option>
                                <option value="54">Czech Republic</option>
                                <option value="43">Côte d'Ivoire</option>
                                <option value="57">Denmark</option>
                                <option value="56">Djibouti</option>
                                <option value="58">Dominica</option>
                                <option value="59">Dominican Republic</option>
                                <option value="61">Ecuador</option>
                                <option value="63">Egypt</option>
                                <option value="207">El Salvador</option>
                                <option value="86">Equatorial Guinea</option>
                                <option value="65">Eritrea</option>
                                <option value="62">Estonia</option>
                                <option value="67">Ethiopia</option>
                                <option value="70">Falkland Islands [Islas Malvinas]</option>
                                <option value="72">Faroe Islands</option>
                                <option value="69">Fiji</option>
                                <option value="68">Finland</option>
                                <option value="73">France</option>
                                <option value="78">French Guiana</option>
                                <option value="173">French Polynesia</option>
                                <option value="212">French Southern Territories</option>
                                <option value="74">Gabon</option>
                                <option value="83">Gambia</option>
                                <option value="93">Gaza Strip</option>
                                <option value="77">Georgia</option>
                                <option value="55">Germany</option>
                                <option value="80">Ghana</option>
                                <option value="81">Gibraltar</option>
                                <option value="1">Global</option>
                                <option value="87">Greece</option>
                                <option value="82">Greenland</option>
                                <option value="76">Grenada</option>
                                <option value="85">Guadeloupe</option>
                                <option value="90">Guam</option>
                                <option value="89">Guatemala</option>
                                <option value="79">Guernsey</option>
                                <option value="84">Guinea</option>
                                <option value="91">Guinea-Bissau</option>
                                <option value="92">Guyana</option>
                                <option value="98">Haiti</option>
                                <option value="95">Heard Island and McDonald Islands</option>
                                <option value="96">Honduras</option>
                                <option value="94">Hong Kong</option>
                                <option value="99">Hungary</option>
                                <option value="108">Iceland</option>
                                <option value="104">India</option>
                                <option value="100">Indonesia</option>
                                <option value="107">Iran</option>
                                <option value="106">Iraq</option>
                                <option value="101">Ireland</option>
                                <option value="103">Isle of Man</option>
                                <option value="102">Israel</option>
                                <option value="109">Italy</option>
                                <option value="111">Jamaica</option>
                                <option value="113">Japan</option>
                                <option value="110">Jersey</option>
                                <option value="112">Jordan</option>
                                <option value="124">Kazakhstan</option>
                                <option value="114">Kenya</option>
                                <option value="117">Kiribati</option>
                                <option value="241">Kosovo</option>
                                <option value="122">Kuwait</option>
                                <option value="115">Kyrgyzstan</option>
                                <option value="125">Laos</option>
                                <option value="134">Latvia</option>
                                <option value="126">Lebanon</option>
                                <option value="131">Lesotho</option>
                                <option value="130">Liberia</option>
                                <option value="135">Libya</option>
                                <option value="128">Liechtenstein</option>
                                <option value="132">Lithuania</option>
                                <option value="133">Luxembourg</option>
                                <option value="146">Macau</option>
                                <option value="142">Macedonia [FYROM]</option>
                                <option value="140">Madagascar</option>
                                <option value="154">Malawi</option>
                                <option value="156">Malaysia</option>
                                <option value="153">Maldives</option>
                                <option value="143">Mali</option>
                                <option value="151">Malta</option>
                                <option value="141">Marshall Islands</option>
                                <option value="148">Martinique</option>
                                <option value="149">Mauritania</option>
                                <option value="152">Mauritius</option>
                                <option value="243">Mayotte</option>
                                <option value="155">Mexico</option>
                                <option value="71">Micronesia</option>
                                <option value="138">Moldova</option>
                                <option value="137">Monaco</option>
                                <option value="145">Mongolia</option>
                                <option value="139">Montenegro</option>
                                <option value="150">Montserrat</option>
                                <option value="136">Morocco</option>
                                <option value="157">Mozambique</option>
                                <option value="144">Myanmar [Burma]</option>
                                <option value="158">Namibia</option>
                                <option value="167">Nauru</option>
                                <option value="166">Nepal</option>
                                <option value="164">Netherlands</option>
                                <option value="9">Netherlands Antilles</option>
                                <option value="159">New Caledonia</option>
                                <option value="169">New Zealand</option>
                                <option value="163">Nicaragua</option>
                                <option value="160">Niger</option>
                                <option value="162">Nigeria</option>
                                <option value="168">Niue</option>
                                <option value="161">Norfolk Island</option>
                                <option value="120">North Korea</option>
                                <option value="147">Northern Mariana Islands</option>
                                <option value="165">Norway</option>
                                <option value="170">Oman</option>
                                <option value="176">Pakistan</option>
                                <option value="183">Palau</option>
                                <option value="181">Palestinian Territories</option>
                                <option value="171">Panama</option>
                                <option value="174">Papua New Guinea</option>
                                <option value="184">Paraguay</option>
                                <option value="172">Peru</option>
                                <option value="175">Philippines</option>
                                <option value="179">Pitcairn Islands</option>
                                <option value="177">Poland</option>
                                <option value="182">Portugal</option>
                                <option value="180">Puerto Rico</option>
                                <option value="185">Qatar</option>
                                <option value="187">Romania</option>
                                <option value="189">Russia</option>
                                <option value="190">Rwanda</option>
                                <option value="186">Réunion</option>
                                <option value="197">Saint Helena</option>
                                <option value="119">Saint Kitts and Nevis</option>
                                <option value="127">Saint Lucia</option>
                                <option value="178">Saint Pierre and Miquelon</option>
                                <option value="233">Saint Vincent and the Grenadines</option>
                                <option value="240">Samoa</option>
                                <option value="202">San Marino</option>
                                <option value="191">Saudi Arabia</option>
                                <option value="203">Senegal</option>
                                <option value="188">Serbia</option>
                                <option value="193">Seychelles</option>
                                <option value="201">Sierra Leone</option>
                                <option value="196">Singapore</option>
                                <option value="200">Slovakia</option>
                                <option value="198">Slovenia</option>
                                <option value="192">Solomon Islands</option>
                                <option value="204">Somalia</option>
                                <option value="244">South Africa</option>
                                <option value="88">South Georgia and the South Sandwich Islands</option>
                                <option value="121">South Korea</option>
                                <option value="66">Spain</option>
                                <option value="129">Sri Lanka</option>
                                <option value="194">Sudan</option>
                                <option value="205">Suriname</option>
                                <option value="199">Svalbard and Jan Mayen</option>
                                <option value="209">Swaziland</option>
                                <option value="195">Sweden</option>
                                <option value="42">Switzerland</option>
                                <option value="208">Syria</option>
                                <option value="206">São Tomé and Príncipe</option>
                                <option value="224">Taiwan</option>
                                <option value="215">Tajikistan</option>
                                <option value="225">Tanzania</option>
                                <option value="214">Thailand</option>
                                <option value="217">Timor-Leste</option>
                                <option value="213">Togo</option>
                                <option value="216">Tokelau</option>
                                <option value="220">Tonga</option>
                                <option value="222">Trinidad and Tobago</option>
                                <option value="219">Tunisia</option>
                                <option value="221">Turkey</option>
                                <option value="218">Turkmenistan</option>
                                <option value="210">Turks and Caicos Islands</option>
                                <option value="223">Tuvalu</option>
                                <option value="228">U.S. Minor Outlying Islands</option>
                                <option value="236">U.S. Virgin Islands</option>
                                <option value="227">Uganda</option>
                                <option value="226">Ukraine</option>
                                <option value="3">United Arab Emirates</option>
                                <option value="75">United Kingdom</option>
                                <option value="229">United States</option>
                                <option value="230">Uruguay</option>
                                <option value="231">Uzbekistan</option>
                                <option value="238">Vanuatu</option>
                                <option value="232">Vatican City</option>
                                <option value="234">Venezuela</option>
                                <option value="237">Vietnam</option>
                                <option value="239">Wallis and Futuna</option>
                                <option value="64">Western Sahara</option>
                                <option value="242">Yemen</option>
                                <option value="245">Zambia</option>
                                <option value="246">Zimbabwe</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Cities: </label>
                        <div class="col-sm-5">
                            <select name="cities[]" id="cities" class="form-control" multiple v-model="form.cities" >
                                <option value="1">Global</option>
                                <option value="2">External</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ASSOCIATIONS SECTION -->
            <div class="tab-pane fade" id="nav-associations" role="tabpanel" aria-labelledby="nav-associations-tab" tabindex="0">
                <div class="form-group" >
                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end"> Related Incidents: </label>
                        <div class="col-sm-5">
                            <select name="related_incidents" id="related_incidents" class="form-control" multiple v-model="form.related_incidents" >
                                <option value=""> -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Related Risks: </label>
                        <div class="col-sm-5">
                            <select name="related_risks" id="related_risks" class="form-control" multiple v-model="form.related_risk" >
                                <option value=""> -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Affected Assets: </label>
                        <div class="col-sm-5">
                            <select name="affected_assets" id="affected_assets" class="form-control" multiple v-model="form.affected_assets" >
                                <option value="1_asset">System</option>
                                <option value="2_asset">Network</option>
                                <option value="3_asset">Application</option>
                            </select>
                            <p class="text-danger">Select an Asset or Asset Group. You can create a new Asset by adding its name to the list.</p>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Source Tags: </label>
                        <div class="col-sm-5">
                            <select name="source_tags" id="source_tags" class="form-control" multiple v-model="form.source_tags" >
                                <option value=""> -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5 d-flex gap-10 align-items-lg-center">
                        <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Destination Tags: </label>
                        <div class="col-sm-5">
                            <select name="destination_tags" id="destination_tags" class="form-control" multiple v-model="form.destination_tags" >
                                <option value=""> -- </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
    name: 'IncidentManToolbar',
    props: {
        form: {
            type: Object,
            required: true
        }
    },
    components: { Datepicker },
    data() {
        return {
            functionalImpactDiv: true,
            informationImpactDiv: false,
            recoveryDiv: false,
            imageSrc: '/img/question-mark.png',
        };
    },
    mounted() {
        // Calculate the initial total score when the component is mounted
        this.calculatePriority();
    },
    methods: {
        functionalImpactSection() {
            this.functionalImpactDiv = true;
            this.informationImpactDiv = false;
            this.recoveryDiv = false;
        },
        informationImpactSection() {
            this.functionalImpactDiv = false;
            this.informationImpactDiv = true;
            this.recoveryDiv = false;
        },
        recoverySection() {
            this.functionalImpactDiv = false;
            this.informationImpactDiv = false;
            this.recoveryDiv = true;
        },

        calculatePriority() {
            const score1 = this.getScore('functional_impact');
            const score2 = this.getScore('information_impact');
            const score3 = this.getScore('recovery');
            
            this.form.priority = parseInt(score1) + parseInt(score2) + parseInt(score3);
        },
        getScore(selectId) {
            const selectElement = document.getElementById(selectId);
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            return selectedOption.getAttribute('data-score');
        },
    },
}
</script>
