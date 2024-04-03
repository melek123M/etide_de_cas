<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Create Pieces</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content px-3">
    <div class="card">
      <form @submit.prevent="addPiece">
        <div class="card-body">
          <div class="row">
            <!-- Titre Field -->
            <div class="form-group col-sm-6">
              <label for="titre" class="form-label">Titre</label>
              <input
                type="text"
                class="form-control"
                id="titre"
                v-model="piece.titre"
              />
            </div>

            <!-- Flyer Field -->
            <div class="form-group col-sm-6">
              <label for="flyer" class="form-label">Flyer</label>
              <input
                type="text"
                class="form-control"
                id="flyer"
                v-model="piece.flyer"
              />
            </div>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-floppy-disk"></i>Enregister
          </button>
          <router-link to="/pieces" class="btn btn-outline-danger mx-2">
            <i class="fa-solid fa-xmark"></i>Cancel
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
import axios from "axios";
const piece = ref({
  titre: "",
  flyer: "",
});
const addPiece = async () => {
  await axios
    .post(`http://localhost:8000/api/pieces`, piece.value)
    .then(() => {
      router.push({ name: "pieces" });
    })
    .catch((error) => {
      console.log(error);
    });
};
</script> 
