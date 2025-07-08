<template>
    <div class="row mt-2">
        <div class="col-md-12">
            <div>
                <ActionTrackingOverviewToolbar :title="'Improvement Action'"> </ActionTrackingOverviewToolbar>
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-12">
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th>Refrence</th>
                                            <th>Name</th>
                                            <th>Due Date</th>
                                            <th>Action % </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="mode in alldata" :key="mode.id">
                                            <td>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a style="color: #258c37;" href="javascript:void(0)" @click.prevent="moreDetails(mode)">{{ mode.DocNum }} </a>
                                                </div>
                                            </td>

                                            <td>
                                                <a style="color: #258c37;" href="javascript:void(0)" @click.prevent="moreDetails(mode)" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.DueDate | myDate }}</a>
                                            </td>
                                            <td>{{mode.action_percent ?? 0}}%</td>

                                            <td :style="{ backgroundColor: getBgColor(mode.freq) }">
                                                <a href="javascript:void(0)" :style="{ color: getTextColor(mode.freq) }" class="text-dark fw-bolder d-block fs-6">{{ mode.freq }}</a>
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
    </div>
</template>
<script>
    import ActionTrackingOverviewToolbar from './components/ActionTrackingOverviewToolbar.vue';

    export default {
        data() {
            return {
                showmode: '',
                alldata: {},
                reports: {}
            }
        },
        components: { ActionTrackingOverviewToolbar },
        methods: {
            getBgColor(freq) {
                switch (freq) {
                    case "Not Started (Not Due)":
                        return "#4A90E2";
                    case "WIP (On Course)":
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
                    .get('/api/actiontracking')
                    .then(res => {
                        if (res.data.ResultCode == 1200) {
                            this.alldata = res.data.ResponseData.data
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
            AllItems() {
                this.$router.push({ name: 'AllActions' })
            },
            moreDetails(data) {
                localStorage.clear()
                localStorage.setItem('risk_id', data.o_r_i_s_k_id)
                localStorage.setItem('action_id', data.id)
                this.$router.push({ name: 'ActionProfile' })
            }
        },
        created() {
            this.loadData()
        }
    }
</script>
