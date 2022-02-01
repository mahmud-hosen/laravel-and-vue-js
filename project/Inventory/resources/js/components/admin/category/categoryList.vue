<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <!--/. container-fluid -->
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-7 mt-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                  <div class="text-right">
                    <router-link
                      to="/categoryAdd"
                      class="btn btn-primary btn-sm"
                      >Add</router-link
                    >
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Category Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Name</td>
                        <td>Age</td>
                        <td>
                          <div class="">
                            <router-link
                              :to="`/editCategory`"
                              class="btn btn-info btn-xs"
                              ><i class="fas fa-edit"></i
                            ></router-link>
                            <a
                              @click.prevent="categoryDelete"
                              class="btn btn-info btn-xs"
                              ><i class="fas fa-trash"></i
                            ></a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/. container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->
  </div>
</template>

<script>
export default {
  name: "List",

 

 

  methods: {
    categoryDelete() {
      axios.get("/categoryDelete/" + id).then((response) => {
        this.$store.dispatch("getCategoryList");
        Toast.fire({
          icon: "success",
          title: "Category Deleted successfully",
        });
      });
    },
  },
};
</script>

<style>
</style>