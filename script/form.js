let form = document.querySelector(".form")
let complement = document.querySelector(".complement")
form.addEventListener("change", e => {
  e.preventDefault;
  if(e.target.classList.contains("form_raison")){
    if(e.target.value == "formation"){
      complement.innerHTML = 
      `
      <label class="label">Qui souhaitez vous rencontrer</label>
      <div class="control">
        <input class="input" name="qui" type="text" placeholder="Adam Smith">
      </div>
      `
    }else if(e.target.value == "rdv"){
      complement.innerHTML = 
      `
      <label class="label">Formation que vous suivez</label>
      <div class="control">
      <select name="formation" id="raison">
          <option value="ux">UX/UI les bests</option>
          <option value="front">Front-end les boss</option>
          <option value="back">back-end les buses</option>
        </select>
      </div>
      `
    }
    else{
      complement.innerHTML = ``
    }
  }
})


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