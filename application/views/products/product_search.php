<?php

	if($count>0)
		{
			foreach($searchBycost as $row)
				{?> 

					<ul class="aa-product-catg">
						<li>
	                  <figure>
	                    <a class="aa-product-img" href="<?php echo SITE_URL;?>earrings_details?value=<?php echo $row->item_id; ?> "><img src="<?php echo SITE_URL;?>assets/<?php echo $row->image; ?>" alt="polo shirt img"></a>
	                    <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>earrings_details?value=<?php echo $row->item_id; ?> "><span class="fa fa-shopping-cart"></span>Quick View</a>
	                    <figcaption>
	                      <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>earrings_details?<?php echo $row->item_id; ?>"><?php echo $row->item_name; ?></a></h4>
	                   
	                     <input type="hidden" name="item_id" value="<?php echo $row->item_id; ?>">
                        <input type="hidden" name="discounted_price" value="<?php echo $row->discounted_price; ?>">
                   <input type="hidden" name="item_name" value="<?php echo $row->item_name; ?>">

	                      
	                      <span class="aa-product-price">₹ <?php echo $row->discounted_price?></span><span class="aa-product-price"><del>₹ <?php echo $row->actual_price?> </del></span>
	                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
	                    </figcaption>
	                  </figure>                         
	                  <div class="aa-product-hvr-content">
	                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
	                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
	                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
	                  </div>
	                  <!-- product badge -->
	                   <?php if($row->quantity>0&&$row->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($row->quantity>0&&$row->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $row->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
	                </li>
					</ul>
<?php
				}
		} else {
			?>	<p>No Products found.</span></p>
		<?php  } ?> 

