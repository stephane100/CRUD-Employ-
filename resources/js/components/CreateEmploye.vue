<template>
    <div>
        <h3 class="text-center">Ajouter Employe</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="CreateEmploye">
                    <div class="form-group">
                        <label>nom</label>
                        <input type="text" class="form-control" v-model="employe.nom">
                    </div>

                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" class="form-control" v-model="employe.prenom">
                    </div>

                    <div class="form-group">
                        <label>age</label>
                        <input type="text" class="form-control" v-model="employe.age">
                    </div>

                    <div class="form-group">
                        <label>Poste</label>
                        <input type="text" class="form-control" v-model="employe.poste">
                    </div>

                     <div class="form-group">
                        <label>Titre</label>
                        <input type="text" class="form-control" v-model="employe.titre">
                    </div>

                    <div class="form-group">
                        <label>Déscription</label>
                        <input type="text" class="form-control" v-model="employe.description">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employe: {},
                
            }
        },
        methods: {
            CreateEmploye() {
                this.axios
                    .post('http://localhost:8000/api/employes',this.employe)
                    
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
                
            }
        }
    }
</script>