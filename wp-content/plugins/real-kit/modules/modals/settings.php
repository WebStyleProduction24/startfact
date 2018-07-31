<?php

if (isset($_POST['submit'])) {
  $modals_toggle = (isset($_POST['realkit_modals_toggle'])) ? 'on' : 'off';
  update_option('realkit_modals_toggle', $modals_toggle);
}

$modals_toggle = get_option('realkit_modals_toggle');
$checked = (empty($modals_toggle) or $modals_toggle == 'on') ? ' checked' : '';

echo '
  <h3>' . __('Modals', 'realkit') . '</h3>
  <table class="form-table">
    <tbody>
      <tr>
        <td>
          <fieldset>
            <label>
              <input type="checkbox" name="realkit_modals_toggle"' . $checked . '>
              <span>' . __('Use modal windows on this site.', 'realkit') . '</span>
            </label>
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>
';