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
		<?php if ($level == 1) { ?>
		  	
			openMenu(event, 'Appointment');
		<?php }else{?>
		  	openMenu(event, 'Portofolio');
		<?php }?>
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

	<script type="text/javascript">
		$(document).ready(function(){
			$('.cancelapp').on('click',function(e){
				cancel_appointment(e);	
			});
		});
		
		function cancel_appointment(e){
			Swal.fire({
				title: 'Batalkan Jadwal Temu',
				text: "Apakah Anda yakin untuk membatalkan jadwal temu?",
				icon: 'warning',
				showCancelButton: true,
				 confirmButtonColor: '#3085d6',
				  	cancelButtonColor: '#d33',
				  	confirmButtonText: 'Ya, Batalkan',
				  	cancelButtonText: 'Tidak'
			}).then((result) => {
				  	if (result.value) {
				  		 e = e || window.event;
				  		e.preventDefault();
				        $.ajax({
				            type	: 	'post',
				            url 	: 	$('.cancelapp').data('url'),
				            success: function(response) {

				            	Swal.fire({
				            		title: 'Dibatalkan',
						      		text : 'Jadwal Anda Telah Dibatalkan!',
						      		icon : 'success'
				            	}).then((result)=>{
				            		location.reload(true);           	
				            	});
							},
				            error: function(response) {         
				                Swal.fire(
						      		'Something Error',
						      		'Ada error yang terjadi, error : '+response,
						      		'error'
						    	)         
				            }        
				        });
				  	}
				});
		}
	</script>

	<footer class="footer">
		<p>Anugrah Sakti - 2019</p>
	</footer>
</body>

</html>