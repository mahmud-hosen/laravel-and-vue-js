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
                  <h3 class="card-title">Content List</h3>
                  <div class="text-right">
                    <router-link
                      to="/addContent"
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
                        <th>Sub Category Name</th>

                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(subCategoryList, index) in getSubCategoryList"
                        :key="subCategoryList.id"
                      >
                        <td>{{ index + 1 }}</td>
                        <td>{{ subCategoryList.categories.cat_name }}</td>
                        <td>{{ subCategoryList.sub_cat_name }}</td>

                        <td>
                          <div class="">
                            <router-link
                              :to="`/editSubCategory/${subCategoryList.id}`"
                              class="btn btn-info btn-xs"
                              ><i class="fas fa-edit"></i
                            ></router-link>
                            <a
                              @click.prevent="subCategoryDelete(subCategoryList.id)"
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

  //  Step: 10
  mounted() {
    this.$store.dispatch("getSubCategoryList");
  },

  //  Step: 4
  computed: {
    getSubCategoryList() {
      return this.$store.getters.subCategoryList;
    },
  },

  methods: {
    subCategoryDelete(id) {
      axios.get("/subCategoryDelete/" + id).then((response) => {
        this.$store.dispatch("getSubCategoryList");
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