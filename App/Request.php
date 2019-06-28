<?php 
namespace Blog\App;


class Request {
    protected $path_info = array() ;
    protected $path = array();
    protected $controllerName = '';
    protected $input = array();
    protected $all_input = array();
    protected $allquery = array();
    protected $session = array();

    public function __construct() {
        if (isset($_SERVER['PATH_INFO'])) {
            $this->path_info= $_SERVER['PATH_INFO'];
            $this->path =          explode('/', $this->path_info);
        } else {
            $this->path_info= '/';
            $this->path ='';
        }
        
        // $this->controllerName =$this->path[1];
        $this->parse_raw_http_request($this->input);
        if ( isset($_SESSION)) {
            $this->session = $_SESSION;
        }
    }

    protected function parse_raw_http_request(array &$a_data){

        if (!empty($_POST)){
            $a_data = $_POST ;
        }
        // read incoming data
        $input = file_get_contents('php://input');
        // grab multipart boundary from content type header
        if (isset( $_SERVER['CONTENT_TYPE']) && preg_match('/boundary=(.*)$/', $_SERVER['CONTENT_TYPE'], $matches)) {
            $boundary = $matches[1];
            // split content by boundary and get rid of last -- element
            $a_blocks = preg_split("/-+$boundary/", $input);
            array_pop($a_blocks); 
            if (count($a_blocks)) {
                // loop data blocks
                foreach ($a_blocks as $id => $block)
                {
                    if (empty($block))
                    continue;
                    // you'll have to var_dump $block to understand this and maybe replace \n or \r with a visibile char
                    // parse uploaded files
                    if (strpos($block, 'application/octet-stream') !== FALSE)
                    {
                    // match "name", then everything after "stream" (optional) except for prepending newlines 
                    preg_match("/name=\"([^\"]*)\".*stream[\n|\r]+([^\n\r].*)?$/s", $block, $matches);
                    }
                    // parse all other fields
                    else
                    {
                    // match "name" and optional value in between newline sequences
                    preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches);
                    }
                    $a_data[$matches[1]] = $matches[2];
                }
            }
        } else {
            parse_str($input, $a_data);
        }
    }

    public function requestMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function requestURI() {
        return $_SERVER['REQUEST_URI'];
    }

    public function controllerName(){
        return $this->controllerName;
    }

    public function subName(){
        return $this->subName;
    }

    public function all() {
        if (isset($_SERVER['QUERY_STRING'])) {
            $query = explode('&',$_SERVER['QUERY_STRING']);
            foreach ($query as $key => $value) {
                $this->al_input[$key] = $value ; 
            }
        }
        if (isset($this->input)) {
            foreach ($this->input as $key => $value) {
                $this->al_input[$key] = $values;
            }
        }
        return $this->al_input;
    }

    public function input($key =null , $defaut = null) {
        if ($key === null) {
            return $this->input;
        }

        if (isset($this->input[$key])) {
            return $this->input[$key];
        }

        return $defaut;
    }

    public function query ($key = null , $defaut = null) {
        if ($key === null) {
            return $_GET;
        }
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
        return $defaut;
    }

    public function getQueryByKey($key){
        return $this->allquery[$key];
    }

    public function setQuery(array $data){
        $this->allquery = $data;
    }

    public function has ($key = array()) {
        $al_input = all();
        foreach ($key as $k) {
            if (!isset($al_input[$k])) {
                return FALSE;
            }   
        }
        return TRUE;
        
    }

    public function filled ($key) {
        if ($this->has($key)) {
            if (empty($this->al_input[$key])){
                return TRUE;
            }
        }
        return FALSE ;
    }

    public function values () {
        if (!empty($this->input())) {
            return $this->input ;
        } elseif (!empty($this->query())) {
            return $this->query() ;
        }  
    }

    public function getSession($key) {
        return $this->session[$key];
    }
}   
?>