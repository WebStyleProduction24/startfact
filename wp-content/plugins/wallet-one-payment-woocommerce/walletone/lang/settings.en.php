<?php

define('w1Title', 'Wallet One Payment Gateway');
define('w1TitleDesc', 'Wallet One Payment Gateway - billing aggregator.');
define('w1Desc', 'Payment through billing aggregator "Walle One"');

//Settings
define('w1Settings', 'Settings');
define('w1SettingsReset', 'Reset');
define('w1SettingsSubmit', 'Save');
define('w1SettingsTabLogo', '<img class="w1-payment-logo" src="https://www.walletone.com/logo/provider/WalletOneRUB.png?type=pt&w=50&h=50">');
define('w1SettingsID', 'Id');
define('w1SettingsActive', 'Activity');
define('w1SettingsName', 'Name');
define('w1SettingsDesc', 'Description');
define('w1SettingsLogo', 'Logo');
define('w1SettingsLogoImg', '<img class="w1-payment-logo" src="https://www.walletone.com/logo/provider/WalletOneRUB.png?type=pt&w=50&h=50">');
define('w1SettingsCreateIcon', 'Create a icons to display on the checkout page');
define('w1SettingsMerchant', 'ID (account cashbox) online shop');
define('w1SettingsMerchantDesc', 'ID (account cashbox) online shop, obtained by registering on the site Wallet One.');
define('w1SettingsMerchantDescLink', 'ID (account cashbox) online shop, getting in site <a href="https://www.walletone.com/merchant/client/" target="_blank">Wallet One</a>');
define('w1SettingsSignatureMethod', 'Signature generation method');
define('w1SettingsSignatureMethodDesc', 'The method of forming a signature that is selected in your personal cabinet Wallet One');
define('w1SettingsSignatureMethod_0', 'Select');
define('w1SettingsSignature', 'Secret key online shop');
define('w1SettingsSignatureDesc', 'The code generated in your personal cabinet Wallet One.');
define('w1SettingsCurrency', 'A currency identifier by default');
define('w1SettingsCurrency_0', 'Select');
define('w1SettingsCurrency_643', 'Russian rubles');
define('w1SettingsCurrency_710', 'South African Rand');
define('w1SettingsCurrency_840', 'American dollars');
define('w1SettingsCurrency_978', 'Euro');
define('w1SettingsCurrency_980', 'Ukrainian hryvnia');
define('w1SettingsCurrency_398', 'Kazakhstani tenge');
define('w1SettingsCurrency_974', 'Belorussian rubles');
define('w1SettingsCurrency_972', 'Tajik somoni');
define('w1SettingsCurrency_985', 'Zloty');
define('w1SettingsCurrency_981', 'Lari');
define('w1SettingsCurrency_944', 'Azerbaijanian Manat');
define('w1SettingsPaymentMethod', 'The name of the payment method');
define('w1SettingsCurrencyDefault', 'Always use the default currency');
define('w1SettingsCurrencyDefaultDesc', 'In all currencies on the site, payment will always go for the default currency');
define('w1SettingsSuccessUrl', 'Url payment page');
define('w1SettingsSuccessUrlDesc', 'Specify the full path to a result of the payment page');
define('w1SettingsOrderStatusSuccess', 'Order status after success payment');
define('w1SettingsOrderStatusWaiting', 'Order status while waiting for payment');
//define('w1SettingsOrderStatusFail', 'Order status after fail payment');
define('w1SettingsReturnUrl', 'Link for URL of the script in a personal cabinet Wallet One');
define('w1SettingsReturnUrlDesc', 'Copy url and paste in your personal cabinet Wallet One');
define('w1SettingsRedirect', 'Do not show button buy to the buyer');
define('w1SettingsPtenabled', 'Permitted payment systems');
define('w1SettingsPtdisabled', 'Banned payment systems');
define('w1Settings_Ptdisabled', 'Banned payment systems');
define('w1SettingsDescrText', '<div class="content-block">
    <div class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="' . w1PathImg . 'w1_logo.png" alt="Wallet One Единая касса">
			</a>
			<p>Wallet One Payment Gateway  more than 100 ways to  payments from 15 countries and in.</p>
			<ul class="list-characteristic">
				<li><i>✔</i>Easy set up</li>
				<li><i>✔</i>Attractive rates</li>
				<li><i>✔</i>Detailed analytics</li>
				<li><i>✔</i>Hour helpdesk</li>
			</ul>
		</div>
		<div class="media-body">
			<blockquote>
				<p><span>Быстрая настройка</span></p>
				<ul class="list-settings-ul">
					<li><div class="circle-fgnghn">1</div><span>Sign up in <a target="_blank" href="https://www.walletone.com/ru/merchant/">site</a></span></li>
					<li><div class="circle-fgnghn">2</div><span>Fill in all required fields of the section "Settings".</span></li>
				</ul>
				<ul class="app_links">
					<li><a href="https://itunes.apple.com/ru/app/merchant-w1/id925378607?mt=8" class="app_link"></a></li>
					<li><a href="https://play.google.com/store/apps/details?id=com.w1.merchant.android" class="app_link __android"></a></li>
				</ul>
				<div class="clearfix"></div>
			</blockquote>
		</div>
	</div>
</div>');
define('w1SettingsDescrTextShort', '<p>Wallet One Checkout - universal payment aggregator, offering more than 100 ways of accepting payments.</p>
  <p>Fast connection, easy integration, visual analytics in your account around the clock support team makes Wallet One Checkout does not simply payment aggregator, 
  but a full service, convenient for Internet entrepreneurs.</p>');
define('w1SettingsStatus', 'Status');
define('w1SettingsCulture', 'The interface language on the payment page in the checkout');
define('w1SettingsCulture_0', 'Select');
define('w1SettingsCulture_ru', 'Russian');
define('w1SettingsCulture_az', 'Azerbaijani');
define('w1SettingsCulture_en', 'English');
define('w1SettingsCulture_uk', 'Ukrainian');
define('w1SettingsCulture_ka', 'Georgian');
define('w1SettingsCulture_pl', 'Polish');

define('W1_OS_WAITING', 'W1 Waiting payment');

define('textTabInfo', 'About module');
define('textTabApi', 'Settings');
define('textTabDopApi', 'Additional settings');
define('textTabStatusOrder', 'Order status');
define('textPayment', 'Payment');

define('textBasket', 'Basket');
define('textCheckout', 'Checkout');
define('textSuccess', 'Order is accepted');
define('textDopTitle', 'Your order is accepted%s!');
define('textCustomer', '<p style="font-weight:bold;font-size:1.5em">%s</p><p>Order History is located in the <a href="%s">personal account</a>. To view the history, follow the link <a href="%s">Order History</a>.</p><p>If your purchase is associated with digital products, please visit <a href="%s">Downloads</a> to view or download.</p><p>If you have any questions, please <a href="%s">contact us</a>.</p><p>Thank you for shopping at our online store!</p>');
define('textGuest', '<p>If you have any questions, please <a href="%s">contact us</a>.</p><p>Thank you for shopping at our online store!</p>');

define('w1TextAboutIntegration', 'Settings account Wallet One - intagration');

define('w1SiteName', 'Site');

define('w1SettingsSave', 'Settings save');
define('w1SettingsButtonSave', 'Сохранить');
define('w1SettingsButtonEnabled', 'Включено');
define('w1SettingsButtonYes', 'Да');
define('w1SettingsButtonNo', 'Нет');

define("w1SettingsInfoTab", "Information");
define("w1SettingsAdminSaveOk", "Settings saved successfully");

//Names fields
define('w1merchantId', 'ID (account cashbox) online shop');
define('w1signatureMethod', 'Signature generation method');
define('w1signature', 'Secret key online shop');
define('w1currencyId', 'A currency identifier by default');
define('w1orderStatusSuccess', 'Order status after success payment');
define('w1orderId', 'Order number');
define('w1summ', 'Order amount');
define('w1siteName', 'Site name');
define('w1successUrl', 'Order status after success payment');
define('w1failUrl', 'Order status after fail payment');
define('w1orderPaymentId', 'Order number in payment system');
define('w1orderState', 'Order status from the payment system');
define('w1paymentType', 'Type payment');
define('w1firstNameBuyer', 'First name buyer');
define('w1lastNameBuyer', 'Last name buyer');
define('w1emailBuyer', 'E-mail buyer');
define('w1Delivery', 'Delivery');

define('w1SaveSubmitSuccess', 'Data saved successfully.');
define('w1SubmitSave', 'Saveed.');

define('titleEdit', 'Editing');
define('textGeoZone', 'Geographical zone');
define('textSortOrder', 'Sorting order');

//errors
define('w1ErrorPhpVersion', 'To work of the module a PHP version must be at least 5.4.');

define('w1ErrorSaveFieldValidation', 'Invalid data format.');
define('w1ErrorSaveFieldLength', 'Text is too long.');
define('w1ErrorSaveSubmitError', 'Not all fields have been saved.');
define('w1ErrorSave', 'Error.');

define('w1ErrorRequired', 'Field %s field must not be empty.');
define('w1ErrorRequiredText', ' - must not be empty.');
define('w1ErrorRequiredEmpty', 'Field %s has not been declared in class.');
define('w1ErrorPreg', 'Field %s is not correct.');

define('w1ErrorActive', 'Necessary to fill in the required fields (fields marked with an asterisk).');
define('w1ErrorFileExist', 'This file %1$s does not exist.');
define('w1ErrorFileRead', 'This file %1$s does not read.');
define('w1ErrorCreateIcon', 'An empty array of icons.');
define('w1ErrorCreateDir', 'Error creating directory. Check the write permissions.');
define('w1ErrorCreateImage', 'Error creating image.');
define('w1ErrorCopyImage', 'Error saving image.');
define('w1ErrorCreatePayments', 'An empty array of payment methods.');

define('w1ErrorEmptyFields', 'Fill in the required fields in the admin panel.');
define('w1ErrorResultSignature', 'Error signature. Order number %s.');
define('w1ErrorResultOrderDescription', 'The field a name site a very long string.');
define('w1ErrorResultOrder', 'It does not have that order number. Order number: %s. Status order: %s. Order number in payment system %s');
define('w1ErrorResultOrderOnlyText', 'It does not have that order number.');
define('w1ErrorResultOrderSumm', 'The wrong a amount of order . Order number: %s. Status order: %s. Order number in payment system %s');

define('w1ErrorMethoaAvailable', 'This payment method is not available.');

define('w1ErrorPermission', 'You are not allowed to control this module!');

define('w1ErrorEmptyPost', 'An empty request.');

define('w1ErrorEmptyGoods', 'An empty goods. %s');
define('w1ErrorReturnPaid', 'Order has already been paid.');

define('w1ErrorEmptyOrderId', 'Пустой номер заказа.');

//Checkout order
define('w1OrderSubmitShort', 'Pay');
define('w1OrderSubmitText', 'Payment via Wallet One Payment Gateway');
define('w1OrderSubmitBack', 'Back to cart');
define('w1OrderDescr', 'Payment of order number %s on the site %s');

define('w1OrderResultSuccess', 'Successful payment order. Order number: %s. Status order: %s. Order number in payment system %s');
define('w1OrderResultSuccessOnlyText', 'Successful payment order. Order number: %s.');
define('w1OrderResultCreated', 'Expected payment of order. Order number: %s. Status order: %s.');
define('w1OrderResultCreatedOnlyText', 'Expected payment of order. Order number: %s.');
define('w1OrderResultFail', 'Error payment of order. Order number: %s. Status order: %s. Order number in payment system %s');
define('w1OrderResultSuccessPayment', 'The response from the Wallet One system: the payment was successful');
define('w1OrderResultWaitingPayment', 'Ответ от системы Wallet One: waining payment');
define('w1OrderResultFailPayment', 'Ответ от системы Wallet One: an error at payment');