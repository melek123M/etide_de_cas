<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Salles</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'add-salle' }"
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
          <table class="table" id="salles-table">
            <thead>
              <tr>
                <th>Libelle</th>
                <th>Adresse</th>
                <th colspan="3" style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="salle in salles" :key="salle.id">
                <td>{{ salle.libelle }}</td>
                <td>{{ salle.adresse }}</td>
                <td style="width: 120px">
                  <div class="btn-group">
                    <td>
                      <router-link
                        :to="{ name: 'show-salle', params: { id: salle.id } }"
                        class="btn btn-outline-warning mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        show
                      </router-link>
                    </td>
                    <td>
                      <router-link
                        :to="{ name: 'edit-salle', params: { id: salle.id } }"
                        class="btn btn-outline-success mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        edit
                      </router-link>
                    </td>
                    <td>
                      <button
                        class="btn btn-outline-danger mx-2"
                        @click="deletesalle(salle.id)"
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
const salles = ref([]);
const isLoading = ref(true);
const getsalles = async () => {
  await axios
    .get("http://localhost:8000/api/salles")
    .then((res) => {
      salles.value = res.data.data;
      isLoading.value = false;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  getsalles();
});

const deletesalle = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
    try {
      console.log(id);
      await axios.delete(`http://localhost:8000/api/salles/${id}`);
      getsalles();
    } catch (error) {
      console.log(error);
    }
  }
};
</script> 
