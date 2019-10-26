<footer class="py-2 bg-primary" style="align-self: flex-end; width: 100%">
      <div class="container">
        <hr class="bg-white">
        <p class="mb-1 text-center text-white">Copyright &copy; Electrónica Digital 02 - 2019</p>
      </div>      
</footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.js"></script>       
    <script src="js/jquery.nicescroll.min.js"></script> 
    <script src="js/Chart.min.js"></script>   
    <script>
    function mostrarGrafica(mess){
    $.ajax({
      type:'POST',
      url:'paginas/php/datosGrafica.php',
      data:'mes='+mess,
      success:function(data){
        var valores = eval(data);
        d1 = valores[0];
        d2 = valores[1];
        d3 = valores[2];
        d4 = valores[3];
        d5 = valores[4];
        d6 = valores[5];
        d7 = valores[6];
        d8 = valores[7];
        d9 = valores[8];
        d10 = valores[9];
        d11 = valores[10];
        d12 = valores[11];
        d13 = valores[12];
        d14 = valores[13];
        d15 = valores[14];
        d16 = valores[15];
        d17 = valores[16];
        d18 = valores[17];
        d19 = valores[18];
        d20 = valores[19];
        d21 = valores[20];
        d22 = valores[21];
        d23 = valores[22];
        d24 = valores[23];
        d25 = valores[24];
        d26 = valores[25];
        d27 = valores[26];
        d28 = valores[27];
        d29 = valores[28];
        d30 = valores[29];
        d31 = valores[30];
        datos = {
          labels : ['1','2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12','13','14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24','25','26', '27', '28', '29', '30', '31'],
          datasets : [{
              fillColor : 'rgba(0,125,253,0.8)',
              strokeColor : 'rgba(0,125,255,0.7)',
              highlightfill : 'rgba(73,206,180,0.6)',
              highlightStroke : 'rgba(7,7,157,0.7)',
              data : [ d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, d26, d27, d28, d29, d30, d31]
          }],

        }
       
        var contexto = document.getElementById('grafico').getContext('2d');
        window.Barra = new Chart(contexto).Bar(datos, {responsive : true});
      }
    });
    return false;
  }
    </script>   
</body>

</html>