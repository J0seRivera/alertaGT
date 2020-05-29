/*
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		console.log(respuesta);
    //console.log("coneccion exitosa");
    $("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}

buscar_datos();
// window.location.href = "./php/consultaMap.php";
*/
//import mapStyle from './frente-frio.js' //archivo del style map
const $map = document.querySelector('#map')
const map = new window.google.maps.Map($map, {
  center: {
    lat: 15.7270971,
    lng: -90.1819147
  },
  zoom: 7,
  
  //styles: mapStyle, //para el estilo del mapa
})
//renderData();

var nombre="Alerta"
var descrip="Movimiento telurico"
var numero="7.4"
function renderInfo(nombre, descrip,numero){
  return `
    <div>
      <p><strong>${nombre}</strong></p>
      <p>Descripcion:${descrip}</p>
      <p>Magnitud:${numero}</p>
    </div>
  `
}

const popup = new window.google.maps.InfoWindow()
async function renderData(lt, ln){
 
  const marker = new window.google.maps.Marker({
    position:{
      lat:lt,
      lng: ln,
    },
    map
  })
  marker.addListener('click', () =>{
    popup.setContent(renderInfo(nombre, descrip,numero))
    popup.open(map, marker)
  })
}


  var x, y;
 
  function dividirCadena(cadenaADividir,separador) {
    var arrayDeCadenas = cadenaADividir.split(separador);
 
    // for (var i=0; i < arrayDeCadenas.length; i++) {
    //   //  document.write(arrayDeCadenas[i] + " / ");
    //    console.log(arrayDeCadenas[i]);
    // }
     x=parseFloat(arrayDeCadenas[0]);
     y=parseFloat(arrayDeCadenas[1]);

    renderData(x,y);
 }

 var cadenaVerso = "15.7270971 -90.1819147";
 var espacio = " ";

 dividirCadena(cadenaVerso, espacio);
