<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand">
          <img src="../assets/images/logo.png" height="30" alt="CoolBrand">
          | KPS
        </router-link>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto">
            <router-link to="/" class="nav-item nav-link active">Home</router-link>
            <router-link to="/register" class="nav-item nav-link">
              <i class="fa-regular fa-user pe-2"></i>
              Register
            </router-link>
            <router-link to="/login" class="nav-item nav-link">
              <i class="fa-regular fa-user pe-2"></i>
              Login
            </router-link>
          </div>
        </div>
      </div>
    </nav>
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="../assets/images/logo.png" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase text-danger mb-0">Koperasi Simpan Pinjam</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light text-danger mb-0">--Selamat Datang Di Website Kami--</p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Navbar',
  };
  </script>
  
  <style scoped>
  /* Add your scoped styles here */
  </style>
  