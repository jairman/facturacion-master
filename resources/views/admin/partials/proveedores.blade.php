<div class="modal fade" id="modalAgregarProveedores" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Buscar Proveedor
					<span class="pull-right">
						<a class="btn btn-success btn-sm text-center" href="/clientes/nuevo" target="_blank" >
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						</a>
					</span>
				</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label class="sr-only">Buscar cliente</label>
						<div class="row">
							<div class="col-md-10">
								<input id="txtBuscadorCliente" class="form-control" type="text" name="BuscadorCliente" placeholder="Buscar cliente...">
							</div>
							<div class="col-md-2">
								<button id="btnBuscarCliente" type="submit" class="btn btn-primary btn-block">
									<i class="fa fa-search" aria-hidden="true"></i>									
								</button>
							</div>
						</div>						
						<hr/>
						<table width="100%" class="table-condensed table-striped table-bordered">
							<thead>
								<tr>
									<th width="5%">ID</th>
									<th width="20%">Nombre / Razón Social</th>
									<th width="20%">RUT</th>
									<th width="20%">Mail</th>
									<th width="20%">Dirección</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody id="tablaClientes">
								
							</tbody>
						</table>						
					</div>
				</form>
			</div>

			<div class="modal-footer">				
				<button id="btnOkModalAgregarCliente" class="btn btn-block btn-primary" data-dismiss="modal">
					Confirmar
				</button>
			</div>
		</div>
	</div>
</div>