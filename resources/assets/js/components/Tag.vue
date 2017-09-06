<template>
    <a class="level-item" @click.prevent="DeleteTag(tag_id)">
        <span class="icon is-small"><i class="fa fa-trash-o"></i></span>
    </a>
</template>

<script>
    export default {
        props: ['tag_id'],
        data() {
            return {

            }
        },
        mounted() {

        },

        methods: {
            DeleteTag(tag_id){
                let self = this;
                axios.delete('/recipes/tag/delete/'+ tag_id)
                    .then(function() {

                    })
                    .catch(response => console.log(response.data));
            }
        }

    }
</script>
