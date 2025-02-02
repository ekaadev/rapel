<?php

require_once __DIR__ . "/../service/UserService.php";

class UserController 
{
    /**
     * Register a new user
     * @param $req
     * @return mixed (array|null)
     * @throws ResponseError
     * @throws PDOException
     */
    function register($req)
    {
        $userService = new UserService();

        try {
            $result = $userService->register($req);

            return [
                "success" => true,
                "message" => "User created successfully",
                "data" => $result
            ];
        
        } catch (ResponseError $e) {

            error_log("(CONTROLLER) Error creating user: " . $e->getMessage());
            
            return [
                "success" => false,
                "message" => $e->getMessage()
            ];
    
        } catch (PDOException $e) {

            error_log("(CONTROLLER) Error creating user: " . $e->getMessage());
            
            return [
                "success" => false,
                "message" => "Error creating user"
            ];
            
        }
    }

    /**
     * Login a user
     * @param $req
     * @return mixed (array|null)
     * @throws ResponseError
     * @throws PDOException
     */
    function login($req)
    {
        $userService = new UserService();

        try {
            $result = $userService->login($req);

            return [
                "success" => true,
                "message" => "User logged in successfully",
                "data" => $result
            ];
        
        } catch (ResponseError $e) {
            
            return [
                "success" => false,
                "message" => $e->getMessage()
            ];
    
        } catch (PDOException $e) {
            
            return [
                "success" => false,
                "message" => "Error logging in"
            ];
        }
    }
}