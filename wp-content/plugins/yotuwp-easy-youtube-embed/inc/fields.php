<?php
/**
 * Field system by YotuWP
 */
class YotuFields{
    
    public function __construct()
    {

    }

    public function render_field($data ) {

		ob_start();
		
		$data = apply_filters('yotuwp_before_render_field', $data );

		?>
		<div class="yotu-field yotu-field-type-<?php echo $data['type'];?>" id="yotuwp-field-<?php echo $data['name'];?>">
			<?php if( isset( $data['label'] ) ):?>
			<label for="yotu-<?php echo esc_attr($data['group']) . '-'. esc_attr($data['name']);?>"><?php echo esc_attr( $data['label'] );?></label>
			<?php endif;?>
			<div class="yotu-field-input">

				<?php call_user_func_array(array($this, $data['type']), array($data));?>
				<?php do_action('yotuwp_after_render_field', $data );?>
				<label class="yotu-field-description" for="yotu-<?php echo esc_html($data['group']) . '-'. esc_attr($data['name']);?>"><?php echo $data['description'];?></label>
			</div>
			
		</div>
		<?php

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	public function intro( $data ) {
    
	}

    public function color( $data ) {
    ?>
        <input type="text" id="yotu-<?php echo esc_attr( $data['group']) . '-'. esc_attr($data['name']);?>" class="yotu-param yotu-colorpicker" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]" data-css="<?php echo (isset( $data['css'] ) ? $data['css'] : '');?>" value="<?php echo (isset( $data['value'] ) ? $data['value'] : $data['default']);?>" />
    <?php
	}

