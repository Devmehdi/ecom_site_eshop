<template>
   
 <div class="comments">
     <div class="col-12">
                <h3 class="comment-title">Comments ({{comments.length}})</h3>
                 <div class="col-12">
                <div class="reply">
                 <div class="reply-head">
                <h2 class="reply-title">Leave a Comment</h2>
                <div>
               
                </div>
                <!-- Comment Form -->
                     <form class="form" v-on:submit.prevent="postcomment()">
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <label>Your Message<span>*</span></label>
                              <input type="text" name="comment" v-model="comment">
                            </div>
                          </div>
                             <div class="col-12">
                             <div class="form-group button">
                                <button type="submit" class="btn">Post comment</button>
                             </div>
                           </div>
                        </div>
                     </form>
                    <!-- End Comment Form -->
                </div>
            </div>
          </div>	
                <!-- Single Comment -->
                <div v-for="comment in comments" :key="comment.index">
                    <div class="single-comment">
                        <img src="https://via.placeholder.com/80x80" alt="#">
                            <div class="content">
                                <h4> Me <span>At {{comment.created_at}}</span></h4>
                                <p>{{comment.comment}}</p>
                                <div class="button">
                                <input type="text" name="comment" id="txtcomment" hidden>
                                <button id="btnA">click</button>
                                <a href="" class="btn" id="link"><i class="fa fa-reply" id="#txtcomment" aria-hidden="true"></i>Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
               
</div>
</template>

<script>
import $ from "jquery";
import Button from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button.vue';

export default {
  components: { Button },
       data:function()
       {
           return{
               comment:'',
               comments:[]
           }
       },
       mounted()
       {
            $(document).ready(function() {
            $('#btnA').onclick(function(){
                 $('#txtcomment').show();
            });   
             });
           this.loadcomments();
       },
       methods: {
            loadcomments:function()
            {
               axios.get('/api/comment')
               .then((Response)=>{
                  this.comments=Response.data.data;
               })
               .catch(function(error)
               {
                  console.log(error);
               })
            },
             postcomment()
            {
               axios.post('/AddComment',{
                  comment:this.comment,
                  
               }).then(response=>{
                    console.log(response);
               })
               this.loadcomments(),
               this.comment=null
                this.$toastr.s("Comment added", "With seccessed");
            }
       },
       
}
</script>

