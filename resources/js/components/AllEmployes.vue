<template>
    <div>
        <h2 class="text-center">Liste des Employés</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'CreateEmploye' }" class="btn btn-primary btn-sm float-right mb-2">Ajouter un employé</router-link>
            </div>
        </div>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Poste</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Action</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="employe in employes" :key="employe.id">
                <td>{{ employe.id }}</td>
                <td>{{ employe.nom }}</td>
                <td>{{ employe.prenom }}</td>
                <td>{{ employe.age }}</td>
                <td>{{ employe.poste }}</td>
                <td>{{employe.experience.titre}}</td>
                <td>{{ employe.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'UpdateEmploye', params: { id: employe.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteEmploye(employe.id)">Supprimer</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employes: [],
                experience: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/employes/')
                .then(response => {
                    this.employes = response.data;
                });
        },
        
        methods: {
            deleteEmploye(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/employes/${id}`)
                    .then(response => {
                        let i = this.employes.map(data => data.id).indexOf(id);
                        this.employes.splice(i, 1)
                    });
            }
        }
    }
</script>