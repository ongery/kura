<template>
    <div class="card row mt-2">
        <div class="card-header">
            <h3 class="card-title">
                CORPORATE RISK ANALYSIS
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <div>
                <form @submit.prevent="saveRisk()">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-row mt-5">
                                <div class="form-group col-md-6">
                                    <label><b>Corporate Risk:</b></label>
                                    <select class="form-control mt-2" v-model="form.o_i_t_m_id">
                                        <option value=""> -- </option>
                                        <option v-for="val in crAlldata" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mt-5">
                                <nav class="nav nav-tabs">
                                    <!-- <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskCauses">Risks Level 1</a> -->
                                    <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskEvents">Risk Events</a>
                                    <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskEffects">Risk Impacts</a>
                                    <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskLevel">Inherent Risk Level</a>
                                    <!-- <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showCurrentControls">Current Controls</a> -->
                                    <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showResidualRiskLevel">Residual Risk Level</a>
                                    <!-- <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showTreatment">Treatment</a> -->
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import CreateAction from './Actionindex.vue'
export default {
    data() {
        return {
            reports: {},
            editmode: true,
            BName: '',
            crAlldata: {},
            form: new Form({
                id: '',
                o_i_t_m_id: '',
                ObjType: 24
            })
        }
    },
    components: {
        Datepicker,
        CreateAction
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },

        loadCorporateRisks() {
            const token = this.getAuthToken();
            axios.get('/api/corporate-risks', {
                params: {
                    ObjType: this.form.ObjType
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(res => {
                this.$Progress.finish();
                if (res.data.ResultCode == 1200) {
                    this.crAlldata = res.data.ResponseData
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
        showRiskEvents() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showRiskCauses() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showRiskEffects() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showCurrentControls() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showRiskLevel() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showResidualRiskLevel() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        showTreatment() {
            toast.fire({
                type: 'error',
                title: 'Select Corporate Risk and Click Save First'
            })
        },
        saveRisk() {
            this.$Progress.start()
            this.form.post('/api/risks')
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.$Progress.finish()
                    swal.fire('Created!', 'Saved Successfully Created.', 'success')
                    localStorage.clear()
                    localStorage.setItem('risk_id', res.data.ResponseData)
                    this.$router.push({ path: '/ERM/AnalyseCorporateRiskProfile/'+res.data.ResponseData })
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
    },
    created() {
        this.loadCorporateRisks()
    }
}
</script>
