<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <!--/. container-fluid -->
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" @submit.prevent="categoryUpdate">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input
                        type="text"
                        name="cat_name"
                        v-model="form.cat_name"
                        class="form-control"
                        id="exampleInputEmail1"
                        placeholder="Enter Category Name"
                      />
                      <div
                        v-if="form.errors.has('cat_name')"
                        v-html="form.errors.get('cat_name')"
                      />
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
  name: "Edit",

  mounted() {
    axios
      .get("/categoryById/" + this.$route.params.categoryId)
      .then((response) => {
        this.form.fill(response.data.categoryById);
      });
  },

  data() {
    return {
      form: new Form({
        cat_name: "",
      }),
    };
  },

  methods: {
    categoryUpdate() {
      this.form
        .post(`/categoryUpdate/${this.$route.params.categoryId}`)
        .then((response) => {
          this.$router.push("/category");
          Toast.fire({
            icon: "success",
            title: "Category Update successfully",
          });
          console.log(response);
        })
        .catch(() => {});
      // ...
    },
    goBack() {
      this.$router.push("/category");
    },
  },
};
</script>

<style>
</style>