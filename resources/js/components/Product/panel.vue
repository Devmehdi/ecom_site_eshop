<template>
   <div class="sinlge-bar shopping">
		<a href="#" class="single-icon"><i class="ti-bag"></i><span class="total-count">{{panels.length}}</span></a>
			<!-- Shopping Item -->
			<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span>{{panels.length}} Items</span>
										<a href="cart">View Cart</a>
									</div>
									<ul class="shopping-list">
										
											<li v-for="panel in panels" :key="panel.index">
												<a href="#" @click.prevent="deleteProduct(panel.id)" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="#"><img :src="'storage/'+panel.productimage" alt="#"></a>
												<h4><a href="#"></a></h4>
												<p class="quantity">{{panel.productname}} <span class="" style="color:black">${{panel.price}}</span></p>
											</li>	
									</ul>
									<div class="bottom">
										<div class="total" >
											<span>Total</span>
											<span class="total-amount">${{calcPrice}}</span>
										</div>
										<a href="checkout" class="btn animate">Checkout</a>
									</div>
			</div>
			<!--/ End Shopping Item -->
   </div>
</template>

<script>

export default {
   data:function()
   {
      return{
			counts:'',
			panels:[],
		}
   },
   mounted() {
	   this.getPanels();
   },
   methods: {
	 getPanels:function()
	 {
		 axios.get('precommande/panel')
          .then((Response)=>{
				this.panels=Response.data.data;
        }).catch(function(error)
        {
            console.log(error);
        })
	 },
	  deleteProduct:function(id)
      {
	   axios.delete('panel/product/'+id)
	   .then((Response)=>{
		    this.panels=Response.data.data
		    this.getPanels();
			this.$toastr.s("successful", "Product deleted");
		}).catch(error=>console.log(error))
	  },
 	 alertDisplay() {
        this.$toastr.s("successful", "Product deleted");
	  },
	 
   },
   computed:
   {
	   //for calcul total price the product in panel
     calcPrice:function()
	  {
		 var total=0;
		 this.panels.forEach(e=>{
			 total+=e.price
		 })
         return total;
	  }
   }

}
</script>
