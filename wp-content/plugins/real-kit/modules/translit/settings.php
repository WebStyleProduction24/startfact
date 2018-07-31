<?php

if (isset($_POST['realkit_translit_standard'])) {
  update_option('realkit_translit_standard', $_POST['realkit_translit_standard']);
}

$standard      = get_option('realkit_translit_standard');
$standard_gost = ($standard == 'gost')              ? ' checked="checked"' : '';
$standard_iso  = ($standard == 'iso' or !$standard) ? ' checked="checked"' : '';

echo '
  <h3>' . __('Translit', 'realkit') . '</h3>
  <table class="form-table">
    <tbody>
      <tr>
        <th scope="row">' . __('Standard', 'realkit') . '</th>
        <td>
          <fieldset>
            <label>
              <input type="radio" name="realkit_translit_standard" value="iso"' . $standard_iso . '>
              <span>' . __('ISO 9:1995', 'realkit') . '</span>
            </label>
            <br>
            <label>
              <input type="radio" name="realkit_translit_standard" value="gost"' . $standard_gost . '>
              <span>' . __('GOST 16876-71', 'realkit') . '</span>
            </label>
          </fieldset>
        </td>
      </tr>
    </tbody>
  </table>
';