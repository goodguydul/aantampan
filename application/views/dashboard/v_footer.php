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
		$( window ).load(function() {
		  openMenu(event, 'Appointment');
		});
		function openMenu(evt, menuName) {
		  	var i, tabcontent, tablinks;
		  	tabcontent = document.getElementsByClassName("tabcontent");
		  	for (i = 0; i < tabcontent.length; i++) {
		    	tabcontent[i].style.display = "none";
		  	}
		  	tablinks = document.getElementsByClassName("tablinks");
		  	for (i = 0; i < tablinks.length; i++) {
		    	tablinks[i].className = tablinks[i].className.replace(" active", "");
		  	}
		  		document.getElementById(menuName).style.display = "block";
		  	evt.currentTarget.className += " active";
		}
	</script>

	<footer class="footer">
		<p>Anugrah Sakti - 2019</p>
	</footer>
</body>

</html>