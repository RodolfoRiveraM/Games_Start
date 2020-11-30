</div>

<?php 

//echo gethostname();
  //                             phpinfo();?>
</div>

			<!-- PIE DE PÁGINA -->
                        
                        
                        
                        
                        
                        
			<footer id="footer">
                            <section id="servicios">
                            <center>
                                <section>
                                    <h3>Información</h3>
                                    
                                    <a href="<?= base_url ?>usuario/contacto"> <span class="glyphicon glyphicon-file"></span>Contacto</a>
                                    <a href="<?= base_url ?>usuario/nosotros"> <span class="glyphicon glyphicon-list-alt"></span>Nosotros</a>
                                    <a href="https://www.facebook.com/cristofer.gonzales.9212"> <span class="glyphicon glyphicon-book"></span>Facebook</a>
                                    <?php if(isset($_SESSION['identity'])): ?>
                                    <a href="<?= base_url ?>usuario/usuario"> <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>Cuenta</a>
                                    <?php endif; ?>
                                </section>
                            </center>
                        </section>
				<p>Desarrollado por Rodolfo Rivera Monjaras WEB &copy; <?= date('Y') ?></p>
                              
                                
			</footer>
		</div>
	</body>
</html>