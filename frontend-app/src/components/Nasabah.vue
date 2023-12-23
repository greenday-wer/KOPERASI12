<template>
  <div class="container">
    <h2>Data Nasabah</h2>
    <form @submit.prevent="simpan()">
      <!-- Form Input Nasabah -->
      <div class="mb-3 form-group">
        <label>Nama:</label>
        <input type="text" class="form-control" v-model="nasabah.nama" required>
      </div>
      <div class="mb-3 form-group">
        <label>Alamat:</label>
        <input type="text" class="form-control" v-model="nasabah.alamat" required>
      </div>
      <div class="mb-3 form-group">
        <label>Telepon:</label>
        <input type="text" class="form-control" v-model="nasabah.telepon" required>
      </div>
      <div class="mb-3 form-group">
        <label>Tanggal Lahir:</label>
        <input type="date" class="form-control" v-model="nasabah.lahir" required>
      </div>
      <div class="mb-3 form-group">
        <label>Gender:</label>
        <select v-model="nasabah.gender" class="form-control" required>
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </div>

      <!-- Form Input Agama -->
      <div class="mb-3 form-group">
      <label>Agama:</label>
      <select v-model="nasabah.agama_id" class="form-control" required>
        <option v-for="agama in agamas" :key="agama.id" :value="agama.id">{{ agama.agama }}</option>
      </select>
      </div> 


      <div class="btn-group">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button class="btn btn-warning" type="button" @click="clear()">Clear</button>
      </div>
    </form>

    <h2>Data Nasabah</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Tanggal Lahir</th>
          <th>Gender</th>
          <th>Agama</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(nasabah, index) in allNasabah" :key="nasabah.id">
          <td>{{ nasabah.id }}</td>
          <td>{{ nasabah.nama }}</td>
          <td>{{ nasabah.alamat }}</td>
          <td>{{ nasabah.telepon }}</td>
          <td>{{ nasabah.lahir }}</td>
          <td>{{ nasabah.gender }}</td>
          <td>{{ nasabah.agama.agama }}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-warning" @click="edit(nasabah)">Edit</button>
              <button type="button" class="btn btn-danger" @click="remove(nasabah)">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Nasabah',
  data() {
    return {
      allNasabah: [],
      nasabah: {
        id: '',
        nama: '',
        alamat: '',
        telepon: '',
        lahir: '',
        gender: '',
        agama_id: '',
      },
      agamas: [], 
    };
  },
  created() {
    this.loadAllNasabah();
    this.loadAgamas();
  },
  methods: {
    loadAllNasabah() {
      axios.get('http://127.0.0.1:8000/api/nasabah').then(({ data }) => {
        this.allNasabah = data;
      });
    },
    loadAgamas() {
      axios.get('http://127.0.0.1:8000/api/agama').then(({ data }) => {
        this.agamas = data;
      });
    },
    simpan() {
      if (this.nasabah.id === '') {
        axios.post('http://127.0.0.1:8000/api/nasabah', this.nasabah).then(() => {
          this.loadAllNasabah();
          this.clear();
        });
      } else {
        axios.put(`http://127.0.0.1:8000/api/nasabah/${this.nasabah.id}`, this.nasabah).then(() => {
          this.loadAllNasabah();
          this.clear();
        });
      }
    },
    clear() {
      this.nasabah.id = '';
      this.nasabah.nama = '';
      this.nasabah.alamat = '';
      this.nasabah.telepon = '';
      this.nasabah.lahir = '';
      this.nasabah.gender = '';
      this.nasabah.agama_id = '';
    },
    edit(nasabah) {
      axios.get(`http://127.0.0.1:8000/api/nasabah/${nasabah.id}`).then(({ data }) => {
        this.nasabah = data;
      });
    },
    remove(nasabah) {
      axios.delete(`http://127.0.0.1:8000/api/nasabah/${nasabah.id}`).then(() => {
        this.loadAllNasabah();
      });
    },
  },
};
</script>

<style scoped>
  .container {
    max-width: 10000px;
    margin: 20px auto;
  }

  h2 {
    color: #007bff;
    margin-bottom: 20px;
  }

  form {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input,
  select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .btn-group {
    margin-top: 15px;
  }

  .btn {
    margin-right: 10px;
  }

  .table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid #dee2e6;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #007bff;
    color: white;
  }

  .btn-warning,
  .btn-danger {
    color: #fff;
  }

  .btn-warning:hover,
  .btn-danger:hover {
    color: #fff;
  }
</style>
