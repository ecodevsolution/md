<?php
	use frontend\models\MainCategory;
	use frontend\models\SubCategory;
	use frontend\models\DetailCategory;

?>

<div class="col-md-3" style="padding:0 10px;">
    <div class="home-side-menu" style="margin-bottom:20px;">
		<h2 class="side-menu-title">CATEGORIES</h2>
        <ul class="menu side-menu">
			<?php 	
				$models=MainCategory::find()
					->all();
				foreach ($models as $model):
				
				$count_submenu = SubCategory::find()
								->where (["idmaincategory"=>$model->idmain])
								->count();
				if($count_submenu > 0){
			?>
            <li class="menu-item menu-item-has-children menu-parent-item">
               <a href="category-<?= strtolower(str_replace(' ','_',$model->main_category_name)); ?>"><?= $model->main_category_name ?></a>
				<div class="nav-sublist-dropdown" style="display:none">
					<div class="container">
						<?php 
							$modelsubs=SubCategory::find()
								->where (["idmaincategory"=>$model->idmain])
								->all();							
						?>
						<ul>
							<?php
								foreach ($modelsubs as $modelsub):
							
								$count_menu = DetailCategory::find()
										->where (["idsubcategory"=>$modelsub->idsubcategory])
										->count();
										
								if($count_menu > 0){
									$class ="menu-item-has-children menu-parent-item";
								}else{
									$class ="";
								}
							?>
							<li class="menu-item <?= $class; ?>">
								<a class="level1" href="product-<?= strtolower(str_replace(' ','_',$model->main_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modelsub->sub_category_name)); ?>">
									<span><?= $modelsub->sub_category_name; ?></span>
								</a>
								<div class="nav-sublist level1">
									
									<ul>
										<?php 
											$modeldets=DetailCategory::find()
												->where (["idsubcategory"=>$modelsub->idsubcategory])
												->all();
											foreach ($modeldets as $modeldet): 
										?>
										<li class="menu-item ">
											<a class="level2" href="product_detail-<?= strtolower(str_replace(' ','_',$model->main_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modelsub->sub_category_name)); ?>-<?= strtolower(str_replace(' ','_',$modeldet->detail_name)); ?>">
											<span><?= $modeldet->detail_name ?></span>
											</a>
										</li>
										<?php
											endforeach;
										?>
									</ul>									
								</div>
							</li>
							<?php endforeach; ?>
						</ul>						
					</div>
				</div>
			</li>		
			<?php
			
			}else{
				echo"<li class='menu-item'>				
						<a class='level1' href='category-";?><?= strtolower(str_replace(' ','_',$model->main_category_name));?><?php echo"'>
							<span>$model->main_category_name</span>
						</a>
					</li>";
			}
				endforeach;
			?>
        </ul>
		
        <script type="text/javascript">
           var SW_MENU_POPUP_WIDTH = 0;
           jQuery(function($){
               $('.menu.side-menu').et_menu({
                   type: "default"
               });
           });                                  
        </script>

         <div class="mobile-nav-overlay close-mobile-nav"></div>
    </div>
</div>
					