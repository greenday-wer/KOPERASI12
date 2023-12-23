<template>
  <article>
    <div class="container" :class="{'sign-up-active' : signUp}">
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-left">
            <h2>Welcome Back!</h2>
            <p>Please login with your personal info</p>
            <button class="invert" id="signIn" @click="signUp = !signUp">Sign In</button>
          </div>
          <div class="overlay-right">
            <h2>Hello, Friend!</h2>
            <p>Please enter your personal details</p>
            <button class="invert" id="signUp" @click="signUp = !signUp">Sign Up</button>
          </div>
        </div>
      </div>
      <form class="sign-up" action="#">
        <h2>Create login</h2>
        <div>Use your email for registration</div>
        <input type="text" placeholder="Name" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <button>Sign Up</button>
      </form>
      <form class="sign-in" action="#">
        <h2>Sign In</h2>
        <div>Use your account</div>
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button>Sign In</button>
      </form>
    </div>
  </article>
</template>

<script>
  export default {
    data: () => {
      return {
        signUp: false
      }
    }
  }
</script>

<style>
  body {
    font-family: 'Arial', sans-serif;
    background: #f5f5f5;
  }

  article {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    position: relative;
    width: 100%;
    max-width: 400px;
    background: #fff;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
  }

  .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transform: translateX(-50%);
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 100%;
    background: linear-gradient(to right, #ff416c, #ff4b2b);
    transform: translateX(-50%) skewX(-20deg);
    transition: transform 0.8s ease-in-out;
  }

  .overlay-left,
  .overlay-right {
    position: absolute;
    top: 0;
    width: 50%;
    height: 100%;
    padding: 60px;
    color: #fff;
    box-sizing: border-box;
  }

  .overlay-left {
    transform: skewX(20deg);
  }

  .overlay-right {
    right: 0;
    transform: skewX(-20deg);
  }

  .container.sign-up-active .overlay {
    transform: translateX(-50%) skewX(0);
  }

  h2 {
    margin-bottom: 20px;
    font-size: 28px;
  }

  p {
    margin-bottom: 40px;
    font-size: 14px;
  }

  button.invert {
    background: transparent;
    border: 2px solid #fff;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  form {
    padding: 40px;
    box-sizing: border-box;
    transition: transform 0.8s ease-in-out;
  }

  .sign-up {
    transform: translateX(0%);
  }

  .sign-in {
    transform: translateX(100%);
  }

  .container.sign-up-active .sign-in {
    transform: translateX(-100%);
  }

  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  a {
    color: #ff4b2b;
    text-decoration: none;
    font-size: 14px;
    float: right;
  }

  button {
    background: #ff4b2b;
    color: #fff;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }
</style>

