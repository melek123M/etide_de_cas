<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Spectacle</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'add-spectacle' }"
            class="btn btn-primary float-right"
          >
            <i class="fa-solid fa-pen-to-square"></i>
            Add New
          </router-link>
        </div>
      </div>
    </div>
  </section>

  <div class="content px-3">
    <div class="clearfix"></div>

    <div class="card">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table" id="spectacles-table">
            <thead>
              <tr>
                <th>Salle</th>
                <th>Piece</th>
                <th>Date</th>
                <th colspan="3" style="text-align: center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="spectacle in spectacles" :key="spectacle.id">
                <td>{{ spectacle.salle.libelle }}</td>
                <td>{{ spectacle.piece.titre }}</td>
                <td>{{ spectacle.datespectacle }}</td>
                <td style="width: 120px">
                  <div class="btn-group">
                    <td>
                      <router-link
                        :to="{
                          name: 'show-spectacle',
                          params: { id: spectacle.id },
                        }"
                        class="btn btn-outline-warning mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        show
                      </router-link>
                    </td>
                    <td>
                      <router-link
                        :to="{
                          name: 'edit-spectacle',
                          params: { id: spectacle.id },
                        }"
                        class="btn btn-outline-success mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        edit
                      </router-link>
                    </td>
                    <td>
                      <button
                        class="btn btn-outline-danger mx-2"
                        @click="deletespectacle(spectacle.id)"
                      >
                        <i class="fa-solid fa-trash-can"></i>
                        Delete
                      </button>
                    </td>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <div class="float-right"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
const spectacles = ref([]);
const isLoading = ref(true);
const getspectacles = async () => {
  await axios
    .get("http://localhost:8000/api/spectacles")
    .then((res) => {
      spectacles.value = res.data.data;
      isLoading.value = false;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  console.log(spectacles);
  getspectacles();
});

const deletespectacle = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
    try {
      await axios.delete(`http://localhost:8000/api/spectacles/${id}`);
      getspectacles();
    } catch (error) {
      console.log(error);
    }
  }
};
</script> 
