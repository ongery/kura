<template>
    <div class="tab-content ps-10 mt-5" id="nav-tabContent">
        <table id="responseIM-tbl" class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Occurrence Type</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Summary</th>
                    <th>Start Date</th>
                    <th>Detection Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="mode in alldata" :key="mode.id">
                    <td> 
                        <div class="open-incident">
                            <a href="javascript:void(0)" @click="displayResponseDataTab(mode.id)">{{ mode.id }}</a>
                        </div>
                    </td>
                    <td> {{ (mode.occurrence_type == 1) ? 'Incident' : 'Event' }} </td>
                    <td> {{ (mode.Status == 0 ? 'Response: New' : 'Response: Reviewed')}} </td>
                    <td> {{ mode.priority !== null ? parseInt(mode.priority) : 0 }} </td>
                    <td> {{mode.Title}} </td>
                    <td> {{ manageDateFormat(mode.IncidentReportOn) }} </td>
                    <td> {{ manageDateFormat(mode.IncidentDate) }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import moment from 'moment';
import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

export default {
    name: 'IncidentManToolbar',
    props: {
        form: {
            type: Object,
            required: true
        },
        parentMethod: {
            type: Function,
            required: true
        }
    },
    data() {
        return {
            alldata: [],
            imageSrc: '/img/question-mark.png',
        };
    },
    async mounted() {
        await this.loadIncidentManagement(); 
        if (this.alldata.length > 0) {
            this.initDataTable();
        } 
    },
    updated() {
        if (this.alldata.length > 0) {
            this.initDataTable();
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        async loadIncidentManagement() {
            const token = this.getAuthToken();
            await axios.get('/api/incident-management', {
                withCredentials: true,
                headers: {
                    Authorization: `Bearer ${token}`
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.alldata = res.data.ResponseData;
                    if (this.alldata.length > 0) {
                        this.$nextTick(() => {
                            this.initDataTable();
                        });
                    }
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
        manageDateFormat(date) {
            return date ? moment(date).format('DD-MM-YYYY') : '';
        },
        displayResponseDataTab(id) {
            // this.parentMethod(id);
        },
        initDataTable() {
            if ($.fn.DataTable.isDataTable('#responseIM-tbl')) {
                $('#responseIM-tbl').DataTable().destroy();
            }

            $('#responseIM-tbl').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
            });
        },
    },
    watch: {
        alldata() {
            if (this.alldata.length > 0) {
                this.$nextTick(() => {
                    this.initDataTable();
                });
            }
        }
    },
    // created() {
    //     this.loadIncidentManagement();
    // }
}
</script>
