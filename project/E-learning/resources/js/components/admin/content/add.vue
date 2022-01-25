<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <!--/. container-fluid -->
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-9 mt-3">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add New Sub Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="subCategorySave">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="exampleInputEmail1">Select Category</label>
                                      <select type="text" v-model="form.cat_id" class="form-control" id="exampleInputEmail1"
                                        :class="{'is-invalid' :form.errors.has('cat_id')}" name="cat_id" >
                                        <option :value="category.id"  v-for="category in getCategoryList" :key="category.id">
                                          {{ category.cat_name }}
                                        </option>
                                      </select>
                                      <has-error :form="form" field="cat_id"> </has-error>
                                     </div>
                                </div>
                               
                                <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="exampleInputEmail1">Select Category</label>
                                      <select type="text" v-model="form.cat_id" class="form-control" id="exampleInputEmail1"
                                        :class="{'is-invalid' :form.errors.has('cat_id')}" name="cat_id" >
                                        <option :value="category.id"  v-for="category in getCategoryList" :key="category.id">
                                          {{ category.cat_name }}
                                        </option>
                                      </select>
                                      <has-error :form="form" field="cat_id"> </has-error>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Select Category</label>
                                  <select type="text" v-model="form.cat_id" class="form-control" id="exampleInputEmail1"
                                    :class="{'is-invalid' :form.errors.has('cat_id')}" name="cat_id" >
                                    <option :value="category.id"  v-for="category in getCategoryList" :key="category.id">
                                      {{ category.cat_name }}
                                    </option>
                                  </select>
                                  <has-error :form="form" field="cat_id"> </has-error>
                              </div>
                              
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category Name</label>
                            <input type="text" name="sub_cat_name" v-model="form.sub_cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" />
                            <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')"></div>
                        </div>
                      </div>

                       <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Sub Category Name</label>
                                  <input type="text" name="sub_cat_name" v-model="form.sub_cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" />
                                  <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')"></div>
                              </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category Name</label>
                            <input type="text" name="sub_cat_name" v-model="form.sub_cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" />
                            <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')"></div>
                        </div>
                      </div>

                       <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Sub Category Name</label>
                                  <input type="text" name="sub_cat_name" v-model="form.sub_cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name" />
                                  <div v-if="form.errors.has('sub_cat_name')" v-html="form.errors.get('sub_cat_name')"></div>
                              </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                      Submit
                    </button>
                    <button
                      type="submit"
                      @click="goBack"
                      class="btn btn-danger btn-sm px-3"
                    >
                      Back
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
  </div>
</template>

<script>
export default {
  name: "Save",

  mounted() {
    this.$store.dispatch("getCategoryList");
  },

  computed: {
    getCategoryList() {
      return this.$store.getters.categoryList;
    },
  },

  data() {
    return {
      form: new Form({
        sub_cat_name: '',
        cat_id: '',

        
      }),
    };
  },

  methods: {
    subCategorySave() {
      this.form.post('/subCategorySave')
        .then((response) => {
          this.$router.push('/subCategory');
          Toast.fire({
            icon: 'success',
            title: 'Sub Category added successfully',
          });
          console.log(response);
        })
        .catch(() => {});
      // ...
    },
    goBack() {
      this.$router.push("/subCategory");
    },
  },
};
</script>

<style>

</style>