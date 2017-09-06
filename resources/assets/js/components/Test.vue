<template>
    <div class="column">
        <h2 class="title">Anzahl</h2>
        <form v-on:submit.prevent="addAmount" >
            <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="tags" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
    export default {
        components: { Multiselect },
        props: ['recipe'],
        data() {
            return {
                value: [
                    { name: 'Javascript', code: 'js' }
                  ],
                options: ['Select option', 'options', 'selected', 'mulitple', 'label', 'searchable', 'clearOnSelect', 'hideSelected', 'maxHeight', 'allowEmpty', 'showLabels', 'onChange', 'touched'],
                tags: [],
                tag: '',
                amount: ''
            }
        },
        mounted() {
            this.fetchalltags();
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
            fetchalltags(){
               axios.get('/api/v1/fetchalltags')
                    .then(response => this.tags = response.data);
            },

            fetchTags(){
               axios.get('/api/v1/fetchtags/'+this.recipe)
                    .then(response => this.tags = response.data);
            },
             addTag (newTag) {
                  const tag = {
                    name: newTag,
                    code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
                  }
                  this.options.push(tag)
                  this.value.push(tag)
                }

        }
    }
</script>
