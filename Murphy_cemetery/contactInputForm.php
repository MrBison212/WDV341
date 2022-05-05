<?php
   include('php/model/contactClass.php');
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Murphy Cemetery | Home</title>
      <link rel="stylesheet" href="scss/contact.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      
      <style>

        body{
          background: #878175;
        }

        .jumbotron {
          background-image:url('images/cemetery_images/cemetery.jpg');
          background-size: cover;
          position:relative;
          overflow:hidden;
          height:500px;
          padding-top:120px;
        }
  
        .jumbotron .container {
          position:relative;
          z-index:2;
          background:rgba(34, 52, 73, 0.404);
          padding:2rem;
          border:1px solid rgba(0, 0, 0, 0.1);
          border-radius:3px;
        }
  
        h1 {
          text-align: center;
          font-size:8vw
        }
  
        h2 {
          text-align: center;
          color:#FFFCFC;
          padding:10px;
        }
  
        h4 {
          padding:10px;
          color:#32434D;
          font-weight: bold;
        }

        h4 a {
          color:#32434d;
        }

        h4 a:hover {
          color:#365568;
        }
  
        .btn {
          color:#FFFCFC;
          border-radius: 36px;
        }
  
        .btn:hover {
          color:#FFFCFC;
        }
  
        #imageContainer {
          width:150px;
          height:200px;
          border-radius: 28px;
          border: 2px solid #32434D;
        }
  
        @media screen and (max-width: 960px) {
          #imageContainer {
            width:118.2px;
            height:160px;
          }
        }
  
        @media screen and (max-width: 500px) {
          .jumbotron {
            padding:10px;
            padding-top:70px;
          }
          
        }
  
        @media screen and (max-width: 350px) {
          .jumbotron {
            padding-top:35px;
          }
        }
  
        @media screen and (max-width: 250px) {
          .jumbotron {
            padding-top:0px;
            padding:0px;
          }
        }
   
       </style>

   </head>
   
   <body>
      
      <nav>
         <div onclick="disableScroll()" class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            <a href="#">Murphy Cemetery</a>
         </div>
         <div class="nav-items">
            <li><a href="#">Home</a></li>
            <li>
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">About</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">About</a>
                    <a href="#" class="dropdown-item">History</a>
                </div>
              </div>
            </li>
            <li>
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Option 1</a>
                    <a href="#" class="dropdown-item">Option 2</a>
                </div>
              </div>
            </li>
            <li><a href="#">Contact</a></li>
            <li>
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">The Deceased</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Option 1</a>
                    <a href="#" class="dropdown-item">Option 2</a>
                </div>
              </div>
            </li>
            <li><a href="#">Visitation</a></li>
         </div>
         <div class="user-icon">
          <span class="fa-solid fa-user fa-sm"></span>
         </div>
         <div class="search-icon">
            <span class="fa-solid fa-search fa-sm"></span>
         </div>
         <div class="cancel-icon">
            <span onclick="enableScroll()" class="fas fa-times"></span>
         </div>
      </nav>
      
      <div class="jumbotron jumbotron-fluid bg-dark">
  
         <div class="container text-white">
           <h1 class="display-4">Contact Us</h1>
        </div>
        
      </div>
  
      <div><br><br><br></div>
  
      <div style="border-top:2.5px solid #FFFCFC;padding:10px;"></div>

    <!-- Form Container -->
    <div class="formContainer">
      <form action="contactInputForm.php" post="method">
        <!-- First Name Field -->
        <div>
          <label for="fname">First Name:</label>
          <input type="text" id="fname" name="contactFirstName" placeholder="John" />
        </div>

        <!-- Last Name Field -->
        <div>
          <label for="lname">Last Name:</label>
          <input type="text" id="lname" name="contactLastName" placeholder="Smith" />
        </div>

        <!-- Email Field -->
        <div>
          <label for="email">Email:</label>
          <input
            type="text"
            id="email"
            name="contactEmail"
            placeholder="example@example.com"
          />
        </div>

        <!-- Phone Number Field -->
        <div>
          <label for="">Phone Number:</label>
          <input
            type="text"
            id="phoneNum"
            name="contactPhone"
            placeholder="###-###-####"
          />
        </div>

        <!-- Address Field -->
        <div>
          <label for="">Address:</label>
          <input
            type="text"
            id="address"
            name="contactAddress"
            placeholder="123 Wary Lane"
          />
        </div>

        <!-- City Field -->
        <div>
          <label for="">City:</label>
          <input type="text" id="city" name="contactCity" placeholder="Story County" />
        </div>

        <!-- State Field -->
        <div>
          <label for="">State:</label>
          <input type="text" id="state" name="contactST" placeholder="Iowa" />
        </div>

        <!-- Zip Code Field -->
        <div>
          <label for="">Zip Code:</label>
          <input type="text" id="zipCode" name="zipCode" placeholder="50201" />
        </div>

        <!-- Button -->
        <div class="button">
          <input type="submit" value="Submit" />
          <input type="reset" value="Reset" />
        </div>
      </form>
    </div>


   <footer>
        
        <div style="color:#FFFCFC;" class="flex-gap">
          <div><i class="fa-brands fa-linkedin"></i></i></div>
          <div><i class="fa-brands fa-twitter"></i></div>
          <div><i class="fa-brands fa-facebook"></i></div>
        </div>
  
        <div id="footerLinks" class="container">
          <div class="row">
            <div class="col-sm">
              <a href="#home">Home</a>
            </div>
            <div class="col-sm">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">About</a>
              <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">About</a>
                  <a href="#" class="dropdown-item">History</a>
              </div>
            </div>
            </div>
            <div class="col-sm">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Services</a>
              <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">Option 1</a>
                  <a href="#" class="dropdown-item">Option 2</a>
              </div>
            </div>
            </div>
            <div class="col-sm">
              <a href="#contact">Contact</a>
            </div>
            <div class="col-sm">
            <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">The Deceased</a>
              <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">Option 1</a>
                  <a href="#" class="dropdown-item">Option 2</a>
              </div>
            </div>
            </div>
            <div class="col-sm">
              <a href="#visitation">Visitation</a>
            </div>
          </div>
        </div>
  
        <div style="border-top:2.5px solid #FFFCFC; padding:10px;"></div>
  
        <div style=" padding-bottom:20px; color:#FFFCFC;" id="contactInfo" class="container">
          <div class="row">
            <div class="col-sm">
              Tel: 555-123-4567
            </div>
            <div class="col-sm">
              Email: info@murphycemetery.com
            </div>
            <div class="col-sm">
              Address: 670th Ave Richland Township, Story County, Iowa, 50201 USA
            </div>
          </div>
        </div>
  
      </footer>
      <!--Javascript file for Navigation functionality - Include below footer-->
      <script src="js/navigation.js"></script>
    </script>
    
   </body>
</html>
