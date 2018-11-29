<?php
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 * Website: www.sibserver.org
 */

/**
 * Классы Модели (ORM) - только для работы с базой данных.
 * С классом-модель разрешено работать только классу ФАСАД.
 * Класс-модель не статический.
 * Запрещено обращаться к модели из Контроллера или Вида.
 */

// Загрузка классов и методов DatabaseConfig
require_once('DatabaseConfig.php');
// Загрузка классов и методов DatabasePdo
require_once('DatabasePdo.php');
// Загрузка классов и методов TraitORM
require_once('TraitORM_methods.php');
// Загрузка классов и методов Headers
require_once('TableHeaders.php');
// Загрузка классов и методов Pages
require_once('TablePages.php');
// Загрузка классов и методов MenuApp
require_once('TableMenuApp.php');
// Загрузка классов и методов MenuData
require_once('TableMenuData.php');
// Загрузка классов и методов MenuName
require_once('TableMenuName.php');
// Загрузка классов и методов Slider
require_once('TableSlider.php');
// Загрузка классов и методов Banners
require_once('TableBanners.php');
// Загрузка классов и методов Photogallery
require_once('TablePhotogallery.php');
// Загрузка классов и методов Terms
require_once('TableTerms.php');
// Загрузка классов и методов News
require_once('TableNews.php');
// Загрузка классов и методов Articles
require_once('TableArticles.php');
// Загрузка классов и методов TableAttfiles
require_once('TableAttfiles.php');
// Загрузка классов и методов TableAttpages
require_once('TableAttpages.php');
// Загрузка классов и методов Catalog
require_once('TableCatalog.php');
// Загрузка классов и методов CatalogFilter
require_once('TableCatalogFilter.php');
// Загрузка классов и методов CatalogFilterRelations
require_once('TableCatalogFilterRelations.php');
// Загрузка классов и методов Faq
require_once('TableFaq.php');
// Загрузка классов и методов TableClientDomains
require_once('TableClientDomains.php');
// Загрузка классов и методов TableClientHosting
require_once('TableClientHosting.php');
// Загрузка классов и методов TableClientOrders
require_once('TableClientOrders.php');
// Загрузка классов и методов Users
require_once('TableUsers.php');
// Загрузка классов и методов FormData
require_once('TableFormData.php');
// Загрузка классов и методов FormList
require_once('TableFormList.php');
// Загрузка классов и методов FormName
require_once('TableFormName.php');
// Загрузка классов и методов Staticpromo
require_once('TableStaticpromo.php');

?>