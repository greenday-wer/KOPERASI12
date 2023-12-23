<!-- <template>
  <div class="container">
    <h2>User Login</h2>
    <form @submit.prevent="loginUser">
      <div class="mb-3 form-group">
        <label>Email:</label>
        <input type="email" class="form-control" v-model="login.email" required>
      </div>
      <div class="mb-3 form-group">
        <label>Password:</label>
        <input type="password" class="form-control" v-model="login.password" required>
      </div>
      <div class="btn-group">
        <button class="btn btn-primary" type="submit">Login</button>
      </div>
    </form>
  </div>
</template> -->

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
  <div class="wrapper">
          <div class="logo">
              <img src="../assets/tubes/koperasi.png" alt=""> 
          </div>
          <br>
          <div class="text-center mt-4 name">
              Koperasi Simpanan
          </div>
          <br>
          <form class="p-3 mt-3" @submit.prevent="loginUser">
               Email
              <br>
              <div class="form-field d-flex align-items-center">
                  <span class="far fa-user"></span>
                  <input type="email" v-model="login.email" required>
              </div>
              Password
              <br>
              <div class="form-field d-flex align-items-center"> 
                  <span class="fas fa-key"></span>
                  <input type="password" v-model="login.password" required>
              </div>
              <button class="btn mt-3" type="submit">Login</button>
          </form>
      </div>
  
  </template>
<script>
import axios from 'axios';

export default {
  name: 'Login',
  data() {
    return {
      login: {
        email: '',
        password: '',
      },
    };
  },
  methods: {
    loginUser() {
      axios.post('http://127.0.0.1:8000/api/login', this.login).then(({ data }) => {
        if (data.success) {
            alert(data.message);

            localStorage.setItem('token', data.data.token);
            localStorage.setItem('user_id', data.data.user_id.toString());
            localStorage.setItem('name', data.data.name);
            console.log(data.data);
            console.log(localStorage.getItem('token'));
            console.log(localStorage.getItem('user_id'));
            console.log(localStorage.getItem('name'));

            console.log('Redirecting to /homepanel');
            this.$router.push({ name: 'Homepanel' });
        } else {
            alert(data.message);
        }
    });
    },
  },
};
</script>
  
  
  
  
  
  
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
  
  /* Reseting */
  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
  }
  
  body {
      background: #ecf0f3;
  }
  
  .wrapper {
      max-width: 350px;
      min-height: 500px;
      margin: 80px auto;
      padding: 40px 30px 30px 30px;
      background-color: #ecf0f3;
      border-radius: 15px;
      box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
  }
  
  .logo {
      width: 80px;
      margin: auto;
  }
  
  .logo img {
      width: 100%;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0px 0px 3px #5f5f5f,
          0px 0px 0px 5px #ecf0f3,
          8px 8px 15px #a7aaa7,
          -8px -8px 15px #fff;
  }
  
  .wrapper .name {
      font-weight: 600;
      font-size: 1.4rem;
      letter-spacing: 1.3px;
      padding-left: 10px;
      color: #555;
  }
  
  .wrapper .form-field input {
      width: 100%;
      display: block;
      border: none;
      outline: none;
      background: none;
      font-size: 1.2rem;
      color: #666;
      padding: 10px 15px 10px 10px;
      /* border: 1px solid red; */
  }
  
  .wrapper .form-field {
      padding-left: 10px;
      margin-bottom: 20px;
      border-radius: 20px;
      box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
  }
  
  .wrapper .form-field .fas {
      color: #555;
  }
  
  .wrapper .btn {
      box-shadow: none;
      width: 100%;
      height: 40px;
      background-color: #03A9F4;
      color: #fff;
      border-radius: 25px;
      box-shadow: 3px 3px 3px #b1b1b1,
          -3px -3px 3px #fff;
      letter-spacing: 1.3px;
  }
  
  .wrapper .btn:hover {
      background-color: #039BE5;
  }
  
  .wrapper a {
      text-decoration: none;
      font-size: 0.8rem;
      color: #03A9F4;
  }
  
  .wrapper a:hover {
      color: #039BE5;
  }
  
  @media(max-width: 380px) {
      .wrapper {
          margin: 30px 20px;
          padding: 40px 15px 15px 15px;
      }
  }
  </style>