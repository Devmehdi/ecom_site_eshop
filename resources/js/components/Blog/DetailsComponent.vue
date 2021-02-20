<template>
 
</template>

<script>
export default {

       /*  data:function()
         {
            return{
                categorie:[],
                products:[],
            }
         },
         mounted() {
            this.loadcategorie();
            this.loadproduct();
         },
         methods: {
            loadcategorie:function()
            {
               axios.get('/api/Categorie')
               .then((Response)=>{
                  this.categorie=Response.data.data;
               })
               .catch(function(error)
               {
                  console.log(error);
               })
            },
             loadproduct:function()
            {
               
            }
         },*/
       data()
         {
           return{
               comment:'',
            }
         },
         mounted() {
           
         },
         methods: {
            postcomment()
            {
               axios.post('/AddComment',{
                  comment:this.comment,
               }).then(response=>{
                    console.log(response);
               })
            }
         },
}
</script>

