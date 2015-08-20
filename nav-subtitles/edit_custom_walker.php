<p class="field-custom description description-wide">
<label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
<?php _e( 'Subtitle' ); ?><br />
<input type="text" id="edit-menu-item-subtitle-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-subtitle[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->subtitle ); ?>" />
</label>
</p>