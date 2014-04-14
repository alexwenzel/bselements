<?php namespace Alexwenzel\Bselements;

use Illuminate\Support\ServiceProvider;

/**
 * Bootstrap Elements: Service Provider
 *
 * @author 	alexwenzel 	<alexander.wenzel.berlin@gmail.com>
 * @license GPL 2 		<http://www.gnu.de/documents/gpl-2.0.de.html>
 */
class BselementsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('alexwenzel/bselements', 'bselements');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['formelements'] = $this->app->share(function($app)
		{
			return new FormElements;
		});

		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('BsForm', 'Alexwenzel\Bselements\Facades\FormElements');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('formelements');
	}

}
