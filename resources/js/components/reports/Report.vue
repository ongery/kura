<template>
    <div>
        <!-- Button to trigger PDF generation -->
        <button @click="generatePdf" class="btn btn-success btn-sm" title="Export Quarterly Report PDF">Export Quarterly Report PDF</button>

        <!-- Optional Preview Section -->
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h2>KENYA URBAN ROADS AUTHORITY</h2>
                <p class="text-muted">{{ currentDate }}</p>
            </div>

            <div class="text-center">
                <h3 class="fw-bold">DEPARTMENTAL RISK MANAGEMENT REPORT</h3>
                <img src="img/KURAlogo.png" alt="KURA Logo" class="my-4" style="width: 150px" />
                <h4 class="fw-bold">Quarterly Enterprise Risk Management Report</h4>
            </div>

            <div class="mt-5">
                <h5><strong>1.0 INTRODUCTION</strong></h5>
                <p>Risk management practices within the Authority are anchored to the Public Finance Management Act, 2012, and its attendant 2015 Regulations 165 (1), which requires the Accounting Officer to:</p>
                <ul>
                    <li>Ensure that entities develop risk management strategies, which include fraud prevention mechanism; and</li>
                    <li>Develop a system of risk management and internal control that builds robust business operations.</li>
                </ul>
                <p>The Mwongozo Code of Governance closely followed the above PFM Act for State Corporations, 2015. The second governance principle in Mwongozo calls explicitly for the Board of Directors to ensure that effective processes and systems of risk management and internal controls are in place.</p>
                <p>Conversely, to support the above tenets and for good business practice, the Kenya Urban Roads Authority Board of Directors approved the Authority's Enterprise Risk Management policy framework (30th May 2018) applicable across the processes and operations. The policy appoints the Director-General as the Chief Risk Officer accountable to the board to implement the risk management framework. The above responsibility has been appropriately delegated to Deputy Director Finance on risk matters touching on your department.</p>
                <p>In addition, the approved Enterprise Risk Management policy encourages innovation and creative approaches to service delivery while requiring careful consideration of the risks involved and responding appropriately to manage them. The Authority's enterprise-wide Risk Management process is aimed to identify, assess, prioritize, and mitigate the significant risks that could impact the delivery of the strategic objectives. Thereafter, the risks are prioritized for reporting in accordance with the scoring methodology in the risk management-weight matrix.</p>
                <p>Strategic risks are those concerned with ensuring the overall success of the Authority’s objectives and the vitality and viability of the organization. Within the Authority, strategic risks amalgamate the various operational, project, and financial risks identified at the department level and below. The review of both strategic and department risk is undertaken on a monthly basis by the Risk Champions. Thereafter, significant risks are examined at the department level. Any risk that remains after existing controls are taken into account (residual risk) will be reported quarterly to the Enterprise Risk Management Committee (ERMC) for further consideration.</p>
            </div>

            <!-- Executive Summary Section -->
            <div class="mt-5">
                <h5><strong>2.0 EXECUTIVE SUMMARY</strong></h5>
                <p>During the period under review, the following was noted:</p>
                <p><strong>2.1</strong> The department has the following no of risks distributed as follows</p>

                <!-- Table for Risks Distribution -->
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Color</th>
                            <th>Risks</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>LOW</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>MEDIUM</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>11</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Risks Affecting the Department Section -->
            <div class="mt-5">
                <h5><strong>3.0 RISKS AFFECTING THE DEPARTMENT(s)</strong></h5>
                <p>Upon analysis and collating of the risks affecting the department's operation, the table below highlights the risks affecting the department from achieving its quality objective as aligned to the KURA Strategic Plan (2018 - 2022).</p>

                <!-- Table for Risks Affecting the Department -->
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>BU Name</th>
                            <th>RE Name</th>
                            <th>ISL Value</th>
                            <th>ISC Value</th>
                            <th>IR Value</th>
                            <th>RSL Value</th>
                            <th>RSC Value</th>
                            <th>RR Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="11">Directorate of Audit Services</td>
                            <td>Unavailability of the auditees</td>
                            <td>4</td>
                            <td>4</td>
                            <td class="bg-danger text-white">16</td>
                            <td>4</td>
                            <td>3</td>
                            <td class="bg-warning">12</td>
                        </tr>
                        <tr>
                            <td>Inadequate Audit staff</td>
                            <td>4</td>
                            <td>4</td>
                            <td class="bg-danger text-white">16</td>
                            <td>4</td>
                            <td>3</td>
                            <td class="bg-warning">12</td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td>5</td>
                            <td>4</td>
                            <td class="bg-danger text-white">20</td>
                            <td>4</td>
                            <td>3</td>
                            <td class="bg-warning">12</td>
                        </tr>
                        <tr>
                            <td>Limited time for Audit consultancy</td>
                            <td>4</td>
                            <td>5</td>
                            <td class="bg-danger text-white">20</td>
                            <td>3</td>
                            <td>3</td>
                            <td class="bg-warning">9</td>
                        </tr>
                        <tr>
                            <td>Inappropriate Audit terms of reference</td>
                            <td>4</td>
                            <td>3</td>
                            <td class="bg-warning">12</td>
                            <td>4</td>
                            <td>2</td>
                            <td class="bg-success text-white">8</td>
                        </tr>
                        <tr>
                            <td>Audit work plans not approved</td>
                            <td>5</td>
                            <td>5</td>
                            <td class="bg-danger text-white">25</td>
                            <td>2</td>
                            <td>2</td>
                            <td class="bg-success text-white">6</td>
                        </tr>
                        <tr>
                            <td>Denied access to information</td>
                            <td>3</td>
                            <td>3</td>
                            <td class="bg-warning">9</td>
                            <td>2</td>
                            <td>2</td>
                            <td class="bg-success text-white">4</td>
                        </tr>
                        <tr>
                            <td>Incompetent auditors</td>
                            <td>4</td>
                            <td>3</td>
                            <td class="bg-warning">12</td>
                            <td>2</td>
                            <td>2</td>
                            <td class="bg-success text-white">4</td>
                        </tr>
                        <tr>
                            <td>Request for Audit investigations delayed or not done</td>
                            <td>3</td>
                            <td>2</td>
                            <td class="bg-warning">6</td>
                            <td>2</td>
                            <td>2</td>
                            <td class="bg-success text-white">4</td>
                        </tr>
                        <tr>
                            <td>Barc not constituted</td>
                            <td>5</td>
                            <td>3</td>
                            <td class="bg-danger text-white">15</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="bg-success text-white">3</td>
                        </tr>
                        <tr>
                            <td>Inadequate Audit scope</td>
                            <td>5</td>
                            <td>1</td>
                            <td class="bg-warning text-white">5</td>
                            <td>3</td>
                            <td>1</td>
                            <td class="bg-success text-white">3</td>
                        </tr>
                    </tbody>
                </table>
                <p>The full details of the risks that you manage within your department are available at http://erm.kura.go.ke/</p>
            </div>

            <div class="mt-5">
                <h5><strong>4.0 RISK TREATMENT PLANS</strong></h5>
                <p>The approved ERM policy require KURA management to select and implement options of addressing risks that are deemed to be either high and or medium. The selection of the most appropriate risk treatment option is guided by balancing the potential benefits derived in relation to the achievement of the objectives against cost, efforts or the disadvantages of implementation.</p>
                <h6>STATUS OF TREATMENT PLANS</h6>
                <div class="chart-container status-chart">
                    <Pie :data="chartDataRisk" :options="chartOptions" />
                </div>
                <p>Your therefore requested to review the risk treatment plan (Appendix i) and ensure their fully implementation through integration into the plans, budgets and processes.</p>
            </div>

            <div class="mt-5">
                <h5><strong>5.0 KEY RISK INDICATORS</strong></h5>
                <p>Key Risk Indicators (KRIs) are critical predictors or metric used to assess and measure a possible risk event that can have an impact to your department. They monitor changes in the levels of risk exposure and contribute to the early warning signs that enable you to report risks, prevent crises and mitigate them in time. KRIs independently or in conjunction with other risk environment related data, such as, loss events, assessment outcomes, and incidences reporting offer considerable insights into the weaknesses within the risk and control environments. They act as metrics of changes in an organization’s risk profile. However, just as Risk Appetite Statement and Tolerance levels, KRIs are monitored and reported through escalations matrix up to the Board of Directors level.</p>

                <p>During the period the status of your Key risk indicators were as highlighted in the table below; while the full risk of your Department KRIs are available at https://erm.kura.go.ke/</p>

                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Status Description</th>
                            <th>KRIs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KRI not Entered</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>KRIs within acceptable levels</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>11</strong></td>
                        </tr>
                    </tbody>
                </table>

                <h6 class="mt-10">No. Of Risks being monitored</h6>
                <div class="chart-container monitored-chart">
                    <Pie :data="chartDataRiskM" :options="chartOptions" />
                </div>

                <h6 class="mt-10">No. Of Key Risk Indicators Developed to Monitor risks</h6>
                <div class="chart-container developed-chart">
                    <Pie :data="chartDataRiskI" :options="chartOptions" />
                </div>

                <h6 class="mt-10">Trend Analysis of KRIs Entries</h6>
                <div class="chart-container entries-chart">
                    <PolarArea :data="chartDataEntries" :options="chartOptions" />
                </div>
            </div>

            <div class="mt-5">
                <h5><strong>6.0 COMPLIANCE TO RISK CONTROLS</strong></h5>
                <p>The Authority has developed a proactive Compliance support system to monitor adherence to the established risk controls and strategies.</p>
                <p>NB: A complete list of the compliance control attestation can be found in the ERM system. (Appendix III)</p>

                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Status Description</th>
                            <th>KRIs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Non Compliant</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Within Appectable Tolerance Level</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>5</strong></td>
                        </tr>
                    </tbody>
                </table>

                <h6 class="mt-10">No. Of Risks Identified to be monitored</h6>
                <div class="chart-container identified-chart">
                    <Pie :data="chartDataControlsM" :options="chartOptions" />
                </div>

                <h6 class="mt-10">No. Of Compliance Question Developed</h6>
                <div class="chart-container compliance-chart">
                    <Pie :data="chartDataControlsD" :options="chartOptions" />
                </div>

                <h6 class="mt-10">Trend Analysis of Compliance Questions</h6>
                <div class="chart-container questions-chart">
                    <PolarArea :data="chartDataControlsQ" :options="chartOptions" />
                </div>
            </div>

            <div class="mt-5">
                <h5><strong>7.0 CONCLUSION</strong></h5>
                <p>It is important to point out that the Department has consistently taken measures to manage the risks that are likely to affect the achievement of the strategic and quality objectives.</p>
                <p>However, various areas require your interventions to minimize the likelihood and the impact of risk crystallizing.</p>
                <p>Your input as the head of the Department affected by these risks; is invaluable in implementing the recommended action plan or any other mitigation factors that you may find strong enough.</p>
                <p>Enterprise Risk Management department requires a formal communication to confirm the position on the decision that has been taken on the risk identified, Risk Indicators, and proposed controls for monitoring.</p>
            </div>

            <div class="mt-5">
                <h5><strong>APPENDIX I: RISK & RISK TREATMENT PROFILE</strong></h5>
                <!-- Table for Risks Affecting the Department -->
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>BU Name</th>
                            <th>RE Name</th>
                            <th>RR Value</th>
                            <th>Actions</th>
                            <th>Status</th>
                            <th>DueDate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="8">Directorate of Audit Services</td>
                            <td>Audit work plans no approved</td>
                            <td class="bg-warning">6</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Unavailability of the auditees</td>
                            <td class="bg-warning">12</td>
                            <td>Issuance of an adequate audit notification to the auditees</td>
                            <td>Completed</td>
                            <td>2021-11-12 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Unavailability of the auditees</td>
                            <td class="bg-warning">12</td>
                            <td>Issuance of an adequate audit notification to the auditees</td>
                            <td>Completed</td>
                            <td>2021-11-12 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Inadequate Audit staff</td>
                            <td class="bg-warning">12</td>
                            <td>Prequalification of technical Audit firms</td>
                            <td>Deferred</td>
                            <td>2021-12-31 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Inappropriate Audit terms of reference</td>
                            <td class="bg-warning">8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Limited time for Audit consultancy</td>
                            <td class="bg-warning">9</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td class="bg-warning">12</td>
                            <td>Recruitment of additional audit staff with ICT & Engineering skills</td>
                            <td>WIP (Overdue)</td>
                            <td>2021-12-31 00:00:00</td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td class="bg-warning">12</td>
                            <td>Recruitment of additional audit staff with ICT & Engineering skills</td>
                            <td>WIP (Overdue)</td>
                            <td>2021-12-31 00:00:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                <h5><strong>APPENDIX II – SUMMARY OF KEY RISK INDICATORS ENTRIES</strong></h5>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>BU Name</th>
                            <th>Risk Event Name</th>
                            <th>KRI Item Name</th>
                            <th>Number Value</th>
                            <th>Actions Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="12">Directorate of Audit Services</td>
                            <td>Barc not constituted</td>
                            <td>No. of days without properly constituted barc</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Audit work plans not approved</td>
                            <td>No. of days without properly constituted barc</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Unavailability of the auditees</td>
                            <td>%ge of audits not completed within set timelines</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Denied access to receive information 1 information</td>
                            <td>No of days it takes to receive information after request</td>
                            <td class="bg-success text-white">1</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Denied access to receive information 1 information</td>
                            <td>No of days it takes to receive information after request</td>
                            <td class="bg-success text-white">0</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Denied access to receive information 1 information</td>
                            <td>No of days it takes to receive information after request</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Inappropriate Audit terms of reference</td>
                            <td>Number of consultancies without formal requests</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Limited time for Audit consultancy</td>
                            <td>Number of viable consultancies declined</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Request for Audit investigations delayed or not done</td>
                            <td>Number of irregulaties detected but not investigated</td>
                            <td class="bg-dark"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td>Number of investigation not accepted by HIA</td>
                            <td class="bg-success text-white">0</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td>Number of investigation not accepted by HIA</td>
                            <td class="bg-success text-white">0</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Lack of skills by Audit staff to carry out investigation assignments</td>
                            <td>Number of investigation not accepted by HIA</td>
                            <td class="bg-dark">0</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                <h5><strong>APPENDIX III- SUMMARY OF COMPLIANCE ATTESTATION</strong></h5>
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>BU Name</th>
                            <th>Risk Event Name</th>
                            <th>Compliance Question Name</th>
                            <th>Compliance Response Value</th>
                            <th>Actions Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">Directorate of Audit Services</td>
                            <td>Denied access to information</td>
                            <td></td>
                            <td class="bg-dark text-white">INACTIVE</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Denied access to information</td>
                            <td></td>
                            <td class="bg-success text-white">YES</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Denied access to information</td>
                            <td></td>
                            <td class="bg-dark text-white">INACTIVE</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Barc not constituted</td>
                            <td></td>
                            <td class="bg-dark text-white">INACTIVE</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Inappropriate Audit terms of reference</td>
                            <td></td>
                            <td class="bg-dark text-white">INACTIVE</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import { jsPDF } from 'jspdf'
    import html2canvas from 'html2canvas'
    import 'jspdf-autotable'
    import { Pie, PolarArea } from 'vue-chartjs'
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

    export default {
        components: {
            Pie,
            PolarArea
        },
        data() {
            return {
                chartDataRisk: {
                    labels: ['Completed', 'Deferred', 'WIP (Overdue)'],
                    datasets: [
                        {
                            label: 'Status',
                            backgroundColor: ['#42A5F5', '#0cf218', '#f7020b'],
                            data: [2, 1, 1]
                        }
                    ]
                },
                chartDataRiskM: {
                    labels: ['Monitored'],
                    datasets: [
                        {
                            label: 'No. Of Risks being monitored',
                            backgroundColor: ['#42A5F5'],
                            data: [8]
                        }
                    ]
                },
                chartDataRiskI: {
                    labels: ['Indicators'],
                    datasets: [
                        {
                            label: 'No. Of Key Risk Indicators Developed to Monitor risks',
                            backgroundColor: ['#42A5F5'],
                            data: [8]
                        }
                    ]
                },
                chartDataEntries: {
                    labels: ['December', 'January', 'February', 'March'],
                    datasets: [
                        {
                            label: 'Trend Analysis of KRIs Entries',
                            backgroundColor: ['#42A5F5', '#42A5F5', '#42A5F5', '#B0BEC5'],
                            data: [8, 2, 2, 2]
                        }
                    ]
                },
                chartDataControlsM: {
                    labels: ['Monitored'],
                    datasets: [
                        {
                            label: 'No. Of Risks Identified to be monitored',
                            backgroundColor: ['#42A5F5'],
                            data: [3]
                        }
                    ]
                },
                chartDataControlsD: {
                    labels: ['Developed'],
                    datasets: [
                        {
                            label: 'No. Of Compliance Question Developed',
                            backgroundColor: ['#42A5F5'],
                            data: [3]
                        }
                    ]
                },
                chartDataControlsQ: {
                    labels: ['December', 'January', 'February', 'March'],
                    datasets: [
                        {
                            label: 'Trend Analysis of Compliance Questions',
                            backgroundColor: ['#42A5F5', '#42A5F5', '#42A5F5', '#B0BEC5'],
                            data: [1, 1, 3, 5]
                        }
                    ]
                },
                chartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }
        },
        methods: {
            async generatePdf() {
                const doc = new jsPDF('p', 'mm', 'a4')

                doc.setFontSize(18)
                doc.text('DEPARTMENTAL RISK MANAGEMENT REPORT', 30, 30)
                doc.addImage('img/KURAlogo.png', 'PNG', 80, 35, 30, 15, '', 'SLOW')
                doc.setFontSize(16)
                doc.text('Quarterly Enterprise Risk Management Report', 50, 60)

                // Page 1 - Introduction Content
                doc.setFontSize(14)
                doc.text('1.0 INTRODUCTION', 10, 70)

                // Add the wrapped text
                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('Risk management practices within the Authority are anchored to the Public Finance Management Act, 2012, and its attendant 2015 Regulations 165 (1), which requires the Accounting Officer to:', 190), 10, 80)
                doc.text(doc.splitTextToSize('- Ensure that entities develop risk management strategies, including fraud prevention.', 190), 20, 95)
                doc.text(doc.splitTextToSize('- Develop a system of risk management and internal control.', 190), 20, 100)

                doc.text(doc.splitTextToSize('The Mwongozo Code of Governance closely followed the above PFM Act for State Corporations, 2015. The second governance principle in Mwongozo calls explicitly for the Board of Directors to ensure that effective processes and systems of risk management and internal controls are in place.', 190), 10, 110)

                doc.text(doc.splitTextToSize("Conversely, to support the above tenets and for good business practice, the Kenya Urban Roads Authority Board of Directors approved the Authority's Enterprise Risk Management policy framework (30th May 2018) applicable across the processes and operations. The policy appoints the Director-General as the Chief Risk Officer accountable to the board to implement the risk management framework. The above responsibility has been appropriately delegated to Deputy Director Finance on risk matters touching on your department.", 190), 10, 130)

                doc.text(doc.splitTextToSize("In addition, the approved Enterprise Risk Management policy encourages innovation and creative approaches to service delivery while requiring careful consideration of the risks involved and responding appropriately to manage them. The Authority's enterprise-wide Risk Management process is aimed to identify, assess, prioritize, and mitigate the significant risks that could impact the delivery of the strategic objectives. Thereafter, the risks are prioritized for reporting in accordance with the scoring methodology in the risk management-weight matrix.", 190), 10, 165)

                doc.text(doc.splitTextToSize('Strategic risks are those concerned with ensuring the overall success of the Authority’s objectives and the vitality and viability of the organization. Within the Authority, strategic risks amalgamate the various operational, project, and financial risks identified at the department level and below. The review of both strategic and department risk is undertaken on a monthly basis by the Risk Champions. Thereafter, significant risks are examined at the department level. Any risk that remains after existing controls are taken into account (residual risk) will be reported quarterly to the Enterprise Risk Management Committee (ERMC) for further consideration.', 190), 10, 200)

                doc.addPage()
                doc.setFontSize(14)
                doc.text('2.0 EXECUTIVE SUMMARY', 10, 30)

                doc.setFontSize(12)
                doc.text('During the period under review, the following was noted:', 10, 35)
                doc.text('2.1 The department has the following no of risks distributed as follows', 10, 40)
                doc.autoTable({
                    head: [['Color', 'Risks']],
                    body: [
                        ['LOW', '5'],
                        ['MEDIUM', '6'],
                        ['TOTAL', '11']
                    ],
                    startY: 45,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] },
                    bodyStyles: {
                        halign: 'left',
                        fontStyle: 'normal'
                    },
                    didParseCell: data => {
                        if (data.row.index === 2) {
                            data.cell.styles.fontStyle = 'bold'
                        }
                    }
                })

                doc.setFontSize(14)
                doc.text('3.0 RISKS AFFECTING THE DEPARTMENT(s)', 10, 90)

                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('Upon analysis and collating of the risks affecting the departments operation, the table 1. Below highlights, the risks affecting the departmenst from achieving its quality objective as aligned to the KURA Strategic Plan (2018 – 2022).', 190), 10, 95)

                // Page 3 - Risk Table for Departments
                // Table data
                const tableData = [
                    ['Directorate of Audit Services', 'Unavailability of Auditees', 4, 4, 16, 4, 3, 12],
                    ['Directorate of Audit Services', 'Inadequate Audit Staff', 4, 4, 16, 4, 3, 12],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 5, 4, 20, 4, 3, 12],
                    ['Directorate of Audit Services', 'Limited time for Audit consultancy', 4, 5, 20, 5, 3, 9],
                    ['Directorate of Audit Services', 'Inappropriate Audit terms of reference', 4, 3, 12, 4, 2, 8],
                    ['Directorate of Audit Services', 'Audit work plans not approved', 5, 5, 25, 4, 2, 6],
                    ['Directorate of Audit Services', 'Denied access to information', 3, 3, 9, 2, 2, 4],
                    ['Directorate of Audit Services', 'Incompetent auditors', 4, 3, 12, 2, 2, 4],
                    ['Directorate of Audit Services', 'Request for Audit investigations delayed or not done', 3, 2, 6, 2, 2, 4],
                    ['Directorate of Audit Services', 'Barc not constituted', 5, 3, 15, 3, 1, 4],
                    ['Directorate of Audit Services', 'Inadequate Audit scope', 5, 1, 5, 1, 1, 3]
                ]

                // Create the table with color-coded cells
                doc.autoTable({
                    startY: 110,
                    head: [['BU Name', 'RE Name', 'ISL Value', 'ISC Value', 'IR Value', 'RSL Value', 'RSC Value', 'RR Value']],
                    body: tableData,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] }, // Green header
                    bodyStyles: { valign: 'middle' },
                    didParseCell: data => {
                        const columnIndex = data.column.index
                        const cellValue = data.cell.raw
                        if (columnIndex === 4 || columnIndex === 7) {
                            if (cellValue >= 15) {
                                data.cell.styles.fillColor = [255, 99, 71] // Red background
                            }
                            if ((columnIndex === 4 && cellValue >= 5 && cellValue < 15) || (columnIndex === 7 && cellValue >= 8 && cellValue < 15)) {
                                data.cell.styles.fillColor = [255, 165, 0] // Orange background
                            }
                            if ((columnIndex === 4 && cellValue < 5) || (columnIndex === 7 && cellValue <= 8)) {
                                data.cell.styles.fillColor = [34, 139, 34] // Green background
                            }
                            data.cell.styles.textColor = [255, 255, 255] // White text
                        }
                    }
                })

                doc.text(doc.splitTextToSize('The full details of the risks that you manage within your department are available at http://erm.kura.go.ke/', 190), 10, 270)

                // Page 4 - Risk Trends Chart (Using html2canvas)
                doc.addPage()
                doc.setFontSize(14)
                doc.text('4.0 RISK TREATMENT PLANS', 10, 30)
                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('The approved ERM policy require KURA management to select and implement options of addressing risks that are deemed to be either high and or medium. The selection of the most appropriate risk treatment option is guided by balancing the potential benefits derived in relation to the achievement of the objectives against cost, efforts or the disadvantages of implementation.', 190), 10, 35)
                doc.setFontSize(14)
                doc.text('STATUS OF TREATMENT PLANS', 10, 60)
                const chartElement = document.querySelector('.status-chart')
                if (chartElement) {
                    try {
                        const canvas = await html2canvas(chartElement, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 65, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }
                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('Your therefore requested to review the risk treatment plan (Appendix i) and ensure their fully implementation through integration into the plans, budgets and processes.', 190), 10, 150)

                doc.setFontSize(14)
                doc.text('5.0 KEY RISK INDICATORS', 10, 170)
                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('Key Risk Indicators (KRIs) are critical predictors or metric used to assess and measure a possible risk event that can have an impact to your department. They monitor changes in the levels of risk exposure and contribute to the early warning signs that enable you to report risks, prevent crises and mitigate them in time. KRIs independently or in conjunction with other risk environment related data, such as, loss events, assessment outcomes, and incidences reporting offer considerable insights into the weaknesses within the risk and control environments. They act as metrics of changes in an organization’s risk profile. However, just as Risk Appetite Statement and Tolerance levels, KRIs are monitored and reported through escalations matrix up to the Board of Directors level.', 190), 10, 175)
                doc.text(doc.splitTextToSize('During the period the status of your Key risk indicators were as highlighted in the table below; while the full risk of your Department KRIs are available at https://erm.kura.go.ke/', 190), 10, 215)

                doc.autoTable({
                    head: [['Status Description', 'KRIs']],
                    body: [
                        ['KRI not Entered', '2'],
                        ['KRIs within acceptable levels', '9'],
                        ['TOTAL', '11']
                    ],
                    startY: 230,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] },
                    bodyStyles: {
                        halign: 'left',
                        fontStyle: 'normal'
                    },
                    didParseCell: data => {
                        if (data.row.index === 2) {
                            data.cell.styles.fontStyle = 'bold'
                        }
                    }
                })

                doc.addPage()
                doc.setFontSize(14)
                doc.text('No. Of Risks being monitored', 10, 27)
                const monitored = document.querySelector('.monitored-chart')
                if (monitored) {
                    try {
                        const canvas = await html2canvas(monitored, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 30, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.text('No. Of Key Risk Indicators Developed to Monitor risks', 10, 113)
                const developed = document.querySelector('.developed-chart')
                if (developed) {
                    try {
                        const canvas = await html2canvas(developed, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 116, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.text('Trend Analysis of KRIs Entries', 10, 202)
                const entries = document.querySelector('.entries-chart')
                if (entries) {
                    try {
                        const canvas = await html2canvas(entries, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 205, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.addPage()
                doc.setFontSize(14)
                doc.text('6.0 COMPLIANCE TO RISK CONTROLS', 10, 27)
                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('The Authority has developed a proactive Compliance support system to monitor adherence to the established risk controls and strategies.', 190), 10, 32)
                doc.text(doc.splitTextToSize('NB: A complete list of the compliance control attestation can be found in the ERM system. (Appendix III)', 190), 10, 45)

                doc.autoTable({
                    head: [['Status Description', 'KRIs']],
                    body: [
                        ['Non Compliant', '4'],
                        ['Within Appectable Tolerance Level', '1'],
                        ['TOTAL', '5']
                    ],
                    startY: 55,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] },
                    bodyStyles: {
                        halign: 'left',
                        fontStyle: 'normal'
                    },
                    didParseCell: data => {
                        if (data.row.index === 2) {
                            data.cell.styles.fontStyle = 'bold'
                        }
                    }
                })

                doc.setFontSize(14)
                doc.text('No. Of Risks Identified to be monitored', 10, 95)
                const identified = document.querySelector('.identified-chart')
                if (identified) {
                    try {
                        const canvas = await html2canvas(identified, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 100, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.text('No. Of Compliance Question Developed', 10, 188)
                const compliance = document.querySelector('.compliance-chart')
                if (compliance) {
                    try {
                        const canvas = await html2canvas(compliance, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 193, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.addPage()
                doc.text('Trend Analysis of Compliance Questions', 10, 27)
                const questions = document.querySelector('.questions-chart')
                if (questions) {
                    try {
                        const canvas = await html2canvas(questions, { scale: 1 }) // Capture chart
                        const chartImage = canvas.toDataURL('image/jpeg', 0.5) // Compress image
                        // Add chart image to PDF
                        doc.addImage(chartImage, 'JPEG', 10, 32, 180, 80, '', 'MEDIUM') // Adjust image size and position
                    } catch (error) {
                        console.error('Error generating chart image: ', error)
                    }
                }

                doc.setFontSize(14)
                doc.text('7.0 CONCLUSION', 10, 125)

                doc.setFontSize(12)
                doc.text(doc.splitTextToSize('It is important to point out that the Department has consistently taken measures to manage the risks that are likely to affect the achievement of the strategic and quality objectives.', 190), 10, 130)
                doc.text(doc.splitTextToSize('However, various areas require your interventions to minimize the likelihood and the impact of risk crystallizing.', 190), 10, 145)
                doc.text(doc.splitTextToSize('Your input as the head of the Department affected by these risks; is invaluable in implementing the recommended action plan or any other mitigation factors that you may find strong enough.', 190), 10, 155)
                doc.text(doc.splitTextToSize('Enterprise Risk Management department requires a formal communication to confirm the position on the decision that has been taken on the risk identified, Risk Indicators, and proposed controls for monitoring.', 190), 10, 165)

                doc.setFontSize(14)
                doc.text('APPENDIX I: RISK & RISK TREATMENT PROFILE', 10, 180)

                // Page 3 - Risk Table for Departments
                // Table data
                const APPItableData = [
                    ['Directorate of Audit Services', 'Audit work plans no approved', 6, , ,],
                    ['Directorate of Audit Services', 'Unavailability of the auditees', 12, 'Issuance of an adequate audit notification to the auditees', 'Completed', '2021-11-12 00:00:00'],
                    ['Directorate of Audit Services', 'Unavailability of the auditees', 12, 'Issuance of an adequate audit notification to the auditees', 'Completed', '2021-11-12 00:00:00'],
                    ['Directorate of Audit Services', 'Inadequate Audit staff', 12, 'Prequalification of technical Audit firms', 'Deferred', '2021-12-31 00:00:00'],
                    ['Directorate of Audit Services', 'Inappropriate Audit terms of reference', 8, , ,],
                    ['Directorate of Audit Services', 'Limited time for Audit consultancy', 9, , ,],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 12, 'Recruitment of additional audit staff with ICT & Engineering skills', 'WIP (Overdue)', '2021-12-31 00:00:00'],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 12, 'Recruitment of additional audit staff with ICT & Engineering skills', 'WIP (Overdue)', '2021-12-31 00:00:00']
                ]

                // Create the table with color-coded cells
                doc.autoTable({
                    startY: 185,
                    margin: { top: 20 },
                    head: [['BU Name', 'RE Name', 'RR Value', 'Actions', 'Status', 'DueDate']],
                    body: APPItableData,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] }, // Green header
                    bodyStyles: { valign: 'middle' },
                    didParseCell: data => {
                        const columnIndex = data.column.index
                        const cellValue = data.cell.raw
                        if (columnIndex === 2) {
                            if (cellValue >= 15) {
                                data.cell.styles.fillColor = [255, 99, 71] // Red background
                            }
                            if (columnIndex === 2 && cellValue >= 5 && cellValue < 15) {
                                data.cell.styles.fillColor = [255, 165, 0] // Orange background
                            }
                            if (columnIndex === 2 && cellValue < 5) {
                                data.cell.styles.fillColor = [34, 139, 34] // Green background
                            }
                            data.cell.styles.textColor = [255, 255, 255] // White text
                        }
                    }
                })

                doc.text('APPENDIX II – SUMMARY OF KEY RISK INDICATORS ENTRIES', 10, 85)

                // Page 3 - Risk Table for Departments
                // Table data
                const APPIItableData = [
                    ['Directorate of Audit Services', 'Barc not constituted', 'No. of days without properly constituted barc', ,],
                    ['Directorate of Audit Services', 'Audit work plans not approved', 'No. of days without properly constituted barc', ,],
                    ['Directorate of Audit Services', 'Unavailability of the auditees', '%ge of audits not completed within set timelines', ,],
                    ['Directorate of Audit Services', 'Denied access to receive information 1 information', 'No of days it takes to receive information after request', 1],
                    ['Directorate of Audit Services', 'Denied access to receive information 1 information', 'No of days it takes to receive information after request', 0],
                    ['Directorate of Audit Services', 'Denied access to receive information 1 information', 'No of days it takes to receive information after request', ,],
                    ['Directorate of Audit Services', 'Inappropriate Audit terms of reference', 'Number of consultancies without formal requests', ,],
                    ['Directorate of Audit Services', 'Request for Audit investigations delayed or not done', 'Number of irregulaties detected but not investigated', ,],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 'Number of investigation not accepted by HIA', 0],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 'Number of investigation not accepted by HIA', 0],
                    ['Directorate of Audit Services', 'Lack of skills by Audit staff to carry out investigation assignments', 'Number of investigation not accepted by HIA', 0]
                ]

                // Create the table with color-coded cells
                doc.autoTable({
                    startY: 90,
                    margin: { top: 20 },
                    head: [['BU Name', 'Risk Event Name', 'KRI Item Name', 'Number Value', 'Actions Status']],
                    body: APPIItableData,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] }, // Green header
                    bodyStyles: { valign: 'middle' },
                    didParseCell: data => {
                        const columnIndex = data.column.index
                        const cellValue = data.cell.raw
                        if (columnIndex === 3) {
                            if (cellValue > 0) {
                                data.cell.styles.fillColor = [34, 139, 34] // Green background
                            }
                            if (cellValue <= 0) {
                                data.cell.styles.fillColor = [0, 0, 0] // Green background
                            }
                            data.cell.styles.textColor = [255, 255, 255] // White text
                        }
                    }
                })

                doc.text('APPENDIX III- SUMMARY OF COMPLIANCE ATTESTATION', 10, 240)

                // Page 3 - Risk Table for Departments
                // Table data
                const APPIIItableData = [
                    ['Directorate of Audit Services', 'Denied access to information', , 'INACTIVE'],
                    ['Directorate of Audit Services', 'Denied access to information', , 'YES'],
                    ['Directorate of Audit Services', 'Denied access to information', , 'INACTIVE'],
                    ['Directorate of Audit Services', 'Barc not constituted', , 'INACTIVE'],
                    ['Directorate of Audit Services', 'Inappropriate Audit terms of reference', , 'INACTIVE']
                ]

                // Create the table with color-coded cells
                doc.autoTable({
                    startY: 245,
                    margin: { top: 20 },
                    head: [['BU Name', 'Risk Event Name', 'Compliance Question Name', 'Compliance Response Value', 'Actions Status']],
                    body: APPIIItableData,
                    headStyles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] }, // Green header
                    bodyStyles: { valign: 'middle' },
                    didParseCell: data => {
                        const columnIndex = data.column.index
                        const cellValue = data.cell.raw
                        if (columnIndex === 3) {
                            if (cellValue == 'YES') {
                                data.cell.styles.fillColor = [34, 139, 34] // Green background
                            }
                            if (cellValue == 'INACTIVE') {
                                data.cell.styles.fillColor = [0, 0, 0] // Green background
                            }
                            data.cell.styles.textColor = [255, 255, 255] // White text
                        }
                    }
                })

                // Fetch the total number of pages for dynamic footer later
                const totalPages = doc.internal.getNumberOfPages()

                // Header and Footer Settings
                const addHeaderFooter = page => {
                    // Add header
                    doc.setFontSize(18)
                    doc.text('KENYA URBAN ROADS AUTHORITY', 10, 15)
                    doc.setFontSize(10)
                    doc.text(this.currentDate, 150, 15) // Current date on the right

                    // Line separator for header
                    doc.setLineWidth(0.5)
                    doc.line(10, 18, 200, 18) // Draw line

                    // Add footer
                    doc.setFontSize(10)
                    doc.text('KURA Q1_Report', 10, 290) // Report title at the bottom-left
                    doc.text(`Page ${page} of ${totalPages}`, 180, 290) // Page number at the bottom-right

                    // Line separator for footer
                    doc.setLineWidth(0.5)
                    doc.line(10, 287, 200, 287) // Footer line
                }

                // Apply Header & Footer on all pages
                for (let i = 1; i <= totalPages; i++) {
                    doc.setPage(i)
                    addHeaderFooter(i)
                }

                // Finally Save the PDF
                doc.save('kura-quarterly-report.pdf')
            },

            addRiskTreatmentTable(doc, startY) {
                doc.autoTable({
                    head: [['Risk', 'Action', 'Status']],
                    body: [
                        ['Audit work plans not approved', 'Approval of audit plans', 'Completed'],
                        ['Inadequate audit staff', 'Recruitment of additional staff', 'Deferred']
                    ],
                    startY: startY,
                    styles: { fillColor: [22, 160, 133], textColor: [255, 255, 255] }
                })
            },

            addComplianceTable(doc, startY) {
                doc.autoTable({
                    head: [['Risk Event Name', 'Compliance Question Name', 'Compliance Response']],
                    body: [
                        ['Denied access to information', 'YES', 'Inactive'],
                        ['Inappropriate Audit terms of reference', 'YES', 'Inactive']
                    ],
                    startY: startY,
                    styles: { fillColor: [41, 128, 185], textColor: [255, 255, 255] }
                })
            }
        },
        computed: {
            currentDate() {
                const options = {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    hour12: true
                }
                return new Date().toLocaleString('en-US', options)
            }
        }
    }
</script>

<style scoped>
/* Styling for HTML preview */

.introduction {
    margin-bottom: 20px;
}

h1,
h2 {
    color: #1f4e79;
    font-weight: bold;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table,
th,
td {
    border: 1px solid black;
}

th,
td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #4caf50;
    color: white;
}

/* Chart container for risk trends */
.chart-container {
    height: 300px;
}

/* Optional: Add padding and margin for spacing */
.section {
    margin-top: 20px;
    margin-bottom: 20px;
}

.table-bordered {
    border: 1px solid #dee2e6;
}
.bg-danger {
    background-color: #dc3545 !important;
}
.bg-warning {
    background-color: #ff9307 !important;
}
.bg-success {
    background-color: #28a745 !important;
}
.bg-dark {
    background-color: #136179 !important;
}
.bg-blue {
    background-color: blue !important;
}
.bg-yellow {
    background-color: yellow !important;
}
.bg-white {
    background-color: white !important;
}
</style>
