<template>
    <div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active fs-6" id="nav-communications-tab" data-bs-toggle="tab" data-bs-target="#nav-communications" type="button" role="tab" aria-controls="nav-communications" aria-selected="true">Communications</button>

                <button class="nav-link fs-6" id="nav-facilities-tab" data-bs-toggle="tab" data-bs-target="#nav-facilities" type="button" role="tab" aria-controls="nav-facilities" aria-selected="false">Facilities</button>

                <button class="nav-link fs-6" id="nav-hardware-tab" data-bs-toggle="tab" data-bs-target="#nav-hardware" type="button" role="tab" aria-controls="nav-hardware" aria-selected="false">Hardware</button>

                <button class="nav-link fs-6" id="nav-software-tab" data-bs-toggle="tab" data-bs-target="#nav-software" type="button" role="tab" aria-controls="nav-software" aria-selected="false">Software</button>

                <button class="nav-link fs-6" id="nav-resources-tab" data-bs-toggle="tab" data-bs-target="#nav-resources" type="button" role="tab" aria-controls="nav-resources" aria-selected="false">Resources</button>
            </div>
        </nav>
        <div class="tab-content ps-10 mt-5" id="nav-tabContent">
            <!-- COMMUNICATION SECTION -->
            <div class="tab-pane fade show active" id="nav-communications" role="tabpanel" aria-labelledby="nav-communications-tab" tabindex="0">
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_1" v-model="form.communications.communication_1" id="communication_1" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_1" class="fs-6"> Contact information for team members and others within and outside the organization (primary and backup contacts), such as law enforcement and other incident response teams; information may include phone numbers, email addresses, public encryption keys (in accordance with the encryption software described below), and instructions for verifying the contact’s identity. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_2" v-model="form.communications.communication_2" id="communication_2" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_2" class="fs-6"> On-call information for other teams within the organization, including escalation information. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_3" v-model="form.communications.communication_3" id="communication_3" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_3" class="fs-6"> Incident reporting mechanisms, such as phone numbers, email addresses, online forms, and secure instant messaging systems that users can use to report suspected incidents; at least one mechanism should permit people to report incidents anonymously. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_4" v-model="form.communications.communication_4" id="communication_4" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_4" class="fs-6"> Issue tracking system for tracking incident information, status, etc. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_5" v-model="form.communications.communication_5" id="communication_5" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_5" class="fs-6"> Smartphones to be carried by team members for off-hour support and onsite communications. </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <input type="checkbox" name="communication_6" v-model="form.communications.communication_6" id="communication_6" />
                    </div>
                    <div class="col-sm-11">
                        <label for="communication_6" class="fs-6"> Encryption software to be used for communications among team members, within the organization and with external parties; for Federal agencies, software must use a FIPS-validated encryption algorithm. </label>
                    </div>
                </div>
            </div>

            <!-- FACILITIES SECTION -->
            <div class="tab-pane fade" id="nav-facilities" role="tabpanel" aria-labelledby="nav-facilities-tab" tabindex="0">
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="facilities_1" v-model="form.facilities.facilities_1" id="facilities_1" />
                    </div>
                    <div class="col-sm-11">
                        <label for="facilities_1" class="fs-6"> War room for central communication and coordination; if a permanent war room is not necessary or practical, the team should create a procedure for procuring a temporary war room when needed. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="facilities_2" v-model="form.facilities.facilities_2" id="facilities_2" />
                    </div>
                    <div class="col-sm-11">
                        <label for="facilities_2" class="fs-6"> Secure storage facility for securing evidence and other sensitive materials. </label>
                    </div>
                </div>
            </div>

            <!-- HARDWARE SECTION -->
            <div class="tab-pane fade" id="nav-hardware" role="tabpanel" aria-labelledby="nav-hardware-tab" tabindex="0">
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_1" v-model="form.hardware.hardware_1" id="hardware_1" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_1" class="fs-6"> Digital forensic workstations and/or backup devices to create disk images, preserve log files, and save other relevant incident data. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_2" v-model="form.hardware.hardware_2" id="hardware_2" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_2" class="fs-6"> Laptops for activities such as analyzing data, sniffing packets, and writing reports. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_3" v-model="form.hardware.hardware_3" id="hardware_3" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_3" class="fs-6"> Spare workstations, servers, and networking equipment, or the virtualized equivalents, which may be used for many purposes, such as restoring backups and trying out malware. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_4" v-model="form.hardware.hardware_4" id="hardware_4" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_4" class="fs-6"> Blank removable media. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_5" v-model="form.hardware.hardware_5" id="hardware_5" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_5" class="fs-6"> Portable printer to print copies of log files and other evidence from non-networked systems. </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <input type="checkbox" name="hardware_6" v-model="form.hardware.hardware_6" id="hardware_6" />
                    </div>
                    <div class="col-sm-11">
                        <label for="hardware_6" class="fs-6"> Evidence gathering accessories, including hard-bound notebooks, digital cameras, audio recorders, chain of custody forms, evidence storage bags and tags, and evidence tape, to preserve evidence for possible legal actions. </label>
                    </div>
                </div>
            </div>

            <!-- SOFTWARE SECTION -->
            <div class="tab-pane fade" id="nav-software" role="tabpanel" aria-labelledby="nav-software-tab" tabindex="0">
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="software_1" v-model="form.software.software_1" id="software_1" />
                    </div>
                    <div class="col-sm-11">
                        <label for="software_1" class="fs-6"> Packet sniffers and protocol analyzers to capture and analyze network traffic. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="software_2" v-model="form.software.software_2" id="software_2" />
                    </div>
                    <div class="col-sm-11">
                        <label for="software_2" class="fs-6"> Digital forensic software to analyze disk images. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="software_3" v-model="form.software.software_3" id="software_3" />
                    </div>
                    <div class="col-sm-11">
                        <label for="software_3" class="fs-6"> Removable media with trusted versions of programs to be used to gather evidence from systems. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="software_4" v-model="form.software.software_4" id="software_4" />
                    </div>
                    <div class="col-sm-11">
                        <label for="software_4" class="fs-6"> Access to images of clean OS and application installations for restoration and recovery purposes. </label>
                    </div>
                </div>
            </div>

            <!-- RESOURCES SECTION -->
            <div class="tab-pane fade" id="nav-resources" role="tabpanel" aria-labelledby="nav-resources-tab" tabindex="0">
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="resources_1" v-model="form.resource.resources_1" id="resources_1" />
                    </div>
                    <div class="col-sm-11">
                        <label for="resources_1" class="fs-6"> Port lists, including commonly used ports and Trojan horse ports. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="resources_2" v-model="form.resource.resources_2" id="resources_2" />
                    </div>
                    <div class="col-sm-11">
                        <label for="resources_2" class="fs-6"> Documentation for OSs, applications, protocols, and intrusion detection and antivirus products. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="resources_3" v-model="form.resource.resources_3" id="resources_3" />
                    </div>
                    <div class="col-sm-11">
                        <label for="resources_3" class="fs-6"> Network diagrams and lists of critical assets, such as database servers. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="resources_4" v-model="form.resource.resources_4" id="resources_4" />
                    </div>
                    <div class="col-sm-11">
                        <label for="resources_4" class="fs-6"> Current baselines of expected network, system, and application activity. </label>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-1">
                        <input type="checkbox" name="resources_5" v-model="form.resource.resources_5" id="resources_5" />
                    </div>
                    <div class="col-sm-11">
                        <label for="resources_5" class="fs-6"> Cryptographic hashes of critical files to speed incident analysis, verification, and eradication. </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        form: {
            type: Object,
            required: true
        },
    },
};
</script>
