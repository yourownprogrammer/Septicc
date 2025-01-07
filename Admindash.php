<?php
@include 'config.php';

 session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
       
       
       .sidebar {
  position: fixed;
  left: 0;
  top: 0;
  width: 150px;
  height: 100%;
  background: black;
  color: #fff;
  padding: 20px;
  font-size: 20px;
}

 .sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
} 

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 8px 0;
}

.sidebar ul li a:hover {
  background: #241ada;
}

.main-content {
  margin-left: 180px; 
  padding: 30px;
  background-color: #f4f4f9;
  min-height: 100vh; /* Ensure it covers the full viewport height */
}

/* Section header */
.main-content h2 {
  color: #333;
  font-size: 50px;
  margin-bottom: 20px;
  text-align: center;
}

/* Dashboard stats section */
.dashboard-stats {
  display: grid;
  /* grid-template-columns: repeat(auto-fill, minmax(300px, 40px)); */
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

/* Stat box styling */
.stat-box {
  background-color: #fff;
  padding: 30px;
  border-radius:8px;
  box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  height: 200px; 
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.stat-box h3 {
  font-size:25px;
  color: #444;
  margin-bottom: 15px;
}

.stat-box p {
  font-size: 25px;
  font-weight: bold;
  color: #007bff;
}

    </style>

</head>
<body>
     <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="">Dashboard</a></li>
      <li><a href="users.php">User Profile</a></li>
      <li><a href="reservations.php">Reservations</a></li>
      <li><a href="notifications">Notifications</a></li>
      <li><a href="logout.php">logout</a></li>
    </ul>
  </div>

 
  <div class="main-content">
  
    <section id="dashboard">
      <h2>Dashboard</h2>
      <div class="dashboard-stats">
        <div class="stat-box">
          <h3>New Reserve Requests</h3>
          <p>52</p>
          
        </div>
        <div class="stat-box">
          <h3>In-progress/Pending Reserves</h3>
          <p>21</p>
         
        </div>
        <div class="stat-box">
          <h3>Completed Reserves</h3>
          <p>478</p>
          
        </div>
        <div class="stat-box">
          <h3>Daily Visits</h3>
          <p>5213</p>
        </div>
    

    </section>
  </div>
</body>
</html>