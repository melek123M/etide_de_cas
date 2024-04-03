<template>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pieces</h1>
        </div>
        <div class="col-sm-6">
          <router-link
            :to="{ name: 'add-piece' }"
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
          <table class="table" id="pieces-table">
            <thead>
              <tr>
                <th>Titre</th>
                <th>Flyer</th>
                <th colspan="3" style="text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="piece in pieces" :key="piece.id">
                <td>{{ piece.titre }}</td>
                <td>{{ piece.flyer }}</td>
                <td style="width: 120px">
                  <div class="btn-group">
                    <td>
                      <router-link
                        :to="{ name: 'show-piece', params: { id: piece.id } }"
                        class="btn btn-outline-warning mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        show
                      </router-link>
                    </td>
                    <td>
                      <router-link
                        :to="{ name: 'edit-piece', params: { id: piece.id } }"
                        class="btn btn-outline-success mx-2"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                        edit
                      </router-link>
                    </td>
                    <td>
                      <button
                        class="btn btn-outline-danger mx-2"
                        @click="deletePiece(piece.id)"
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
const pieces = ref([]);
const isLoading = ref(true);
const getpieces = async () => {
  await axios
    .get("http://localhost:8000/api/pieces")
    .then((res) => {
      pieces.value = res.data.data;
      isLoading.value = false;
    })
    .catch((error) => {
      console.log(error);
    });
};
onMounted(() => {
  getpieces();
});

const deletePiece = async (id) => {
  if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
    try {
      console.log(id);
      await axios.delete(`http://localhost:8000/api/pieces/${id}`);
      getpieces();
    } catch (error) {
      console.log(error);
    }
  }
};
</script> 
