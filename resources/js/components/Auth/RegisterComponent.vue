<template>

  <!-- Sign up form -->
    <section class="signup" id="register">
        <div class="container1">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                <form v-on:submit.prevent="OnSubmit" class="register-form" id="register-form">
                        <div class="alert alert-danger" v-if="errors.length">
                           <ul class="mb-0">
                               <li v-for="(error , index) in errors" :key= "index">
                                   {{error}}
                               </li>
                           </ul>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class=""></i></label>
                            <input type="text" name="name" v-model="name" id="name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class=""></i></label>
                            <input type="email" name="email" v-model="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class=""></i></label>
                            <input type="password" name="password" v-model="password" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class=""></i></label>
                            <input type="password" name="confirmpass" id="re_pass" placeholder="Repeat your password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

</template>


<script>

    export default {
        data()
        {
            return{
                  name:'',
                  email:'',
                  password:'',
                  errors:[],
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            OnSubmit(){
                  this.errors=[];
                  
                  if(!this.name)
                  {
                      this.errors.push('Name is required');
                  }
                  if(!this.email)
                  {
                      this.errors.push('Email is required');
                  }
                  if(!this.password)
                  {
                      this.errors.push('Password is required');
                  }
                  else
                  {
                      axios.post('register/CreateAccount',{
                      name:this.name,
                      email:this.email,
                      password:this.password,
                  }).then(Response=>{

                  }).catch(error=>{
                       this.errors.push(error.Response.data.error);
                  });
                }
            }
        },
    }
</script>