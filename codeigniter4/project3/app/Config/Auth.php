<?php

namespace Config;

use Myth\Auth\Config\Auth as AuthConfig;

class Auth extends AuthConfig
{
	/**
	 * Nonaktifkan aktivasi email saat registrasi.
	 */
	public $requireActivation = null;

	/**
	 * Gunakan layout utama MyBlog untuk halaman auth.
	 */
	public $viewLayout = 'layouts/main';
}