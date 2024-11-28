<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
  <?php
session_start();

  ?>

    <section class="header">
        <nav>
            <a href="index.php"><img src="images/Septic-logo.png" alt="Septic Logo"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="aboutus.html">ABOUT US</a></li>
                    <!-- <li><a href="ourdealers.html">OUR DEALERS</a></li> -->
                    
                    <li><a href="ourservices.html">OUR SERVICES</a></li>
                    <li><a href="contactus.html">CONTACT US</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                </ul>
            </div>
        </nav>
        <div class="text-box">
        <h1>Nepal's first online platform</h1>
        <p>We offer you with several facilities such as cleaning ya septic tanks with modern technology and we'd be at ya manison with just a click.<br> You can also procced with us if you're seeking for septage for your vegitation.</p>
        <a href ="connection.php" class="btn">Reserve now</a> 
       <!-- &nbsp; &nbsp; &nbsp;
        <a href ="" class="btn">Become a Dealer</a> -->
    </div>
    </section>

<!-- 6th sem ko project ma add garne -->
    <!-- <section class="our-dealers">
        <h1>
Dealers we trust. 

        </h1>
        <p>
            We've gathered several dealers who've been serving their facilities from Chitwan through last couple of decades and now they be collaborating with us for further convineince of customers and advancement of technology.
        </p>
        <div class="container"></div>
        <div class="row">
            <div class="dealer-col">
              <h3>Krishna suppliers</h3>
              <p>Bharatpur-2</p>
              <p>9800000000</p>

            </div>

            <div class="dealer-col">
                <h3>Manage suppliers</h3>
                <p>Bharatpur-21</p>
                <p>9800000000</p>
  
              </div>
              <div class="dealer-col">
                <h3>Mero suppliers</h3>
                <p>Tandi-2</p>
                <p>9800000000</p>
  
              </div>
              <div class="dealer-col">
                <h3>Bahna Traders</h3>
                <p>Ramnagar-2</p>
                <p>9800000000</p>
  </div>
              </div>
               second row 
              <div class="row hidden-row">
                <div class="dealer-col">
                  <h3>mero ghar</h3>
                  <p>Bharatpur-2</p>
                  <p>9800000000</p>
    
                </div>
    
                <div class="dealer-col">
                    <h3>Manageing ss</h3>
                    <p>Bharatpur-21 ci</p>
                    <p>9800000000</p>
      
                  </div>
                  <div class="dealer-col">
                    <h3>Tro retail suppliers</h3>
                    <p>Tandi-2</p>
                    <p>9800000000</p>
      
                  </div>
                  <div class="dealer-col">
                    <h3>jonny Traders</h3>
                    <p>Ramnagar-2</p>
                    <p>9800000000</p>
      </div>
                  </div> 

                third row 
                <div class="row hidden-row">
                <div class="dealer-col">
                  <h3>bairstoe sopeds</h3>
                  <p>Bharatpur-2</p>
                  <p>9800000000</p>
    
                </div>
    
                <div class="dealer-col">
                    <h3>Sure suppliers</h3>
                    <p>Bharatpur-21</p>
                    <p>9800000000</p>
      
                  </div>
                  <div class="dealer-col">
                    <h3>okay suppliers</h3>
                    <p>Tandi-2</p>
                    <p>9800000000</p>
      
                  </div>
                  <div class="dealer-col">
                    <h3>Bahna Traders</h3>
                    <p>Ramnagar-2</p>
                    <p>9800000000</p>
      </div>
                  </div>
                  <button class="show-more-btn" id="seeMoreBtn"> See More</button>
        </div> 
        
       

         <script>

            document.getElementById('seeMoreBtn').addEventListener('click',function() {
                const hiddenRows = document.querySelectorAll('.hidden-row');
                if(hiddenRows[0].style.display === 'none' || hiddenRows[0].style.display === ''){
                  hiddenRows.forEach(row => {
                    row.style.display ='flex';

                  })  ;
                  this.textContent = 'see less';
                }
                else
                {
                    hiddenRows.forEach(row => {
                        row.style.display = 'none';
                    });
                    this.textContent = 'see more';
                }
                });
            
        </script> 
    </section> -->

    



    <section class="services">
        <h1>Our Services</h1>
        <p> We provide reliable septic tank emptying, expert maintenance, and eco-friendly septage for agricultural use. Our services help keep your septic system running smoothly and support sustainable farming practices. </p>

        <div class="row">
            <div class="services-col">
                <img src="images/emptying.jpg">
                
                    <h3>Septic Tank Emptying</h3>
               <p> We provide professional septic tank emptying services, safely removing sludge and waste to keep your system functioning properly. Regular pumping helps prevent blockages and costly repairs, ensuring your septic system runs smoothly. </p>
                    </div>
                <div class="services-col">
                    <img src="images/maintainance.jpg">
                     
                        <h3>Septic Tank Maintenance</h3>
                        <p> We ensure your system stays in top condition. We offer regular inspections, pumping, and cleaning to prevent blockages, odors, and costly repairs. Timely maintenance helps extend the life of your septic system and ensures it operates efficiently.</p>
                    
                    </div>
                    <div class="services-col">
                        <img src="images/septage.jpg">
                        
                            <h3>Septage for Agricultural Land</h3>
                        <p> We offer safe and regulated septage disposal for agricultural land, using treated waste as fertilizer to enrich soil with nutrients while ensuring environmental safety and compliance with local regulations. </p>
                        </div>
        </div>
    </section>




    <section class="call">
        <h1>Contact us now for any inquiries or support ~ our team is ready to assist you! </h1>
        <a href="" class="btn">CONTACT US</a>
    </section>
<section class="footer">
    <h4> About us</h4>
    <p>
        We offer fast, reliable septic tank delivery services. Our experienced team ensures safe and timely delivery of septic tanks to your location, meeting your needs with professionalism and care.

    </p>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.151618631791!2d84.4487711!3d27.708395749999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994e5cf97bbac17%3A0x3a169f1b4476c85c!2sGaneshsthan%20%2F%20Ganesh%20Dham!5e0!3m2!1sen!2snp!4v1731835988587!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</section>


</body>
</html>
