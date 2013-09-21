<?php namespace MyCMS\Routing;

class Router
{
	private static $requestPOST = array();
    private static $requestGET = array();
    private static $pageToLoad;
    private static $lookingFor;

    private static $singleton = false;

    /**
     * Register a GET Route by URI
     * 
     * @param type $input
     */

    protected static function getByGET($looking, $dest) {
        if (!self::$singleton) {

             $looking = strtolower($looking);

            if (self::doesMatchWithGET($looking)) {
                self::$pageToLoad = $dest;
                self::$singleton = true;
                self::$lookingFor = $looking;
            }
        }
    }

    protected static function getByPOST($looking, $dest) {
        if (!self::$singleton) {

            $looking = strtolower($looking);

            if (self::doesMatchWithGET($looking) && self::doesMatchWithPOST($looking)) {
                self::$pageToLoad = $dest;
                self::$lookingFor = $looking;
                self::$singleton = true;
            }
        }
    }

    private static function doesMatchWithPOST($for) {
        if (isset(self::$requestGET['page']) && self::$requestGET['page'] == $for && $_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    private static function doesMatchWithGET($for) {
        if (isset(self::$requestGET['page']) && self::$requestGET['page'] == $for) {
            return true;
        } 
        return false;
    }

    public static function setRequest($request) {
        self::$requestPOST = $request['POST'];
        self::$requestGET = $request['GET'];

        if (!isset(self::$requestGET['page'])) {
            self::$requestGET['page'] = '/';
        }
    }

    public static function run() {
        if (isset(self::$lookingFor) && !empty(self::$lookingFor)) {
            $split = explode('@', self::$pageToLoad);
            if (!is_readable(APP . 'controllers' . DS . $split[0]  . PHP_EXT)) {
                throw new \FileException("Controller " . $split[0] . " does not exists!");
            } else {
                 require_once(APP . 'controllers' . DS . $split[0] . PHP_EXT);
            

                $obj = new $split[0];
                echo $obj->$split[1]();
            }


        }
        
    }

}