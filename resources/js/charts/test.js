var plugin = function(chart) {
        var width = chart.chart.width;
        var height = chart.chart.height;
        var ctx = chart.chart.ctx;

        ctx.restore();
        var fontSize = (height / 114).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";

        var text = 800;
        var textX = Math.round((width - ctx.measureText(text).width) / 2);
        var textY = height / 2;

         ctx.fillText(text, textX, textY);
         ctx.save();
}

Vue.component('line-nocenter',{
  extends: VueChartJs.Line,
  mounted () {
    this.renderChart({
      labels: ['Hello', 'World', 'Chart', 'Test'],
      datasets: [
        {
          backgroundColor: ['#f87979', '#ff0000', '#00ff00', '#0000ff'],
          data: [3,5,6,7]
        }
      ]
    })
  }
  })



Vue.component('doughnut-center',{
  extends: VueChartJs.Doughnut,
  data: () => ({
  chartdata: {
  labels: ["Cambodia", "Thailand", "Vietnam", "Laos"],
  datasets: [
    {
      label: "Data One",
      backgroundColor: ["#a3c7c9", "#889d9e", "#647678", "f87979"],
      data: [91, 3, 3, 3]
      }
     ]
     },
  options: {
    legend: {
      display: false
    },
    responsive: true,
    maintainAspectRatio: false,

  }
}),
mounted() {
   this.addPlugin({
    id: 'my-plugin',
    beforeDraw: plugin
  })
  this.renderChart(this.chartdata, this.options);
},

})

//App setup
new Vue({
	el:'#vue',
  data(){
  	return {
    	data: {}
    }
  },
})
