<template>
  <div class="container ">
  <div class="login-contand">
    <h2>Login</h2>
    <div class="w-100 mb-5">
      <p v-if="erorrs.erorr !== ''" class="error-message">{{ erorrs.erorr }}</p>
      <label class="" for="username"> Username </label>
      <input
        class=""
        v-model="users.email"
        id="username"
        type="text"
        placeholder="Username"
      />
      <p v-if="erorrs.email !== ''" class="error-message">{{erorrs.email}}</p>
    </div>
    <div class="mb-6">
      <label class="" for="password"> Password </label>
      <input
        v-model="users.password"
        class=""
        id="password"
        type="password"
        placeholder="Enter password"
        @keypress.enter="login"
      />
      <p v-if="erorrs.password !== ''" class="error-message">{{erorrs.password}}</p>
    </div>
    <div class="">
      <button class="" @click="login" type="button">Sign In</button>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: {
        email: "",
        password: "",
      },
      erorrs: {
          erorr: '',
          email: '',
          password: '',
      },
    };
  },
  methods: {
    login() {
      this.$store
      .dispatch('login', {
        email: this.users.email,
        password: this.users.password
      })
      .then(() => {
        this.$router.push({ name: 'Dashboard' })
      })
      .catch((error) => {
        if (error.response) {
          this.erorrs.erorr = error.response.data.message;
          (error.response.data.error.email)?this.erorrs.email = error.response.data.error.email[0]:this.erorrs.email='';
          (error.response.data.error.password)?this.erorrs.password = error.response.data.error.password[0]:this.erorrs.password='';
          // this.erorrs.password = error.response.data.error.password[0];
            setTimeout(function(){
                this.erorrs.erorr = '';
                this.erorrs.email = '';
                this.erorrs.password='';
            }.bind(this),2000);
        }
      });
    },
  },
};
</script> 
