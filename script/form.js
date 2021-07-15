let form_raison = document.querySelector(".form_raison")
let complement = document.querySelector(".complement")
let personnel = document.querySelector(".personnel")
let planning = document.querySelector(".planning")

//si il y a un changement dans l'input des raisons de visite, affiche la deuxième partie du formualaire qui correspond
form_raison.addEventListener("change", e => {
  e.preventDefault;
  list_qui.innerHTML= ''

    if(e.target.value == "formation"){
      personnel.value = null
      fetch("https://firestore.googleapis.com/v1/projects/ingrwf09/databases/(default)/documents/planning")
      .then(response => response.json())
      .then(response => {
      complement.innerHTML = `
      <label class="label">Formation que vous suivez</label>
      <div class="control">
      <select name="complement" class="select"  id="raison">
      </select>
      </div>
      `
      datas = response.documents
        select = document.querySelector(".select")
        datas.forEach(e => {
          fetch(`https://firestore.googleapis.com/v1/${e.fields.cours.referenceValue}`)
          .then(doc => doc.json())
          .then(cours => {
            select.innerHTML += `
            <option data-id="${e.name}" value = "${e.name}">${cours.fields.label.stringValue}</option>
            `
          })

        });
        select.addEventListener("change", e => {
          e.preventDefault
          planning.value = e.target.value
        })
      })
    }else if(e.target.value == "rdv"){
      complement.innerHTML = 
   `
      <label class="label">Qui souhaitez vous rencontrer</label>
      <div class="control">
        <input class="input" name="complement" type="text" placeholder="Adam Smith">
      </div>
      `
    }
    else{
      complement.innerHTML = ``
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
          if(prenom.includes(e.target.value)){
          let nom = results[i].fields.nom.stringValue
          list_qui.innerHTML += `<li data-id="${results[i].name}"  class="list-item list_qui-item">${prenom} ${nom} </li>`
        }
      }
  })
})

//si click sur un élément de la liste du personnel, remplir l'input avec le nom de la personne clickée
list_qui.addEventListener("click", e => {
  e.preventDefault
  if(e.target.classList.contains("list_qui-item")){
    complement.childNodes[3].childNodes[1].value = e.target.innerHTML
    personnel.value = e.target.dataset.id
  }
})

