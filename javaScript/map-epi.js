import mapStyle from './map-style.js'// archivo del style map
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

function renderExtraData({ confirmed, deaths, recovered, provincestate, countryregion }) {
  return (`
    <div>
      <p> <strong>${provincestate} - ${countryregion}</strong> </p>
      <p> confirmados: ${confirmed} </p>
      <p> muertes: ${deaths} </p>
      <p> recuperados: ${recovered} </p>
    </div>
  `)
}

const icon = 'images/icon-pup.png'
    const popup = new window.google.maps.InfoWindow()
    async function renderData() {
      const data = await getData()
      data.forEach(item => {
        const marker = new window.google.maps.Marker({
          position: {
            lat: item.location.lat,
            lng: item.location.lng,
          },
          map,
          icon,
          title: String(item.confirmed),
        })
        marker.addListener('click', () => {
          popup.setContent(renderExtraData(item))
          popup.open(map, marker)
        })
      })
    
  }