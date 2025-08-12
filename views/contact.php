<h1> <?php echo" CONTACT"; ?></h1>
<!-- Vista: contact.php - Solo contiene la estructura específica de la página de contacto -->

<!-- Sección Hero -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold"><?php echo $pageTitle; ?></h1>
                <p class="lead">Estamos aquí para ayudarte. ¡Contáctanos y conversemos sobre tu proyecto!</p>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Información de Contacto y Formulario -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Información de Contacto -->
            <div class="col-lg-4 mb-5">
                <h2 class="display-6 fw-bold mb-4">Información de Contacto</h2>

                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Email</h6>
                            <p class="text-muted mb-0"><?php echo $contactInfo['email']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Teléfono</h6>
                            <p class="text-muted mb-0"><?php echo $contactInfo['phone']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Dirección</h6>
                            <p class="text-muted mb-0"><?php echo $contactInfo['address']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">Horarios</h6>
                            <p class="text-muted mb-0"><?php echo $contactInfo['hours']; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="mt-5">
                    <h5 class="mb-3">Síguenos en redes sociales</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fab fa-linkedin-in"></i>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Formulario de Contacto -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="display-6 fw-bold mb-4">Envíanos un mensaje</h2>

                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">Nombre *</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Apellido *</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Asunto *</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="">Selecciona un asunto</option>
                                    <option value="consulta">Consulta General</option>
                                    <option value="proyecto">Nuevo Proyecto</option>
                                    <option value="soporte">Soporte Técnico</option>
                                    <option value="cotizacion">Cotización</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">Mensaje *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Cuéntanos más sobre tu consulta..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" name="privacy" required>
                                    <label class="form-check-label" for="privacy">
                                        Acepto la <a href="#" class="text-decoration-none">política de privacidad</a> *
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i> Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección del Mapa -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="display-6 fw-bold text-center mb-5">Nuestra Ubicación</h2>
                <div class="ratio ratio-21x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2s!4v1645000000000!5m2!1sen!2s" 
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

 