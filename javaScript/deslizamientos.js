import mapStyle from './deslizamiento.js' //archivo del style map
const $map = document.querySelector('#map')
const map = new window.google.maps.Map($map, {
  center: {
    lat: 15.7270971,
    lng: -90.1819147
  },
  zoom: 7,
  
  styles: mapStyle, //para el estilo del mapa
})
renderData()
async function getData(){
  const response = await fetch('https://wuhan-coronavirus-api.laeyoung.endpoint.ainize.ai/jhu-edu/latest')
  const data = await response.json()
  return data
}
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
const icon = 'images/des.png'
const popup = new window.google.maps.InfoWindow()
async function renderData(lt, ln){
  // const data = await getData()
  // console.log(data)
  //12-17.5
  //-92 -88
  const marker = new window.google.maps.Marker({
    position:{
      lat:lt,
      lng: ln,
    },
    map,
    icon,
  })
  marker.addListener('click', () =>{
    popup.setContent(renderInfo(nombre, descrip,numero))
    popup.open(map, marker)
  })
}

function aleatorio(min, maxi)
  {
    var resultado;
    resultado = (Math.random() * (maxi - min + 1 )) + min;
    return resultado;
  }

  var x, y;
  
  for (var i = 0 ; i < 5; i ++){
  x=aleatorio(14,15.5);
  y= aleatorio(-91.5, -90)
  renderData(x,y)
  console.log(x,y)
  }