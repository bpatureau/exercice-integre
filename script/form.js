let form = document.querySelector(".form")
let complement = document.querySelector(".complement")

//si il y a un changement dans l'input des raisons de visite, affiche la deuxième partie du formualaire qui correspond
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
      <select name="formation"  id="raison">
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

//affichage de la liste du personnel dont le prénom contient le contenu de l'input
let list_qui = document.querySelector(".list_qui")
complement.addEventListener("keyup", e => {
  e.preventDefault
  fetch("https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/personnel")
  .then(response => response.json())
  .then(response => {
      list_qui.innerHTML = ''
      list_qui.classList.remove("hidden")
      let results = response.documents
      for (let i = 0; i < results.length; i++) {
          let prenom = results[i].fields.prenom.stringValue
          console.log(e.target.value)
          if(prenom.includes(e.target.value)){
          let nom = results[i].fields.nom.stringValue
          list_qui.innerHTML += `<li data-id="${i}" class="list-item list_qui-item">${prenom} ${nom} </li>`
        }
      }
  })
})

//si click sur un élément de la liste du personnel, remplir l'input avec le nom de la personne clickée
list_qui.addEventListener("click", e => {
  e.preventDefault
  if(e.target.classList.contains("list_qui-item")){
    console.log("hello")
  }
})