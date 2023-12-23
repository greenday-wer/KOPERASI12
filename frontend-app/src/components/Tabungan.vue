<template>
  <div class="container">
    <h2>Data Tabungan</h2>
    <form @submit.prevent="simpan()">
      <!-- Form Input Tabungan -->
      <div class="mb-3 form-group">
        <label>Nasabah:</label>
        <select v-model="tabungan.nasabah_id" class="form-control" required>
          <option v-for="nasabah in allNasabah" :key="nasabah.id" :value="nasabah.id">{{ nasabah.nama }}</option>
        </select>
      </div>
      <div class="mb-3 form-group">
        <label>Jenis Transaksi:</label>
        <select v-model="tabungan.jenistransaksi_id" class="form-control" required>
          <option v-for="jenis in jenistransaksis" :key="jenis.id" :value="jenis.id">{{ jenis.jenistransaksi }}</option>
        </select>
      </div>
      <div class="mb-3 form-group">
        <label>Nominal:</label>
        <input type="text" class="form-control" v-model="tabungan.nominal" required>
      </div>
      <div class="mb-3 form-group">
        <label>Keterangan:</label>
        <input type="text" class="form-control" v-model="tabungan.keterangan">
      </div>
      <div class="mb-3 form-group">
        <label>User:</label>
        <!-- Menampilkan nama pengguna yang sudah login -->
        <input type="text" class="form-control" v-model="loggedInUser" disabled>
      </div>

      <div class="btn-group">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <button class="btn btn-warning" type="button" @click="clear()">Clear</button>
      </div>
    </form>

    <h2>Data Tabungan</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nasabah</th>
          <th>Jenis Transaksi</th>
          <th>Nominal</th>
          <th>Keterangan</th>
          <th>User</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(tabungan, index) in allTabungan" :key="tabungan.id">
          <td>{{ tabungan.id }}</td>
          <td>{{ tabungan.nasabah.nama }}</td>
          <td>{{ tabungan.jenistransaksi.jenistransaksi }}</td>
          <td>{{ tabungan.nominal }}</td>
          <td>{{ tabungan.keterangan }}</td>
          <td>{{ tabungan.user.name }}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-warning" @click="edit(tabungan)">Edit</button>
              <button type="button" class="btn btn-danger" @click="remove(tabungan)">Delete</button>
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
  name: 'Tabungan',
  data() {
    return {
      allTabungan: [],
      tabungan: {
        id: '',
        nasabah_id: '',
        jenistransaksi_id: '',
        nominal: '',
        keterangan: '',
        user_id: '', // Ini tidak perlu karena kita akan mengambil user_id dari data login
      },
      allNasabah: [],
      jenistransaksis: [],
      loggedInUser: '',
      token: '',
    };
  },
  created() {
    this.loadAllTabungan();
    this.loadAllNasabah();
    this.loadJenisTransaksi();
    this.loadLoggedInUser();
    this.loadToken();
  },
  methods: {
    loadAllTabungan() {
      axios.get('http://127.0.0.1:8000/api/tabungan', {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }).then(({ data }) => {
        this.allTabungan = data;
      });
    },
    loadAllNasabah() {
      axios.get('http://127.0.0.1:8000/api/nasabah', {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }).then(({ data }) => {
        this.allNasabah = data;
      });
    },
    loadJenisTransaksi() {
      axios.get('http://127.0.0.1:8000/api/jenistransaksi', {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }).then(({ data }) => {
        this.jenistransaksis = data;
      });
    },
    loadLoggedInUser() {
      // Mengambil nama pengguna dari localStorage
      const name = localStorage.getItem('name');
      this.loggedInUser = name ? name : 'name';
    },
    loadToken() {
      this.token = localStorage.getItem('token');
    },
    simpan() {
      // Menambahkan user_id ke objek tabungan dari data login
      const user_id = localStorage.getItem('user_id');
      this.tabungan.user_id = user_id;
      console.log(this.tabungan);
      console.log(user_id);
      if (this.tabungan.id === '') {
        axios.post('http://127.0.0.1:8000/api/tabungan', this.tabungan, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }).then(() => {
          this.loadAllTabungan();
          this.clear();
        });
      } else {
        axios.put(`http://127.0.0.1:8000/api/tabungan/${this.tabungan.id}`, this.tabungan, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }).then(() => {
          this.loadAllTabungan();
          this.clear();
        });
      }
    },
    clear() {
      this.tabungan.id = '';
      this.tabungan.nasabah_id = '';
      this.tabungan.jenistransaksi_id = '';
      this.tabungan.nominal = '';
      this.tabungan.keterangan = '';
      this.tabungan.user_id = '';
    },
    edit(tabungan) {
      axios.get(`http://127.0.0.1:8000/api/tabungan/${tabungan.id}`, {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }).then(({ data }) => {
        this.tabungan = data;
      });
    },
    remove(tabungan) {
      axios.delete(`http://127.0.0.1:8000/api/tabungan/${tabungan.id}`, {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }).then(() => {
        this.loadAllTabungan();
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
</style>