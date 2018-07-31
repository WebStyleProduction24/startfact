<?php

if (isset($_POST['submit'])) {
  $views_toggle = (isset($_POST['realkit_views_toggle'])) ? 'on' : 'off';
  update_option('realkit_views_toggle', $views_toggle);
}

$views_toggle  = get_option('realkit_views_toggle');
$views_checked = (empty($views_toggle) or $views_toggle == 'on') ? ' checked' : '';

echo '
  <h2>' . __('Views', 'realkit') . '</h2>
  <table class="form-table">
    <tbody>
      <tr>
        <td>
          <fieldset>
            <label>
              <input type="checkbox" name="realkit_views_toggle"' . $views_checked . '>
              <span>' . __('Use views counter on this site.', 'realkit') . '</span>
            </label>
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>
';