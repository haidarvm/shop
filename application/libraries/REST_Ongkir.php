<?php
/**
 * CodeIgniter REST Class
 *
 * Mske REST requests to RESTful services with simple syntax.
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Philip Sturgeon
 * @created			04/06/2009
 * @license         http://philsturgeon.co.uk/code/dbad-license
 * @link			http://github.com/philsturgeon/codeigniter-restclient
 * 
 * @version			2 - Modified by Kemas Dimas R.
 */

class Curl_Ongkir
{
    private $response;          // Contains the cURL response for debug

    private $session;           // Contains the cURL handler for a session
    private $url;               // URL of the session
    private $options = array(); // Populates curl_setopt_array
    private $headers = array(); // Populates extra HTTP headers

    public $error_code;         // Error code returned as an int
    public $error_string;       // Error message returned as a string
    public $info;               // Returned after request (elapsed time, etc)

    function __construct($url = '')
    {
        if ( ! $this->is_enabled())
		{
			echo 'cURL not enabled.';
		}

		$url AND $this->create($url);
    }


    function __call($method, $arguments)
    {
    	if (in_array($method, array('simple_get', 'simple_post', 'simple_put', 'simple_delete')))
    	{
    		// Take off the "simple_" and past get/post/put/delete to _simple_call
    		$verb = str_replace('simple_', '', $method);
    		array_unshift($arguments, $verb);
    		return call_user_func_array(array($this, '_simple_call'), $arguments);
    	}
    }

    /* =================================================================================
     * SIMPLE METHODS
     * Using these methods you can make a quick and easy cURL call with one line.
     * ================================================================================= */

    // Return a get request results
    public function _simple_call($method, $url, $params = array(), $options = array())
    {
        // If a URL is provided, create new session
        $this->create($url);

		$this->{$method}($params, $options);

        // Add in the specific options provided
        $this->options($options);

        return $this->execute();
    }

    public function simple_ftp_get($url, $file_path, $username = '', $password = '')
    {
        // If there is no ftp:// or any protocol entered, add ftp://
        if ( ! preg_match('!^(ftp|sftp)://! i', $url))
		{
            $url = 'ftp://'.$url;
        }

        // Use an FTP login
        if ($username != '')
        {
            $auth_string = $username;

            if ($password != '')
            {
            	$auth_string .= ':'.$password;
            }

            // Add the user auth string after the protocol
            $url = str_replace('://', '://'.$auth_string.'@', $url);
        }

        // Add the filepath
        $url .= $file_path;

        $this->option(CURLOPT_BINARYTRANSFER, TRUE);
        $this->option(CURLOPT_VERBOSE, TRUE);

        return $this->execute();
    }

    /* =================================================================================
     * ADVANCED METHODS
     * Use these methods to build up more complex queries
     * ================================================================================= */

    public function post($params = array(), $options = array())
	{
        // If its an array (instead of a query string) then format it correctly
        if (is_array($params))
		{
            $params = http_build_query($params, NULL, '&');
        }

        // Add in the specific options provided
        $this->options($options);

        $this->http_method('post');

        $this->option(CURLOPT_POST, TRUE);
        $this->option(CURLOPT_POSTFIELDS, $params);
    }

