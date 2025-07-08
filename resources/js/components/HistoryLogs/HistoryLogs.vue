<template>
    <div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between mb-2">
                    <h1 class="title">History Logs</h1>
                    <a href="javascript:void(0)" @click="exportToExcel" class="btn btn-sm fw-bold btn-info btn-active-color-light"> Export </a>
                </div>
                <div class="log-item">
                    <table id="history-logs-tbl" ref="table" class="mt-10 table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Logs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are no logs -->
                            <tr v-if="logs.length === 0">
                                <td colspan="3" class="dt-empty">No History logs available</td>
                            </tr>

                            <!-- Render rows if logs are available -->
                            <tr v-for="(log, index) in logs" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ log.action.charAt(0).toUpperCase() + log.action.slice(1) }}</td>
                                <td>[{{ formatTimestamp(log.created_at) }}] [{{ (log.users) ? log.users.full_name.charAt(0).toUpperCase() + log.users.full_name.slice(1) : 'Guest User' }}] {{ log.logs.charAt(0).toUpperCase() + log.logs.slice(1) }}.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
import $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

export default {
    name: 'HistoryLogs',
    data() {
        return {
            logs: []
        };
    },
    async mounted() {
        await this.fetchLogs(); 
        if (this.logs.length > 0) {
            this.initDataTable();
        } 
    },
    updated() {
        if (this.logs.length > 0) {
            this.initDataTable();
        }
    },
    methods: {
        async fetchLogs() {
            try {
                const token = this.getAuthToken();
                const response = await axios.get('/api/history-logs', {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                this.logs = response.data;
                console.log('check-logs', logs);
                if (this.logs.length > 0) {
                    this.$nextTick(() => {
                        this.initDataTable();
                    });
                }
            } catch (error) {
                console.error('Error fetching logs:', error);
            }
        },
        formatTimestamp(timestamp) {
            return moment(timestamp).format('DD-MM-YYYY, h:mm:ss a');
        },
        getAuthToken() {
            return localStorage.getItem('authToken');
        },

        initDataTable() {
            if ($.fn.DataTable.isDataTable('#history-logs-tbl')) {
                $('#history-logs-tbl').DataTable().destroy();
            }

            $('#history-logs-tbl').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
            });
        },

        exportToExcel() {
            // Get the DataTable instance
            const table = $('#history-logs-tbl').DataTable();

            // Get all the data, including data from all pages
            const allData = table.rows({ search: 'applied' }).data();
            let csvContent = "";

            // Iterate over the allData to build the CSV content
            allData.each(function (row) {
                // Directly iterate over the row since row is an array of cell data
                let rowData = row.join(",");  // Join the row data with commas
                csvContent += rowData + "\n";  // Add each row to CSV with a newline
            });

            // Create a Blob with the CSV content
            const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });

            // Create a link element to simulate a download
            const link = document.createElement("a");
            if (link.download !== undefined) {
                // Create a URL for the Blob and set it as the href attribute
                const url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", "history-logs.csv"); // Set the file name
                link.style.visibility = "hidden";
                
                // Append the link to the document, click it, then remove it
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }
    },
    watch: {
        logs() {
            if (this.logs.length > 0) {
                this.$nextTick(() => {
                    this.initDataTable();
                });
            }
        }
    },
};
</script>

<style scoped>
    .log-item {
        padding: 15px;
        margin-bottom: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        display: block;
        justify-content: space-between;
        align-items: center;
    }
    #history-logs-tbl .dt-empty {
        text-align: center !important;
    }
</style>
