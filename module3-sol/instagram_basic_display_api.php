<?php
	require_once( 'defines.php' );

	Class instagram_basic_display_api {
		private $_appId = INSTAGRAM_APP_ID;
		private $_appSecret = INSTAGRAM_APP_SECRET;
		private $_redirectUrl = INSTAGRAM_APP_REDIRECT_URI;
		private $_getCode = '';

		function __construct( $params ) {
			// save instagram code
			$this->_getCode = $params['get_code'];

			// get an access token
			//$this->_setUserInstagramAccessToken( $params );

			// get authorization url
			$this->_setAuthorizationUrl();
		}

		private function _setAuthorizationUrl() {
			$getVars = array( 
				'app_id' => $this->_appId,
				'redirect_uri' => $this->_redirectUrl,
				'scope' => 'user_profile,user_media',
				'response_type' => 'code'
			);

			// create url
			$this->authorizationUrl = $this->_apiBaseUrl . 'oauth/authorize?' . http_build_query( $getVars );
		}
