<?php
defined('_JEXEC') or die; ?>

<div>

	<?php if (!empty($list)) : ?>
		
	

			
			<div style="background-color: #f5f5f5;">
				<div class="Card-Wrapper" itemscope itemtype="http://schema.org/Product">
					<div class="Card">
						<div class="Card-Main-Work row-mark">
								<?php if (!empty($list->product_short_name)) : ?>
									<div class="block-product-name" itemprop="name"><h3><a href="<?php echo $list->product_link ?>"><?php echo $list->product_short_name ?></a></h3></div>
								<?php endif; ?>
								<?php if (!empty($list->price)>0){ ?>									
									<div class="block-product-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
										
										<span itemprop="price"><?php echo $list->price;
										echo "<meta itemprop='price' content='".$list->salesPrice."'>"; 
										echo "<meta itemprop='priceCurrency' content='".$list->currency->_vendorCurrency_code_3."'>"; ?>
									</span>
									<?php echo $list->addtocart_button; ?>
									</div>
									<?php } else { ?>
										<div class="block-product-price">
										<div>нет в наличии</div>
										
								
									</div>
										<?php } ?>
								
							</div>
					
						<div class="row-mark">
							
						<div class="Card-Left"><?php echo $list->product_thumb_image; ?></div>
					
						<div class="Card-Main">
							
							
							<div class="profile-info-product row-mark">
									<div class="w_50 otstup">
									<div class="verticalLine">
										<div class="Card-Main-Adress-Product">Производитель: <strong><?php echo $list->mf_name ?></strong></div>
										<div class="Card-Main-Adress-Product">Артикул: <strong><?php echo $list->product_sku ?></strong></div>
										<?php if (!empty($list->srok)) : ?>									
											<div class="Card-Main-Adress"><span>Срок: </span><strong><?php echo $list->srok ?></strong></div>
											<?php endif; ?>
										
									</div>
								</div>

								<div class="Card-Main-WorkingHours-Product otstup">
								<?php if (!empty($list->price)){ ?>					
									<div>{module 709}</div>
									<?php } else { ?>
										
										
										<div>
										{module 707}
									</div>
								
									
										<?php } ?>					
									<div><strong>Доставка:</strong> <a href="dostavka#moskow">по Москве</a> |  <a href="dostavka#rossiya">по России</a></div>
								
									<div class="Contact-Main-Number">									
										<div class="row-mark">	
											<div><span class="Strong-Text link_icon">Задать вопрос: </span></div>
											<div><a class="link_icon icons-align Card-Link-Button" href="tg://resolve?domain=auto_pomosh"><img src="images/icons/telegram.png" alt="написать telegram" /></a></div>
											<div><a class="link_icon Card-Link-Button" href="https://api.whatsapp.com/send?phone=79017219484"><img src="images/icons/whatsapp.png" alt="написать whatsapp" /> </a></div>
										</div>
									</div>
								</div>
								
							</div>
							
							
								
								</div>
								</div>
								<?php if (!empty($list->product_desc)) :?>								
											
												<hr />
											<div class="Card-Main-Description" itemprop="description"><?php echo $list->product_desc ?><a href="<?php echo $list->product_link ?>">...</a> </div>
												<?php endif ?>		
										
						
					</div>
					
				</div>
			</div>
			
	<?php endif; ?>



</div>