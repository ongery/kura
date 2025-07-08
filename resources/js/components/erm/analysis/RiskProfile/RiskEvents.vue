<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-3">
                    <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Risks Events</h3>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="javascript:void(0)" @click.prevent="addNewRiskCause" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                            Add Risk Events
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column mb-5 p-6 fv-row">
                    <table class="table table-bordered table-hover table-sm mt-2">
                        <tbody class="p-4">
                            <tr v-for="(mode, index) in filteredCauses" :key="mode.id">
                                <td> {{ index + 1 }} </td>
                                <td>{{ mode.Name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel"> Risk Events Selection </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <label>Risk Event</label>
                                <v-select
                                    v-model="selectedRiskEvents"
                                    :options="riskevents"
                                    :multiple="true"
                                    :close-on-select="false"
                                    :reduce="option => option.id"
                                    label="Name"
                                    track-by="id"
                                    @input="handleRiskEventSelectChange"
                                >
                                    <template v-slot:noResult>
                                        <div>No options available.</div>
                                    </template>
                                </v-select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" @click="closeModel"> Ok </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

export default {
    data() {
        return {
            editmode: false,
            showmode: '',
            alldata: {},
            reports: {},
            filteredriskcauses: {},
            riskcauses: [],
            riskeffects: {},
            allcauses: {},
            allLevelOneRisks: [],
            RiskID: '',
            allLevelOneRisksSearched: [],
            selectedRiskEvents: [],
            previousSelectedRiskEvents: [],
            ObjType: 22,
            riskevents: [],
            form: new Form({
                search: ''
            })
        }
    },
    components: { vSelect },
    watch: {
        '$route.params.id': {
            handler: 'setRiskId',
            immediate: true
        }
    },
    methods: {
        closeModel() {
            this.editMode = false
            this.form.reset()
            $('#addNew').modal('hide')
        },
        setRiskId(id) {
            this.RiskID = id
        },
        handleRiskEventSelectChange(currentSelected) {
            // Find the newly selected options (added)
            const newlySelected = currentSelected.filter(
                id => !this.previousSelectedRiskEvents.includes(id)
            );

            // Find the removed options (deselected)
            const removedOptions = this.previousSelectedRiskEvents.filter(
                id => !currentSelected.includes(id)
            );

            // Handle newly selected options
            newlySelected.forEach(id => {
                const selectedItem = this.riskevents.find(event => event.id === id);
                selectedItem.isSelected = true;
                
                // Call CountChecked with selOptionId and isSelected = true
                this.CountChecked(id, true);
            });

            // Handle removed options
            removedOptions.forEach(id => {
                const removedItem = this.riskevents.find(event => event.id === id);
                removedItem.isSelected = false;
                
                // Call CountChecked with selOptionId and isSelected = false
                this.CountChecked(id, false);
            });

            // Update the previousSelectedRiskEvents for future comparisons
            this.previousSelectedRiskEvents = [...currentSelected];
        },
        CountChecked(optionId, isSelected) {
            axios.get('/api/syncMainRiskRelationship', {
                params: {
                    RiskID: this.RiskID,
                    ItemID: optionId,
                    isSelected: isSelected,
                    // ObjType: this.ObjType
                    ObjType: 8
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    Fire.$emit('AfterCreate')
                    toast.fire({
                        type: 'success',
                        title: 'Operation Successfull'
                    })
                } else {
                    console.log(res.data.ResultDesc)
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
                }
                localStorage.setItem('risk_id', this.RiskID)
            })
            .catch(e => {
                this.$Progress.fail()
                toast.fire({
                    type: 'error',
                    title: 'Operation not successfull' + '\n' + e.response.message
                })
            })
        },
        loadLevelOneRisks() {
            // axios.get('/api/getLevelOneRisk', {
            axios.get('/api/getLevelOneRiskEvents', {
                params: {
                    RiskID: this.RiskID,
                    // ObjType: this.ObjType,
                    ObjType: 8,
                    paginate: 1
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.allLevelOneRisks = res.data.ResponseData;
                    this.selectedRiskEvents = this.allLevelOneRisks.filter(event => event.isSelected).map(event => event.id);
                    this.previousSelectedRiskEvents = [...this.selectedRiskEvents];
                } else {
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
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
        loadRiskCauses() {
            axios
                .get('/api/getRiskCauses', {
                    params: {
                        RiskID: this.RiskID,
                        ObjType: 7
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.allcauses = res.data.ResponseData
                    } else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        })
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
        addNewRiskCause() {
            $('#addNew').modal('show')
        },
        searchItem() {
            Fire.$emit('searching')
        },
        loadRiskEventsData() {
            axios.get('/api/risklibrarysetup', {
                params: {
                    ObjType: 8
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.riskevents = res.data.ResponseData.data;
                } else {
                    console.log(res.data.ResultDesc)
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
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
    },
    computed: {
        filteredCauses: function() {
            return this.allLevelOneRisks.filter(function(e) {
                if (e.isSelected == true) {
                    return e
                }
            })
        }
    },
    created() {
        this.loadLevelOneRisks();
        this.loadRiskEventsData();
        Fire.$on('AfterCreate', () => {
            this.loadLevelOneRisks()
        });

        /*Fire.$on('searching', () => {
            let query = this.form.search
            if (this.form.search == null) {
                this.allLevelOneRisks = []
            } else {
                this.allLevelOneRisks = []
                axios
                    .get('/api/findERMRiskLevelOne?q=' + query, {
                        params: {
                            RiskID: this.RiskID,
                            ObjType: 22,
                            paginate: 1
                        }
                    })
                    .then(res => {
                        if (res.data.ResultCode == 1200) {
                            this.allLevelOneRisks = res.data.ResponseData
                        } else {
                            toast.fire({
                                type: 'error',
                                title: res.data.ResultDesc
                            })
                        }
                    })
                    .catch(e => {
                        this.$Progress.fail()
                        toast.fire({
                            type: 'error',
                            title: 'Operation not successfull' + '\n' + e.response.data.message
                        })
                    })
            }
        })*/
    }
}
</script>
