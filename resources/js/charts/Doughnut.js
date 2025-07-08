import { Doughnut } from 'vue-chartjs'
export default {
    extends: Doughnut,
    data() {
        return {
            centerValue: null,
            chartData: {
                datasets: [
                    {
                        borderWidth: 1,
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        backgroundColor: ['rgba(67, 153, 104, 0.8)'],
                        data: [1000]
                    }
                ],
                labels: ['Total Risk']
            },
            options: {
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    props: {
        totalValue: {
            type: Number
        }
    },
    watch: {
        totalValue: {
            handler: 'setInitial',
            immediate: true
        }
    },
    mounted() {
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

                var text = localStorage.totalRisks
                var textX = Math.round((width - ctx.measureText(text).width) / 2)
                var textY = height / 2 + 15

                ctx.fillText(text, textX, textY)
                ctx.save()
            }
        })
        this.renderChart(this.chartData, this.options)
        // this.textCenter(880)
    },
    methods: {
        setInitial(val) {
            this.centerValue = val
        }
    }
}
