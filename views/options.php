<div class="wrap">
<h1>Your Plugin Name</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'ulr-settings-group' ); ?>
    <?php do_settings_sections( 'ulr-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Restrict</th>
			<td>
				<select name="restriction-level" value="<?php echo esc_attr( get_option('restriction-level') ); ?>">
					<option value="">No restiction</option>
					<option value="page">Whole page </option>
				</select>
			</td>
			<td>
				Current value: <?php echo esc_attr( get_option('restriction-level') ); ?>
			</td>
        </tr>
       
        </tr>
    </table>
    
    <?php submit_button(); ?>

    <?php

$query['autofocus[section]'] = 'ulr_section';
$query['return'] = admin_url( '?page=ulrOptions' );
$query['url'] = site_url( '/?showUlr=1' );
$link = add_query_arg( $query, admin_url( 'customize.php' ) );
?><a href="<?php echo esc_url( $link ); ?>">CUSTOMIZE!</a>


</form>
</div>