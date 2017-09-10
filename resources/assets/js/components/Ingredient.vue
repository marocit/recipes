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

                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label for="unit" class="label">Menge</label>
                                <p class="control">
                                    <input type="number" v-model="unit" name="unit" id="unit" class="input">
                                </p>
                            </div>

                            <div class="field">
                                <label for="einheit" class="label">Einheit</label>
                                <p class="control">
                                    <input type="text" v-model="einheit" name="einheit" id="einheit" class="input">
                                    <input type="text" class="is-hidden" v-model="recipe_id">
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="field is-grouped">
                        <p class="control">
                            <button class="button is-primary">Füge Zutat hinzu</button>
                        </p>
                    </div>

                </div>
                <div class="column is-offset-1">
                            <h3 class="title is-3">Zutaten</h3>
                            <div class="" v-for="ingredient in ingredients" :key="ingredient.id" v-on:delete="deleteIngredient">
                                <p class="subtitle is-5 m-b-5"> <strong>{{ingredient.name}}:</strong>
                                    {{ingredient.unit}}{{ingredient.einheit}}
                                    <a @click.prevent="deleteIngredient(ingredient.id)"><span class="icon icon-color m-l-10">
                                        <i class="fa fa-times"></i>
                                    </span></a>
                                </p>
                            </div>
                </div>

            </div>
        </form>
    </div>
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
            },
            deleteIngredient(id){
                let self = this;
                axios.delete('/api/v1/api-delete-ingredient/'+ id)
                    .then(function(response) {
                        // console.log(response.data)
                        self.ingredients = self.ingredients.filter((ingredient) => {
                          return ingredient.id !== id
                        })
                    })
            }
        }
    }
</script>
