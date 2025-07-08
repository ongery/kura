<template>
    <div class=" row mt-2">
        <IncidentManToolbar :title="'New Incident'"></IncidentManToolbar>

        <form @submit.prevent="createIncidentManagement()">
            <div class="row card card-body p-12 m-1">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active fs-4" id="nav-preparation-tab" data-bs-toggle="tab" data-bs-target="#nav-preparation" type="button" role="tab" aria-controls="nav-preparation" aria-selected="true" @click="visibleCreateBtn('preparation')">Preparation</button>

                        <button class="nav-link fs-4" id="nav-identification-tab" data-bs-toggle="tab" data-bs-target="#nav-identification" type="button" role="tab" aria-controls="nav-identification" aria-selected="false" @click="visibleCreateBtn('identification')">Identification</button>

                        <button class="nav-link fs-4" id="nav-response-tab" data-bs-toggle="tab" data-bs-target="#nav-response" type="button" role="tab" aria-controls="nav-response" aria-selected="false" @click="visibleCreateBtn('response')" ref="responseIM">Response</button>

                        <button class="nav-link fs-4" id="nav-leasons-learned-tab" data-bs-toggle="tab" data-bs-target="#nav-leasons-learned" type="button" role="tab" aria-controls="nav-leasons-learned" aria-selected="false" @click="visibleCreateBtn('leasons-learned')">Lessons Learned</button>

                        <button class="nav-link fs-4" id="nav-closed-tab" data-bs-toggle="tab" data-bs-target="#nav-closed" type="button" role="tab" aria-controls="nav-closed" aria-selected="false" @click="visibleCreateBtn('closed')">Closed</button>

                        <button
                            class="nav-link fs-4"
                            id="nav-response-data-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-response-data"
                            type="button"
                            role="tab"
                            aria-controls="nav-response-data"
                            aria-selected="false"
                            @click="visibleCreateBtn('response-data')"
                            ref="responseDataTab"
                            v-if="displayResTab"
                        > 
                            Response Details </button>
                    </div>
                </nav>
                <div class="tab-content ps-15 mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-preparation" role="tabpanel" aria-labelledby="nav-preparation-tab" tabindex="0">
                        <PreparationIM :title="'Preparation'" :form="form"></PreparationIM>
                    </div>

                    <div class="tab-pane fade" id="nav-identification" role="tabpanel" aria-labelledby="nav-identification-tab" tabindex="0">
                        <IdentificationIM :title="'Identification'" :form="form"></IdentificationIM>
                    </div>

                    <div class="tab-pane fade" id="nav-response" role="tabpanel" aria-labelledby="nav-response-tab" tabindex="0">
                        <ResponseIM :title="'Response'" ref="ResponseIMRef" :parentMethod="showResponseData"></ResponseIM>
                    </div>

                    <div class="tab-pane fade" id="nav-leasons-learned" role="tabpanel" aria-labelledby="nav-leasons-learned-tab" tabindex="0">
                        <LessonsLearnedIM :title="'Lessons Learned'"></LessonsLearnedIM>
                    </div>

                    <div class="tab-pane fade" id="nav-closed" role="tabpanel" aria-labelledby="nav-closed-tab" tabindex="0">
                        <ClosedIM :title="'Closed'"></ClosedIM>
                    </div>

                    <div class="tab-pane fade" id="nav-response-data" role="tabpanel" aria-labelledby="nav-response-data-tab" tabindex="0" v-if="displayResTab">
                        <ResponseDetailIM :title="'Response Data'" :dataId="responseId"></ResponseDetailIM>
                    </div>
                </div>
            
                <div class="modal-footer mt-15" v-if="displayBtn">
                    <button type="submit" class="btn btn-primary"> Create </button>
                </div>
            </div>

        </form>
    </div>
</template>

