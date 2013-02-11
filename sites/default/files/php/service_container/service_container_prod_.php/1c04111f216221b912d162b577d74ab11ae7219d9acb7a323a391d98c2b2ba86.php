<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * service_container_prod_
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class service_container_prod_ extends Container
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();

        $this->set('service_container', $this);

        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
    }

    /**
     * Gets the 'access_check.cron' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\system\Access\CronAccessCheck A Drupal\system\Access\CronAccessCheck instance.
     */
    protected function getAccessCheck_CronService()
    {
        return $this->services['access_check.cron'] = new \Drupal\system\Access\CronAccessCheck();
    }

    /**
     * Gets the 'access_check.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Access\DefaultAccessCheck A Drupal\Core\Access\DefaultAccessCheck instance.
     */
    protected function getAccessCheck_DefaultService()
    {
        return $this->services['access_check.default'] = new \Drupal\Core\Access\DefaultAccessCheck();
    }

    /**
     * Gets the 'access_check.edit.entity_field' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\edit\Access\EditEntityFieldAccessCheck A Drupal\edit\Access\EditEntityFieldAccessCheck instance.
     */
    protected function getAccessCheck_Edit_EntityFieldService()
    {
        return $this->services['access_check.edit.entity_field'] = new \Drupal\edit\Access\EditEntityFieldAccessCheck();
    }

    /**
     * Gets the 'access_check.permission' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Access\PermissionAccessCheck A Drupal\Core\Access\PermissionAccessCheck instance.
     */
    protected function getAccessCheck_PermissionService()
    {
        return $this->services['access_check.permission'] = new \Drupal\Core\Access\PermissionAccessCheck();
    }

    /**
     * Gets the 'access_check.user.register' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\user\Access\RegisterAccessCheck A Drupal\user\Access\RegisterAccessCheck instance.
     */
    protected function getAccessCheck_User_RegisterService()
    {
        return $this->services['access_check.user.register'] = new \Drupal\user\Access\RegisterAccessCheck();
    }

    /**
     * Gets the 'access_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Access\AccessManager A Drupal\Core\Access\AccessManager instance.
     */
    protected function getAccessManagerService()
    {
        $this->services['access_manager'] = $instance = new \Drupal\Core\Access\AccessManager($this->get('request'));

        $instance->setContainer($this);
        $instance->addCheckService('access_check.default');
        $instance->addCheckService('access_check.permission');
        $instance->addCheckService('access_check.edit.entity_field');
        $instance->addCheckService('access_check.cron');
        $instance->addCheckService('access_check.user.register');

        return $instance;
    }

    /**
     * Gets the 'access_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\AccessSubscriber A Drupal\Core\EventSubscriber\AccessSubscriber instance.
     */
    protected function getAccessSubscriberService()
    {
        return $this->services['access_subscriber'] = new \Drupal\Core\EventSubscriber\AccessSubscriber($this->get('access_manager'));
    }

    /**
     * Gets the 'cache.bootstrap' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_BootstrapService()
    {
        return $this->services['cache.bootstrap'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'bootstrap');
    }

    /**
     * Gets the 'cache.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_CacheService()
    {
        return $this->services['cache.cache'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'cache');
    }

    /**
     * Gets the 'cache.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_ConfigService()
    {
        return $this->services['cache.config'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'config');
    }

    /**
     * Gets the 'cache.path' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_PathService()
    {
        return $this->services['cache.path'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'path');
    }

    /**
     * Gets the 'cache.rdf.site_schema.types' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_Rdf_SiteSchema_TypesService()
    {
        return $this->services['cache.rdf.site_schema.types'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'cache');
    }

    /**
     * Gets the 'cache.views_info' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Cache\CacheBackendInterface A Drupal\Core\Cache\CacheBackendInterface instance.
     */
    protected function getCache_ViewsInfoService()
    {
        return $this->services['cache.views_info'] = call_user_func(array('Drupal\\Core\\Cache\\CacheFactory', 'get'), 'views_info');
    }

    /**
     * Gets the 'class_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getClassLoaderService()
    {
        throw new RuntimeException('You have requested a synthetic service ("class_loader"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'config.cachedstorage.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\FileStorage A Drupal\Core\Config\FileStorage instance.
     */
    protected function getConfig_Cachedstorage_StorageService()
    {
        return $this->services['config.cachedstorage.storage'] = new \Drupal\Core\Config\FileStorage('sites/default/files/config_0LTpNJiUWz0xoDVKsqXHO_mV6hsStcX99zFtk1TXL6E/active');
    }

    /**
     * Gets the 'config.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\ConfigFactory A Drupal\Core\Config\ConfigFactory instance.
     */
    protected function getConfig_FactoryService()
    {
        return $this->services['config.factory'] = new \Drupal\Core\Config\ConfigFactory($this->get('config.storage'), $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'config.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\CachedStorage A Drupal\Core\Config\CachedStorage instance.
     */
    protected function getConfig_StorageService()
    {
        return $this->services['config.storage'] = new \Drupal\Core\Config\CachedStorage($this->get('config.cachedstorage.storage'), $this->get('cache.config'));
    }

    /**
     * Gets the 'config.storage.staging' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\FileStorage A Drupal\Core\Config\FileStorage instance.
     */
    protected function getConfig_Storage_StagingService()
    {
        return $this->services['config.storage.staging'] = new \Drupal\Core\Config\FileStorage('sites/default/files/config_0LTpNJiUWz0xoDVKsqXHO_mV6hsStcX99zFtk1TXL6E/staging');
    }

    /**
     * Gets the 'config.typed' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\TypedConfigManager A Drupal\Core\Config\TypedConfigManager instance.
     */
    protected function getConfig_TypedService()
    {
        return $this->services['config.typed'] = new \Drupal\Core\Config\TypedConfigManager($this->get('config.storage'));
    }

    /**
     * Gets the 'config_global_override_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\ConfigGlobalOverrideSubscriber A Drupal\Core\EventSubscriber\ConfigGlobalOverrideSubscriber instance.
     */
    protected function getConfigGlobalOverrideSubscriberService()
    {
        return $this->services['config_global_override_subscriber'] = new \Drupal\Core\EventSubscriber\ConfigGlobalOverrideSubscriber();
    }

    /**
     * Gets the 'content_negotiation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\ContentNegotiation A Drupal\Core\ContentNegotiation instance.
     */
    protected function getContentNegotiationService()
    {
        return $this->services['content_negotiation'] = new \Drupal\Core\ContentNegotiation();
    }

    /**
     * Gets the 'controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\ControllerResolver A Drupal\Core\ControllerResolver instance.
     */
    protected function getControllerResolverService()
    {
        return $this->services['controller_resolver'] = new \Drupal\Core\ControllerResolver($this);
    }

    /**
     * Gets the 'database' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Database\Connection A Drupal\Core\Database\Connection instance.
     */
    protected function getDatabaseService()
    {
        return $this->services['database'] = call_user_func(array('Drupal\\Core\\Database\\Database', 'getConnection'), 'default');
    }

    /**
     * Gets the 'database.slave' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Database\Connection A Drupal\Core\Database\Connection instance.
     */
    protected function getDatabase_SlaveService()
    {
        return $this->services['database.slave'] = call_user_func(array('Drupal\\Core\\Database\\Database', 'getConnection'), 'slave');
    }

    /**
     * Gets the 'edit.editor.selector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\edit\EditorSelector A Drupal\edit\EditorSelector instance.
     */
    protected function getEdit_Editor_SelectorService()
    {
        return $this->services['edit.editor.selector'] = new \Drupal\edit\EditorSelector($this->get('plugin.manager.edit.editor'));
    }

    /**
     * Gets the 'edit.metadata.generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\edit\MetadataGenerator A Drupal\edit\MetadataGenerator instance.
     */
    protected function getEdit_Metadata_GeneratorService()
    {
        return $this->services['edit.metadata.generator'] = new \Drupal\edit\MetadataGenerator($this->get('access_check.edit.entity_field'), $this->get('edit.editor.selector'), $this->get('plugin.manager.edit.editor'));
    }

    /**
     * Gets the 'entity.query' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Entity\Query\QueryFactory A Drupal\Core\Entity\Query\QueryFactory instance.
     */
    protected function getEntity_QueryService()
    {
        $this->services['entity.query'] = $instance = new \Drupal\Core\Entity\Query\QueryFactory($this->get('plugin.manager.entity'));

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'entity.query.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Config\Entity\Query\QueryFactory A Drupal\Core\Config\Entity\Query\QueryFactory instance.
     */
    protected function getEntity_Query_ConfigService()
    {
        return $this->services['entity.query.config'] = new \Drupal\Core\Config\Entity\Query\QueryFactory($this->get('config.storage'));
    }

    /**
     * Gets the 'entity.query.field_sql_storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\field_sql_storage\Entity\QueryFactory A Drupal\field_sql_storage\Entity\QueryFactory instance.
     */
    protected function getEntity_Query_FieldSqlStorageService()
    {
        return $this->services['entity.query.field_sql_storage'] = new \Drupal\field_sql_storage\Entity\QueryFactory($this->get('database'));
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher A Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);

        $instance->addSubscriberService('router_processor_subscriber', 'Drupal\\Core\\EventSubscriber\\RouteProcessorSubscriber');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('view_subscriber', 'Drupal\\Core\\EventSubscriber\\ViewSubscriber');
        $instance->addSubscriberService('legacy_access_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyAccessSubscriber');
        $instance->addSubscriberService('access_subscriber', 'Drupal\\Core\\EventSubscriber\\AccessSubscriber');
        $instance->addSubscriberService('maintenance_mode_subscriber', 'Drupal\\Core\\EventSubscriber\\MaintenanceModeSubscriber');
        $instance->addSubscriberService('path_subscriber', 'Drupal\\Core\\EventSubscriber\\PathSubscriber');
        $instance->addSubscriberService('legacy_request_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyRequestSubscriber');
        $instance->addSubscriberService('legacy_controller_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyControllerSubscriber');
        $instance->addSubscriberService('finish_response_subscriber', 'Drupal\\Core\\EventSubscriber\\FinishResponseSubscriber');
        $instance->addSubscriberService('request_close_subscriber', 'Drupal\\Core\\EventSubscriber\\RequestCloseSubscriber');
        $instance->addSubscriberService('config_global_override_subscriber', 'Drupal\\Core\\EventSubscriber\\ConfigGlobalOverrideSubscriber');
        $instance->addSubscriberService('language_request_subscriber', 'Drupal\\Core\\EventSubscriber\\LanguageRequestSubscriber');
        $instance->addSubscriberService('exception_listener', 'Drupal\\Core\\EventSubscriber\\ExceptionListener');
        $instance->addSubscriberService('rdf.mapping', 'Drupal\\rdf\\EventSubscriber\\MappingSubscriber');
        $instance->addSubscriberService('rdf.route_subscriber', 'Drupal\\rdf\\EventSubscriber\\RouteSubscriber');
        $instance->addSubscriberService('router_processor_subscriber', 'Drupal\\Core\\EventSubscriber\\RouteProcessorSubscriber');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('view_subscriber', 'Drupal\\Core\\EventSubscriber\\ViewSubscriber');
        $instance->addSubscriberService('legacy_access_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyAccessSubscriber');
        $instance->addSubscriberService('access_subscriber', 'Drupal\\Core\\EventSubscriber\\AccessSubscriber');
        $instance->addSubscriberService('maintenance_mode_subscriber', 'Drupal\\Core\\EventSubscriber\\MaintenanceModeSubscriber');
        $instance->addSubscriberService('path_subscriber', 'Drupal\\Core\\EventSubscriber\\PathSubscriber');
        $instance->addSubscriberService('legacy_request_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyRequestSubscriber');
        $instance->addSubscriberService('legacy_controller_subscriber', 'Drupal\\Core\\EventSubscriber\\LegacyControllerSubscriber');
        $instance->addSubscriberService('finish_response_subscriber', 'Drupal\\Core\\EventSubscriber\\FinishResponseSubscriber');
        $instance->addSubscriberService('request_close_subscriber', 'Drupal\\Core\\EventSubscriber\\RequestCloseSubscriber');
        $instance->addSubscriberService('config_global_override_subscriber', 'Drupal\\Core\\EventSubscriber\\ConfigGlobalOverrideSubscriber');
        $instance->addSubscriberService('language_request_subscriber', 'Drupal\\Core\\EventSubscriber\\LanguageRequestSubscriber');
        $instance->addSubscriberService('exception_listener', 'Drupal\\Core\\EventSubscriber\\ExceptionListener');
        $instance->addSubscriberService('rdf.mapping', 'Drupal\\rdf\\EventSubscriber\\MappingSubscriber');
        $instance->addSubscriberService('rdf.route_subscriber', 'Drupal\\rdf\\EventSubscriber\\RouteSubscriber');

        return $instance;
    }

    /**
     * Gets the 'exception_controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\ExceptionController A Drupal\Core\ExceptionController instance.
     */
    protected function getExceptionControllerService()
    {
        $this->services['exception_controller'] = $instance = new \Drupal\Core\ExceptionController($this->get('content_negotiation'));

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'exception_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\ExceptionListener A Drupal\Core\EventSubscriber\ExceptionListener instance.
     */
    protected function getExceptionListenerService()
    {
        return $this->services['exception_listener'] = new \Drupal\Core\EventSubscriber\ExceptionListener(array(0 => $this->get('exception_controller'), 1 => 'execute'));
    }

    /**
     * Gets the 'file.usage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\file\FileUsage\DatabaseFileUsageBackend A Drupal\file\FileUsage\DatabaseFileUsageBackend instance.
     */
    protected function getFile_UsageService()
    {
        return $this->services['file.usage'] = new \Drupal\file\FileUsage\DatabaseFileUsageBackend($this->get('database'));
    }

    /**
     * Gets the 'finish_response_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\FinishResponseSubscriber A Drupal\Core\EventSubscriber\FinishResponseSubscriber instance.
     */
    protected function getFinishResponseSubscriberService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('finish_response_subscriber', 'request');
        }

        return $this->services['finish_response_subscriber'] = $this->scopedServices['request']['finish_response_subscriber'] = new \Drupal\Core\EventSubscriber\FinishResponseSubscriber($this->get('language_manager'));
    }

    /**
     * Gets the 'flood' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Flood\DatabaseBackend A Drupal\Core\Flood\DatabaseBackend instance.
     */
    protected function getFloodService()
    {
        return $this->services['flood'] = new \Drupal\Core\Flood\DatabaseBackend($this->get('database'));
    }

    /**
     * Gets the 'http_client_simpletest_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Http\Plugin\SimpletestHttpRequestSubscriber A Drupal\Core\Http\Plugin\SimpletestHttpRequestSubscriber instance.
     */
    protected function getHttpClientSimpletestSubscriberService()
    {
        return $this->services['http_client_simpletest_subscriber'] = new \Drupal\Core\Http\Plugin\SimpletestHttpRequestSubscriber();
    }

    /**
     * Gets the 'http_default_client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Guzzle\Http\Client A Guzzle\Http\Client instance.
     */
    protected function getHttpDefaultClientService()
    {
        $this->services['http_default_client'] = $instance = new \Guzzle\Http\Client(NULL, array('curl.CURLOPT_TIMEOUT' => 30, 'curl.CURLOPT_MAXREDIRS' => 3));

        $instance->addSubscriber($this->get('http_client_simpletest_subscriber'));
        $instance->setUserAgent('Drupal (+http://drupal.org/)');

        return $instance;
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\HttpKernel A Drupal\Core\HttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Drupal\Core\HttpKernel($this->get('event_dispatcher'), $this, $this->get('controller_resolver'));
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'keyvalue' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\KeyValueStore\KeyValueFactory A Drupal\Core\KeyValueStore\KeyValueFactory instance.
     */
    protected function getKeyvalueService()
    {
        return $this->services['keyvalue'] = new \Drupal\Core\KeyValueStore\KeyValueFactory($this);
    }

    /**
     * Gets the 'keyvalue.database' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\KeyValueStore\KeyValueDatabaseFactory A Drupal\Core\KeyValueStore\KeyValueDatabaseFactory instance.
     */
    protected function getKeyvalue_DatabaseService()
    {
        return $this->services['keyvalue.database'] = new \Drupal\Core\KeyValueStore\KeyValueDatabaseFactory($this->get('database'));
    }

    /**
     * Gets the 'language_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Language\LanguageManager A Drupal\Core\Language\LanguageManager instance.
     */
    protected function getLanguageManagerService()
    {
        return $this->services['language_manager'] = new \Drupal\Core\Language\LanguageManager();
    }

    /**
     * Gets the 'language_request_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\LanguageRequestSubscriber A Drupal\Core\EventSubscriber\LanguageRequestSubscriber instance.
     */
    protected function getLanguageRequestSubscriberService()
    {
        return $this->services['language_request_subscriber'] = new \Drupal\Core\EventSubscriber\LanguageRequestSubscriber($this->get('language_manager'));
    }

    /**
     * Gets the 'legacy_access_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\LegacyAccessSubscriber A Drupal\Core\EventSubscriber\LegacyAccessSubscriber instance.
     */
    protected function getLegacyAccessSubscriberService()
    {
        return $this->services['legacy_access_subscriber'] = new \Drupal\Core\EventSubscriber\LegacyAccessSubscriber();
    }

    /**
     * Gets the 'legacy_controller_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\LegacyControllerSubscriber A Drupal\Core\EventSubscriber\LegacyControllerSubscriber instance.
     */
    protected function getLegacyControllerSubscriberService()
    {
        return $this->services['legacy_controller_subscriber'] = new \Drupal\Core\EventSubscriber\LegacyControllerSubscriber();
    }

    /**
     * Gets the 'legacy_generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\NullGenerator A Drupal\Core\Routing\NullGenerator instance.
     */
    protected function getLegacyGeneratorService()
    {
        return $this->services['legacy_generator'] = new \Drupal\Core\Routing\NullGenerator();
    }

    /**
     * Gets the 'legacy_request_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\LegacyRequestSubscriber A Drupal\Core\EventSubscriber\LegacyRequestSubscriber instance.
     */
    protected function getLegacyRequestSubscriberService()
    {
        return $this->services['legacy_request_subscriber'] = new \Drupal\Core\EventSubscriber\LegacyRequestSubscriber();
    }

    /**
     * Gets the 'legacy_router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Cmf\Component\Routing\DynamicRouter A Symfony\Cmf\Component\Routing\DynamicRouter instance.
     */
    protected function getLegacyRouterService()
    {
        return $this->services['legacy_router'] = new \Symfony\Cmf\Component\Routing\DynamicRouter($this->get('router.request_context'), $this->get('legacy_url_matcher'), $this->get('legacy_generator'));
    }

    /**
     * Gets the 'legacy_url_matcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\LegacyUrlMatcher A Drupal\Core\LegacyUrlMatcher instance.
     */
    protected function getLegacyUrlMatcherService()
    {
        return $this->services['legacy_url_matcher'] = new \Drupal\Core\LegacyUrlMatcher();
    }

    /**
     * Gets the 'lock' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Lock\DatabaseLockBackend A Drupal\Core\Lock\DatabaseLockBackend instance.
     */
    protected function getLockService()
    {
        return $this->services['lock'] = new \Drupal\Core\Lock\DatabaseLockBackend();
    }

    /**
     * Gets the 'maintenance_mode_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\MaintenanceModeSubscriber A Drupal\Core\EventSubscriber\MaintenanceModeSubscriber instance.
     */
    protected function getMaintenanceModeSubscriberService()
    {
        return $this->services['maintenance_mode_subscriber'] = new \Drupal\Core\EventSubscriber\MaintenanceModeSubscriber();
    }

    /**
     * Gets the 'mime_type_matcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\MimeTypeMatcher A Drupal\Core\Routing\MimeTypeMatcher instance.
     */
    protected function getMimeTypeMatcherService()
    {
        return $this->services['mime_type_matcher'] = new \Drupal\Core\Routing\MimeTypeMatcher();
    }

    /**
     * Gets the 'module_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Extension\CachedModuleHandler A Drupal\Core\Extension\CachedModuleHandler instance.
     */
    protected function getModuleHandlerService()
    {
        return $this->services['module_handler'] = new \Drupal\Core\Extension\CachedModuleHandler(array('block' => 'core/modules/block/block.module', 'breakpoint' => 'core/modules/breakpoint/breakpoint.module', 'ckeditor' => 'core/modules/ckeditor/ckeditor.module', 'color' => 'core/modules/color/color.module', 'comment' => 'core/modules/comment/comment.module', 'config' => 'core/modules/config/config.module', 'contact' => 'core/modules/contact/contact.module', 'contextual' => 'core/modules/contextual/contextual.module', 'ctools' => 'modules/ctools/ctools.module', 'ctools_custom_content' => 'modules/ctools/ctools_custom_content/ctools_custom_content.module', 'custom_block' => 'core/modules/block/custom_block/custom_block.module', 'dblog' => 'core/modules/dblog/dblog.module', 'edit' => 'core/modules/edit/edit.module', 'editor' => 'core/modules/editor/editor.module', 'entity' => 'core/modules/entity/entity.module', 'field' => 'core/modules/field/field.module', 'field_sql_storage' => 'core/modules/field_sql_storage/field_sql_storage.module', 'field_ui' => 'core/modules/field_ui/field_ui.module', 'file' => 'core/modules/file/file.module', 'filter' => 'core/modules/filter/filter.module', 'help' => 'core/modules/help/help.module', 'history' => 'core/modules/history/history.module', 'image' => 'core/modules/image/image.module', 'menu' => 'core/modules/menu/menu.module', 'menu_link' => 'core/modules/menu_link/menu_link.module', 'node' => 'core/modules/node/node.module', 'number' => 'core/modules/number/number.module', 'options' => 'core/modules/options/options.module', 'overlay' => 'core/modules/overlay/overlay.module', 'page_manager' => 'modules/ctools/page_manager/page_manager.module', 'path' => 'core/modules/path/path.module', 'php' => 'core/modules/php/php.module', 'rdf' => 'core/modules/rdf/rdf.module', 'search' => 'core/modules/search/search.module', 'shortcut' => 'core/modules/shortcut/shortcut.module', 'system' => 'core/modules/system/system.module', 'taxonomy' => 'core/modules/taxonomy/taxonomy.module', 'text' => 'core/modules/text/text.module', 'toolbar' => 'core/modules/toolbar/toolbar.module', 'update' => 'core/modules/update/update.module', 'user' => 'core/modules/user/user.module', 'views_ui' => 'core/modules/views/views_ui/views_ui.module', 'views' => 'core/modules/views/views.module', 'devel' => 'modules/devel/devel.module', 'standard' => 'core/profiles/standard/standard.profile'), $this->get('state'), $this->get('cache.bootstrap'));
    }

    /**
     * Gets the 'paramconverter.entity' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\ParamConverter\EntityConverter A Drupal\Core\ParamConverter\EntityConverter instance.
     */
    protected function getParamconverter_EntityService()
    {
        return $this->services['paramconverter.entity'] = new \Drupal\Core\ParamConverter\EntityConverter($this->get('plugin.manager.entity'));
    }

    /**
     * Gets the 'paramconverter_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\ParamConverter\ParamConverterManager A Drupal\Core\ParamConverter\ParamConverterManager instance.
     */
    protected function getParamconverterManagerService()
    {
        $this->services['paramconverter_manager'] = $instance = new \Drupal\Core\ParamConverter\ParamConverterManager();

        $instance->addConverter($this->get('paramconverter.entity'));

        return $instance;
    }

    /**
     * Gets the 'password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Password\PhpassHashedPassword A Drupal\Core\Password\PhpassHashedPassword instance.
     */
    protected function getPasswordService()
    {
        return $this->services['password'] = new \Drupal\Core\Password\PhpassHashedPassword(16);
    }

    /**
     * Gets the 'path.alias_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Path\AliasManager A Drupal\Core\Path\AliasManager instance.
     */
    protected function getPath_AliasManagerService()
    {
        return $this->services['path.alias_manager'] = new \Drupal\Core\Path\AliasManager($this->get('database'), $this->get('state'), $this->get('language_manager'));
    }

    /**
     * Gets the 'path.alias_manager.cached' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\CacheDecorator\AliasManagerCacheDecorator A Drupal\Core\CacheDecorator\AliasManagerCacheDecorator instance.
     */
    protected function getPath_AliasManager_CachedService()
    {
        return $this->services['path.alias_manager.cached'] = new \Drupal\Core\CacheDecorator\AliasManagerCacheDecorator($this->get('path.alias_manager'), $this->get('cache.path'));
    }

    /**
     * Gets the 'path.crud' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Path\Path A Drupal\Core\Path\Path instance.
     */
    protected function getPath_CrudService()
    {
        return $this->services['path.crud'] = new \Drupal\Core\Path\Path($this->get('database'), $this->get('path.alias_manager'));
    }

    /**
     * Gets the 'path_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\PathSubscriber A Drupal\Core\EventSubscriber\PathSubscriber instance.
     */
    protected function getPathSubscriberService()
    {
        return $this->services['path_subscriber'] = new \Drupal\Core\EventSubscriber\PathSubscriber($this->get('path.alias_manager.cached'));
    }

    /**
     * Gets the 'plugin.manager.block' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\block\Plugin\Type\BlockManager A Drupal\block\Plugin\Type\BlockManager instance.
     */
    protected function getPlugin_Manager_BlockService()
    {
        return $this->services['plugin.manager.block'] = new \Drupal\block\Plugin\Type\BlockManager();
    }

    /**
     * Gets the 'plugin.manager.ckeditor.plugin' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\ckeditor\CKEditorPluginManager A Drupal\ckeditor\CKEditorPluginManager instance.
     */
    protected function getPlugin_Manager_Ckeditor_PluginService()
    {
        return $this->services['plugin.manager.ckeditor.plugin'] = new \Drupal\ckeditor\CKEditorPluginManager();
    }

    /**
     * Gets the 'plugin.manager.edit.editor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\edit\Plugin\EditorManager A Drupal\edit\Plugin\EditorManager instance.
     */
    protected function getPlugin_Manager_Edit_EditorService()
    {
        return $this->services['plugin.manager.edit.editor'] = new \Drupal\edit\Plugin\EditorManager();
    }

    /**
     * Gets the 'plugin.manager.editor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\editor\Plugin\EditorManager A Drupal\editor\Plugin\EditorManager instance.
     */
    protected function getPlugin_Manager_EditorService()
    {
        return $this->services['plugin.manager.editor'] = new \Drupal\editor\Plugin\EditorManager();
    }

    /**
     * Gets the 'plugin.manager.entity' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Entity\EntityManager A Drupal\Core\Entity\EntityManager instance.
     */
    protected function getPlugin_Manager_EntityService()
    {
        return $this->services['plugin.manager.entity'] = new \Drupal\Core\Entity\EntityManager();
    }

    /**
     * Gets the 'plugin.manager.field.formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\field\Plugin\Type\Formatter\FormatterPluginManager A Drupal\field\Plugin\Type\Formatter\FormatterPluginManager instance.
     */
    protected function getPlugin_Manager_Field_FormatterService()
    {
        return $this->services['plugin.manager.field.formatter'] = new \Drupal\field\Plugin\Type\Formatter\FormatterPluginManager();
    }

    /**
     * Gets the 'plugin.manager.field.widget' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\field\Plugin\Type\Widget\WidgetPluginManager A Drupal\field\Plugin\Type\Widget\WidgetPluginManager instance.
     */
    protected function getPlugin_Manager_Field_WidgetService()
    {
        return $this->services['plugin.manager.field.widget'] = new \Drupal\field\Plugin\Type\Widget\WidgetPluginManager();
    }

    /**
     * Gets the 'plugin.manager.system.plugin_ui' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\system\Plugin\Type\PluginUIManager A Drupal\system\Plugin\Type\PluginUIManager instance.
     */
    protected function getPlugin_Manager_System_PluginUiService()
    {
        return $this->services['plugin.manager.system.plugin_ui'] = new \Drupal\system\Plugin\Type\PluginUIManager();
    }

    /**
     * Gets the 'plugin.manager.views.access' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_AccessService()
    {
        return $this->services['plugin.manager.views.access'] = new \Drupal\views\Plugin\ViewsPluginManager('access');
    }

    /**
     * Gets the 'plugin.manager.views.area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_AreaService()
    {
        return $this->services['plugin.manager.views.area'] = new \Drupal\views\Plugin\ViewsPluginManager('area');
    }

    /**
     * Gets the 'plugin.manager.views.argument' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_ArgumentService()
    {
        return $this->services['plugin.manager.views.argument'] = new \Drupal\views\Plugin\ViewsPluginManager('argument');
    }

    /**
     * Gets the 'plugin.manager.views.argument_default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_ArgumentDefaultService()
    {
        return $this->services['plugin.manager.views.argument_default'] = new \Drupal\views\Plugin\ViewsPluginManager('argument_default');
    }

    /**
     * Gets the 'plugin.manager.views.argument_validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_ArgumentValidatorService()
    {
        return $this->services['plugin.manager.views.argument_validator'] = new \Drupal\views\Plugin\ViewsPluginManager('argument_validator');
    }

    /**
     * Gets the 'plugin.manager.views.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_CacheService()
    {
        return $this->services['plugin.manager.views.cache'] = new \Drupal\views\Plugin\ViewsPluginManager('cache');
    }

    /**
     * Gets the 'plugin.manager.views.display' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_DisplayService()
    {
        return $this->services['plugin.manager.views.display'] = new \Drupal\views\Plugin\ViewsPluginManager('display');
    }

    /**
     * Gets the 'plugin.manager.views.display_extender' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_DisplayExtenderService()
    {
        return $this->services['plugin.manager.views.display_extender'] = new \Drupal\views\Plugin\ViewsPluginManager('display_extender');
    }

    /**
     * Gets the 'plugin.manager.views.exposed_form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_ExposedFormService()
    {
        return $this->services['plugin.manager.views.exposed_form'] = new \Drupal\views\Plugin\ViewsPluginManager('exposed_form');
    }

    /**
     * Gets the 'plugin.manager.views.field' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_FieldService()
    {
        return $this->services['plugin.manager.views.field'] = new \Drupal\views\Plugin\ViewsPluginManager('field');
    }

    /**
     * Gets the 'plugin.manager.views.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_FilterService()
    {
        return $this->services['plugin.manager.views.filter'] = new \Drupal\views\Plugin\ViewsPluginManager('filter');
    }

    /**
     * Gets the 'plugin.manager.views.join' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_JoinService()
    {
        return $this->services['plugin.manager.views.join'] = new \Drupal\views\Plugin\ViewsPluginManager('join');
    }

    /**
     * Gets the 'plugin.manager.views.pager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_PagerService()
    {
        return $this->services['plugin.manager.views.pager'] = new \Drupal\views\Plugin\ViewsPluginManager('pager');
    }

    /**
     * Gets the 'plugin.manager.views.query' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_QueryService()
    {
        return $this->services['plugin.manager.views.query'] = new \Drupal\views\Plugin\ViewsPluginManager('query');
    }

    /**
     * Gets the 'plugin.manager.views.relationship' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_RelationshipService()
    {
        return $this->services['plugin.manager.views.relationship'] = new \Drupal\views\Plugin\ViewsPluginManager('relationship');
    }

    /**
     * Gets the 'plugin.manager.views.row' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_RowService()
    {
        return $this->services['plugin.manager.views.row'] = new \Drupal\views\Plugin\ViewsPluginManager('row');
    }

    /**
     * Gets the 'plugin.manager.views.sort' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_SortService()
    {
        return $this->services['plugin.manager.views.sort'] = new \Drupal\views\Plugin\ViewsPluginManager('sort');
    }

    /**
     * Gets the 'plugin.manager.views.style' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_StyleService()
    {
        return $this->services['plugin.manager.views.style'] = new \Drupal\views\Plugin\ViewsPluginManager('style');
    }

    /**
     * Gets the 'plugin.manager.views.wizard' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\Plugin\ViewsPluginManager A Drupal\views\Plugin\ViewsPluginManager instance.
     */
    protected function getPlugin_Manager_Views_WizardService()
    {
        return $this->services['plugin.manager.views.wizard'] = new \Drupal\views\Plugin\ViewsPluginManager('wizard');
    }

    /**
     * Gets the 'queue' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Queue\QueueFactory A Drupal\Core\Queue\QueueFactory instance.
     */
    protected function getQueueService()
    {
        $this->services['queue'] = $instance = new \Drupal\Core\Queue\QueueFactory($this->get('settings'));

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'queue.database' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Queue\QueueDatabaseFactory A Drupal\Core\Queue\QueueDatabaseFactory instance.
     */
    protected function getQueue_DatabaseService()
    {
        return $this->services['queue.database'] = new \Drupal\Core\Queue\QueueDatabaseFactory($this->get('database'));
    }

    /**
     * Gets the 'rdf.mapping' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\rdf\EventSubscriber\MappingSubscriber A Drupal\rdf\EventSubscriber\MappingSubscriber instance.
     */
    protected function getRdf_MappingService()
    {
        return $this->services['rdf.mapping'] = new \Drupal\rdf\EventSubscriber\MappingSubscriber();
    }

    /**
     * Gets the 'rdf.mapping_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\rdf\RdfMappingManager A Drupal\rdf\RdfMappingManager instance.
     */
    protected function getRdf_MappingManagerService()
    {
        return $this->services['rdf.mapping_manager'] = new \Drupal\rdf\RdfMappingManager($this->get('event_dispatcher'), $this->get('rdf.site_schema_manager'));
    }

    /**
     * Gets the 'rdf.route_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\rdf\EventSubscriber\RouteSubscriber A Drupal\rdf\EventSubscriber\RouteSubscriber instance.
     */
    protected function getRdf_RouteSubscriberService()
    {
        return $this->services['rdf.route_subscriber'] = new \Drupal\rdf\EventSubscriber\RouteSubscriber($this->get('rdf.site_schema_manager'));
    }

    /**
     * Gets the 'rdf.site_schema_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\rdf\SiteSchema\SiteSchemaManager A Drupal\rdf\SiteSchema\SiteSchemaManager instance.
     */
    protected function getRdf_SiteSchemaManagerService()
    {
        return $this->services['rdf.site_schema_manager'] = new \Drupal\rdf\SiteSchema\SiteSchemaManager($this->get('cache.rdf.site_schema.types'));
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpFoundation\Request A Symfony\Component\HttpFoundation\Request instance.
     */
    protected function getRequestService()
    {
        return $this->services['request'] = new \Symfony\Component\HttpFoundation\Request();
    }

    /**
     * Gets the 'request_close_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\RequestCloseSubscriber A Drupal\Core\EventSubscriber\RequestCloseSubscriber instance.
     */
    protected function getRequestCloseSubscriberService()
    {
        return $this->services['request_close_subscriber'] = new \Drupal\Core\EventSubscriber\RequestCloseSubscriber($this->get('module_handler'));
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Cmf\Component\Routing\ChainRouter A Symfony\Cmf\Component\Routing\ChainRouter instance.
     */
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \Symfony\Cmf\Component\Routing\ChainRouter();

        $instance->setContext($this->get('router.request_context'));
        $instance->add($this->get('router.dynamic'));
        $instance->add($this->get('legacy_router'));

        return $instance;
    }

    /**
     * Gets the 'router.builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\RouteBuilder A Drupal\Core\Routing\RouteBuilder instance.
     */
    protected function getRouter_BuilderService()
    {
        return $this->services['router.builder'] = new \Drupal\Core\Routing\RouteBuilder($this->get('router.dumper'), $this->get('lock'), $this->get('event_dispatcher'), $this->get('module_handler'));
    }

    /**
     * Gets the 'router.dumper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\MatcherDumper A Drupal\Core\Routing\MatcherDumper instance.
     */
    protected function getRouter_DumperService()
    {
        return $this->services['router.dumper'] = new \Drupal\Core\Routing\MatcherDumper($this->get('database'));
    }

    /**
     * Gets the 'router.dynamic' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Cmf\Component\Routing\DynamicRouter A Symfony\Cmf\Component\Routing\DynamicRouter instance.
     */
    protected function getRouter_DynamicService()
    {
        $this->services['router.dynamic'] = $instance = new \Symfony\Cmf\Component\Routing\DynamicRouter($this->get('router.request_context'), $this->get('router.matcher'), $this->get('router.generator'));

        $instance->addRouteEnhancer($this->get('paramconverter_manager'), 0);

        return $instance;
    }

    /**
     * Gets the 'router.generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\UrlGenerator A Drupal\Core\Routing\UrlGenerator instance.
     */
    protected function getRouter_GeneratorService()
    {
        return $this->services['router.generator'] = new \Drupal\Core\Routing\UrlGenerator($this->get('router.route_provider'), $this->get('path.alias_manager.cached'));
    }

    /**
     * Gets the 'router.matcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Cmf\Component\Routing\NestedMatcher\NestedMatcher A Symfony\Cmf\Component\Routing\NestedMatcher\NestedMatcher instance.
     */
    protected function getRouter_MatcherService()
    {
        $this->services['router.matcher'] = $instance = new \Symfony\Cmf\Component\Routing\NestedMatcher\NestedMatcher($this->get('router.route_provider'));

        $instance->setFinalMatcher($this->get('router.matcher.final_matcher'));
        $instance->addRouteFilter($this->get('mime_type_matcher'));

        return $instance;
    }

    /**
     * Gets the 'router.matcher.final_matcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\UrlMatcher A Drupal\Core\Routing\UrlMatcher instance.
     */
    protected function getRouter_Matcher_FinalMatcherService()
    {
        return $this->services['router.matcher.final_matcher'] = new \Drupal\Core\Routing\UrlMatcher();
    }

    /**
     * Gets the 'router.request_context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\Routing\RequestContext A Symfony\Component\Routing\RequestContext instance.
     */
    protected function getRouter_RequestContextService()
    {
        $this->services['router.request_context'] = $instance = new \Symfony\Component\Routing\RequestContext();

        $instance->fromRequest($this->get('request'));

        return $instance;
    }

    /**
     * Gets the 'router.route_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Routing\RouteProvider A Drupal\Core\Routing\RouteProvider instance.
     */
    protected function getRouter_RouteProviderService()
    {
        return $this->services['router.route_provider'] = new \Drupal\Core\Routing\RouteProvider($this->get('database'));
    }

    /**
     * Gets the 'router_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Component\HttpKernel\EventListener\RouterListener A Symfony\Component\HttpKernel\EventListener\RouterListener instance.
     */
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'));
    }

    /**
     * Gets the 'router_processor_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\RouteProcessorSubscriber A Drupal\Core\EventSubscriber\RouteProcessorSubscriber instance.
     */
    protected function getRouterProcessorSubscriberService()
    {
        return $this->services['router_processor_subscriber'] = new \Drupal\Core\EventSubscriber\RouteProcessorSubscriber($this->get('content_negotiation'));
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'settings' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Component\Utility\Settings A Drupal\Component\Utility\Settings instance.
     */
    protected function getSettingsService()
    {
        return $this->services['settings'] = call_user_func(array('Drupal\\Component\\Utility\\Settings', 'getSingleton'));
    }

    /**
     * Gets the 'state' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\KeyValueStore\KeyValueStoreInterface A Drupal\Core\KeyValueStore\KeyValueStoreInterface instance.
     */
    protected function getStateService()
    {
        return $this->services['state'] = $this->get('keyvalue')->get('state');
    }

    /**
     * Gets the 'transliteration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Transliteration\PHPTransliteration A Drupal\Core\Transliteration\PHPTransliteration instance.
     */
    protected function getTransliterationService()
    {
        return $this->services['transliteration'] = new \Drupal\Core\Transliteration\PHPTransliteration();
    }

    /**
     * Gets the 'twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Template\TwigEnvironment A Drupal\Core\Template\TwigEnvironment instance.
     */
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Drupal\Core\Template\TwigEnvironment($this->get('twig.loader.filesystem'), array('cache' => true, 'base_template_class' => 'Drupal\\Core\\Template\\TwigTemplate', 'autoescape' => false, 'strict_variables' => false, 'debug' => false, 'auto_reload' => NULL));

        $instance->addExtension(new \Drupal\Core\Template\TwigExtension());
        $instance->addExtension(new \Twig_Extension_Debug());

        return $instance;
    }

    /**
     * Gets the 'twig.loader.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Twig_Loader_Filesystem A Twig_Loader_Filesystem instance.
     */
    protected function getTwig_Loader_FilesystemService()
    {
        return $this->services['twig.loader.filesystem'] = new \Twig_Loader_Filesystem('C:\\work_space\\Sites\\eight');
    }

    /**
     * Gets the 'typed_data' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\TypedData\TypedDataManager A Drupal\Core\TypedData\TypedDataManager instance.
     */
    protected function getTypedDataService()
    {
        $this->services['typed_data'] = $instance = new \Drupal\Core\TypedData\TypedDataManager();

        $instance->setValidationConstraintManager($this->get('validation.constraint'));

        return $instance;
    }

    /**
     * Gets the 'user.autocomplete' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\user\UserAutocomplete A Drupal\user\UserAutocomplete instance.
     */
    protected function getUser_AutocompleteService()
    {
        return $this->services['user.autocomplete'] = new \Drupal\user\UserAutocomplete($this->get('database'), $this->get('config.factory'));
    }

    /**
     * Gets the 'user.autocomplete_controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\user\UserAutocompleteController A Drupal\user\UserAutocompleteController instance.
     */
    protected function getUser_AutocompleteControllerService()
    {
        return $this->services['user.autocomplete_controller'] = new \Drupal\user\UserAutocompleteController($this->get('user.autocomplete'));
    }

    /**
     * Gets the 'user.data' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\user\UserData A Drupal\user\UserData instance.
     */
    protected function getUser_DataService()
    {
        return $this->services['user.data'] = new \Drupal\user\UserData($this->get('database'));
    }

    /**
     * Gets the 'user.tempstore' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\user\TempStoreFactory A Drupal\user\TempStoreFactory instance.
     */
    protected function getUser_TempstoreService()
    {
        return $this->services['user.tempstore'] = new \Drupal\user\TempStoreFactory($this->get('database'), $this->get('lock'));
    }

    /**
     * Gets the 'validation.constraint' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\Validation\ConstraintManager A Drupal\Core\Validation\ConstraintManager instance.
     */
    protected function getValidation_ConstraintService()
    {
        return $this->services['validation.constraint'] = new \Drupal\Core\Validation\ConstraintManager();
    }

    /**
     * Gets the 'view_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\Core\EventSubscriber\ViewSubscriber A Drupal\Core\EventSubscriber\ViewSubscriber instance.
     */
    protected function getViewSubscriberService()
    {
        return $this->services['view_subscriber'] = new \Drupal\Core\EventSubscriber\ViewSubscriber($this->get('content_negotiation'));
    }

    /**
     * Gets the 'views.executable' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\ViewExecutableFactory A Drupal\views\ViewExecutableFactory instance.
     */
    protected function getViews_ExecutableService()
    {
        return $this->services['views.executable'] = new \Drupal\views\ViewExecutableFactory();
    }

    /**
     * Gets the 'views.views_data' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views\ViewsDataCache A Drupal\views\ViewsDataCache instance.
     */
    protected function getViews_ViewsDataService()
    {
        return $this->services['views.views_data'] = new \Drupal\views\ViewsDataCache($this->get('cache.views_info'), $this->get('config.factory'));
    }

    /**
     * Gets the 'views_ui.controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Drupal\views_ui\Routing\ViewsUIController A Drupal\views_ui\Routing\ViewsUIController instance.
     */
    protected function getViewsUi_ControllerService()
    {
        return $this->services['views_ui.controller'] = new \Drupal\views_ui\Routing\ViewsUIController($this->get('plugin.manager.entity'), $this->get('views.views_data'), $this->get('user.tempstore'));
    }

    /**
     * Gets the twig.loader service alias.
     *
     * @return Twig_Loader_Filesystem An instance of the twig.loader.filesystem service
     */
    protected function getTwig_LoaderService()
    {
        return $this->get('twig.loader.filesystem');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!array_key_exists($name, $this->parameters)) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        return array_key_exists(strtolower($name), $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritDoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }
    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => 'C:/work_space/Sites/eight/core/lib/Drupal/Core',
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'Core',
            'kernel.cache_dir' => 'C:/work_space/Sites/eight/core/lib/Drupal/Core/cache/prod',
            'kernel.logs_dir' => 'C:/work_space/Sites/eight/core/lib/Drupal/Core/logs',
            'kernel.bundles' => array(
                'CoreBundle' => 'Drupal\\Core\\CoreBundle',
                'BlockBundle' => 'Drupal\\Block\\BlockBundle',
                'CKEditorBundle' => 'Drupal\\ckeditor\\CKEditorBundle',
                'EditBundle' => 'Drupal\\edit\\EditBundle',
                'EditorBundle' => 'Drupal\\editor\\EditorBundle',
                'FieldBundle' => 'Drupal\\field\\FieldBundle',
                'FieldSqlStorageBundle' => 'Drupal\\field_sql_storage\\FieldSqlStorageBundle',
                'FileBundle' => 'Drupal\\file\\FileBundle',
                'RdfBundle' => 'Drupal\\rdf\\RdfBundle',
                'SystemBundle' => 'Drupal\\system\\SystemBundle',
                'UserBundle' => 'Drupal\\user\\UserBundle',
                'ViewsUiBundle' => 'Drupal\\views_ui\\ViewsUiBundle',
                'ViewsBundle' => 'Drupal\\views\\ViewsBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'CoreProdProjectContainer',
            'container.bundles' => array(
                0 => 'Drupal\\Core\\CoreBundle',
                1 => 'Drupal\\block\\BlockBundle',
                2 => 'Drupal\\ckeditor\\CkeditorBundle',
                3 => 'Drupal\\edit\\EditBundle',
                4 => 'Drupal\\editor\\EditorBundle',
                5 => 'Drupal\\field\\FieldBundle',
                6 => 'Drupal\\field_sql_storage\\FieldSqlStorageBundle',
                7 => 'Drupal\\file\\FileBundle',
                8 => 'Drupal\\rdf\\RdfBundle',
                9 => 'Drupal\\system\\SystemBundle',
                10 => 'Drupal\\user\\UserBundle',
                11 => 'Drupal\\views_ui\\ViewsUiBundle',
                12 => 'Drupal\\views\\ViewsBundle',
            ),
            'container.modules' => array(
                'block' => 'core/modules/block/block.module',
                'breakpoint' => 'core/modules/breakpoint/breakpoint.module',
                'ckeditor' => 'core/modules/ckeditor/ckeditor.module',
                'color' => 'core/modules/color/color.module',
                'comment' => 'core/modules/comment/comment.module',
                'config' => 'core/modules/config/config.module',
                'contact' => 'core/modules/contact/contact.module',
                'contextual' => 'core/modules/contextual/contextual.module',
                'ctools' => 'modules/ctools/ctools.module',
                'ctools_custom_content' => 'modules/ctools/ctools_custom_content/ctools_custom_content.module',
                'custom_block' => 'core/modules/block/custom_block/custom_block.module',
                'dblog' => 'core/modules/dblog/dblog.module',
                'edit' => 'core/modules/edit/edit.module',
                'editor' => 'core/modules/editor/editor.module',
                'entity' => 'core/modules/entity/entity.module',
                'field' => 'core/modules/field/field.module',
                'field_sql_storage' => 'core/modules/field_sql_storage/field_sql_storage.module',
                'field_ui' => 'core/modules/field_ui/field_ui.module',
                'file' => 'core/modules/file/file.module',
                'filter' => 'core/modules/filter/filter.module',
                'help' => 'core/modules/help/help.module',
                'history' => 'core/modules/history/history.module',
                'image' => 'core/modules/image/image.module',
                'menu' => 'core/modules/menu/menu.module',
                'menu_link' => 'core/modules/menu_link/menu_link.module',
                'node' => 'core/modules/node/node.module',
                'number' => 'core/modules/number/number.module',
                'options' => 'core/modules/options/options.module',
                'overlay' => 'core/modules/overlay/overlay.module',
                'page_manager' => 'modules/ctools/page_manager/page_manager.module',
                'path' => 'core/modules/path/path.module',
                'php' => 'core/modules/php/php.module',
                'rdf' => 'core/modules/rdf/rdf.module',
                'search' => 'core/modules/search/search.module',
                'shortcut' => 'core/modules/shortcut/shortcut.module',
                'system' => 'core/modules/system/system.module',
                'taxonomy' => 'core/modules/taxonomy/taxonomy.module',
                'text' => 'core/modules/text/text.module',
                'toolbar' => 'core/modules/toolbar/toolbar.module',
                'update' => 'core/modules/update/update.module',
                'user' => 'core/modules/user/user.module',
                'views_ui' => 'core/modules/views/views_ui/views_ui.module',
                'views' => 'core/modules/views/views.module',
                'devel' => 'modules/devel/devel.module',
                'standard' => 'core/profiles/standard/standard.profile',
            ),
            'persistids' => array(
                0 => 'config.factory',
            ),
        );
    }
}
