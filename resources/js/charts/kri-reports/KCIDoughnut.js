import { Doughnut } from 'vue-chartjs'
export default {
    extends: Doughnut,
    props: {
        chartdata: {
            type: Object,
            default: null
        },
        options: {
            type: Object,
            default: null
        }
    },
    mounted() {
        let chartType = this.chartdata.labels[0]
        let totalValue = 0

        var retrievedObject = localStorage.getItem('kciSummary')
        var parsedData = JSON.parse(retrievedObject)

        if (chartType === 'No. Risks') {
            totalValue = parsedData ? parsedData.totalRisks : 0
        } else if (chartType === '# KCI') {
            totalValue = parsedData ? parsedData.totalKCIs : 0
        } else if (chartType === 'RED KCIs') {
            totalValue = parsedData ? parsedData.redKCIs : 0
        } else if (chartType === 'Green KCIs') {
            totalValue = parsedData ? parsedData.greenKCIs : 0
        } else if (chartType === 'Un-Attested') {
            totalValue = parsedData ? parsedData.unAttestedKCI : 0
        }

        this.addPlugin({
            id: 'my-plugin',
            beforeDraw: function(chart) {
                var width = chart.chart.width
                var height = chart.chart.height
                var ctx = chart.chart.ctx

                ctx.restore()
                var fontSize = (height / 114).toFixed(2)
                ctx.font = fontSize + 'em sans-serif'
                ctx.textBaseline = 'middle'

                var text = totalValue
                var textX = Math.round((width - ctx.measureText(text).width) / 2)
                var textY = height / 2 + 15

                ctx.fillText(text, textX, textY)
                ctx.save()
            }
        })

        this.renderChart(this.chartdata, this.options)
    },
    methods: {
        setInitial(val) {
            this.centerValue = val
        }
    }
}
