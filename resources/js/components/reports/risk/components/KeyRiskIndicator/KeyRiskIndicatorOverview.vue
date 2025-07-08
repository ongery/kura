<template>
    
    <div class="row mb-2">

    <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%"
          :chartdata="chartData"
          :options="chartOptions"
        >
        </TotalDought>
      </div>


      <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
          :chartdata="chartDataTotal"
          :options="chartOptions"
        >
        </TotalDought>
      </div>

      <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
          :chartdata="chartDataRed"
          :options="chartOptions"
        >
        </TotalDought>
      </div>


      <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
          :chartdata="chartDataAmber"
          :options="chartOptions"
        >
        </TotalDought>
      </div>

      <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
          :chartdata="chartDataGreen"
          :options="chartOptions"
          :amount="unmetered"
        >
        </TotalDought>
      </div>


      <div class="col-md-2 mt-2">
        <TotalDought
          style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
          :chartdata="chartDataGray"
          :options="chartOptions"
        >
        </TotalDought>
      </div>

    </div>
</template>