    public function text( $data ) {
    ?>
        <input type="text" id="yotu-<?php echo esc_attr( $data['group']) . '-'. esc_attr($data['name']);?>" class="yotu-param" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]" value="<?php echo (isset( $data['value'] ) ? $data['value'] : $data['default']);?>" />
    <?php
	}

	public function pro( $data ) {
		echo '<i>i</i>';
		echo '<span class="ytpro">Only in Premium version.</span>';
		if( isset( $data['img'] ) ) echo '<img src="'. esc_url( $data['img'] ).'" class="yotuwp-pro-img"/>';
	}

    public function license($data ) {
		global $yotupro;
    ?>
        <input type="text" id="yotu-license-key" class="yotu-param" name="yotu-license-key" value="<?php echo ($yotupro->valid)? '***************' . substr($yotupro->updater->get('package_license'), -9):'';?>" />
		<span class="yotu-license-verified <?php echo ($yotupro->valid)? 'yotu-license-activated':'';?>">Verified</span>
		<a href="#" id="yotuwp-license-action" data-func="<?php echo ( $yotupro->valid ? 'deactivate':'activate');?>"><?php echo ( $yotupro->valid ? 'Deactivate':'Activate');?></a>
		<div class="yotu-license-status">
		<?php
		if( !$yotupro->valid ):
			$diff_time = (time() - get_option( 'yotuwp_pro_install_date', time() )) + 604800;
			echo sprintf( _('You are using YotuWP Pro trial license. You have %s days left to active license before all advance features leave to default settings.'), (int)($diff_time/86400));
		endif;
		?>
		</div>
		<?php
	}

	public function select($data ) {
		$value = (isset($data['value']) && !empty($data['value'])) ? $data['value'] : $data['default'];
	?>
    <select id="yotu-<?php echo esc_attr($data['group']) . '-'. esc_attr($data['name']);?>" class="yotu-param" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]">
        <?php
            foreach ($data['options'] as $key => $val) {
            ?>
            <option value="<?php echo $key;?>"<?php echo ($value == $key)? ' selected="selected"' : '';?>><?php echo $val;?></option>
            <?php
            }
        ?>
    </select>
	<?php
	}

	public function checkbox( $data ) {
		$value = (isset($data['value']) && !empty($data['value'])) ? $data['value'] : $data['default'];
	?>
    
        <?php
            foreach ($data['options'] as $key => $val) {
				$key_id = $data['group'] . '-'. $data['name'] .'-'. $key;
				$name = $data['name'] .'|'. $key;
			?>
			<div class="yotuwp-field-checkbox-item">
				<input type="checkbox"<?php echo (isset( $value[ $key ] ) && $value[ $key ] == 'on' )? ' checked="checked"' :'' ;?> id="yotuwp-<?php echo esc_attr( $key_id );?>" class="yotu-param" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr( $name );?>]">		
				<label for="yotuwp-<?php echo esc_attr( $key_id );?>"><?php echo $val;?></label>
			</div>
            <?php
            }
        ?>
    </select>
	<?php
	}

	public function toggle($data ) {
        global $yotuwp;
	?>
	<label class="yotu-switch">
		<input type="checkbox" id="yotu-<?php echo esc_attr($data['group']) . '-'. esc_attr($data['name']);?>" class="yotu-param" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]" <?php echo ($data['value'] == 'on' ) ? 'checked="checked"' : '';?> />
		<span class="yotu-slider yotu-round"></span>
	</label>
	<?php
	}

	public function radios( $data ) {
		global $yotuwp;
		
		$value = (isset($data['value']) && !empty($data['value']) && isset($data['options'][ $data['value'] ])) ? $data['value'] : $data['default'];

	?>
	<div class="yotu-radios-img yotu-radios-img-<?php echo isset($data['class'])? $data['class']:'full';?>">
		<?php

			if( $value != '' && isset($data['options'][ $value ]) ) {
				$temp = array( $value => $data['options'][ $value ] );
				unset( $data['options'][$value] );
				$data['options'] = $temp + $data['options'];
			}

            foreach ($data['options'] as $key => $val) {
            	$id       = 'yotu-' . esc_attr($data['group']) . '-'. esc_attr($data['name']) . '-'. $key;
            	$selected = ($value == $key)? ' yotu-field-radios-selected' : '';
            ?>
            <label class="yotu-field-radios<?php echo $selected;?>" for="<?php echo $id;?>">
				<input class="yotu-param" value="<?php echo $key;?>" type="radio"<?php echo ($value == $key) ? ' checked="checked"' : '';?> id="<?php echo $id;?>" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]" />

				<?php if( !empty($val['img']) ) :
					$img_url = ( strpos($val['img'], 'http') === false )? $yotuwp->assets_url . $val['img'] : $val['img'];
				?>
					<img src="<?php echo $img_url;?>" alt="<?php echo $val['title'];?>" title="<?php echo $val['title'];?>"/><br/>
				<?php else:?>
					<div class="yotuwp-field-radios-text-option"><?php echo $val['title'] . __(' Settings', 'yotuwp-easy-youtube-embed');?></div>
				<?php endif;?>

            	<span><?php echo $val['title'];?></span>
            </label>
            <?php
            }
        ?>
	</div>
	<?php
	}

	public function buttons($data ) {
        global $yotuwp;
		$value = (isset($data['value']) && !empty($data['value'])) ? $data['value'] : $data['default'];

	?>
	<div class="yotu-radios-img-buttons yotu-radios-img yotu-radios-img-<?php echo isset($data['class'])? $data['class']:'full';?>">
		<?php
            for ($i=1; $i<=4; $i++) {
            	$id = 'yotu-' . esc_attr($data['group']) . '-'. esc_attr($data['name']) . '-'. $i;
            	$selected = ($value == $i)? ' yotu-field-radios-selected' : ''
            ?>
            <label class="yotu-field-radios<?php echo $selected;?>" for="<?php echo $id;?>">
				<input value="<?php echo $i;?>" type="radio"<?php echo ($value == $i) ? ' checked="checked"' : '';?> id="<?php echo $id;?>" name="yotu-<?php echo esc_attr($data['group']);?>[<?php echo esc_attr($data['name']);?>]" class="yotu-param" />
				<div>
            		<a href="#" class="yotu-button-prs yotu-button-prs-<?php echo $i;?>"><?php echo __('Prev', 'yotuwp-easy-youtube-embed');?></a>
					<a href="#" class="yotu-button-prs yotu-button-prs-<?php echo $i;?>"><?php echo __('Next', 'yotuwp-easy-youtube-embed');?></a>
				</div>
                <br/>
                <span><?php echo sprintf( __('Style %s', 'yotuwp-easy-youtube-embed'), $i);?></span>
            </label>
            <?php
            }
        ?>
	</div>
	<?php
	}
}