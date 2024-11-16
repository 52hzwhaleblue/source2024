<?php 

use NINA\Core\Support\Facades\DB;
use NINA\Core\Support\Facades\File;

class CreateDatabase{
    public function checkDatabaseExists($databaseName)
    {
        try {
            // Connect to MySQL
            $pdo = new PDO("mysql:host=".env("DB_HOST"), env("DB_USERNAME"), env("DB_PASSWORD"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Prepare and execute the query
            $stmt = $pdo->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?");
            $stmt->execute([$databaseName]);
        
            // Fetch the result
            $dbExists = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return !empty($dbExists);
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function createDatabase($databaseName)
    {
        // Connect to MySQL server without selecting a specific database
        $connection = mysqli_connect('localhost', env('DB_USERNAME'), env('DB_PASSWORD')); // Replace with your DB credentials
    
        if (!$connection) {
            die('Unable to connect to the database: ' . mysqli_connect_error());
        }
    
        // Create the database if it doesn't exist
        $query = "CREATE DATABASE IF NOT EXISTS `$databaseName`";
        if (!mysqli_query($connection, $query)) {
            die('Error creating database: ' . mysqli_error($connection));
        }
    
        // Select the newly created database
        mysqli_select_db($connection, $databaseName);
    
        // Read the SQL file
        $sqlFile = file('./source_new_21_09.sql');  // Make sure the file path is correct
        if (!$sqlFile) {
            die('Error: SQL file not found.');
        }
    
        $query = '';
        foreach ($sqlFile as $line) {
            $startWith = substr(trim($line), 0, 2);
            $endWith = substr(trim($line), -1, 1);
            
            // Skip empty lines, comments, or SQL_MODE statements
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
            }
    
            $query .= $line;
            if ($endWith == ';') {
                // Execute the query when a complete statement is found
                if (!mysqli_query($connection, $query)) {
                    die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query . '</b></div>');
                }
                $query = '';  // Reset the query after executing
            }
        }
    
        echo '<div class="alert alert-success text-center sql-import-response" role="alert">
        SQL file imported successfully.
      </div>';

    }
}