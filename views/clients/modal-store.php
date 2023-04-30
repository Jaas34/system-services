<div class="modal fade" id="saveClientModal" tabindex="-1" aria-labelledby="saveClientModalLabel" aria-hidden="true"> 
    <form id="store-client-form" action="" method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="saveClientModalLabel">Agregar cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class="col">                        
                                <label for="name" class="form-label">Compañia</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col">
                                <label for="type" class="form-label">Tipo</label>
                                <select id="type" name="type" class="form-select">
                                    <option value='' selected>Seleccione una opción</option>
                                    <option value="Empresa o Negocio">Empresa o Negocio</option>
                                    <option value="Institución Educativa">Institución Educativa</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-4">
                                <label for="adviser-selector" class="form-label">Asesor</label>
                                <select id="adviser-selector" name="adviser_id" class="form-select">
                                    <option value='' selected>Seleccione una opción</option>
                                </select>
                            </div>
                            <div class="col mt-4">
                                <label for="executive-selector" class="form-label">Ejecutivo</label>
                                <select id="executive-selector" name="executive_id" class="form-select">
                                    <option value='' selected>Seleccione una opción</option>
                                </select>
                            </div>
                        </div>
                        <div class="row checks">
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input checkboxes" type="checkbox" name="platform" id="cb-platform">
                                    <label class="form-check-label" for="cb-platform"> Plataforma </label>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input checkboxes" type="checkbox" name="catalog" id="cb-catalog">
                                    <label class="form-check-label" for="cb-catalog"> Catálogos </label>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input checkboxes" type="checkbox" name="content" id="cb-content">
                                    <label class="form-check-label" for="cb-content"> Contenido </label>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="form-check">
                                    <input class="form-check-input checkboxes" type="checkbox" name="other" id="cb-other">
                                    <label class="form-check-label" for="cb-other"> Otros </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>