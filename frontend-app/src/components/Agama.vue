<template>
    <div class="container">
      <h2>Data Agama</h2>
      <form @submit.prevent="simpanAgama()">
        <div class="mb-3 form-group">
          <label>Agama:</label>
          <input type="text" class="form-control" v-model="agama.agama" required>
        </div>
        <div class="btn-group">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <button class="btn btn-warning" type="button" @click="clearAgama()">Clear</button>
        </div>
      </form>
  
      <h2>Data Agama</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>ID</td>
            <td>Agama</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(agama, index) in allAgamas" :key="agama.id">
            <td>{{ agama.id }}</td>
            <td>{{ agama.agama }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-warning" @click="editAgama(agama)">Edit</button>
                <button type="button" class="btn btn-danger" @click="removeAgama(agama)">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from 'redaxios';
  
  export default {
    name: 'agama',
    data() {
      return {
        allAgamas: [],
        agama: {
          id: '',
          agama: '',
        },
      };
    },
    created() {
      this.loadAllAgamas();
    },
    methods: {
      loadAllAgamas() {
        var url = 'http://127.0.0.1:8000/api/agama';
        axios.get(url).then(({ data }) => {
          this.allAgamas = data;
        });
      },
      removeAgama(agama) {
        var url = `http://127.0.0.1:8000/api/agama/${agama.id}`;
        axios.delete(url).then(() => {
          this.loadAllAgamas();
        });
      },
      editAgama(agama) {
        var url = `http://127.0.0.1:8000/api/agama/${agama.id}`;
        axios.get(url).then(({ data }) => {
          this.agama = data;
        });
      },
      simpanAgama() {
        if (this.agama.id === '') {
          var url = 'http://127.0.0.1:8000/api/agama';
          axios.post(url, this.agama).then(() => {
            this.loadAllAgamas();
            this.clearAgama();
          });
        } else {
          var url = `http://127.0.0.1:8000/api/agama/${this.agama.id}`;
          axios.put(url, this.agama).then(() => {
            this.loadAllAgamas();
            this.clearAgama();
          });
        }
      },
      clearAgama() {
        this.agama.id = '';
        this.agama.agama = '';
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 10000px;
    margin: 20px auto;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  .btn-group {
    margin-top: 20px;
  }
  
  .table {
    margin-top: 20px;
  }
  
  /* Responsive Styles */
  @media (max-width: 576px) {
    .container {
      padding: 0 10px;
    }
  }
  </style>
  
  