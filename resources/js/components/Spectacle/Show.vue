<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Spectacle Details</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'spectacles' }"
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
          <!-- salle Field -->
          <div class="col-sm-12">
            <label for="salle_id">Salle</label>
            <p>{{ spectacle.salle.libelle }}</p>
          </div>

          <!-- Piece Field -->
          <div class="col-sm-12">
            <label for="salle_id">Piece</label>
            <p>{{ spectacle.piece.titre }}</p>
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

const spectacle = ref({});
const route = useRoute();

const fetchSpectacle = async () => {
  try {
    const response = await axios.get(
      `http://localhost:8000/api/spectacles/${route.params.id}`
    );
    if (response.data) {
      spectacle.value = response.data;
    } else {
      console.error("No data received from the API");
    }
  } catch (error) {
    console.error("Error fetching data:", error);
  }
};

onMounted(() => {
  fetchSpectacle();
});
</script> 
