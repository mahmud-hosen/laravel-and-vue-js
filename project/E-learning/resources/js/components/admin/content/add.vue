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
                <form role="form" @submit.prevent="contentSave" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 right-border">
                            <div class="row">
                                <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="exampleInputEmail1">Select Category</label>
                                      <select type="text" v-model="category_id" class="form-control" 
                                       id="exampleInputEmail1" name="category_id" @change="getSubCategory"  >
                                        <option :value="category.id"  v-for="category in getCategoryList" :key="category.id">
                                          {{ category.cat_name }}
                                        </option>
                                      </select>
                                      <div class="containError" v-if="errors && errors.category_id">{{ errors.category_id[0] }}</div>
                                     </div>
                                </div>
                               
                                <div class="col-md-6">
                                      <div class="form-group">
                                      <label for="exampleInputEmail1">Select Sub Category</label>
                                      <select type="text" v-model="subCategory_id" class="form-control" id="exampleInputEmail1"
                                         name="subCategory_id" >
                                        <option :value="sub_cat.id"  v-for="sub_cat in subCategory" :key="sub_cat.id">
                                          {{ sub_cat.sub_cat_name }}
                                        </option>
                                      </select>
                                      <div class="containError" v-if="errors && errors.subCategory_id">{{ errors.subCategory_id[0] }}</div>
                                      
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Upload File</label>
                            <input type="file" name="file"  class="form-control" id="inputFileUpload" @change="getFile" />
                            <div v-if="errors && errors.file">{{ errors.file[0] }}</div>
                            
                          </div>   
                        </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Content Title</label>
                            <input type="text" name="title" v-model="title" class="form-control" id="exampleInputEmail1" placeholder="Enter  Title" />
                            <div class="containError" v-if="errors && errors.title">{{ errors.title[0] }}</div>
                            
                                                      
                        </div>
                      </div>

                       <div class="col-md-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Video Url</label>
                                  <input type="text" name="video_url" v-model="video_url" class="form-control" id="exampleInputEmail1" placeholder="Enter Url" />
                                  <div v-if="errors && errors.video_url">{{ errors.video_url[0] }}</div>

                              </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 ">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                               <textarea v-model="description" name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                               <div v-if="errors && errors.description">{{ errors.description[0] }}</div>
                            
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

      subCategory:[],

      category_id:'',
      subCategory_id:'',
      file:'',
      title:'',
      video_url:'',
      description:'',
      errors:{},

    
    }
  },

  methods: {
     getSubCategory(){
      axios.get('/getSubcategoryByCategoryId/'+this.category_id).then((response)=>{
          this.subCategory = response.data.subCategoryList;
        })
    },
    getFile(e)
    {
      this.file = e.target.files[0];
      if(this.file.size > 2097152){
          Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File is larger than 2MB!',
          })

      }

    },
   

    contentSave() {

      let form = new FormData;
      form.append('file',this.file);
      form.append('category_id',this.category_id);
      form.append('subCategory_id',this.subCategory_id);
      form.append('title',this.title);
      form.append('video_url',this.video_url);
      form.append('description',this.description);


      axios.post('/contentSave',form)
        .then((response) => {
          this.$router.push('/content');
          Toast.fire({
            icon: 'success',
            title: 'Content added successfully',
          });
          console.log(response);
        }).catch(error => {
          this.errors = error.response.data.errors;
        });
      // ...
    },
    goBack() {
      this.$router.push("/subCategory");
    },
  },
};
</script>

<style>
.containError{
  color:red;
}

</style>