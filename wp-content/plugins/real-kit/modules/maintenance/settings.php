<?php

if (isset($_POST['submit'])) {
  $maintenance_toggle = (isset($_POST['realkit_maintenance_toggle'])) ? 'on' : 'off';
  update_option('realkit_maintenance_toggle', htmlentities(stripslashes($maintenance_toggle)));
  update_option('realkit_maintenance_html', htmlentities(stripslashes($_POST['realkit_maintenance_html'])));
}

$maintenance_toggle  = get_option('realkit_maintenance_toggle');
$maintenance_checked = ($maintenance_toggle == 'on') ? ' checked' : '';
$maintenance_html    = html_entity_decode(get_option('realkit_maintenance_html'));

echo '
  <h3>' . __('Maintenance mode', 'realkit') . '</h3>
  <table class="form-table">
    <tbody>
      <tr>
        <td>
          <fieldset>
            <label>
              <input type="checkbox" name="realkit_maintenance_toggle"' . $maintenance_checked . '>
              <span>' . __('Enable maintenance mode.', 'realkit') . '</span>
            </label>
          </fieldset>
        </td>
      </tr>
      <tr>
        <td>
          <fieldset>
            <p>' . __('Maintenance page HTML', 'realkit') . '</p>
            <p><textarea name="realkit_maintenance_html" rows="20" class="large-text code">' . $maintenance_html . '</textarea></p>
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>
';