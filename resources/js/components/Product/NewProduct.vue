<template>
<div>

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
												<label class="checkbox-inline" for="1"><input name="news" id="1" value="50" type="checkbox">$20 - $50<span class="count">(3)</span></label>
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
			</div>
	</div>
</div>


</div>
</template>

<script>
export default {
 data:function()
       {
           return{
               products:[],
               categories:[],
               filterproduct:[],
			   value:'',
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
       },
}
</script>

<style>

</style>