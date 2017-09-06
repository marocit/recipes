<template>
<form v-on:submit.prevent="addCategory" >
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

    </div>
</form>
</template>

<script>
    export default {
        props: ['recipe'],
        data() {
            return {
                name: '',
                recipe_id: this.recipe,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addCategory(){

            }
        }
    }
</script>
