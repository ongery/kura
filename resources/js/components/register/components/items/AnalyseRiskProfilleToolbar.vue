<template>
    <div class="form-row">
        <nav class="nav nav-tabs">
            <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskCauses" >Risk Sources</a>
            <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskEffects" >Risk Impacts</a>
            <a href="javascript:void(0)" class="nav-item nav-link" @clic.prevent="showRiskLevel" >Inherent Risk Level</a>
            <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showCurrentControls" >Current Controls</a>
            <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showResidualRiskLevel" >Residual Risk Level</a>
            <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showTreatment" >Treatment</a>
        </nav>
    </div>
</template>

<script>
    export default {
        name:'AnalyseRiskProfilleToolbar',

        data() {
            return {
                riskcauses: {},
                showcauses: false,
                showcontrols: false,
                showeffects: false,
                showtreatment: false,
                showrisklevels: false,
                showresidualrisklevel: false,
                alldata: {},
                riskevents: {},
                riskcauses: {},
                riskeffects: {},
                risk: {},
                likelihoodscales: {},
                consequencescale: {},
                scalesgroup: {},
                scalesgroupResidual: {},
                controlitems: {},
                alltreament: {},
                BName: '',
                RName: '',
                form: new Form({
                    id: '',
                    Name: '',
                    o_i_t_m_id: '',
                    ObjType: 12,
                    DateIdentified: '',
                    RiskCauseDescription: '',
                    RiskEffectsDescription: '',
                    RiskStatus: '',
                    created_at: '',
                    Status: '',
                    isSelected: '',
            
                    InherentLikelihoodScale: '',
                    ResidualLikelihoodScale: '',
                    ResidualConsequenceScale: '',
                    scalesgroup: {},
                    scalesgroupResidual: {}
                }),
                state: {
                    disabledDates: {
                        from: new Date()
                    }
                }
            }
        },    
        methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        CountChecked(mode) {
            var isSelected = mode.isSelected
            const token = this.getAuthToken();
            axios.get('/api/syncRelationship', {
                params: {
                    RiskID: localStorage.risk_id,
                    ItemID: mode.id,
                    isSelected: isSelected,
                    ObjType: mode.ObjType
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((res) => {
                if (res.data.ResultCode == 1200) {
                    this.riskcauses = res.data.ResponseData.causes
                    this.riskeffects = res.data.ResponseData.effects
                    this.controlitems = res.data.ResponseData.controlitems
                } 
                else {
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
                }
            })
            .catch((e) => {
                this.$Progress.fail()
                toast.fire({
                    type: 'error',
                    title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        loadCausesEffects() {
            const token = this.getAuthToken();
            axios.get('/api/getCausesEffects', {
                params: {
                    RiskID: localStorage.risk_id
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((res) => {
                if (res.data.ResultCode == 1200) {
                    this.riskcauses = res.data.ResponseData.causes
                    this.riskeffects = res.data.ResponseData.effects
                    this.controlitems = res.data.ResponseData.controlitems
                } 
                else {
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
                }
            })
            .catch((e) => {
                this.$Progress.fail()
                toast.fire({
                type: 'error',
                title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        loadLikelihoodScale() {
            const token = this.getAuthToken();
            axios.get('/api/likeLihoodScale',{
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((res) => {
                if (res.data.ResultCode == 1200) {
                    this.likelihoodscales = res.data.ResponseData
                } 
                else {
                    toast.fire({
                        type: 'error',
                        title: res.data.ResultDesc
                    })
                }
            })
            .catch((e) => {
                this.$Progress.fail()
                toast.fire({
                    type: 'error',
                    title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        updateAnalzeRisk() {
            const token = this.getAuthToken();
            this.form.scalesgroup = this.scalesgroup
            this.form.scalesgroupResidual = this.scalesgroupResidual
            this.$Progress.start()
            this.form
            .post('/api/updateAnalzeRisk',{
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(() => {
                $('#addNew').modal('hide')
                swal.fire('Updated!', 'Information has been updated.', 'success')
                this.$Progress.finish()
                Fire.$emit('AfterCreate')
            })
            .catch(() => {
                this.$Progress.fail()
            })
        },
        loadConsequenceScale() {
            const token = this.getAuthToken();
            axios.get('/api/loadConsequenceScale',{
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((res) => {
                if (res.data.ResultCode == 1200) {
                this.consequencescale = res.data.ResponseData
                } else {
                toast.fire({
                    type: 'error',
                    title: res.data.ResultDesc
                })
                }
            })
            .catch((e) => {
                this.$Progress.fail()
                toast.fire({
                type: 'error',
                title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        showRiskCauses() {
            this.showcauses = true
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },
        showRiskEffects() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = true
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },
        showCurrentControls() {
            this.showcauses = false
            this.showcontrols = true
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },
        showRiskLevel() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = true
            this.showresidualrisklevel = false
            this.showtreatment = false
        },
        showResidualRiskLevel() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = true
            this.showtreatment = false
        },
        showTreatment() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = true
        },
        loadRisk() {
            const token = this.getAuthToken();
            axios.get('/api/risks/' + localStorage.risk_id, {
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            }).then((res) => {
            this.form.fill(res.data.ResponseData)
            this.BName = res.data.ResponseData.bunit.Name
            this.RName = res.data.ResponseData.item.Name
            this.scalesgroup = res.data.ResponseData.scalesgroup
            this.scalesgroupResidual = res.data.ResponseData.scalesgroupresidual
            })
        },
    
        newModal() {
            this.editmode = false
            this.form.reset()
            $('#addNew').modal('show')
        },
        loadRiskEvents() {
            const token = this.getAuthToken();
            axios.get('/api/risklibrarysetup', {
                params: {
                    ObjType: 8
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then((res) => {
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
            .catch((e) => {
                this.$Progress.fail()
                toast.fire({
                type: 'error',
                title: 'Operation not successfull' + '\n' + e.response.data.message
                })
            })
        },
        GoBack() {
            this.$router.back()
        }
        },
        created() {
        this.showcauses = true
        this.loadCausesEffects()
        this.loadRisk()
        this.loadLikelihoodScale()
        this.loadConsequenceScale()
        this.showRiskCauses()
        this.loadRiskEvents(),
            Fire.$on('AfterCreate', () => {
            this.loadRisk()
            })
        }
    }

</script>