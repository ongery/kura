<template>
    
    
  <div class="row mb-2">
    <div class="col-md-3 mt-2">
      <TotalDought
        style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
        :chartdata="chartData"
        :options="chartOptions"
      >
      </TotalDought>
    </div>

    <div class="col-md-2 mt-2">
      <TotalDought
        style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
        :chartdata="chartDataKCI"
        :options="chartOptions"
      >
      </TotalDought>
    </div>
    <div class="col-md-2 mt-2 mrl-1">
      <TotalDought
        style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
        :chartdata="chartDataRed"
        :options="chartOptions"
      >
      </TotalDought>
    </div>
    <div class="col-md-2 mt-2">
      <TotalDought
        style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
        :chartdata="chartDataGreen"
        :options="chartOptions"
      >
      </TotalDought>
    </div>
    <div class="col-md-2 mt-2">
      <TotalDought
        style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
        :chartdata="chartDataGray"
        :options="chartOptions"
      >
      </TotalDought>
    </div>

  </div>

</template>