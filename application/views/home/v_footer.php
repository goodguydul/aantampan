	

	<script type="text/javascript">
		$(document).ready(function(){
		    $('#checkjadwal').on('submit', function (e) {

		        e.preventDefault();
		        $.ajax({
		            type: 'post',
		            url: '<?=base_url('home/check_appointment/')?>',
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

	<footer class="footer">
		<p>Anugrah Sakti - 2019</p>
	</footer>
</body>

</html>