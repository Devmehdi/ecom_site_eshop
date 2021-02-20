<template>

   <!--Form login-->
   <section class="sign-in">
        <div class="container1">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                <form v-on:submit.prevent="checklogin"  class="register-form" id="login-form">
                        
                        <div class="form-group">
                            <label for="your_pass"><i class=""></i></label>
                            <input type="Email" v-model="email" name="email" id="Email" placeholder="Email" required/> 
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class=""></i></label>
                            <input type="password" v-model="password" name="password" id="your_pass" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                          <div class="alert alert-danger" v-if="errors.length">
                              <ul class="mb-0">
                                 <li v-for="(error , index) in errors" :key= "index">
                                      {{error}}
                                 </li>
                              </ul>
                            </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
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
                  email:'',
                  password:'',
                  errors:[],
            }
        },
    mounted() {
            console.log('Component mounted.')
    },
    methods:
        {
            checklogin()
            {
                this.errors=[];
                if(!this.email)
                {
                    this.errors.push("E-mail is required");
                }
                if(!this.password)
                {
                    this.errors.push("Password is required");
                }
                else
                {
                    axios.post('/checkLogin',{
                         email:this.email,
                         password:this.password,
                    }).then(response=>{
                         window.location.href = '/index';
                    }).catch(error=>{
                       this.errors.push(error.Response.data.error);
                  });
                }
            },
        }
}
</script>

