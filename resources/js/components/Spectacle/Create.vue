<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Create Spectacle</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content px-3">
    <div class="card">
      <form @submit.prevent="addSpectacle">
        <div class="card-body">
          <div class="row">
            <!-- Salle Field -->
            <div class="form-group col-sm-6">
              <label for="salle" class="form-label">Salle</label>
              <select class="form-control" v-model="spectacle.salle_id">
                <option
                  v-for="salle in salles"
                  :key="salle.id"
                  :value="salle.id"
                >
                  {{ salle.libelle }}
                </option>
              </select>
            </div>

            <!-- Piece Field -->
            <div class="form-group col-sm-6">
              <label for="Piece" class="form-label">Piece</label>
              <select class="form-control" v-model="spectacle.piece_id">
                <option
                  v-for="piece in pieces"
                  :key="piece.id"
                  :value="piece.id"
                >
                  {{ piece.titre }}
                </option>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label for="Piece" class="form-label">Date</label>
              <input type="date" class="form-control"  v-model="spectacle.datespectacle"/>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-floppy-disk"></i>Enregister
          </button>
          <router-link to="/spectacles" class="btn btn-outline-danger mx-2">
            <i class="fa-solid fa-xmark"></i>Cancel
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";
const spectacle = ref({
  salle_id: "",
  piece_id: "",
  datespectacle: "",
});
const salles = ref([]);
const pieces = ref([]);
const getsalles = () => {
  axios
    .get("http://localhost:8000/api/salles")
    .then((res) => {
      salles.value = res.data.data;
    })
    .catch((error) => {
      console.log(error);
    });
};
const getpieces = () => {
  axios
    .get("http://localhost:8000/api/pieces")
    .then((res) => {
      pieces.value = res.data.data;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  getsalles();
  getpieces();
});
const addSpectacle = async () => {
  await axios
    .post(`http://localhost:8000/api/spectacles`, spectacle.value)
    .then(() => {
      router.push({ name: "spectacles" });
    })
    .catch((error) => {
      console.log(error);
    });
};
</script> 
