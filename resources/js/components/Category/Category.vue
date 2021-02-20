<template>

    <div class="single-widget category" >
        <h3 class="title">Under Categories</h3>
		<ul class="categor-list" v-for="category in categories" :key="category.index">
           <li><a href="#">{{category.name}}</a></li>
		</ul>
	</div>

</template>

<script>
export default {
data:function()
       {
           return{
               categories:[]
           }
       },
       mounted()
       {
           this.loadCategories();
       },
       methods: {
            loadCategories:function()
            {
               axios.get('/api/Categorie')
               .then((Response)=>{
                  this.categories=Response.data.data;
               })
               .catch(function(error)
               {
                  console.log(error);
               })
            },
       },
}
</script>

<style>

</style>