<template>
    <div>
      <h2>User Details</h2>
      <div v-if="authenticatedUser">
        <p><strong>Name:</strong> {{ authenticatedUser.name }}</p>
        <p><strong>Email:</strong> {{ authenticatedUser.email }}</p>
      </div>
      <div v-else>
        <p>No authenticated user.</p>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        authenticatedUser: null,
      };
    },
    mounted() {
      this.getUserDetails();
    },
    methods: {
      getUserDetails() {
        const authToken = localStorage.getItem('authToken'); // Retrieve the token from storage
  
        if (authToken) {
          const headers = {
            Authorization: `Bearer ${authToken}`,
          };
  
          axios.get('http://127.0.0.1:8000/api/user', { headers })
            .then((response) => {
              this.authenticatedUser = response.data.data;
            })
            .catch((error) => {
              console.error('Error fetching user details:', error);
            });
        }
      },
    },
  };
  </script>
  