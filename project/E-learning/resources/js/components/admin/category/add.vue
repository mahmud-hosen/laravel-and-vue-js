<template>
    <div>
       <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <section class="content">
             <!--/. container-fluid -->
            <div class="container-fluid">
              <div class="row justify-content-center ">
                <div class="col-md-6  mt-3 ">
                  <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add New Category </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="categorySave">
                          <div class="card-body">
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <input type="text" name="cat_name" v-model="form.cat_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
                              <div v-if="form.errors.has('cat_name')" v-html="form.errors.get('cat_name')" />
                            </div>

                           
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <button type="submit" @click="goBack" class="btn btn-danger btn-sm px-3">Back</button>

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
  name:'Save',
  data(){
    return{
      form: new Form({
      cat_name: '',
     
    })
    }
  },

  methods: {
    categorySave () {
      this.form.post('/categorySave')
      .then((response) => {
        this.$router.push('/category');
         Toast.fire({
          icon: 'success',
          title: 'Category added successfully'
          })
          console.log(response)
      }).catch(()=>{

      });
      // ...
    },
    goBack(){
      this.$router.push('/category');
    }
  }
}
</script>

<style>

</style>