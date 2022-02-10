<template>
    <div class="container">
        <h1>Welcome {{Username}}, <a class="logout" @click='logout'>Logout</a></h1>
        {{userdatas}}
    </div>
</template>

<script>
export default {
  data() {
    return {
      users: ''
    };
  },



  created(){
     const user= localStorage.getItem('user');
     console.log();
     if(user){
        const userdetail =JSON.parse(user);
        this.Username=userdetail.name;
     }
  },

  methods: {
    logout(){
      this.$store.dispatch('logout')
    }
  },
};
</script> 