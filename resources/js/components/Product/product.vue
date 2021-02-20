<template>
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-4 col-12">
			<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Under Categories</h3>
									<ul class="categor-list" >
                                        <li v-for="category in categories" :key="category.index">
                                            <a href="#">{{category.name}}</a>
                                        </li>
									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul>
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									<!-- Single Post -->
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
			</div>
		</div>
			<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
						       <div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter" >
											<label>Show :</label>
                                                <select v-model="value"  @change="loadfilterproduct(options.value)">
                                                    <option v-for="option in options" v-bind:key="option.index">{{option.value}}</option>
                                                </select>
                                                
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
					           </div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
                                                    
                            <div class="col-lg-4 col-md-6 col-12"  v-for="product in products" :key="product.index">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="product-details.html">
													
                                                    <img class="default-img" :src="'storage/'+product.image" alt="#">
                                                    <img class="hover-img" :src="'storage/'+product.image" alt="#">
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" :data-target="'#exampleModal'+product.id" @click.prevent="getId(product.id)" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" @click.prevent="getId(product.id)" href="#">Add to cart</a>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                            <h3><a href="product-details.html">{{product.name}}</a></h3>
                                                <div class="product-price">
                                                <span>${{product.price}}</span>
                                                </div>
                                            </div>
                                        </div>
											<!-- Modal -->
			<div class="modal fade" :id="'exampleModal'+product.id" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img :src="'storage/'+product.image" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>{{product.name}}</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock" v-if="product.qte>0">
												<span>&nbsp; <i class="fa fa-check-circle-o"> in stock</i></span>
											</div>
											<div class="quickview-notstock" v-else>
												<span>&nbsp; <i class="fa fa-times-circle-o"> Not in stock</i></span>
											</div>
										</div>
										<h3>${{product.price}}</h3>
										<div class="quickview-peragraph">
											<p>{{product.description}}</p>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<div v-if="product.size.length>0">
														<h5 class="title">Size</h5>
														<select>
															<option selected="selected">{{product.size}}</option>
														</select>
												    </div>
												</div>
												<div class="col-lg-6 col-12">
													<div v-if="product.color.length>0">
														<h5 class="title">Color</h5>
														<select>
															<option>{{product.color}}</option>
														</select>
												   </div>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" @click.prevent="addtocart(product.id)" class="btn">Add to cart</a>
											<a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
                            </div>
						</div>
			</div>
	</div>

	
</div>
		
</template>

<script>
import Input from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Input.vue';
export default {
  components: { Input },
 data:function()
       {
           return{
               products:[],
               categories:[],
               filterproduct:[],
			   value:'',
			   productid:'',
               options:[
                  {index:0, value:1},
                  {index:1,value:2},
                  {index:2,value:25},
                  {index:3,value:35},
               ]
           }
       },
       mounted()
       {
           this.loadproducts();
		   this.loadCategories();
       },
       methods: {
            loadproducts:function()
            {
               axios.get('/api/product')
               .then((Response)=>{
                  this.products=Response.data.data;
               })
               .catch(function(error)
               {
                  console.log(error);
               })
            },
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
            loadfilterproduct:function()
            {
			   axios.post('/filterproduct',{
                    value:this.value
			   }).then((Response)=>{
				   console.log(Response.data);
				})
				.catch(function(error)
                {
                  console.log(error);
				})
				 axios.get('/api/filterproduct',{
				 })
               .then((Response)=>{
                  this.filterproduct=Response.data.data;
               })
               .catch(function(error)
               {
                  console.log(error);
               })
				
			},
			addtocart:function(id)
			{
				axios.post('/addtocart',{
					productid:this.productid
				}).then(Response=>{
                     this.$toastr.s("successful", "Product Added");
				}).catch(function(error){
                     console.log(error);
				});
			},
			getId:function(id)
			{
			   this.productid=id;
			   return console.log(this.productid);
			}
       },
}
</script>

<style>

</style>