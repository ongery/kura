<template>
    <div class="tab-content ps-10 mt-5" id="nav-tabContent">
        <div class="row gap-10 top-section">
            <div class="col-sm-1 grid-section">
                <p>Priority</p>
                <p>{{IncidentData.priority}}</p>
                <p>Sev4</p>
            </div>
            <div class="col-sm-1 grid-section">
                <p>Functional</p>
                <p>{{parseInt(IncidentData.functional_impact)}}</p>
                <p>None</p>
            </div>
            <div class="col-sm-1 grid-section">
                <p>Information</p>
                <p>{{parseInt(IncidentData.information_impact)}}</p>
                <p>None</p>
            </div>
            <div class="col-sm-1 grid-section">
                <p>Recovery</p>
                <p>{{parseInt(IncidentData.recovery)}}</p>
                <p>Isolated</p>
            </div>
            
            <div class="col-sm-4">
                <p><b>ID #:</b> {{IncidentData.id}}</p>
                <p class="d-flex gap-3 align-items-center">
                    <b>Status:</b> 
                    <select v-model="IncidentData.Status" name="change_status" id="change_status" class="form-control" >
                        <option :value="0">Response: New</option>
                        <option :value="1">Response: Containment</option>
                        <option :value="2">Response: Eradication</option>
                        <option :value="3">Response: Recovery</option>
                        <option :value="4">Closed: Duplicated</option>
                        <option :value="5">Closed: Error</option>
                        <option :value="6">Closed: Expected</option>
                        <option :value="7">Closed: False Positive</option>
                        <option :value="8">Closed: Inconclusive</option>
                        <option :value="9">Closed: Precursor</option>
                        <option :value="10">Closed: True Positive</option>
                    </select>
                </p>
                <p class="d-flex gap-3 align-items-center">
                    <b>Summary:</b> 
                    <input type="text" name="text_summary" id="text_summary" class="form-control" v-model="IncidentData.Title" />
                </p>
            </div>
        </div>

        <div class="row mt-5 align-items-center">
            <label class="col-sm-1"><b>Playbook:</b></label> 
            <div class="col-sm-3">
                <select name="change_status" id="change_status" class="form-control" >
                    <option :value="0">Response: New</option>
                    <option :value="1">Response: Containment</option>
                    <option :value="2">Response: Eradication</option>
                    <option :value="3">Response: Recovery</option>
                    <option :value="4">Closed: Duplicated</option>
                    <option :value="5">Closed: Error</option>
                    <option :value="6">Closed: Expected</option>
                    <option :value="7">Closed: False Positive</option>
                    <option :value="8">Closed: Inconclusive</option>
                    <option :value="9">Closed: Precursor</option>
                    <option :value="10">Closed: True Positive</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        dataId: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            IncidentData: {},
        };
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        loadResponseDetails() {
            const token = this.getAuthToken();
            axios.get('/api/incident-management/'+this.dataId, {
                withCredentials: true,
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.IncidentData = res.data.ResponseData;
                    console.log('check-IncidentData', this.IncidentData);
                } else {
                    toast.fire({ type: 'error', title: res.data.ResultDesc })
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
        this.loadResponseDetails();
    }
}
</script>



<style scoped>
    .grid-section {
        border: 1px solid #f1f1f2;
        border-radius: 5px;
        padding: 30px 10px 0px 10px;
    }
    .grid-section p {
        text-align: center;
        line-height: 15px;
    }
    .top-section p select {
        line-height: 1;
    }
    .top-section p input {
        line-height: 0.7;
    }
</style>
