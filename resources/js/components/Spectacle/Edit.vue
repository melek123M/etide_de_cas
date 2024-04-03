<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Salle</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content px-3">
    <div class="card">
      <form @submit.prevent="editSalle(id)">
        <div class="card-body">
          <div class="row">
            <!-- Libelle Field -->
            <div class="form-group col-sm-6">
              <label for="libelle" class="form-label">Libelle</label>
              <input
                type="text"
                class="form-control"
                id="libelle"
                v-model="piece.libelle"
              />
            </div>

            <!-- Adresse Field -->
            <div class="form-group col-sm-6">
              <label for="adresse" class="form-label">Adresse</label>
              <input
                type="text"
                class="form-control"
                id="adresse"
                v-model="piece.adresse"
              />
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-floppy-disk"></i>Enregister
          </button>
          <router-link to="/salles" class="btn btn-outline-danger mx-2">
            <i class="fa-solid fa-xmark"></i>Cancel
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
const router = useRouter();
import axios from "axios";
const route = useRoute();
const piece = ref({});
const fetchArticle = async (id) => {
  await axios
    .get(`http://localhost:8000/api/salles/${route.params.id}`)
    .then((res) => {
      piece.value = res.data;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  fetchArticle();
});
const editSalle = async (id) => {
  console.log();
  await axios
    .put(`http://localhost:8000/api/salles/${route.params.id}`, piece.value)
    .then(() => {
      router.push({ name: "salles" });
    })
    .catch((error) => {
      console.log(error);
    });
};
</script> 
