<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class ChartsController extends Controller
{
  public function monthlySales()
  {
    // Setting header to json
    header('Content-Type: application/json');

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lashopee";

    // Create connection
    $conn = new \mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get monthly total sales
    $query = "SELECT 
                MONTH(order_at) AS month,
                SUM(total_price) AS total_sales
              FROM 
                purchase_items 
              WHERE 
                YEAR(order_at) = YEAR(CURDATE()) 
              GROUP BY 
                month 
              ORDER BY 
                month";

    // Execute query
    $result = $conn->query($query);

    // Check if query execution was successful
    if ($result) {
      // Loop through the returned data
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }

      // Free result set
      $result->free_result();

      // Close connection
      $conn->close();

      // Now print the data
      echo json_encode($data);
    } else {
      // Error occurred while executing the query
      echo "Error: " . $conn->error;
    }
  }


  public function dailySales()
  {
    // Setting header to json
    header('Content-Type: application/json');

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lashopee";

    // Create connection
    $conn = new \mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get total daily sales
    $query = "SELECT 
                SUM(total_price) AS total_sales
              FROM 
                purchase_items 
              WHERE 
                DATE(order_at) = CURDATE()";

    // Execute query
    $result = $conn->query($query);

    // Check if query execution was successful
    if ($result) {
      // Fetch the total daily sales
      $row = $result->fetch_assoc();
      $totalSales = $row['total_sales'];

      // Format the number with commas and 2 decimal places
      $formattedTotalSales = '$ ' . number_format($totalSales, 2);

      // Close connection
      $conn->close();

      // Now print the formatted data
      echo json_encode(['total_sales' => $formattedTotalSales]);
    } else {
      // Error occurred while executing the query
      echo "Error: " . $conn->error;
    }
  }

  public function yearlySales()
  {
    // Setting header to json
    header('Content-Type: application/json');

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lashopee";

    // Create connection
    $conn = new \mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get yearly sales data
    $query = "SELECT 
                YEAR(order_at) AS year,
                SUM(total_price) AS total_sales
              FROM 
                purchase_items 
              GROUP BY 
                YEAR(order_at) 
              ORDER BY 
                year";

    // Execute query
    $result = $conn->query($query);

    // Check if query execution was successful
    if ($result) {
      // Loop through the returned data
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }

      // Free result set
      $result->free_result();

      // Close connection
      $conn->close();

      // Now print the data
      echo json_encode($data);
    } else {
      // Error occurred while executing the query
      echo "Error: " . $conn->error;
    }
  }
  public function buwan()
  {

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lashopee";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to get monthly total sales
    $query = "SELECT 
            MONTH(order_at) AS month,
            SUM(total_price) AS total_sales
          FROM 
            purchase_items 
          WHERE 
            YEAR(order_at) = YEAR(CURDATE()) 
          GROUP BY 
            month 
          ORDER BY 
            month";

    // Execute query
    $result = $conn->query($query);

    // Check if query execution was successful
    if ($result) {
      // Loop through the returned data
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }

      // Free result set
      $result->free_result();

      // Close connection
      $conn->close();

      // Now print the data
      echo json_encode($data);
    } else {
      // Error occurred while executing the query
      echo json_encode(["error" => "Error: " . $conn->error]);
    }


  }

}
?>