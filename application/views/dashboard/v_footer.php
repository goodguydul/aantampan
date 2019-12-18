	</div> <!-- end of container -->
	<script type="text/javascript">
		$(document).ready(function(){
		    $('#checkjadwal').on('submit', function (e) {

		        e.preventDefault();
		        $.ajax({
		            type: 'post',
		            url: '<?=base_url('dashboard/checkjadwal/')?>',
		            data: $('#checkjadwal').serialize(),
		            success: function(response) {
		            	$('#listjadwal').html();
		             	 $('#listjadwal').html(response);

					},
		            error: function(response) {         
		                console.log(response);          
		            }        
		        });
		    });
		});
	</script>
	<footer>
		
	</footer>
</body>

</html>