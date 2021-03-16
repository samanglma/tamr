<style>

body{
   
   font-family: 'Roboto', sans-serif;
}


.cart-socialss{

display: inline-grid !important;
    float: right;
    margin-top: 185px;
    font-size: 15px;
    margin-right: -105px;
}


i{
  color:black !important;
}

.cart-bg-text h2 {
    font-size: 100px; 
    text-align: center;
    padding-top: 10px;
    margin-bottom: 0px;
    padding-bottom: 0px;
    position: relative;
    top: 30px;
    letter-spacing: -10px;
    z-index: 2;
    opacity: 0.1;
    margin-left: 0px;
}

.cart-heading h1{

  text-align: center;

  margin-bottom: -90px;

}

#cart-overlay1 {
    position: absolute; /* Sit on top of the page content */
    display: block; /* Hidden by default */
    
   
    background-color: rgba(255, 255, 255, 0.95); /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */

}

.cart-contact-us .cart-heading h1 {
        font-size: 50px;
        padding: 90px 130px;
    }

.cart-contact-us{
  text-align: center;
  margin-left: 190px;
}

    .rounded{
      font-size: 14px;
    }
    .cart-summary{
      font-size: 14px;
    }
    img{
      margin-bottom: -30px;
    }

     input[type="submit"]
    {
        border: 0;
        border-bottom: 1px solid gray;
        outline: 0;
        padding: 15px;
        margin-left: 90px;
       
    }

  </style>


<div class="container cart-wrapper">

 <ul class="list-inline text-right cart-socialss">
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                  
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                 
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">

                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>

    <div class="row">

    <div class="cart-contact-us">
        <div id="cart-overlay1">
            <div class="cart-heading">
                 <h1>SHOPPING CARD</h1>
            </div>
            <p>SHOPPING CARD (2)<span>YOUR WHISTLIST (0)</span></p>
            
        </div>
        <div class="cart-bg-text">
            <h2>SHOPPING CARD</h2>
        </div>
    </div>

     <div class="pb-5">

      <br><br><br><br>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <!-- <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th> -->
               <!--    <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th> -->
                 <!--  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr> -->
              </thead>
              <tbody>
			  <tr>
                  <td>
                    
                      <img src="<?= base_url("assets/frontend/images/Box1.png") ?>" alt="" width="150" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5>
                        <strong>AED 79.00</strong>
                        <span class="text-muted font-weight-normal font-italic">Electronics</span>
                      </div>
                 
                  </td>
              
                  <td class="align-middle"><strong>QTY 1</strong></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>
                    
                      <img src="<?= base_url("assets/frontend/images/Box3.png") ?>" alt="" width="150" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5>
                        <strong>AED 79.00</strong>
                        <span class="text-muted font-weight-normal font-italic">Electronics</span>
                      </div>
                 
                  </td>
              
                  <td class="align-middle"><strong>QTY 1</strong></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
				<tr>
                  <td>
                    
                      <img src="<?= base_url("assets/frontend/images/Box1.png") ?>" alt="" width="150" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5>
                        <strong>AED 79.00</strong>
                        <span class="text-muted font-weight-normal font-italic">Electronics</span>
                      </div>
                 
                  </td>
              
                  <td class="align-middle"><strong>QTY 1</strong></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>

         <div class="col-lg-4 cart-summary">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal </strong><strong> 390.00 AED</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping</strong><strong>  10.00 AED</strong></li>
             <!--  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li> -->
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"> 400.00 AED</h5>
              </li>
            </ul>

            <!-- <a href="#" class="btn btn-dark rounded-pill py-2 btn-block">CHECKOUT NOW</a> -->

             <input type="submit" value='CHECKOUT NOW'/>

          </div>
        </div>
      </div>

     
    </div>
  </div>

</div>
<hr>

</body>


</html>