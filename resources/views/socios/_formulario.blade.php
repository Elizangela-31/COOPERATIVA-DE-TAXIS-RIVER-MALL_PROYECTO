@include('componentes.errores')
<div class="row g-3">
    <div class="col-md-6"><label class="form-label">Nombres</label><input class="form-control" name="nombres" value="{{ old('nombres',$socio->nombres??'') }}" maxlength="100" required></div>
    <div class="col-md-6"><label class="form-label">Apellidos</label><input class="form-control" name="apellidos" value="{{ old('apellidos',$socio->apellidos??'') }}" maxlength="100" required></div>
    <div class="col-md-4"><label class="form-label">Cédula</label><input class="form-control" name="cedula" value="{{ old('cedula',$socio->cedula??'') }}" maxlength="10" inputmode="numeric" pattern="[0-9]{10}" required><div class="form-text">Ingrese los 10 dígitos.</div></div>
    <div class="col-md-4"><label class="form-label">Teléfono</label><input class="form-control" name="telefono" value="{{ old('telefono',$socio->telefono??'') }}" maxlength="15" required></div>
    <div class="col-md-4"><label class="form-label">Estado</label><select class="form-select" name="estado" required><option value="Activo" @selected(old('estado',$socio->estado??'Activo')==='Activo')>Activo</option><option value="Inactivo" @selected(old('estado',$socio->estado??'')==='Inactivo')>Inactivo</option></select></div>
    <div class="col-md-6"><label class="form-label">Correo electrónico <span class="text-muted fw-normal">(opcional)</span></label><input type="email" class="form-control" name="correo" value="{{ old('correo',$socio->correo??'') }}" maxlength="150"></div>
    <div class="col-md-6"><label class="form-label">Dirección</label><input class="form-control" name="direccion" value="{{ old('direccion',$socio->direccion??'') }}" maxlength="255" required></div>
</div>
@include('componentes.acciones_formulario',['rutaCancelar'=>route('socios.index'),'texto'=>isset($socio)?'Actualizar socio':'Guardar socio'])
