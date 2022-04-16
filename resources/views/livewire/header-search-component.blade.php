<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
                                    @csrf
									<input type="text" name="search" value="{{$search}}" placeholder="Search here...">
									<button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product-cat" value="{{$product_cat}}" id="product-cat">
										<input type="hidden" name="product-cat_id" value="{{$product_cat_id}}" id="product-cat_id">
										<a href="#" class="link-control">All Category</a>
										<ul class="list-cate">
											<li class="level-0">{{str_split($product_cat,12)[0]}}</li>
                                            @foreach($categories as $categories)

                                            <li class="level-1" data-id="{{$categories->id}}">{{$categories->name}}</li>

                                            @endforeach
											

										</ul>
									</div>
								</form>
							</div>
</div>

