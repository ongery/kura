<template>
  <div>

    <div class="mt-2">

      <CorruptionRiskToolbar :title="'Corruption Risk Events'"></CorruptionRiskToolbar>

      <!-- <div class="card-header">
        <h3 class="card-title">Corruption Risk Events</h3>
      </div> -->
      <!-- /.card-header -->







      <!--begin::Col-->
      <div class="col-xl-12">

        <!--begin::Tables Widget 3-->
        <div class="card card-xl-stretch mb-6">

            <!--begin::Header-->
            <div class="card-header border-0  pt-8">
          
                  <!--begin::Col-->
                  <div class="col-md-10 fv-row mb-12">

                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Select Functional Area</span>
                        </h3>
                

                        <select
                          class="form-control p-5"
                          @change="loadData()"
                          v-model="form.fraudRiskID"
                        >
                          <option
                            v-for="val in functionalAreas"
                            :value="val.id"
                            :key="val.id"
                          >
                            {{ val.Name }}
                          </option>
                        </select>

                    <!--end::Select-->
                    
                </div>
                <!--end::Col-->

            </div>
            <!--end::Header-->

            
        
        </div>
        <!--end::Tables Widget 3-->

      </div>
    <!--end::Col-->










    
      <!--begin::Col-->
      <div class="col-xl-12">

        <!--begin::Tables Widget 3-->
        <div class="card card-xl-stretch mb-6">
            
          <!--begin::Accordion-->
          <div  v-for="(navItem,index) in menuList":key="i">

            <!--begin::Section-->
            <div class="m-0 pl-5 pt-2">

            <!-- begin::Heading -->
            <div class="d-flex align-items-center collapsible p-6 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + '_' + index">
            
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-light col-md-12 rounded m-4">

                  <!--begin::Icon-->
                  <!-- <span class="svg-icon svg-icon-warning me-5"> -->

                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                    <!-- <span class="svg-icon svg-icon-1 svg-icon-warning">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                      </svg>
                    </span> -->
                    <!--end::Svg Icon-->

                  <!-- </span> -->
                  <!--end::Icon-->

                  <!--begin::Title-->
                  <div class="flex-grow-1 me-2 col-md-5">
                    <a href="#" class="fw-bolder text-gray-600 text-hover-success card-label fw-bold fs-3 mb-1">{{navItem.Name}}</a>
                    <span class="text-muted fw-bold d-block">Fraud Risk Area</span>
                  </div>
                  <!--end::Title-->


                   <!--begin::Title-->
                   <div class="flex-grow-1 me-2 col-md-3">
                    <span class="fw-bolder text-gray-600 fs-6 py-1">Assets</span>
                    <!-- <span class="text-muted fw-bold d-block">Fraud Risk Area</span> -->
                    
                   <div>
                     <!--begin::Lable-->
                     <span class="badge badge-btn badge-warning fw-bolder text-gray-600 py-1">{{navItem.assets}}</span>
                     <!--end::Lable-->
                   </div>

                  </div>
                  <!--end::Title-->


                    
                    <!--begin::Icon-->
                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-success me-9">
                      <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                      <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                              <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                          </svg>
                      </span>
                      <!--end::Svg Icon-->
                      <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                      <span class="svg-icon toggle-off svg-icon-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                              <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                              <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                          </svg>
                      </span>
                      <!--end::Svg Icon-->
                  </div>
                  <!--end::Icon-->



                </div>
                <!--end::Item-->


                
                <!-- <h5 class="custom-list-title fw-bold text-gray-700 mb-1">
                  <b class="">Fraud Risk Area:&nbsp&nbsp&nbsp</b> <span class="badge badge-btn badge-light">{{navItem.Name}} </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b class="">Assets:</b> <span class="badge badge-btn badge-light">{{navItem.assets}}</span>
                </h5> -->

                <!-- <h4 class="text-gray-700 fw-bold fs-3 cursor-pointer mb-0">{{mode1.RiskName}}</h4> -->

            </div>
            <!-- end::Heading -->

            <!--begin::Body-->
            <div :id="'accordion_' + '_' + index" class="collapse fs-6 ms-1">
              
              <ul class="nav nav-sm flex-column p-6">
                <li
                  v-for="(subItem,j) in navItem.dataRisks"
                  :key="j"
                  class="nav-item"
                >
                  <a
                    href="#"
                    @click.prevent="moreDetails(subItem.id)"
                    class="nav-link"
                  >{{subItem.item.Name}}</a>

                </li>

                
              </ul>
              
            </div>
            <!--end::Body-->

            <!--begin::Separator-->
            <div class="separator separator-dashed"></div>
            <!--end::Separator-->

            </div>
            <!--end::Section-->

          </div>
        <!--end::Accordion-->


        
        </div>
        <!--end::Tables Widget 3-->

      </div>
    <!--end::Col-->













      <!-- <div class="card-body"> -->

        <!-- <div class="form-group">
          <label>Select Functional Area</label>
          <select
            class="form-control"
            @change="loadData()"
            v-model="form.fraudRiskID"
          >
            <option
              v-for="val in functionalAreas"
              :value="val.id"
              :key="val.id"
            >
              {{ val.Name }}
            </option>
          </select>
        </div> -->





        <!-- <div
          v-for="(navItem,i) in menuList"
          :key="i"
          class="accordion"
        >
          <div class="card">
            <div
              class="card-header"
              id="headingOne"
            >
              <h5 class="mb-0">
                <button
                  class="btn btn-link"
                  type="button"
                  data-toggle="collapse"
                  :aria-expanded="navItem.expand"
                  @click.prevent="navItemCollapse(i)"
                >
                  <b>Fraud Risk Area:&nbsp&nbsp&nbsp</b> {{navItem.Name}} </span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Assets::</b> <span>{{navItem.assets}}</span>
                </button>
              </h5>
            </div>

            <div
              v-if="navItem.dataRisks.length>0"
              :class="{show: navItem.expand}"
              class="collapse"
              aria-labelledby="headingOne"
            >
              <ul class="nav nav-sm flex-column">
                <li
                  v-for="(subItem,j) in navItem.dataRisks"
                  :key="j"
                  class="nav-item"
                >
                  <a
                    href="#"
                    @click="moreDetails(subItem.id)"
                    class="nav-link"
                  >{{subItem.item.Name}}</a>
                </li>
              </ul>

            </div>

          </div>

        </div> -->




      <!-- </div> -->

  </div>
  <!-- /.card -->

  </div>
