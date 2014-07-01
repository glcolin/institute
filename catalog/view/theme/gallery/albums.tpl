<?=$header?>
  
<link rel="stylesheet" href="catalog/view/css/lightbox.css" type="text/css" />
<script type="text/javascript" src="catalog/view/js/lightbox.js"></script>

<script type="text/javascript">
	$(document).ready(function () { $("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square'}); });
</script>

		<div class="content">
			
			<div class="left">

				<div class="contacts">
					<h3>Contacts</h3>
					<hr/>
					<p>
					37-20 Prince Street., 4/FL<br/>
					Flushing, NY 11354<br/>
					Tel: (718) 445-5888<br/>
						(718) 415-6681<br/>
					Fax: (718) 228-8699<br/>
					</p>
					
					<img src="catalog/view/images/office.png" border="0" width="210" style="border:2px #eee solid;" />
				</div>
				<hr/>
			
				<p>&nbsp;</p>
			
				<img src="catalog/view/images/trademark.jpg" border="0" width="120" style="margin-left:70px;margin-bottom:50px;border:0px !important;" />
				
				<div style="clear:both;"></div>
				
			</div><!-- left -->
			
			<div class="right">		
				<h3>Gallery</h3>
				<hr/>
				<?php foreach($albums as $info){?>
					<div style="float:left;margin:10px;border: 2px #eee solid;"><a href="<?php echo $info;?>" rel="prettyPhoto[gallery1]"><img src="<?php echo $info;?>" style="width:280px; height:210px;" /></a></div>
				<?php }?>
				<div style="clear:both;"></div>
			</div><!-- right -->
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>
	
  
<?=$footer?>