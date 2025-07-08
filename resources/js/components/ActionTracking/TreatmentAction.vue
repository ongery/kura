<template>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="app-toolbar py-3">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                        <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                            Treatment Action
                        </h1>
                        <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                            <li>
                                <div>
                                    <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                        <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                        </svg>
                                        <span class="sr-only">Dashboard</span>
                                    </a>
                                </div>
                            </li>

                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        My Actions
                                    </a>
                                </div>
                            </li>
                            
                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    -
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                        Treatment Action
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </div>
                    
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!-- <a href="javascript:void(0)" @click="addNew" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                            New Treatment Action
                        </a> -->
                        <a href="javascript:void(0)" @click.prevent="moreDetails" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                            All Actions
                        </a>
                        <a href="javascript:void(0)" @click.prevent="GoBack" class="btn btn-sm fw-bold btn-info btn-active-color-dark">
                            Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="card mb-5">
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
                                            <th>Reference</th>
                                            <th>Name</th>
                                            <th>Due Date</th>
                                            <th>Action %</th>
                                            <th>Status</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="mode in alldata" :key="mode.id">
                                            <td>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span>
                                                        <a href="javascript:void(0)" @click.prevent="moreDetails(mode)" class="text-success fw-bolder text-hover-success fs-6"> {{ mode.DocNum }}</a>
                                                        <i @click="editModal(mode)" class="fa fa-edit blue"></i>
                                                    </span>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="javascript:void(0)" @click.prevent="moreDetails(mode)" class="text-success fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                            </td>

                                            <td>
                                                <a class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.DueDate }}</a>
                                            </td>
                                            <td>{{mode.action_percent ?? 0}}%</td>

                                            <td :style="{ backgroundColor: getBgColor(mode.freq) }">
                                                <a href="javascript:void(0)" :style="{ color: getTextColor(mode.freq) }" class="fw-bolder d-block fs-6">{{ mode.freq }}</a>
                                            </td>

                                            <!-- New Attachment Column -->
                                            <td>
                                                <div v-if="mode.attachment">
                                                    <a :href="`/path/to/attachments/${mode.attachment}`" class="text-success" download>
                                                        {{ mode.attachment }}
                                                    </a>
                                                </div>
                                                <div v-else>
                                                    -- <!-- Show hyphens when there’s no attachment -->
                                                </div>
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
    export default {
        data() {
            return {
                showmode: '',
                alldata: {},
                reports: {}
            }
        },
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
                axios.get('/api/getRiskTreatmentAction')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData;
                    } else {
                        console.log(res.data.ResultDesc);
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        });
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    toast.fire({
                        type: 'error',
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    });
                });
            },
            
            addNew() {
                this.$router.push({
                    name: 'ActionTrackingCreate',
                    params: {
                        riskName: this.riskNameData
                    }
                });
            },
            
            GoBack() {
                this.$router.back();
            },
            
            moreDetails(data) {
                localStorage.clear();
                localStorage.setItem('action_id', data.id);
                this.$router.push({ name: 'TreatmentActionEdit', params: { id: data.id } });
            }
        },
        created() {
            this.loadData();
        }
    }
</script>