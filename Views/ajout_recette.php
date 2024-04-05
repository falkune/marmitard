<div class="container">
<form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="email" name="titre" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" class="form-control"> </textarea>
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Saisir les ingredients</label>
        <input type="text" id="ingredient" class="form-control">
        <button id="add">add</button>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Liste ingredients</label>
        <input type="text" id="liste_ingredient" name="ingredient" class="form-control" disabled>
    </div>

   
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('add').addEventListener("click", (e) => {
        e.preventDefault();
        let item = document.getElementById("ingredient").value;

        const LISTE = document.getElementById("liste_ingredient");
        if(LISTE.value == ''){
            LISTE.value = item
        }else{
            LISTE.value +=","+item;
        }
        
        document.getElementById("ingredient").value = "";
    })
</script>