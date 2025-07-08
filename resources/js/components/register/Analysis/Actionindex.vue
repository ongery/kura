<template>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="card-title">Improvement Actions</h3>

                    <div class="card-tools align-items-center py-5">
                        <span @click="addNew" class="btn btn-sm fw-bold text-white-400 btn-success btn-active-color-dark">
                            New Action
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1 text-muted">Overview</span>
                        </h3>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="text-muted">
                                        <th>Refrence</th>
                                        <th>Name</th>
                                        <th>Due Date</th>
                                        <th>Action %</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="mode in alldata" :key="mode.id">
                                        <td>
                                            <div class="d-flex justify-content-start flex-column">
                                                <span>
                                                    <a href="#" @click.prevent="moreDetails(mode)" class="text-success fw-bolder text-hover-success fs-6"> {{ mode.DocNum }}</a>
                                                    <i @click="editModal(mode)" class="fa fa-edit blue"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" @click.prevent="moreDetails(mode)" class="text-success fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                        </td>
                                        <td>
                                            <a class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.DueDate }}</a>
                                        </td>
                                        <td>{{mode.action_percent ?? 0}}%</td>
                                        <td :style="{ backgroundColor: getBgColor(mode.freq) }">
                                            <a href="javascript:void(0)" :style="{ color: getTextColor(mode.freq) }" class="fw-bolder d-block fs-6">{{ mode.freq }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showmode: '',
            alldata: {},
            reports: {}
        }
    },
    props: ['riskNameData'],
    methods: {
        getBgColor(freq) {
            switch (freq) {
                case "Not Started (Not Due)":
                    return "#4A90E2";
                case "WIP (on course)":
                    return "#FFFF00";
                case "WIP (Overdue)":
                    return "#FFA500";
                case "Not Started (Overdue)":
                    return "#FF0000";
                case "Deffered":
                    return "#B0B0B0";
                case "Completed":
                    return "#008000";
                default:
                    return "#FFFFFF";
            }
        },
        getTextColor(freq) {
            switch (freq) {
                case "Not Started (Not Due)":
                    return "#FFFFFF";
                case "WIP (Overdue)":
                    return "#262323";
                case "Not Started (Overdue)":
                    return "#FFFFFF";
                case "Completed":
                    return "#FFFFFF";
                default:
                    return "rgb(111, 61, 233)";
            }
        },
        loadData() {
            axios
                .get('/api/getRiskTreatmentAction', {
                    params: {
                        RiskID: localStorage.risk_id
                    }
                })

                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData
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
        addNew() {
            this.$router.push({
                name: 'ActionTrackingCreate',
                params: {
                    riskName: this.riskNameData
                }
            })
            // Add riskName prop
        },
        moreDetails(data) {
            localStorage.clear()
            localStorage.setItem('risk_id', data.o_r_i_s_k_id)
            localStorage.setItem('action_id', data.id)
            this.$router.push({ name: 'ActionTrackingEdit', params: { id: data.id } })
            //   localStorage.setItem('action_id', id)
            //   this.$router.push({ name: 'ActionProfile' })
        }
    },
    created() {
        this.loadData()
    }
}
</script>