<script>
import IncidentManToolbar from './components/IncidentManToolbar.vue';
import PreparationIM from './components/PreparationIM.vue';
import IdentificationIM from './components/IdentificationIM.vue';
import ResponseIM from './components/ResponseIM.vue';
import LessonsLearnedIM from './components/LessonsLearnedIM.vue';
import ClosedIM from './components/ClosedIM.vue';
import ResponseDetailIM from './components/ResponseDetailIM.vue';
export default {
    data() {
        return {
            ResponseIMRef: null,
            responseId: null,
            displayBtn: false,
            displayResTab: false,
            categories: {},
            riskevents: {},
            users: {},
            form: new Form(this.resetDefaultFormField()),
        }
    },
    components: {
        IncidentManToolbar,
        PreparationIM,
        IdentificationIM,
        ResponseIM,
        LessonsLearnedIM,
        ClosedIM,
        ResponseDetailIM
    },
    methods: {
        resetDefaultFormField() {
            return {
                id: '',
                communications: {
                    communication_1: false,
                    communication_2: false,
                    communication_3: false,
                    communication_4: false,
                    communication_5: false,
                    communication_6: false
                },
                facilities: {
                    facilities_1: false,
                    facilities_2: false
                },
                hardware: {
                    hardware_1: false,
                    hardware_2: false,
                    hardware_3: false,
                    hardware_4: false,
                    hardware_5: false,
                    hardware_6: false
                },
                software: {
                    software_1: false,
                    software_2: false,
                    software_3: false,
                    software_4: false
                },
                resource: {
                    resources_1: false,
                    resources_2: false,
                    resources_3: false,
                    resources_4: false,
                    resources_5: false
                },
                summary: '',
                details: '',
                occurrence_type: '',
                direction: '',
                attack_vector: '',
                detected_by: '',
                detected_on: this.formatDate(new Date()),
                began_on: this.formatDate(new Date()),
                reported_by: '',
                owned_by: '',
                additional_stakeholder: [],
                teams: [],
                functional_impact: '1',
                information_impact: '1',
                recovery: '1',
                priority: 0,
                regions: [],
                countries: [],
                cities: [],
                related_incidents: [],
                related_risk: [],
                affected_assets: [],
                source_tags: [],
                destination_tags: []
            }
        },
        formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}`;
        },

        visibleCreateBtn(tab) {
            if(tab == 'identification') { 
                this.displayBtn = true;
                this.displayResTab = false;
            }
            else if(tab == 'response-data') { this.displayResTab = true; }
            else { 
                this.displayBtn = false;
                this.displayResTab = false;
            }
        },
        createIncidentManagement() {
            this.form.detected_on = moment(this.form.detected_on).format('YYYY-MM-DD')
            this.form.began_on = moment(this.form.began_on).format('YYYY-MM-DD')
            this.$Progress.start()
            this.form.post('/api/incident-management').then(res => {
                if (res.data.ResultCode == 1200) {
                    toast.fire({
                        type: 'success',
                        title: 'Incident Management created successfully'
                    })
                    const lastInsertId = res.data.ResponseData;
                    this.showResponseData(lastInsertId);

                    this.form = new Form(this.resetDefaultFormField());
                    this.$Progress.finish()
                } else {
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    });
                }
            })
            .catch(e => {
                this.$Progress.fail()
                toast.fire({
                    type: 'error',
                    title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        showResponseData(dataId) {
            this.displayResTab = true;
            this.responseId = dataId;

            // Wait for the DOM to update, then trigger a click on the tab
            this.$nextTick(() => {
                // SHOW RESPONSE DETAILS TAB
                // this.$refs.responseDataTab.click();

                // SHOW RESPONSE TAB
                this.$refs.responseIM.click();

                // REFRESH / RELOAD RESPONSE TAB WITH LATEST DATA
                if (this.$refs.ResponseIMRef) {
                    this.$refs.ResponseIMRef.loadIncidentManagement();
                }
            });
        },
        GoBack() {
            this.$router.back()
        }
    },
    created() {}
}
</script>
