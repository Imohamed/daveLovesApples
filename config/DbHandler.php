<?php

/**
 * DbHandler.php
 * Class to handle all database operations
 * This class will have the CRUD methods:
 * C - Create
 * R - Read
 * U - Update
 * D - Delete
 *
 * @author leannewilliston
 */
class DbHandler {

    //private connection variable
    private $conn;

    //Constructor class - runs when class is initialized
    function __construct() {
        //initialize database connection when class is instantiated
        //require_once dirname(__FILE__ . '/DbConnect.php');
        require_once dirname(__FILE__) . '/DbConnect.php';
        //Open database
        try {
            $db = new DbConnect();
            $this->conn = $db->connect();
        } catch (Exception $ex) {
            $this::dbConnectError($ex->getCode());
        }
    }

//end of constructor
    //A static function allows to make a calls to it without
    //instantiating the class.  In other words with using the 
    //new keyword, for example
    //$dbh = new DbHandler();
    //$dbh->dbConnectError(1045);
    //Instead we can call it directly like this
    //$this::dbConnectError(1045);
    private static function dbConnectError($code) {
        switch ($code) {
            case 1045:
                echo "A database access error has occured!";
                break;
            case 2002:
                echo "A database server error has occured!";
                break;
            default:
                echo "An server error has occured!";
                break;
        }
    }

//End of DbConnectError 



    public function getProvider($id) {
        try {
            //Prepare our sql query
            $stmt = $this->conn->prepare("SELECT sp_company, sp_email, sp_category,
                                         sp_style, sp_city, sp_url, sp_description,  
                                         CONCAT(sp_fname,' ', sp_lname) AS contact
                                         FROM service_providers 
                                         WHERE sp_id=:id");
            

            //Bind the query parameters
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            //Execute the query
            $stmt->execute();

            //Fetch the data as associative array
            $provider = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //return array of data items
            $data = array(
                'error' => false,
                'items' => $provider
            );
        } catch (Exception $ex) {
            $data = array('error' => true,
                'message' => $ex->getMessage()
            );
        }
        //return the data array 
        return $data;
    }

    public function getProvidersByCat($cat) {
        try {
            //Prepare our sql query
            $stmt = $this->conn->prepare("SELECT sp_id, sp_company, type_description,
                                         sp_style, sp_city 
                                         FROM service_providers as SP JOIN sp_types as T
                                            ON SP.sp_category = T.sp_type
                                         WHERE sp_category=:cat");
            //WHERE (sp_category=1 AND sp_city = 'Moncton')");
            //Bind the query parameters
            $stmt->bindValue(':cat', $cat, PDO::PARAM_INT);

            //Execute the query
            $stmt->execute();

            //Fetch the data as associative array
            $providers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //return array of data items
            $data = array(
                'error' => false,
                'items' => $providers
            );
        } catch (Exception $ex) {
            $data = array('error' => true,
            'message' => $ex->getMessage()
            );
        }
        //return the data array 
        return $data;
    }


        public function getCategory($cat) {
        try {
        //Prepare our sql query
        $stmt = $this->conn->prepare("SELECT * FROM sp_types WHERE sp_type= :cat");
        $stmt->bindValue(':cat', $cat, PDO::PARAM_INT);

        //Execute the query
        $stmt->execute();

        //Fetch the data as associative array
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //return array of data items
        $data = array(
        'error' => false,
        'items' => $categories
        );
    } catch (Exception $ex) {
        $data = array('error' => true,
            'message' => $ex->getMessage()
        );
    }
    //return the data array 
    return $data;
}//end of getCategories


}//End of DB Class