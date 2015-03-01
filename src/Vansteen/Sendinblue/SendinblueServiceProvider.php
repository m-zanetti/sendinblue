<?php namespace Vansteen\Sendinblue;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use SendinBlue\Mailin;

class SendinblueServiceProvider extends ServiceProvider {

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
		$this->package('vansteen/sendinblue');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('sendinblue_wrapper', function() {
			$ml = new Mailin('https://api.sendinblue.com/v2.0', Config::get('sendinblue::apikey'));
			return new SendinblueWrapper($ml);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('sendinblue_wrapper');
	}

}
