<template>

     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="main">
                                <form v-on:submit="createpost">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="Text" v-model="title" class="form-control"  placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image</label>
                                        <input type="file" name="image" />
                                     </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" v-model="description"></textarea>
                                     </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <div class="single-widget side-tags">
                        <h3 class="title">Tags</h3>
                        <ul class="tag">
                            <li><a href="#" v-bind="categorie">business</a></li>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                </div>
            </div>
        </div>
    </div>
  
</template>

<script>
export default {

    data()
    {
        return{
                  title:'',
                  description:'',
                  errors:[],
            }  
    },
  mounted() {
            console.log('Component mounted.')
        },
          methods:
        {
            createpost()
            {
                this.errors=[];
                if(!this.title)
                {
                    this.errors.push("Title is required");
                }
                if(!this.description)
                {
                    this.errors.push("Description is required");
                }
                else
                {
                    axios.post('/createpost',{
                         title:this.title,
                         description:this.description,
                    }).then(Response=>{
                            console.log(Response);
                            this.$router.push('/');
                    }).catch(error=>{
                       this.errors.push(error.Response.data.error);
                  });
                }
            },
        }
}
</script>

<style>

</style>