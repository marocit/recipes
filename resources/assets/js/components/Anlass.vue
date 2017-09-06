<template>
    <div>
    <form v-on:submit.prevent="addIngredient" >
    <div class="columns">

        <div class="column is-half">

               <div class="field">
                <label for="name" class="label">Name</label>
                <p class="control">
                    <input type="text" v-model="name" name="name" id="name" class="input">
                </p>
            </div>

            <div class="field is-grouped">
                <p class="control">
                    <button class="button is-primary">Füge Zutat hinzu</button>
                </p>
            </div>

        </div>
        <div class="column is-offset-1">
                    <h3 class="title is-3">Zutaten</h3>
                    <div class="" v-for="data in ingredients">
                        <p class="subtitle is-5 m-b-5"> <strong>{{data.name}}:</strong>
                            {{data.unit}}{{data.einheit}}
                        </p>
                    </div>
        </div>

    </div>
    </form>
    </div>




    <!-- <div class="portlet light">
        <form v-on:submit.prevent="addIngredient" method="post" >
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" id="name" v-model="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Menge</label>
                        <input type="text" id="unit" v-model="unit" class="form-control" placeholder="Menge">
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Einheit</label>
                        <input type="text" id="einheit" v-model="einheit" class="form-control" placeholder="Einheit z.B. in g">
                        <input type="text" id="recipe_id" v-model="recipe_id" class="form-control hidden" placeholder="Enter text">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Zutat</button>
        </form>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <dl v-for="data in ingredients" class="dl-horizontal">
                    <dt> {{data.name}}</dt>
                    <dd>{{ data.unit }} {{ data.einheit }}</dd>
                </dl>
            </div>
        </div>
    </div> -->
</template>

<script>
    export default {
        props: ['recipe'],
        data() {
            return {
                name: '',
                unit: '',
                einheit: '',
                recipe_id: this.recipe,
                ingredients: [],
                cause: [],
                tags: [],
                tag: '',
                amount: ''
            }
        },


        mounted() {
            this.fetchIngredients();
            // this.fetchTags();
        },

        methods: {
            addCause() {
                let self = this;
                axios.post('/api/v1/cause' , this.$data)
                    .then(function(response) {
                        self.fetchIngredients();
                        response => console.log(response.data);
                        console.log(self.$data);
                        self.ingredients.push(response.data)
                        self.name = '';
                        self.unit = '';
                        self.einheit = '';
                    })
                    .catch(response => console.log(this.$data));
            },
            fetchCause(){
               axios.get('/api/v1/cause'+this.recipe)
                    .then(response => this.cause = response.data);
            },
            addIngredient(){
                let self = this;
            axios.post('/ingredientstore' , this.$data)
                    .then(function(response) {
                        self.fetchIngredients();
                        response => console.log(response.data);
                        console.log(self.$data);
                        self.ingredients.push(response.data)
                        self.name = '';
                        self.unit = '';
                        self.einheit = '';
                    })
                    .catch(response => console.log(this.$data));
            },
            addAmount(){
                let self = this;
                    axios.post('/admin/amountstore', this.$data )
                    .then(function(response) {
                        self.fetchTags();
                        response => console.log(response.data);
                        console.log(self.$data);
                    })
                    .catch(response => console.log(this.$data));
            },
            fetchIngredients(){
               axios.get('/fetchingredients/'+this.recipe)
                    .then(response => this.ingredients = response.data);
            },

            fetchTags(){
               axios.get('/admin/fetchingtags/'+this.recipe)
                    .then(response => this.tags = response.data);
            }
        }
    }
</script>
