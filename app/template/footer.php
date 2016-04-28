	</div> <!-- end .container -->
	
	<footer class="footer">
		<div class="container">
			<div class="col-sm-4 footer-item footer-copyright">
                            <p> &COPY; <?php echo date("Y")?> - Todos os Direitos Reservados</p>	
			</div>

			<div class="col-sm-4 text-center">
				<div> </div>
			</div>

			<div class="col-sm-4 text-right footer-developed">
				<p>
                                    SisUneb  <a href="https://github.com/wagner30023" target="blank"> Carlos Wagner </a>
				</p>	
			</div>
		</div> <!-- end .container footer -->
	</footer> <!-- end footer -->
	
	<!-- jQuery latest -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- jQuery masks -->
	<script src="js/jquery.mask.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Scripts que eu fiz -->
	<script src="js/scripts.js"></script>

	
	<!-- Aplica máscara aos campos de data -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#data').mask("00/00/0000", {placeholder: "__/__/____"});
		});
	</script>

	<?php 

		// Aviso de sucesso no cadastro
		if (isset($_GET['aviso'])) {
			echo '<script>
					var aviso = $("#cadastro-aviso");

					aviso.fadeIn(300, function() {
					aviso.delay(2000).fadeOut(300);
					});
				</script>';
		}

		// Aviso de sucesso na atualização
		if (isset($_GET['att-aviso'])) {
			echo '<script>
					var aviso = $("#edit-aviso");

					aviso.fadeIn(300, function() {
					aviso.delay(2000).fadeOut(300);
					});
				</script>';
		}
	?>

</body>
</html>