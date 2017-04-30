<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTOkTsi2B_WH9_IDmAgoYC3Ah05blMJ7o&callback=initMap">
</script>
<!-- <script type="text/javascript" src="assets/js/custom.js"></script> -->
<script type="text/javascript" src="assets/js/dist/jquery.validate.js"></script>
<script type="text/javascript" src="assets/js/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/dist/additional-methods.js"></script>
<script type="text/javascript" src="assets/js/dist/additional-methods.min.js"></script>

<div style="position: fixed; top: 0; left: 0; background-color: #000; opacity: 0.5; width: 100%; height: 800px; z-index: 999; display: none;" class="popup backdrop"></div>
<div style="position: fixed; top: 20%; left: 27%; background-color: #FFF; width: 50%; height: 370px; z-index: 9999; border-radius: 4px; display: none;" class="popup">
	
		<div style="border-bottom: 1px solid #CCC; margin-left: 2%: width: 80%; height: 35px; padding-top: 1%; text-align: center;">
	
				<div class="comment-create clearfix">
					<span style="font-size: 23px; font-weight: bold;text-transform: uppercase;color: #ef3434;"> Reply To Comment</span>                
			    </div>
	            <div style="padding:10px;">
	           
		            <form method="POST" action="classes/action.php">
		             <input type="hidden" id="value" value="" name="reviewid">
	                    <div class="form-group">
	                        <label class="pull-left">Message</label>
	                        <textarea class="form-control" rows="5" name="reply"></textarea>
	                    </div>	                   
		                    <div class="row">
		                        <div class="col-sm-4">
		                            <div class="form-group">
		                                <label class="pull-left">Rating</label>
		                                <div style="margin-top: 11%;">			                                
		                                    <input type="radio" name="rating" value="1" class="form-control">
		                                    <input type="radio" name="rating" value="2" class="form-control">
		                                    <input type="radio" name="rating" value="3" class="form-control">
		                                    <input type="radio" name="rating" value="4" class="form-control">
		                                    <input type="radio" name="rating" value="5" class="form-control">                           
		                                </div>
		                                
		                            </div>
		                           
		                        </div>
		                       
		                       
		                        <div class="col-sm-4">
		                      
		                        </div>   
		                       
		                    </div>
		                  
		                    <div class="form-group-btn">
		                        <button type="submit" name="postreply" class="btn btn-primary btn-large pull-right">Post Comment</button>
		                    </div>
		                    
		            </form>
	            </div>
		</div>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.replyComment').click(function(){
			var replyId = $(this).attr('data-id');
			$("#value").val(replyId);
			$('.popup').fadeIn(300);
			//$('.popup').slideDown(300);
			// alert($('body').offset().top);
			// $('body').animate({
			// 	scrollTop: $('body').offset().top + $(document).height()
			// },2000);
		});
		$('.backdrop').click(function(){
			$('.popup').fadeOut(300);
			// $('.popup').slideUp(300);
		});
	});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#contact').click(function() {
            $('html, body').animate({
		        scrollTop: $(document).height()
		    }, 'slow');

        });
    })
</script>
<script>
$(document).ready(function(){
	$("#listingForm").validate();
});
</script>

<script>
$(document).ready(function(){
	$("#contactForm").validate();
});
</script>
