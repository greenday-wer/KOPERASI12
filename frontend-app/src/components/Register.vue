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
              <center>
              REGISTRASI<br>
              KOPERASI SIMPANAN
              </center>
          </div>
          <br>
          <form class="p-3 mt-3" @submit.prevent="registerUser">
              Name
              <br>
              <div class="form-field d-flex align-items-center">
                  <span class="far fa-user"></span>
                  <input type="text" v-model="user.name" required>
              </div>
              Email
              <br>
              <div class="form-field d-flex align-items-center">
                  <span class="fas fa-key"></span>
                  <input type="email" v-model="user.email" required>
              </div>
              Password
              <br>
              <div class="form-field d-flex align-items-center">
                  <span class="far fa-user"></span>
                  <input type="password" class="form-control" v-model="user.password" required>
              </div>
              <button class="btn mt-3" type="submit">REGISTER</button>
          </form>
      </div>
</template>

<script>
import axios from 'redaxios';

export default {
  name: 'Register',
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
      },
    };
  },
  methods: {
    registerUser() {
      const url = 'http://127.0.0.1:8000/api/register';
      axios.post(url, this.user).then(({ data }) => {
        if (data.success) {
          alert(data.message);
        } else {
          alert(data.message);
        }
      });
    },
  },
};
</script>

  <style>
  /* Importing fonts from Google */
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
      max-width: 800px;
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
  
  .wrapper .form-field input,
  .wrapper .form-field select {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
  }
  </style>
  