    public function put($params = array(), $options = array())
    {
        // If its an array (instead of a query string) then format it correctly
        if (is_array($params))
        {
            $params = http_build_query($params, NULL, '&');
        }

        // Add in the specific options provided
        $this->options($options);

        $this->http_method('put');
        $this->option(CURLOPT_POSTFIELDS, $params);

        // Override method, I think this overrides $_POST with PUT data but... we'll see eh?
        $this->option(CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT'));
    }

    public function delete($params, $options = array())
    {
        // If its an array (instead of a query string) then format it correctly
        if (is_array($params))
        {
            $params = http_build_query($params, NULL, '&');
        }

        // Add in the specific options provided
        $this->options($options);

        $this->http_method('delete');

        $this->option(CURLOPT_POSTFIELDS, $params);
    }

    public function set_cookies($params = array())
    {
        if (is_array($params))
        {
            $params = http_build_query($params, NULL, '&');
        }

        $this->option(CURLOPT_COOKIE, $params);
        return $this;
    }

    public function http_header($header, $content = NULL)
    {
		$this->headers[] = $content ? $header.': '.$content : $header;
    }

    public function http_method($method)
    {
    	$this->options[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
        return $this;
    }

    public function http_login($username = '', $password = '', $type = 'any')
    {
		$this->option(CURLOPT_HTTPAUTH, constant('CURLAUTH_'.strtoupper($type) ));
        $this->option(CURLOPT_USERPWD, $username.':'.$password);
        return $this;
    }

    public function proxy($url = '', $port = 80)
    {
        $this->option(CURLOPT_HTTPPROXYTUNNEL, TRUE);
        $this->option(CURLOPT_PROXY, $url.':'. $port);
        return $this;
    }

    public function proxy_login($username = '', $password = '')
    {
        $this->option(CURLOPT_PROXYUSERPWD, $username.':'.$password);
        return $this;
    }

    public function ssl( $verify_peer = TRUE, $verify_host = 2, $path_to_cert = NULL) {
        if ($verify_peer)
        {
            $this->option(CURLOPT_SSL_VERIFYPEER, TRUE);
            $this->option(CURLOPT_SSL_VERIFYHOST, $verify_host);
            $this->option(CURLOPT_CAINFO, $path_to_cert);
        }
        else
        {
            $this->option(CURLOPT_SSL_VERIFYPEER, FALSE);
        }
        return $this;
    }


    public function options($options = array())
    {
        // Merge options in with the rest - done as array_merge() does not overwrite numeric keys
        foreach($options as $option_code => $option_value)
        {
            $this->option($option_code, $option_value);
        }

        // Set all options provided
        curl_setopt_array($this->session, $this->options);

        return $this;
    }

    public function option($code, $value)
    {
    	if (is_string($code) && !is_numeric($code))
    	{
    		$code = constant('CURLOPT_' . strtoupper($code));
    	}

    	$this->options[$code] = $value;
        return $this;
    }

    // Start a session from a URL
    public function create($url)
    {
        // Reset the class
        $this->set_defaults();

        // If no a protocol in URL, assume its a CI link
        if ( ! preg_match('!^\w+://! i', $url))
        {
            $this->load->helper('url');
            $url = site_url($url);
        }

        $this->url = $url;
        $this->session = curl_init($this->url);

        return $this;
    }

    // End a session and return the results
    public function execute()
    {
        // Set two default options, and merge any extra ones in
        if (!isset($this->options[CURLOPT_TIMEOUT]))           $this->options[CURLOPT_TIMEOUT] = 30;
        if (!isset($this->options[CURLOPT_RETURNTRANSFER]))    $this->options[CURLOPT_RETURNTRANSFER] = TRUE;
        if (!isset($this->options[CURLOPT_FAILONERROR]))       $this->options[CURLOPT_FAILONERROR] = TRUE;

		// Only set follow location if not running securely
		if ( ! ini_get('safe_mode') && ! ini_get('open_basedir'))
		{
			// Ok, follow location is not set already so lets set it to true
			if (!isset($this->options[CURLOPT_FOLLOWLOCATION]))
			{
				$this->options[CURLOPT_FOLLOWLOCATION] = TRUE;
			}
        }

		if ( ! empty($this->headers))
		{
			$this->option(CURLOPT_HTTPHEADER, $this->headers);
		}

        $this->options();

        // Execute the request & and hide all output
        $this->response = curl_exec($this->session);

        // Request failed
        if ($this->response === FALSE)
        {
            $this->error_code = curl_errno($this->session);
            $this->error_string = curl_error($this->session);

            curl_close($this->session);
            $this->session = NULL;
            return FALSE;
        }

        // Request successful
        else
        {
            $this->info = curl_getinfo($this->session);

            curl_close($this->session);
            $this->session = NULL;
            return $this->response;
        }
    }

    public function is_enabled()
    {
		return function_exists('curl_init');
    }

    public function debug()
    {
        echo "=============================================<br/>\n";
        echo "<h2>CURL Test</h2>\n";
        echo "=============================================<br/>\n";
        echo "<h3>response</h3>\n";
        echo "<code>".nl2br(htmlentities($this->response))."</code><br/>\n\n";

        if ($this->error_string)
        {
    	    echo "=============================================<br/>\n";
    	    echo "<h3>Errors</h3>";
    	    echo "<strong>Code:</strong> ".$this->error_code."<br/>\n";
    	    echo "<strong>Message:</strong> ".$this->error_string."<br/>\n";
        }

        echo "=============================================<br/>\n";
        echo "<h3>Info</h3>";
        echo "<pre>";
        print_r($this->info);
        echo "</pre>";
	}

	public function debug_request()
	{
		return array(
			'url' => $this->url
		);
	}

    private function set_defaults()
    {
        $this->response = '';
        $this->info = array();
        $this->options = array();
        $this->error_code = 0;
        $this->error_string = '';
    }
}
// END Curl Class

class REST_Ongkir
{
    private $rest_server;

    private $supported_formats = array(
		'xml' 				=> 'application/xml',
		'json' 				=> 'application/json'
	);

    private $auto_detect_formats = array(
		'application/xml' 	=> 'xml',
		'text/xml' 			=> 'xml',
		'application/json' 	=> 'json',
		'text/json' 		=> 'json'
	);
	
	private $curl;
	private $format;
	private $mime_type;

    private $response_string;

    function __construct($config = array())
    {
    	
    	$this->curl = new Curl_Ongkir();
		// If a URL was passed to the library
		if(!empty($config))
		{
			$this->initialize($config);
		}
    }

    public function initialize($config)
    {
		$this->rest_server = @$config['server'];

		if(substr($this->rest_server, -1, 1) != '/')
		{
			$this->rest_server .= '/';
		}

		$this->http_auth = isset($config['http_auth']) ? $config['http_auth'] : '';
		$this->http_user = isset($config['http_user']) ? $config['http_user'] : '';
		$this->http_pass = isset($config['http_pass']) ? $config['http_pass'] : '';
    }


    public function get($uri, $params = array(), $format = NULL)
    {
        if($params)
        {
        	$uri .= '?'.(is_array($params) ? http_build_query($params) : $params);
        }

    	return $this->_call('get', $uri, NULL, $format);
    }


    public function post($uri, $params = array(), $format = NULL)
    {
        return $this->_call('post', $uri, $params, $format);
    }


    public function put($uri, $params = array(), $format = NULL)
    {
        return $this->_call('put', $uri, $params, $format);
    }


    public function delete($uri, $params = array(), $format = NULL)
    {
        return $this->_call('delete', $uri, $params, $format);
    }

    public function api_key($key, $name = 'X-API-KEY')
	{
		$this->curl->http_header($name, $key);
	}

    public function language($lang)
	{
		if(is_array($lang))
		{
			$lang = implode(', ', $lang);
		}

		$this->curl->http_header('Accept-Language', $lang);
	}

    private function _call($method, $uri, $params = array(), $format = NULL)
    {
    	if($format !== NULL)
		{
			$this->format($format);
		}

		$this->_set_headers();

        // Initialize cURL session
        $this->curl->create($this->rest_server.$uri);

        // If authentication is enabled use it
        if($this->http_auth != '' && $this->http_user != '')
        {
        	$this->curl->http_login($this->http_user, $this->http_pass, $this->http_auth);
        }

        // We still want the response even if there is an error code over 400
        $this->curl->option('failonerror', FALSE);

        // Call the correct method with parameters
        $this->curl->{$method}($params);

        // Execute and return the response from the REST server
        $response = $this->curl->execute();

        // Format and return
        return $this->_format_response($response);
    }


    // If a type is passed in that is not supported, use it as a mime type
    public function format($format)
	{
		if(array_key_exists($format, $this->supported_formats))
		{
			$this->format = $format;
			$this->mime_type = $this->supported_formats[$format];
		}

		else
		{
			$this->mime_type = $format;
		}

		return $this;
	}

	public function debug()
	{
		$request = $this->curl->debug_request();

		echo "=============================================<br/>\n";
		echo "<h2>REST Test</h2>\n";
		echo "=============================================<br/>\n";
		echo "<h3>Request</h3>\n";
		echo $request['url']."<br/>\n";
		echo "=============================================<br/>\n";
		echo "<h3>Response</h3>\n";

		if($this->response_string)
		{
			echo "<code>".nl2br(htmlentities($this->response_string))."</code><br/>\n\n";
		}

		else
		{
			echo "No response<br/>\n\n";
		}

		echo "=============================================<br/>\n";

		if($this->curl->error_string)
		{
			echo "<h3>Errors</h3>";
			echo "<strong>Code:</strong> ".$this->curl->error_code."<br/>\n";
			echo "<strong>Message:</strong> ".$this->curl->error_string."<br/>\n";
			echo "=============================================<br/>\n";
		}

		echo "<h3>Call details</h3>";
		echo "<pre>";
		print_r($this->curl->info);
		echo "</pre>";

	}


	private function _set_headers()
	{
		$this->curl->http_header('Accept: '.$this->mime_type);
	}

	private function _format_response($response)
	{
		$this->response_string =& $response;

		// It is a supported format, so just run its formatting method
		if(array_key_exists($this->format, $this->supported_formats))
		{
			return $this->{"_".$this->format}($response);
		}

		// Find out what format the data was returned in
		$returned_mime = @$this->curl->info['content_type'];

		// If they sent through more than just mime, stip it off
		if(strpos($returned_mime, ';'))
		{
			list($returned_mime)=explode(';', $returned_mime);
		}

		$returned_mime = trim($returned_mime);

		if(array_key_exists($returned_mime, $this->auto_detect_formats))
		{
			return $this->{'_'.$this->auto_detect_formats[$returned_mime]}($response);
		}

		return $response;
	}


    // Format XML for output
    private function _xml($string)
    {
    	return (array) simplexml_load_string($string);
    }

    // Format HTML for output
    // This function is DODGY! Not perfect CSV support but works with my REST_Controller
    private function _csv($string)
    {
		$data = array();

		// Splits
		$rows = explode("\n", trim($string));
		$headings = explode(',', array_shift($rows));
		foreach( $rows as $row )
		{
			// The substr removes " from start and end
			$data_fields = explode('","', trim(substr($row, 1, -1)));

			if(count($data_fields) == count($headings))
			{
				$data[] = array_combine($headings, $data_fields);
			}

		}

		return $data;
    }

    // Encode as JSON
    private function _json($string)
    {
    	return json_decode(trim($string));
    }

    // Encode as Serialized array
    private function _serialize($string)
    {
    	return unserialize(trim($string));
    }

    // Encode raw PHP
    private function _php($string)
    {
    	$string = trim($string);
    	$populated = array();
    	eval("\$populated = \"$string\";");
    	return $populated;
    }

}

/* End of file REST_Ongkir.php */
/* Location: ./application/libraries/REST.php */