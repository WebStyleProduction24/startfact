<?php

define('w1Title', 'Wallet One Единая касса');
define('w1TitleDesc', 'Wallet One Единая касса - платежный агрегатор.');
define('w1Desc', 'Оплата через агрегатор платежей "Walle One"');

//Settings
define('w1Settings', 'Настройки');
define('w1SettingsReset', 'Сбросить');
define('w1SettingsSubmit', 'Сохранить');
define('w1SettingsTabLogo', '<img class="w1-payment-logo" src="https://www.walletone.com/logo/provider/WalletOneRUB.png?type=pt&w=50&h=50">');
define('w1SettingsID', 'ИД');
define('w1SettingsActive', 'Активность');
define('w1SettingsName', 'Название');
define('w1SettingsDesc', 'Описание');
define('w1SettingsLogo', 'Логотип');
define('w1SettingsLogoImg', '<img class="w1-payment-logo" src="https://www.walletone.com/logo/provider/WalletOneRUB.png?type=pt&w=50&h=50">');
define('w1SettingsCreateIcon', 'Создать набор иконок для вывода на странице оформления заказа');
define('w1SettingsMerchant', 'Индентификатор (номер кассы)');
define('w1SettingsMerchantDesc', 'Индентификатор (номер кассы) интернет-магазина, сгенерированный на сайте WalletOne');
define('w1SettingsMerchantDescLink', 'Индентификатор (номер кассы) интернет-магазина, полученный при регистрации в кассе <a href="https://www.walletone.com/merchant/client/" target="_blank">Wallet One</a>');
define('w1SettingsSignatureMethod', 'Метод формирования ЭЦП');
define('w1SettingsSignatureMethodDesc', 'Метод формирования ЭЦП, который выбран в личном кабинете кассы');
define('w1SettingsSignatureMethod_0', 'Выберите');
define('w1SettingsSignature', 'Ключ (ЭЦП) интернет-магазина');
define('w1SettingsSignatureDesc', 'Код, который сгенерирован в личном кабинете кассы');
define('w1SettingsCurrency', 'Идентификатор валюты по умолчанию');
define('w1SettingsCurrency_0', 'Выберите');
define('w1SettingsCurrency_643', 'Российские рубли');
define('w1SettingsCurrency_710', 'Южно-Африканские ранды');
define('w1SettingsCurrency_840', 'Американские доллары');
define('w1SettingsCurrency_978', 'Евро');
define('w1SettingsCurrency_980', 'Украинские гривны');
define('w1SettingsCurrency_398', 'Казахстанские тенге');
define('w1SettingsCurrency_974', 'Белорусские рубли');
define('w1SettingsCurrency_972', 'Таджикские сомони');
define('w1SettingsCurrency_985', 'Злотый');
define('w1SettingsCurrency_981', 'Лари');
define('w1SettingsCurrency_944', 'Азербайджанский манат');
define('w1SettingsPaymentMethod', 'Название метода оплаты');
define('w1SettingsCurrencyDefault', 'Всегда использовать валюту по умолчанию');
define('w1SettingsCurrencyDefaultDesc', 'При любых валютах на сайте, платеж будет идти всегда по выбранной валюте по умолчанию');
define('w1SettingsSuccessUrl', 'Адрес страницы об оплате');
define('w1SettingsSuccessUrlDesc', 'Указываем полный путь к странице с результатом оплаты');
define('w1SettingsOrderStatusSuccess', 'Статус заказа после успешной оплаты');
define('w1SettingsOrderStatusWaiting', 'Статус заказа при ожидании оплаты');
define('w1SettingsOrderStatusProcessed', 'Статус заказа в процессе платежа');
//define('w1SettingsOrderStatusFail', 'Статус заказа после не успешной оплаты');
define('w1SettingsReturnUrl', 'Ссылка для URL скрипта в личном кабинете кассы');
define('w1SettingsReturnUrlDesc', 'Скопируйте url и вставьте в личном кабинете кассы');
define('w1SettingsRedirect', 'Не показывать кнопку купить покупателю');
define('w1SettingsPtenabled', 'Разрешенные платежные системы');
define('w1SettingsPtdisabled', 'Запрещенные платежные системы');
define('w1Settings_Ptdisabled', 'Запрещенные платежные системы');
define('w1SettingsDescrText', '<div class="content-block">
    <div class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="' . w1PathImg . 'w1_logo.png" alt="Wallet One Единая касса">
			</a>
			<p>Универсальный платежный агрегатор, предлагающий более 100 способов приема платежей.</p>
			<ul class="list-characteristic">
				<li><i>✔</i>Быстрое подключение</li>
				<li><i>✔</i>Простая интеграция</li>
				<li><i>✔</i>Наглядная аналитика</li>
				<li><i>✔</i>Круглосуточная служба поддержки</li>
			</ul>
		</div>
		<div class="media-body">
			<blockquote>
				<p><span>Быстрая настройка</span></p>
				<ul class="list-settings-ul">
					<li><div class="circle-fgnghn">1</div><span>Зарегистрироваться в кассе на <a target="_blank" href="https://www.walletone.com/ru/merchant/">сайте</a></span></li>
					<li><div class="circle-fgnghn">2</div><span>Заполнить все обязательные поля из раздела "Настройки".</span></li>
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
define('w1SettingsDescrTextShort', '<p>Wallet One Единая касса — универсальный платежный агрегатор, предлагающий более 100 способов приема платежей.</p>
  <p>Быстрое подключение, простая интеграция, наглядная аналитика в личном кабинете и круглосуточная служба поддержки делают Wallet One Единая касса не просто 
  платежным агрегатором, но и полноценным сервисом, удобным для интернет-предпринимателей.</p>');
define('w1SettingsStatus', 'Статус');
define('w1SettingsCulture', 'Язык интерфейса на странце оплаты в кассе');
define('w1SettingsCulture_0', 'Выберите');
define('w1SettingsCulture_ru', 'Русский');
define('w1SettingsCulture_az', 'Азербайджанский');
define('w1SettingsCulture_en', 'Английский');
define('w1SettingsCulture_uk', 'Украинский');
define('w1SettingsCulture_ka', 'Грузинский');
define('w1SettingsCulture_pl', 'Польский');

define('W1_OS_WAITING', 'W1 Ожидание платежа');

define('textTabInfo', 'О модуле');
define('textTabApi', 'Настройки');
define('textTabDopApi', 'Доп. настройки');
define('textTabStatusOrder', 'Статус заказа');
define('textPayment', 'Оплата');

define('textBasket', 'Корзина');
define('textCheckout', 'Оформить заказ');
define('textSuccess', 'Заказ принят');
define('textDopTitle', 'Ваш заказ принят%s!');
define('textCustomer', '<p style="font-weight:bold;font-size:1.5em">%s</p><p>История заказа находится в <a href="%s">Личном кабинете</a>. Для просмотра истории, перейдите по ссылке <a href="%s">История заказов</a>.</p><p>Если Ваша покупка связана с цифровыми товарами, перейдите на страницу <a href="%s">Файлы для скачивания</a> для просмотра или скачивания.</p><p>Если у Вас возникли вопросы, пожалуйста <a href="%s">свяжитесь с нами</a>.</p><p>Спасибо за покупки в нашем интернет-магазине!</p>');
define('textGuest', '<p style="font-weight:bold;font-size:1.5em">%s</p><p>Если у Вас возникли вопросы, пожалуйста <a href="%s">свяжитесь с нами</a>.</p><p>Спасибо за покупки в нашем интернет-магазине!</p>');

define('w1TextAboutIntegration', 'Настройка аккаунта Wallet One - интеграция');

define('w1SiteName', 'Сайт');

define('w1SettingsSave', 'Настройки сохранены');
define('w1SettingsButtonSave', 'Сохранить');
define('w1SettingsButtonEnabled', 'Включено');
define('w1SettingsButtonYes', 'Да');
define('w1SettingsButtonNo', 'Нет');

define("w1SettingsInfoTab", "Информация");
define("w1SettingsAdminSaveOk", "Настройки успешно сохранены");

//Names fields
define('w1merchantId', 'Индентификатор (номер кассы)');
define('w1signatureMethod', 'Метод формирования ЭЦП');
define('w1signature', 'Ключ (ЭЦП) интернет-магазина');
define('w1currencyId', 'Идентификатор валюты по умолчанию');
define('w1orderStatusSuccess', 'Статус заказа после успешной оплаты');
define('w1orderId', 'Номер заказа');
define('w1summ', 'Сумма заказа');
define('w1siteName', 'Имя сайта');
define('w1successUrl', 'Ссылка в случае успешной оплаты');
define('w1failUrl', 'Ссылка в случае не успешной оплаты');
define('w1orderPaymentId', 'Номер заказа в платежной системе');
define('w1orderState', 'Статус заказа от платежной системы');
define('w1paymentType', 'Тип оплаты');
define('w1firstNameBuyer', 'Имя покупателя');
define('w1lastNameBuyer', 'Фамилия покупателя');
define('w1emailBuyer', 'E-mail покупателя');
define('w1Delivery', 'Доставка');

define('w1SaveSubmitSuccess', 'Данные успешно сохранены.');
define('w1SubmitSave', 'Сохранено.');

define('titleEdit', 'Редактирование');
define('textGeoZone', 'Географическая зона');
define('textSortOrder', 'Порядок сортировки');

//errors
define('w1ErrorPhpVersion', 'Для работы модуля должна стоять версия php не ниже 5.4.');

define('w1ErrorSaveFieldValidation', 'Не верный формат данных.');
define('w1ErrorSaveFieldLength', 'Слишком длинный текст.');
define('w1ErrorSaveSubmitError', 'Не все поля были сохранены.');
define('w1ErrorSave', 'Ошибка.');

define('w1ErrorRequired', 'Поле %s не должно быть пустым.');
define('w1ErrorRequiredText', ' - не должны быть пустыми.');
define('w1ErrorRequiredEmpty', 'Поле %s не было объявлено в классе.');
define('w1ErrorPreg', 'Поле %s имеет некорректное значение.');

define('w1ErrorActive', 'Необходимо заполнить обязательные поля (поля со звездочкой).');
define('w1ErrorFileExist', 'Данный файл %1$s не существует.');
define('w1ErrorFileRead', 'Данный файл %1$s не был прочитан.');
define('w1ErrorCreateIcon', 'Пустой массив с иконками.');
define('w1ErrorCreateDir', 'Ошибка при создании дирректории. Проверьте права на запись.');
define('w1ErrorCreateImage', 'Ошибка при создании изображания.');
define('w1ErrorCopyImage', 'Ошибка при сохранении изображания.');
define('w1ErrorCreatePayments', 'Пустой массив с платежными методами.');

define('w1ErrorEmptyFields', 'Заполните необходимые поля в админ панели.');
define('w1ErrorResultSignature', 'Ошибка в подписи. Номер заказа %s.');
define('w1ErrorResultOrderDescription', 'Поле Название сайта очень длинное.');
define('w1ErrorResultOrder', 'Нет такого номера заказа. Номер заказа: %s. Статус заказа: %s. Номер заказа в платежной системе %s');
define('w1ErrorResultOrderOnlyText', 'Нет такого номера заказа.');
define('w1ErrorResultOrderSumm', 'Не та сумма заказа. Номер заказа: %s. Статус заказа: %s. Номер заказа в платежной системе %s');

define('w1ErrorMethoaAvailable', 'Этот способ оплаты не доступен.');

define('w1ErrorPermission', 'У Вас нет прав для управления данным модулем!');

define('w1ErrorEmptyPost', 'Пустой запрос.');

define('w1ErrorEmptyGood', 'Нехватка товара. %s');
define('w1ErrorReturnPaid', 'Заказ уже оплачен.');

define('w1ErrorEmptyOrderId', 'Пустой номер заказа.');

//Checkout order
define('w1OrderSubmitShort', 'Оплатить');
define('w1OrderSubmitText', 'Оплата через Wallet One Единая касса');
define('w1OrderSubmitBack', 'Назад в корзину');
define('w1OrderDescr', 'Оплата за заказ №%s на сайте %s');

define('w1OrderResultSuccess', 'Успешная оплата заказа. Номер заказа: %s. Статус заказа: %s. Номер заказа в платежной системе %s');
define('w1OrderResultSuccessOnlyText', 'Успешная оплата заказа. Номер заказа: %s.');
define('w1OrderResultCreated', 'Ожидается оплата заказа. Номер заказа: %s. Статус заказа: %s.');
define('w1OrderResultCreatedOnlyText', 'Ожидается оплата заказа. Номер заказа: %s.');
define('w1OrderResultFail', 'Ошибка при оплате заказа. Номер заказа: %s. Статус заказа: %s. Номер заказа в платежной системе %s');
define('w1OrderResultSuccessPayment', 'Ответ от системы Wallet One: оплата прошла успешно');
define('w1OrderResultWaitingPayment', 'Ответ от системы Wallet One: ожидание оплаты');
define('w1OrderResultFailPayment', 'Ответ от системы Wallet One: неуспешная оплата');

define('w1SettingsTaxType', 'Ставка НДС');
define('w1SettingsTaxTypeOptionNo', 'Без НДС');
define('w1SettingsTaxTypeOption0', 'НДС по ставке 0%');
define('w1SettingsTaxTypeOption10', 'НДС по ставке 10%');
define('w1SettingsTaxTypeOption18', 'НДС по ставке 18%');
define('w1SettingsTaxTypeOption10Inc', 'НДС по ставке 10/110');
define('w1SettingsTaxTypeOption18Inc', 'НДС по ставке 18/118');