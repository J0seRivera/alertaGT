import mapStyle from './inundacion-map.js' //archivo del style map
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
var descrip="Desborde"
function renderInfo(nombre, descrip){
  return `
    <div>
      <p><strong>${nombre}</strong></p>
      <p>Descripcion:${descrip}</p>
      
    </div>
  `
}
//const icon = 'images/antena.png'
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
   // icon,
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
  var no_lavels=10;
  for (var i = 0 ; i < 35; i ++){
    x=aleatorio(14,15);
    y= aleatorio(-92, -90)
    renderData(x,y)
    console.log(x,y)
    
  }