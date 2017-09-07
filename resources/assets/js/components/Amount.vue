<template>
    <div class="column is-offset-1 m-t-20">
        <h2 class="title">Anzahl</h2>
        <form v-on:submit.prevent="addAmount">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field is-narrow">
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select v-model="tag">
                                    <option v-for="option in tags" v-bind:value="option.id" placeholder="test...">
                                        {{ option.name }}
                                     </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" v-model="amount" class="input" placeholder="Anzahl">
                        </div>
                    </div>
                 </div>
             </div>


                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">Füge Anzahl hinzu</button>
                    </p>
                </div>
        </form>
        <hr>
        <div class="menu">
            <ul v-for="tag in tags" class="menu-list">
                <li class="m-b-10"><strong class="m-r-10">{{ tag.name }}:</strong>{{ tag.pivot.amount }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['recipe'],
        data() {
            return {
                recipe_id: this.recipe,
                tags: [],
                tag: '',
                amount: ''
            }
        },
        mounted() {
            // this.fetchIngredients();
            this.fetchTags();
        },

        methods: {
            addAmount(){
                let self = this;
                    axios.post('/api/v1/apiamountstore', this.$data )
                    .then(function(response) {
                        self.fetchTags();
                        response => console.log(response.data);
                        console.log(self.$data);
                        self.amount =  '';
                        self.tag =  '';
                    })
                    .catch(response => console.log(this.$data));
            },
            fetchIngredients(){
               axios.get('/admin/fetchingredients/'+this.recipe)
                    .then(response => this.ingredients = response.data);
            },

            fetchTags(){
               axios.get('/api/v1/fetchtags/'+this.recipe)
                    .then(response => this.tags = response.data);
            }
        }
    }
</script>
