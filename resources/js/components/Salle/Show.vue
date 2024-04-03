<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Salle Details</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'salles' }"
            class="btn btn-default float-right"
          >
            <i class="fa-solid fa-pen-to-square"></i>
            Back
          </router-link>
        </div>
      </div>
    </div>
  </section>

  <div class="content px-3">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <!-- Libelle Field -->
          <div class="col-sm-12">
            <label for=""> Libelle</label>
            <p>{{ piece.libelle }}</p>
          </div>

          <!-- Adresse Field -->
          <div class="col-sm-12">
            <label for="">Adresse</label>
            <p>{{ piece.adresse }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import axios from "axios";
const piece = ref({});
const route = useRoute();
const fetchSalle = async (id) => {
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
  fetchSalle();
});
</script> 
