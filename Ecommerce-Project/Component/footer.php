<!-- footer -->
<section data-bs-version="5.1" class="footer7 cid-t9FKcGGNsb" once="footers" id="afooter2-8">

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © Copyright 2023 Roshan Dhawde - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>


<script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/smooth-scroll.js"></script>
  <script src="js/index.js"></script>
  <script src="js/navbar-dropdown.js"></script>
  <script src="js/mbr-switch-arrow.js"></script>
  <script src="js/script.js"></script>
  <script src="js/formoid.min.js"></script>

  
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $(".buynow").click(function()
{

var amount=$(this).attr('data-amount');	
var productid=$(this).attr('data-productid');	
var productname=$(this).attr('data-productname');	
	
var options = {
    "key": "rzp_test_zHhNFsppG7bIjH", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "Vasundhara",
    "description": productname,
    "image": "",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
		
		$.ajax({
			url:"payment-process.php",
			type:"POST",
			data:{product_id:productid,payment_id:paymentid},
			success:function(finalresponse)
			{
				if(finalresponse=='done')

				{
					window.location.href="http://localhost/roshan/Ecommerce-card/success.php";
				}
				else 
				{
					alert('Please check console.log to find error');
					console.log(finalresponse);
				}
			}
		})
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
 rzp1.open();
 e.preventDefault();
});
</script>
  