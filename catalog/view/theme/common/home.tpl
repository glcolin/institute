<?php echo $header;?>
		
		<div class="content">
			
			<div class="left">
				
				<h3>Videos</h3>
				<hr/>
				<a target="_blank" href="http://yp.sinovision.net/clients.php?act=details&amp;id=3204">
						<img border="0" src="catalog/view/images/video.png" width="252" height="200" style="border:2px solid #eee;"></a>
				<p>&nbsp;</p>
				
				<iframe width="252" height="200" src="//www.youtube.com/embed/AyMFPwt5DII" style="border:2px solid #eee;" frameborder="0" allowfullscreen></iframe>
				<p>&nbsp;</p>
				
				<h3>Photos</h3>
				<hr/>
				
				
				<img src="uploads/images/<?php echo $image_info[1]['url'];?>" border="0" width="256" />
				<img src="uploads/images/<?php echo $image_info[2]['url'];?>" border="0" width="256" />
				<img src="uploads/images/<?php echo $image_info[3]['url'];?>" border="0" width="256" />
				<img src="uploads/images/<?php echo $image_info[4]['url'];?>" border="0" width="256" />
				
				

				<img src="catalog/view/images/trademark.jpg" border="0" width="120" style="margin-left:70px;margin-bottom:50px;border:0px !important;" />
				
				<div style="clear:both;"></div>
				
			</div><!-- left -->
			
			<div class="right">
			
				<h3><?php echo $news_title;?></h3>
				
				<div>
				<?php echo $news_content;?>
				</div>
				
				<hr/>
			
				<h3><?php echo $intro_title;?></h3>
				
				<div>
				<?php echo $intro_content;?>
				</div>
				
				<hr/>
				
				<!--
				<div class="rightmid">
					<div class="courselist">
						<h3>医护课堂列表</h3>
						<?php $i = 0;?>
						<?php foreach($courses as $course){ ?>							
							<p><a href="index.php?route=common/courses&<?php echo $i++;?>"><?php echo $course['title'];?></a></p>							
						<?php } ?>
					</div>
					<div class="contacts">
						<h3>联系我们</h3>
						<p>
						37-20 Prince Street., 4A<br/>
						Flushing, NY 11354<br/>
						电话: (718) 445-5888<br/>
							(718) 415-6681<br/>
						传真: (718) 228-8699<br/>
						</p>
						
						<img src="catalog/view/images/office.png" border="0" width="210" style="border:2px #eee solid;" />
					</div>
					
					<div style="clear:both;"></div>
				</div><!-- rightmid -->
			
				<hr/>
				
				<div class="location">
					<h3>Our Locations</h3>
					<div class="addr">
						<h4>In Queens:</h4>
						<div class="col">
							<p>
							<p><b>Address:</b><br/>
							37-20 Prince Street., 4A<br/>
							Flushing, NY 11354<br/>
							</p>
							<p><b>Email:</b><br/>							
							<u style="color: #4982A9;">hyinstitute@hotmail.com</u></p>
						</div>
						<div class="col">
							<p>
							<b>Tel:</b><br/>
							(718) 886-1018<br/>
							(718) 445-5888<br/>
							</p>
							<p>
							<b>Fax:</b><br/>
							(718) 228-8699<br/>
							</p>
						</div>
						<div class="col" style="margin-right:0;">
						
							<iframe style="border:2px #eee solid;margin-top:20px;" width="196" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=37-20+Prince+Street.,+4A&amp;aq=&amp;sll=40.740754,-73.987598&amp;sspn=0.091434,0.209255&amp;ie=UTF8&amp;hq=&amp;hnear=37-20+Prince+St,+Flushing,+New+York+11354&amp;t=m&amp;z=14&amp;ll=40.760178,-73.833026&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=37-20+Prince+Street.,+4A&amp;aq=&amp;sll=40.740754,-73.987598&amp;sspn=0.091434,0.209255&amp;ie=UTF8&amp;hq=&amp;hnear=37-20+Prince+St,+Flushing,+New+York+11354&amp;t=m&amp;z=14&amp;ll=40.760178,-73.833026" style="color: #4982A9;text-align:left">view larger map</a></small>			
							
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="addr">
						<h4>In Brooklyn</h4>
						<div class="col">
							<p><b>Address:</b><br/>
							763 58th Street <br/>
							Brooklyn, NY 11354
							</p>
							<p><b>Email:</b><br/>							
							<u style="color: #4982A9;">hyinstitute26@hotmail.com</u></p>
						</div>
						<div class="col">
							<p>
							<b>Tel:</b><br/>
							(718) 492-4929<br/>
							(718) 415-6681<br/>
							</p>
							<p>
							<b>Fax:</b><br/>
							(718) 228-8699<br/>
							</p>
						</div>
						<div class="col" style="margin-right:0;">
							
							<iframe style="border:2px #eee solid;margin-top:20px;" width="196" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=763+58th+Street+++Brooklyn,+NY+11354+&amp;aq=&amp;sll=40.760178,-73.833026&amp;sspn=0.011426,0.026157&amp;ie=UTF8&amp;hq=&amp;hnear=763+58th+St,+Brooklyn,+Kings,+New+York+11220&amp;t=m&amp;z=14&amp;ll=40.637147,-74.008756&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=763+58th+Street+++Brooklyn,+NY+11354+&amp;aq=&amp;sll=40.760178,-73.833026&amp;sspn=0.011426,0.026157&amp;ie=UTF8&amp;hq=&amp;hnear=763+58th+St,+Brooklyn,+Kings,+New+York+11220&amp;t=m&amp;z=14&amp;ll=40.637147,-74.008756" style="color: #4982A9;text-align:left">view larger map</a></small>
							
						</div>
						<div style="clear:both;"></div>
					</div>
					<table>
						<tr>
							<td width="25%"><u style="padding-left:25px;padding-right:25px;">Office Hours</u></td>
							<td style="padding-left:40px;border-left:2px #eee solid;">
								<p>
								7 days a week: 9:00 am - 5:00 pm<br/> 
								</p>
							</td>
						</tr>
					</table>
				</div>
				
				<p>&nbsp;</p>
			
			</div><!-- right -->
			
			<div style="clear:both;"></div>
		
		</div>
		
		<div style="clear:both;"></div>
		
	</div>

<?php echo $footer;?>