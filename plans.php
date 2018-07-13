<?php
$title = " | Plans"; 
include('header.php'); 
?>

  <!-- Plan Cards Div -->

  <div class="container-fluid plandiv">
    
    <div class="container">
      
      <div class="row">
        

        <div class="col-md-12">

          <h3 align="center">Choose from our various Subscription plans</h3>

          <div class="row">
            
            <div class="col-md-4 subdiv">
              
              <section id="premiumplan"><img src="icons/Crown.png" alt="Premium plan icon" class="img-responsive planicons">

                <p>
                  <strong>Enjoy the premium plan with the offerings below:</strong>
                  <ul class="planlist">
                    <li>Enjoy 2 months extra subscriptions on every 4 months purchase</li>
                    <li>Free tickets to VIP events</li>
                    <li>Free Team track suits and merchandise</li>
                    <li>Up to 10 free SMS messages</li>
                    <li>Up to 1GB free storage space</li>

                  </ul>
                </p>

                  <div class="radio buttondiv">
                  <label for="premium">
                <input type="radio" name="plan" id="premium" value="premium">
                Premium
                </label>
                </div>

              </section>


            </div>
            <div class="col-md-4 subdiv">

              <section id="goldpotplan"><img src="icons/goldplan.png" alt="Gold Plan icons" class="img-responsive planicons">

                <p>
                  <strong>Enjoy the Goldpot plan with the offerings below:</strong>
                  <ul class="planlist">
                    <li>Enjoy 1 month extra subscriptions on every 6 months purchase</li>
                    <li>50% off tickets to VIP events</li>
                    <li>Free Team track suits and merchandise</li>
                    <li>Up to 5 free SMS messages</li>
                    <li>Up to 750MB free storage space</li>

                  </ul>
                </p>

                <div class="radio buttondiv">
                  <label for="goldpot">
                <input type="radio" name="plan" id="goldpot" value="goldpot">
                GoldPot
                </label>
                </div>

              </section>



            </div>

            <div class="col-md-4 subdiv">
              
              <section id="silverplan"><img src="icons/star_silver.png" alt="Silver Plan icon" class="img-responsive planicons">

                <p>
                  <strong>Enjoy the Silver plan with the offerings below:</strong>
                 <ul class="planlist">
                    <li>Enjoy 1 month extra subscriptions on every 4 months purchase</li>
                    <li>10% off tickets to VIP events</li>
                    <li>Free Team track suits and merchandise</li>
                    <li>Up to 3 free SMS messages</li>
                    <li>Up to 500MB free storage space</li>

                  </ul>
                </p>

                  <div class="radio buttondiv">
                  <label for="silver">
                <input type="radio" name="plan" id="silver" value="silver">
                Silver
                </label>
                </div>

              </section>


            </div>
          </div>
          

        </div>

      </div>
               <!-- Subscribe button -->
               <div class="row">
                 
                 <div class="col-md-offset-4  col-md-4 col-md-offset-4">
                   
                   <button class="btn btn-lg btn-primary btnsubscribe">Subscribe</button>

                 </div>

               </div>

    </div>

                

  </div>

      <?php include('footer.php');?>   

    



