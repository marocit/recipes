<template>
<div class="drop_wrapper">
    <div class="drop_upload" v-if="showUpload">
        <p><a><span><i class="fa fa-times" v-on:click="showUpload = false"></i></span></a></p>
        <dropzone id="myVueDropzone"  v-on:vdropzone-success="showSuccess"
            :url= "recipeUrl"
            :useFontAwesome="true"
            acceptedFileTypes="image/*"
            :headers="csrfHeader"
            vdropzone-success="showSuccess"
            :useCustomDropzoneOptions="true"

        >
        <!-- Optional parameters if any! -->

        <input type="hidden" name="_token" v-bind:value="csrf" >
        </dropzone>
    </div>
    <div class="field">
        <p class="control">
            <button class="button is-primary" v-on:click="showUpload = true" v-if="!showUpload">Add Images</button>
        </p>
    </div>
</div>
</template>

<script>
import Dropzone from 'vue2-dropzone';
    export default {
        name: 'Drop',
        props: {
            recipe_id: {
                type: String
            },
            csrf: {
                type: String
            }
        },
        components: {
            Dropzone
        },
        created() {
            this.recipeUrl = "/api/v1/image-upload/"+this.recipe_id,
            this.csrfHeader = {
                'X-CSRF-TOKEN': this.csrf
            }
        },
        data() {
            return {
                showUpload: false,
                csrfHeader: null,
                recipeUrl: '',
                recipe: "/api/v1/image-upload/"+this.recipe_id,
                dropzoneOptions: {
                    autoProcessQueue: true,
                    uploadMultiple: true,
                    parallelUploads: 1000,
                    maxNumberOfFiles: 1000,
                }
            }
        },
        methods: {
            'showSuccess': function (file) {
            console.log('A file was successfully uploaded', file)
          }
        }
    }
</script>
