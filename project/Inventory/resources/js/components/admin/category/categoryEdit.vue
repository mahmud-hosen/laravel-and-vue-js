<template>
  <div>
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row justify-content-center">
          <div class="col-md-6 mt-5">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category Add</h3>
                <div class="text-right">
                  <router-link to="/" class="btn btn-success btn-sm"
                    >Add</router-link
                  >
                </div>
              </div>
              <form role="form" @submit.prevent="categorySave">
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Project Description</label>
                    <textarea
                      id="inputDescription"
                      class="form-control"
                      rows="4"
                    ></textarea>
                  </div>

                  <div class="form-group">
                    <label for="inputProjectLeader">Project Leader</label>
                    <input
                      type="file"
                      id="inputProjectLeader"
                      class="form-control"
                    />
                  </div>
                </div>

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

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    categorySave() {},
    goBack() {},
  },
};
</script>

<style>
</style>