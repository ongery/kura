<template>
  <div class="row mt-2">
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
          <!--begin::Title-->
          <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">Questionnaire Questions</h1>
          <!--end::Title-->

          <!--begin::Breadcrumb-->
          <ol style="margin-left: -6px" role="list" class="flex items-center space-x-4 breadcrumb breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
            <li>
              <div>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <!-- Heroicon name: solid/home -->
                  <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                  </svg>
                  <span class="sr-only">Dashboard</span>
                </a>
              </div>
            </li>
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
              <div class="flex items-center">
                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted"> Questionnaire Questions </a>
              </div>
            </li>
            <!--end::Item-->
          </ol>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
          <!-- Search Field -->
          <input v-model="searchQuery" type="text" placeholder="Search Questions" title="Search Questions" class="form-control mb-3" />
          <!--begin::Primary button-->
          <a href="#" @click.prevent="openModel(false)" class="btn btn-sm fw-bold btn-success btn-active-color-dark" title="Add Question"> Add </a>
          <!--end::Secondary button-->
        </div>
        <!--end::Actions-->
      </div>
      <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <div class="col-md-12">
      <div class="card">
        <!--begin::Col-->
        <div class="col-xl-12">
          <!--begin::Tables Widget 3-->
          <div class="card card-xl-stretch mb-5 mb-xl-12">
            <!--begin::Body-->
            <div class="card-body py-3">
              <!--begin::Table container-->
              <div class="table-responsive">
                <!--begin::Header-->

                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                  <thead class="fw-bolder text-muted">
                    <tr>
                      <th>Questions</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="question in paginatedQuestions" :key="question.id">
                      <td>{{ question.question }}</td>
                      <td>
                        <a href="#" @click.prevent="openModel(true, question)" title="Edit Question">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" @click.prevent="deleteQuestion(question.id)" class="ms-2" title="Delete Question">
                          <i class="fa fa-trash text-danger"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <!-- Pagination Controls -->
                <div class="d-flex justify-content-between mt-3">
                  <button @click="currentPage--" :disabled="currentPage === 1" class="btn btn-secondary">Previous</button>
                  <span>Page {{ currentPage }} of {{ totalPages }}</span>
                  <button @click="currentPage++" :disabled="currentPage === totalPages" class="btn btn-secondary">Next</button>
                </div>
                <!--end::Table-->
              </div>
              <!--end::Table container-->
            </div>
            <!--begin::Body-->
          </div>
          <!--end::Tables Widget 3-->
        </div>
        <!--end::Col-->
      </div>
      <!-- /.card -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewLabel">{{ editMode ? 'Update' : 'Add' }} Questionnaire Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? editQuestion() : addQuestion()">
            <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="question">Question</label>
                  <textarea id="question" v-model="form.question" placeholder="Enter the question" class="form-control" :class="{ 'is-invalid': form.errors.has('question') }" required/>
                  <has-error :form="form" :errors="errors" field="question"></has-error>
                </div>
                <div class="form-group col-md-12">
                  <label for="option">Answer Type</label>
                  <v-select v-model="selectedOptions" :options="options" label="text" placeholder="Select options" required></v-select>
                  <has-error :form="form" :errors="errors" field="option"></has-error>
                </div>
                <!-- For Single or Multiple choice, show options -->
                <div class="form-group col-md-12" v-if="form.option === 'single' || form.option === 'multiple'">
                <label for="answers">Answers</label>
                    <div v-for="(answer, index) in form.answers" :key="index" class="answer-field">
                        <textarea id="answers" v-model="answer.answer" placeholder="Enter answer" class="form-control" :class="{ 'is-invalid': form.errors.has('answers') }" required/>
                        <i class="fa-solid fa-plus text-success" @click="addAnswer"></i>
                        <i class="fas fa-times text-danger" v-show="index !== 0" @click="removeAnswer(index)"></i>
                    </div>
                </button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" @click="closeModel">Close</button>
              <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
              <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      questions: [],
      searchQuery: '',
      currentPage: 1,
      itemsPerPage: 10,
      editMode: false,
      form: new Form({
        id: '',
        question: '',
        option: 'single',
        answers: []
      }),
      errors: {},
      options: [
        { value: 'single', text: 'Single-Select' },
        { value: 'multiple', text: 'Multiple-Select' },
        { value: 'fill', text: 'Fill-in-the-Blank' }
      ],
      selectedOptions: 'single'
    }
  },
  computed: {
    filteredQuestions() {
      if (!Array.isArray(this.questions)) return []
      return this.questions.filter((question) => question.question.toLowerCase().includes(this.searchQuery.toLowerCase()))
    },
    totalPages() {
      if (!Array.isArray(this.questions)) return 1
      return Math.ceil(this.filteredQuestions.length / this.itemsPerPage)
    },
    paginatedQuestions() {
      if (!Array.isArray(this.questions)) return []
      const start = (this.currentPage - 1) * this.itemsPerPage
      const end = start + this.itemsPerPage
      return this.filteredQuestions.slice(start, end)
    }
  },
  methods: {
    getAuthToken() {
      return localStorage.getItem('authToken')
    },
    openModel(mode = false, data = null) {
      this.editMode = mode
      this.form.reset()
      this.selectedOptions = this.options.find((option) => option.value === 'single')
      $('#addNew').modal('show')
      if (data) {
        const originalQuestion = { ...data, answers: [...data.answers] };
        this.form.fill(originalQuestion);
        this.selectedOptions = this.options.find((option) => option.value === originalQuestion.option)
      }else{
        this.addAnswer()
      }
    },
    closeModel() {
      this.editMode = false
      this.form.reset()
      this.selectedOptions = this.options.find((option) => option.value === 'single')
      $('#addNew').modal('hide')
    },
    loadData() {
      const token = this.getAuthToken()
      this.$Progress.start()
      axios
        .get('/api/questions', {
          withCredentials: true,
          headers: {
            Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.questions = res.data.ResponseData
            this.$Progress.finish()
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
            title: 'Operation not successful' + '\n' + e.response.data.message
          })
        })
    },
    addQuestion() {
      const token = this.getAuthToken()
      this.$Progress.start()
      this.form
        .post('/api/questions', {
          withCredentials: true,
          headers: {
            Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
            this.$Progress.finish()
            this.errors = {}
            this.form.reset()
            this.selectedOptions = this.options.find((option) => option.value === 'single')
          } else {
            this.handleErrorResponse(res)
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successful' + '\n' + e.response.data.message
          })
        })
    },
    editQuestion() {
      const token = this.getAuthToken()
      this.$Progress.start()
      this.form
        .put('/api/questions/' + this.form.id, {
          withCredentials: true,
          headers: {
            Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Updated successfully'
            })
            this.$Progress.finish()
            this.errors = {}
            this.form.reset()
            this.selectedOptions = this.options.find((option) => option.value === 'single')
          } else {
            this.handleErrorResponse(res)
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successful' + '\n' + e.response.data.message
          })
        })
    },
    deleteQuestion(id) {
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
          const token = this.getAuthToken()
          this.$Progress.start()
          if (result.value) {
            this.form
              .delete('/api/questions/' + id, {
                withCredentials: true,
                headers: {
                  Authorization: `Bearer ${token}`
                }
              })
              .then(() => {
                swal.fire('Deleted!', 'Your record has been deleted.', 'success')
                this.$Progress.finish()
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                this.$Progress.fail()
                swal.fire('Failed!', 'Something went wrong', 'warning')
              })
          }
        })
    },
    handleErrorResponse(res) {
      let errorMessage = ''
      this.errors = {}
      if (typeof res.data.ResultDesc === 'object') {
        this.errors = res.data.ResultDesc
        for (const [field, messages] of Object.entries(res.data.ResultDesc)) {
          if (Array.isArray(messages)) {
            errorMessage += messages.join('<br>')
          } else {
            errorMessage += messages + '<br>'
          }
        }
      } else {
        errorMessage = res.data.ResultDesc
      }
      toast.fire({
        type: 'error',
        title: errorMessage
      })
    },
    addAnswer() {
      this.form.answers.push({ answer: '' })
    },
    removeAnswer(index) {
      this.form.answers.splice(index, 1)
    }
  },
  created() {
    this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  },
  mounted() {
    if (this.form.option !== 'fill') {
      this.addAnswer()
    }
  },
  watch: {
    selectedOptions(newVal) {
        if (newVal) {
            this.form.option = newVal.value;
        }else{
            this.form.option = newVal || '';
        }
      if (this.form.option === 'fill' || this.form.option === '') {
        this.form.answers = []
      } else if (this.form.option !== 'fill' && this.form.answers.length === 0) {
        this.addAnswer()
      }
    }
  }
}
</script>

<style scoped>
.table th,
.table td {
  vertical-align: middle;
}
.fa-edit {
  color: #258c37;
  cursor: pointer;
}
.fa-trash {
  cursor: pointer;
}
.answer-field {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.answer-field input {
  margin-right: 10px;
}
</style>
