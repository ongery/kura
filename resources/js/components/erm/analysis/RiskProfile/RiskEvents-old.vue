<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-3">
                    <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Risks Level 1</h3>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" @click.prevent="addNewRiskCause" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                            Add Risks
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-column mb-5 p-6 fv-row">
                   <div class="form-row mt-5">
                        <div class="form-group col-md-6">
                            <label>Risk Event</label>
                            <v-select
                                v-model="form.o_i_t_m_id"
                                :options="riskevents"
                                :multiple="true"
                                :close-on-select="true"
                                :reduce="option => option.id"
                                label="Name"
                                track-by="id"
                            >
                                <template v-slot:noResult>
                                    <div>No options available.</div>
                                </template>
                            </v-select>
                        </div>
                    </div>
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
                ObjType: 22,
                riskevents: [],
                form: new Form({
                    id: '',
                    o_i_t_m_id: '',
                    ObjType: 23
                })
            }
        },
        components: { vSelect },
        methods: {
            loadRiskEventsData() {
                axios.get('/api/risklibrarysetup', {
                    params: {
                        ObjType: this.ObjType
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.riskevents = res.data.ResponseData.data
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
        created() {
            this.loadRiskEventsData();
        }
    }
</script>

<style>
.v-select .vs__dropdown-toggle {
    min-height: 50px;
    height: auto;
}
</style>