</template>

<script>
import CorruptionRiskToolbar from './components/CorruptionRiskToolbar.vue'

export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      FUNCTIONAL_AREA_OBJECT: 29,
      menuList: [],
      functionalAreas: {},
      fraudRiskAreas: {},
      form: new Form({
        id: '',
        ObjType: 11,
        Name: '',
        fraudRiskID: ''
      })
    }
  },
  components:{CorruptionRiskToolbar},
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    getResults(page = 1) {
      const token = this.getAuthToken();
      axios
        .get('/api/category?page=' + page, {
          params: {
            ObjType: this.form.ObjType
          },
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
          }
        })
        .then((response) => {
          this.categories = response.data
        })
    },

    loadData() {
      axios
        .get('/api/loadFunctionalAreaData', {
          params: {
            ObjType: this.form.ObjType,
            fraudRiskID: this.form.fraudRiskID
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.menuList = res.data.ResponseData
          } else {
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },

    deleteRoute(id) {
      swal
        .fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          // Send request to the server
          if (result.value) {
            this.form
              .delete('/api/category/' + id)
              .then(() => {
                swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                swal.fire('Failed!', 'Something when wrong', 'warning')
              })
          }
        })
    },
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'AnalyseRiskProfile' })
    },
    newAnalysis() {
      this.$router.push({ name: 'AnalyseRiskNew' })
    },

    loadBusinessUnits() {
      const token = this.getAuthToken();
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
          },
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.businessunits = res.data.ResponseData.data
          } else {
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    loadFunctiaolAreas() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.FUNCTIONAL_AREA_OBJECT
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.functionalAreas = res.data.ResponseData.data
          } else {
            console.log(res.data.ResultDesc)
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    manageHistory() {
        const token = this.getAuthToken();
        axios.post('/api/manage-logs', {
            'page_name': 'Corruption Risk Events',
            'log': 'User visited to the Corruption Risk Events'
        }, {
            withCredentials: true,
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    },
    navItemCollapse(index) {
      console.log(index, 'asdfsad')
      console.log(this.menuList)
      this.menuList = this.menuList.map((item, i) => {
        item.expand = !item.expand
        if (i !== index) {
          item.expand = false
        }
        return item
      })
    },
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'CREAnalyseMainRisk' })
    }
  },
  created() {
    this.loadFunctiaolAreas()
    this.manageHistory();

  }
}
</script>

<style scoped>
.danger {
  background-color: #d6a448;
}
.warning {
  background-color: #ffbf00;
}
.success {
  background-color: #09f17d;
}
</style>
