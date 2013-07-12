<?php namespace AdamWathan\MetaMarkdown;

use Illuminate\Support\ServiceProvider;

class MetaMarkdownServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['metamarkdown'] = $this->app->share(function($app){
			return new MetaMarkdown;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('metamarkdown');
	}

}