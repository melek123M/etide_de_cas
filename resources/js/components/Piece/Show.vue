<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Piece Details</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'pieces' }"
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
          <!-- Titre Field -->
          <div class="col-sm-12">
            <label for=""> Titre</label>
            <p>{{ piece.titre }}</p>
          </div>

          <!-- Flyer Field -->
          <div class="col-sm-12">
            <label for="">Flyer</label>
            <p>{{ piece.flyer }}</p>
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
const fetchArticle = async (id) => {
  await axios
    .get(`http://localhost:8000/api/pieces/${route.params.id}`)
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
</script> 
