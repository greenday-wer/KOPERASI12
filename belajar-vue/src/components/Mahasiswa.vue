<template>
    <div class="container">
        <h2>Form Kontak</h2>
        <form @submit.prevent="simpan()">
        <div class="mb-3 form-group">
            <label>Nama</label>
            <input type="text" class="form-control" v-model="mahasiswa.nama">
        </div>
        <div class="mb-3 form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" v-model="mahasiswa.alamat">
        </div>
        <div class="mb-3 form-group">
            <label>Telepon</label>
            <input type="text" class="form-control" v-model="mahasiswa.telepon">
        </div>
        <div class="mb-3 form-group">
            <label>Gender</label>
            <select v-model="mahasiswa.jenis_kelamin" class="form-control">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>  
            </select>
        </div>
        <div class="btn-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-warning" type="button" @click="clear()">Clear</button>
        </div>

        </form>

        <h2>Data Kontak</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Telepon</td>    
                    <td>Gender</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(mahasiswa,index) in allkontak" :key="mahasiswa.nim">
                    <td>{{ kontak.id }}</td>
                    <td>{{ kontak.nama }}</td>
                    <td>{{ kontak.alamat }}</td>
                    <td>{{ kontak.telepon }}</td>
                    <td>{{ kontak.gender }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" @click="edit(kontak)">Edit</button>
                            <button type="button" class="btn btn-danger" @click="remove(kontak)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import axios from 'redaxios';
import { onMounted } from 'vue';

    export default{
        name : 'kontak',
        data(){
            return{
                allkontak : {},
                kontak:{
                    'id':'',
                    'nama':'',
                    'alamat':'',
                    'telepon':'',
                    'gender':''
                }

            }
        },
        created(){
            console.log('Created !');
            this.loadAllkontak();
        },
        mounted(){
            console.log('Mounted');
        },
        methods: {
            loadAllkontak() {
                var url = 'http://127.0.0.1:8000/api/kontak/';
                axios.get(url).then(({ data }) => {
                console.log(data);
                this.allkontak = data;
                });
            },
            remove(kontak) {
                var url = `http://127.0.0.1:8000/api/kontak/${kontak.id}`;
                axios.delete(url).then(() => {
                console.log('berhasil dihapus');
                this.loadAllkontak();
                });
            },
            edit(kontak) {
                var url = `http://127.0.0.1:8000/api/kontak/${kontak.id}`;
                axios.get(url).then(({ data }) => {
                this.kontak = data;
                console.log(this.kontak);
                });
            },
            simpan() {
                if (this.kontak.id === '') {
                var url = 'http://127.0.0.1:8000/api/kontak/';
                axios.post(url, this.kontak).then(() => {
                    console.log('berhasil disimpan');
                    this.loadAllkontak();
                    this.clear();
                });
                } else {
                var url = `http://127.0.0.1:8000/api/kontak/${this.kontak.id}`;
                axios.put(url, this.kontak).then(() => {
                    console.log('berhasil diedit');
                    this.loadAllkontak();
                    this.clear();
                });
                }
            },
            clear() {
                this.kontak.id = '';
                this.kontak.nama = '';
                this.kontak.alamat = '';
                this.kontakcd.telepon = '';
                this.kontak.gender = '';
            }
        }
    }
</script>