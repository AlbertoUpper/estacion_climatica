
<div class="container mt-5 pt-3">
  <h1>Graficas.</h1>

  <div class="row">
    <div class="col-5">
      <div class="">
        <label for="">Selecciona un mes: </label>
        <select class="form-control" onChange="mostrarGrafica(this.value);">
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10" selected>Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row mt-3 mb-5 " style="border:1px solid black; max-height: 640px;">
    <div class="col-12">
      <div><canvas id="grafico" style="width: 100%; max-height: 400px">
        
      </canvas>
      <p class="text-center">Gráfica de Temperatura promedio del día.</p>
    </div>
    </div>
  </div>
</div>

