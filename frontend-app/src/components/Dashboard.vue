<template>
   <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
      <div class="container-fluid">
        <a href="#" class="navbar-brand">
          <img src="../assets/images/logo.png" height="30" alt="CoolBrand">
          | KPS
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav ms-auto">
            <!-- Navbar items go here -->
          </div>
        </div>
      </div>
    </nav>

    <!-- Dashboard -->
    <div class="dashboard">
      <!-- Sidebar -->
      <aside class="sidebar">
        <header>
          <h1 style="font-family: 'Montserrat', cursive;">KOPERASI</h1>
        </header>
        <nav class="navigation-links">
          <router-link to="/homepanel" class="router-link">
            <i class="fas fa-home"></i> Home
          </router-link>
          <router-link to="/tabungan" class="router-link">
            <i class="fas fa-coins"></i> Tabungan
          </router-link>
          <router-link to="/jenistransaksi" class="router-link">
            <i class="fas fa-exchange-alt"></i> Jenis Transaksi
          </router-link>
          <router-link to="/nasabah" class="router-link">
            <i class="fas fa-users"></i> Nasabah
          </router-link>
          <router-link to="/agama" class="router-link">
            <i class="fas fa-praying-hands"></i> Agama
          </router-link>
        </nav>
        <span @click="logout" class="router-link logout-button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </span>
      </aside>

      <!-- Content -->
      <main class="content">
        <router-view></router-view>
      </main>
    </div>
  </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css';
export default {
  name: 'Dashboard',
  methods: {
    logout() {
      // Hapus token dari localStorage saat logout
      localStorage.removeItem('token');
      // Redirect ke halaman login setelah logout
      this.$router.push({ name: 'Landing' });
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*,
::after,
::before {
    box-sizing: border-box;
}


body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

h3 {
    font-size: 1.2375rem;
    color: #FFF;
}

a {
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

li {
    list-style: none;
}

/* Layout skeleton */

.dashboard {
  display: flex;
}

.sidebar {
    width: 264px;
    transition: none;
    box-shadow: 0 0 35px 0 rgba(8, 15, 22, 0.5);
    z-index: 1111;
    background-color: #d04b4b; /* Sidebar background color */
    color: #ffffff; /* Sidebar text color */
}

.sidebar.collapsed {
    margin-left: -264px;
}

.header {
    padding: 1.15rem 1.5rem;
}

.header a {
    color: #e9ecef;
    font-size: 1.25rem;
    font-weight: 600;
}

.navigation-links {
    padding: 0;
    margin-top: 20px;
}

.router-link {
    text-decoration: none;
    color: #e9ecef;
    display: block;
    padding: 10px 0;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.router-link:hover {
    background-color: #0056b3;
}

.content {
  flex: 1;
  padding: 20px;
  max-width: 100vw;
  width: 100vw;
}
/* Responsive */

@media (min-width: 768px) {
    .content {
        width: auto;
    }
}
.logout-button {
  pointer-events: auto; /* Membuat button dapat diklik */
  cursor: pointer; /* Menunjukkan kursor tangan saat di atas button */
}
</style>

