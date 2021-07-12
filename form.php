<form method="post" action="form">
<div class="field">
  <label class="label">raison de votre visite</label>
  <div class="control">
    <select name="raison" id="raison">
      <option value="selectionnez">selectionnez</option>
      <option value="formation">Suivre une formation</option>
      <option value="Rdv">Rendez-vous avec un membre du personnel</option>
    </select>
  </div>
</div>

<div class="field">
  <label class="label">qui souhaitez vous rencontrer</label>
  <div class="control">
    <input class="input" name="qui" type="text" placeholder="Adam Smith">
  </div>
</div>
<div class="field">
  <label class="label">Formation que vous suivez</label>
  <div class="control">
  <select name="formation" id="raison">
      <option value="ux">UX/UI les bests</option>
      <option value="front">Front-end les boss</option>
      <option value="back">back-end les buses</option>
    </select>
  </div>
</div>

    <input type="hidden" name="add_user">
    <button class="button is-primary">Confirmer</button>
</form>
<script src="script/form.js"></script>