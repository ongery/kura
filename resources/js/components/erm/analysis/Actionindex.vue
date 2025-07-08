<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card">


        
        <!-- start:card-header -->
        <div class="card-header mb-3">
          
          <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Improvement Actions</h3>

        </div>
        <!-- end:card-header -->


        <!-- <div class="card-header">
          <h3 class="card-title">Improvement Actions</h3>
        </div> -->
        <!-- /.card-header -->

        



        
          <!--begin::Accordion-->
          <div  v-for="(navItem,index) in menuList":key="i">

            <!--begin::Section-->
            <div class="m-0 pl-5 pt-2">

            <!-- begin::Heading -->
            <div class="d-flex align-items-center collapsible p-6 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + '_' + index">
                
                <!--begin::Icon-->
                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
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
                
                <!-- <h3 style="margin-left: 8px;"  class="custom-list-title  text-gray-800 text-hover-success">{{mode1.RiskName}}</h3> -->
                <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{navItem.item.Name}}</h5>

                <!-- <h4 class="text-gray-700 fw-bold fs-3 cursor-pointer mb-0">{{mode1.RiskName}}</h4> -->
            </div>
            <!-- end::Heading -->

            <!--begin::Body-->
            <div :id="'accordion_' + '_' + index" class="collapse fs-6 ms-1">
              
              <ul class="nav nav-sm flex-column p-6">
                <li
                  v-for="(subItem,j) in navItem.items"
                  :key="j"
                  class="nav-item"
                >
                  <a
                    href="#"
                    @click.prevent="moreDetails(subItem)"
                    class="nav-link"
                  >{{subItem.Name}} -- {{subItem.freq}} 
                  </a>
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








<!-- 
        <div class="card-body">

          <ul>
            <li
              v-for="(navItem,i) in menuList"
              :key="i"
              class="nav-item  has-treeview"
            >
              <a
                class="nav-link"
                href="javascript:;"
                data-toggle="collapse"
                role="button"
                :aria-expanded="navItem.expand"
                aria-controls="sidebar-products"
                @click.prevent="navItemCollapse(i)"
              >
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span
                  class="nav-link-text"
                  style="color:black;"
                >
                  {{navItem.item.Name}}
                </span>
              </a>
              <div
                v-if="navItem.items.length>0"
                class="collapse"
                :class="{show: navItem.expand}"
              >
                <ul class="nav nav-sm flex-column">
                  <li
                    v-for="(subItem,j) in navItem.items"
                    :key="j"
                    class="nav-item"
                  >
                    <a
                      href="#"
                      @click="moreDetails(subItem)"
                      class="nav-link"
                    >{{subItem.Name}} --{{subItem.freq}} </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul> -->
          <!-- <table class="table table-bordered table-hover mt-2">
            <thead class="thead-light">
            </thead>
            <tbody>
              <tr
                v-for="mode in  allcauses"
                :key="mode.id"
              >
                <td>{{ mode.Name }}</td>
              </tr>
            </tbody>
          </table> -->
        <!-- </div> -->




      </div>
      <!-- /.card -->
    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      editmode: false,
      allcauses: {},
      menuList: [],
      form: new Form({
        search: ''
      })
    }
  },
  methods: {
    loadCausesEffects() {
      axios
        .get('/api/actiontracking-erm', {
          params: {
            RiskID: localStorage.risk_id
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
    navItemCollapse(index) {
      this.menuList = this.menuList.map((item, i) => {
        item.expand = !item.expand
        if (i !== index) {
          item.expand = false
        }
        return item
      })
    },
    moreDetails(data) {
      localStorage.clear('action_id')
      localStorage.setItem('action_id', data.id)
      this.$router.push({ name: 'ActionProfile' })
    }
  },
  created() {
    this.loadCausesEffects()
  }
}
</script>
