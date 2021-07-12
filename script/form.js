



fetch(`https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/${cible}`) //cible = personnel | personnel/id | cours | cours/id | planning | planning/id
.then(response => response.json())
.then(response => {
  let current = response.current_condition
  document.querySelector(".ville").innerHTML = response.city_info.name 
  let icon = document.querySelector(".meteo") 
  icon.src = current.icon_big
  icon.alt += response.city_info.name
  icon.style.display = "block"
  document.querySelector(".conditions").innerHTML = `
  <li>${current.tmp}</li>
  <li>${current.pressure}</li>
  <li>${current.condition}</li> `
})
  .catch(error => console.log(error))