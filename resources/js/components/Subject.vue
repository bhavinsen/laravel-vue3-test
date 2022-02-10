<template>
  <div class="container">
    <div class="w-100 mb-5">
      <h1>Subject From</h1>
      <p v-if="erorrs.erorr !== ''" class="error-message">{{ erorrs.erorr }}</p>
      <p class="success-message" v-if="success!==''" >{{success}}</p>
      <label class="" for="username"> Add Name </label>
      <input
        class=""
        v-model="subject.name"
        id="name"
        type="text"
        placeholder="Enter name"
        @keypress.enter="addSubject"
      />
      <p v-if="erorrs.subject !== ''" class="error-message">
        {{ erorrs.subject }}
      </p>
    </div>
    <div class="">
      <button class="" @click="addSubject" type="button">Add Subject</button>
    </div>
    
      <section>
      <ol class="list-group" v-if="subjectdata.length>0">
        <li><b>Subject Name</b></li>
          <li
          class="list-group-item"
          v-for="item in subjectdata" :key="item.id"
          >{{item.name}}</li>
        </ol>
      </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      subject: {
        name: "",
        user_id: "",
      },
      erorrs: {
        erorr: "",
        subject: "",
      },
      success:'',
      subjectdata:[]
    };
  },

  mounted(){
      const user = localStorage.getItem("user");
      if (user) {
        const userdetail = JSON.parse(user);
        this.subject.user_id = userdetail.user_id;
      }
      this.getdata();
  },
  methods: {
    addSubject() {
      this.$store
        .dispatch(
          "subject/addsubject",
          {
            user_id: this.subject.user_id,
            name: this.subject.name,
          },
          { root: true }
        )
        .then((res) => {
          if(res.status==200){
              this.getdata();
              this.subject.name=''
              this.success=res.message
              setTimeout(
              function () {
                this.success = "";
              }.bind(this),
              1000
            );
          }
        })
        .catch((error) => {
          console.log(error.response, "e");
          if (error.response) {
            this.erorrs.erorr = error.response.data.message;
            error.response.data.error.name
              ? (this.erorrs.subject = error.response.data.error.name[0])
              : (this.erorrs.subject = "");
            setTimeout(
              function () {
                this.erorrs.erorr = "";
                this.erorrs.subject = "";
              }.bind(this),
              1000
            );
          }
        });
    },

    getdata(){
        this.$store
        .dispatch(
          "subject/getsubject",
          {
            user_id: this.subject.user_id
          },
          { root: true }
        )
        .then((res) => {
            if(res.status==200){
                this.subjectdata=res.message;
            }
        })
        .catch((erorr)=>{
            console.log(erorr.response)
        })
    }
  },
};
</script> 
