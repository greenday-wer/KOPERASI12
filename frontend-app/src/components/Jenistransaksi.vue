<template>
    <div class="container">
      <h2>Data Jenis Transaksi</h2>
      <form @submit.prevent="simpanJenisTransaksi()">
        <div class="mb-3 form-group">
          <label>Jenis Transaksi:</label>
          <input type="text" class="form-control" v-model="jenisTransaksi.jenistransaksi" required>
        </div>
        <div class="mb-3 form-group">
          <label>Operator:</label>
          <input type="text" class="form-control" v-model="jenisTransaksi.operator" required>
        </div>
        <div class="btn-group">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <button class="btn btn-warning" type="button" @click="clearJenisTransaksi()">Clear</button>
        </div>
      </form>
  
      <h2>Data Jenis Transaksi</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>ID</td>
            <td>Jenis Transaksi</td>
            <td>Operator</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(jenisTransaksi, index) in allJenisTransaksis" :key="jenisTransaksi.id">
            <td>{{ jenisTransaksi.id }}</td>
            <td>{{ jenisTransaksi.jenistransaksi }}</td>
            <td>{{ jenisTransaksi.operator }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-warning" @click="editJenisTransaksi(jenisTransaksi)">Edit</button>
                <button type="button" class="btn btn-danger" @click="removeJenisTransaksi(jenisTransaksi)">Delete</button>
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
    name: 'jenisTransaksi',
    data() {
      return {
        allJenisTransaksis: [],
        jenisTransaksi: {
          id: '',
          jenistransaksi: '',
          operator: '',
        },
      };
    },
    created() {
      this.loadAllJenisTransaksis();
    },
    methods: {
      loadAllJenisTransaksis() {
        var url = 'http://127.0.0.1:8000/api/jenistransaksi';
        axios.get(url).then(({ data }) => {
          this.allJenisTransaksis = data;
        });
      },
      removeJenisTransaksi(jenisTransaksi) {
        var url = `http://127.0.0.1:8000/api/jenistransaksi/${jenisTransaksi.id}`;
        axios.delete(url).then(() => {
          this.loadAllJenisTransaksis();
        });
      },
      editJenisTransaksi(jenisTransaksi) {
        var url = `http://127.0.0.1:8000/api/jenistransaksi/${jenisTransaksi.id}`;
        axios.get(url).then(({ data }) => {
          this.jenisTransaksi = data;
        });
      },
      simpanJenisTransaksi() {
        if (this.jenisTransaksi.id === '') {
          var url = 'http://127.0.0.1:8000/api/jenistransaksi';
          axios.post(url, this.jenisTransaksi).then(() => {
            this.loadAllJenisTransaksis();
            this.clearJenisTransaksi();
          });
        } else {
          var url = `http://127.0.0.1:8000/api/jenistransaksi/${this.jenisTransaksi.id}`;
          axios.put(url, this.jenisTransaksi).then(() => {
            this.loadAllJenisTransaksis();
            this.clearJenisTransaksi();
          });
        }
      },
      clearJenisTransaksi() {
        this.jenisTransaksi.id = '';
        this.jenisTransaksi.jenistransaksi = '';
        this.jenisTransaksi.operator = '';
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 10000px;
    margin: 20px auto;
  }
  </style>
  