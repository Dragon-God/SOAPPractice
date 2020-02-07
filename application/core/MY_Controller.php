<?php
class MY_Controller extends CI_Controller
{
	public function __construct($models = NULL, $helpers = NULL, $libraries = NULL)
	{
		parent::__construct();
		if ($models !== NULL)
			$this->load->model($models);
		if ($helpers !== NULL)
			$this->load->helper($helpers);
		if ($libraries !== NULL)
			$this->load->library($libraries);
	}

	public function render($path, $data)
	{
		$this->load->view("templates/header", $data);
		$this->load->view($path, $data);
		$this->load->view("templates/footer");
	}
}

class MY_SoapClient
{
	public function __construct($wsdl)
	{
		require_once(APPPATH."third_party/nusoap-0.9.5/lib/nusoap.php");
      $this->client = new nusoap_client($wsdl, true);
      $err = $this->client->getError();
      if ($err) {
         echo "<h2>Constructor Error</h2>: <pre>$err</pre>";
         exit();
      }
	}

	function call($params, $action)
   {
      try {
         $result = $this->client->call($action, $params);
			
			if ($this->client->fault) {
				echo "<h2>Fault<h2><pre>";
				print_r($result);
				echo "</pre>";
			} else {
				$err = $this->client->getError();
				if ($err) {
					echo "<h2>Error</h2><pre>$err</pre>";
				} else {
					echo "<h2>Request</h2>";
					echo "<pre>" . htmlspecialchars($this->client->request, ENT_QUOTES) . "</pre>";
					echo "<h2>Response</h2>";
					echo "<pre>" . htmlspecialchars($this->client->response, ENT_QUOTES) . "</pre>";
					
					return $result;
				}
			}
      } catch (Exception $e) {
         echo "Caught exception: {$e->getMessage()}<br>";
		}
		return FALSE;
   }
}

class MY_SoapServer extends CI_Controller
{
	function __construct($name, $namespace)
	{
		parent::__construct();
		require_once(APPPATH."third_party/nusoap-0.9.5/lib/nusoap.php");
		$this->server = new nusoap_server();
		$this->server->configureWSDL($name, $namespace, $namespace);
		$this->name = $name;
		$this->namespace = $namespace;
	}
	
	function loads($models = NULL, $helpers = NULL, $libraries = NULL)
	{
		if ($models !== NULL)
			$this->load->model($models);
		if ($helpers !== NULL)
			$this->load->helper($helpers);
		if ($libraries !== NULL)
			$this->load->library($libraries);
	}

	function register($function, $params, $return, $documentation="", $style="rpc", $use="encoded")
	{
		$this->server->register(
			$function,
			$params,
			$return,
			$this->namespace,
			"{$this->namespace}#{$function}",
			$style,
			$use,
			$documentation
		);
	}

	function serve()
	{
		$this->server->service(file_get_contents("php://input"));
	}
}