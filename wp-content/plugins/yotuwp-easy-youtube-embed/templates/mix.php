<?php
global $yotuwp;
$settings = $yotuwp->data['settings'];
$data = $yotuwp->data['data'];
$classes = apply_filters( 'yotu_classes', array("yotu-videos yotu-mode-mix yotu-mode-grid"), $settings);
?>
<div class="<?php echo implode(" ", $classes);?>">
	<ul>
		<?php
		$total = count($data->items);
		if(is_object($data) && $total >0 ):
			$count = 0;
			foreach($data->items as $video){

				$videoId = YotuWP::getVideoId($video);
				$thumb = $yotuwp->get_thumb($video);
			?>
			<li class="<?php echo $count==0?' yotu-first':''; echo $count==$total?' yotu-last':'';?>">
				<a href="#" class="yotu-video" data-videoid="<?php echo $videoId;?>" data-title="<?php echo $yotuwp->encode($video->snippet->title);?>">
					<div class="yotu-video-thumb-wrp">
						<div>
							<?php do_action('yotuwp_before_thumbnail', $videoId, $video);?>
							<img class="yotu-video-thumb" src="<?php echo $thumb;?>" alt="<?php echo $yotuwp->encode($video->snippet->title);?>"/>
							<?php do_action('yotuwp_after_thumbnail', $videoId, $video);?>
						</div>
					</div>
					<?php if(isset($settings['title']) && $settings['title'] == 'on'):?>
						<h3 class="yotu-video-title"><?php echo $video->snippet->title;?></h3>
					<?php endif;?>
					<?php do_action('yotuwp_after_title', $videoId, $video);?>
					<?php if(isset($settings['description']) && $settings['description'] == 'on'):?>
						<p class="yotu-video-description"><?php echo $video->snippet->description;?></p>
					<?php endif;?>
				</a>
			</li>
				
			<?php
			$count++;
			}
		endif;	
		?>
	</ul>
</div>