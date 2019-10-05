<template>
      <div class="container" style="margin-top:25px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form @click.prevent="register">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" 
                                    aria-describedby="emailHelp" placeholder="Enter email" required name="email" v-model="form.email">
                                <small id="emailHelp" class="form-text text-muted" v-if="errors.email" style="color:red">{{errors.email[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control"
                                     required name="email" v-model="form.name">
                                     <small id="emailHelp" class="form-text text-muted" v-if="errors.name" style="color:red">{{errors.name[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" required name="password" v-model="form.password">
                                    <small id="emailHelp" class="form-text text-muted" v-if="errors.password" style="color:red">{{errors.password[0]}}</small>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width:100%">Register</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>  
</template>

<script>
export default {
  data(){
    return {
      form : {
        email : null,
        password : null,
        name :null
      },
      errors : {

      }
    }
  },
  created(){
      if(User.loggedIn()){
        this.$router.push({name:'forum'})
      }
  },
  methods : {
    register(){
      axios.post('/api/auth/register', this.form)
      .then(res => {
        User.responseAfterLogin(res)
        this.$router.push({name:'forum'})
        })
      .catch( error => console.log(error.response.data.errors));
    }
  }
}
</script>