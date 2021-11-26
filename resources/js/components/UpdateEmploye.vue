<template>
    <div>
        <h3 class="text-center">Edit employé</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="UpdateEmploye">
                    <div class="form-group">
                        <label>nom</label>
                        <input type="text" class="form-control" v-model="employe.nom">
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employe: {}
            }
        },
        mounted() {
            this.EditEmploye(this.$route.params.employeId);
        },
        methods: {
            EditEmploye(employeId) {
                this.axios.get(`http://127.0.0.1:8000/api/employes/${employeId}`)
                   .then((res) => {
                       this.employe = res.data;
                   });
            },
            UpdateEmploye() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/employes/${this.$route.params.employeId}`, this.employe)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>