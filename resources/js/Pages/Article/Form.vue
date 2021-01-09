<template>
    <div>
        <h1 class="text-4xl ml-5 mt-3 text-blue-900 font-serif italic">Nový článok</h1>
        <form>
        <div class="flex flex-row justify-between ml-5 mt-3 mr-5">
            <fieldset class="w-1/3">
                <label class="text-lg opacity-50 italic" for="title">Názov článku: </label><br />
                <input type="text" name="title" placeholder="názov článku" v-model="form.title" class="text-md border-black border-2 border-opacity-60 px-2 py-1 border-l-8 rounded-lg" :class="[$page.props.errors.title ? 'border-red-800 ' : '']"/>
                <div v-if="$page.props.errors.title" class="text-red-800 font-bold">{{ $page.props.errors.title }}</div>
            </fieldset>
            <fieldset class="w-1/3">
                <label class="text-lg opacity-50 italic" for="tags">Tagy: </label><br />
                <input type="text" name="title" placeholder="tagy článku" v-model="form.tags" class="text-md border-black border-2 border-opacity-60 px-2 py-1 border-l-8 rounded-lg"  :class="[$page.props.errors.tags ? 'border-red-800 ' : '']"/><br />
                <div v-if="$page.props.errors.tags" class="text-red-800 font-bold">{{ $page.props.errors.tags }}</div>
                <span class="text-sm italic"><b>delené čiarkou, bez diakritiky:</b> turnaj, 2020, Menic...</span>
            </fieldset>
            <fieldset class="w-1/3">
                <label class="text-lg opacity-50 italic" for="published_at">Publikovať: </label><br />
                <input type="datetime-local" name="published_at" v-model="form.published_at" placeholder="názov článku" class="text-md border-black border-2 border-opacity-60 px-2 py-1 border-l-8 rounded-lg"  :class="[$page.props.errors.published_at ? 'border-red-800 ' : '']"/>
                <div v-if="$page.props.errors.published_at" class="text-red-800 font-bold">{{ $page.props.errors.published_at }}</div>
            </fieldset>
        </div>
        <div class="ml-5 mt-3 mr-5">
            <fieldset class="w-full">
                <label class="text-lg opacity-50 italic" for="introduction">Úvod: </label>
                <div v-if="$page.props.errors.introduction" class="text-red-800 font-bold">{{ $page.props.errors.introduction }}</div>
                <ckeditor :editor="editor" v-model="form.introduction"></ckeditor>
            </fieldset>
        </div>
        <div class="ml-5 mt-3 mr-5">
            <fieldset class="w-full">
                <label class="text-lg opacity-50 italic" for="text">Text: </label>
                <div v-if="$page.props.errors.text" class="text-red-800 font-bold">{{ $page.props.errors.text }}</div>
                <ckeditor :editor="editor" v-model="form.text"></ckeditor>
            </fieldset>
        </div>
        <div class="ml-5 mt-3 mr-5 w-full text-center">
            <button @click.prevent="save" class="border-2 px-6 px-4 text-xl text-white bg-blue-900 rounded-lg hover:bg-indigo-600"> Uložiť </button>
        </div>

        </form>
    </div>
</template>
<style scoped>
    .ck-editor__editable
    {
        min-height: 150px !important;
        max-height: 400px !important;
    }
</style>
<script>
export default {
    props: ['article', 'action', 'errors'],
    data() {
        return {
            editor: ClassicEditor,
            form: this.$inertia.form({
                title: this.article.title || "",
                tags: this.article.tags || "",
                introduction: this.article.introduction || "",
                text: this.article.text || "",
                published_at: this.article.published_at || ""
             }),
        };
    },
    methods: {
        save(){
            console.log(this.endpoint)
            this.$inertia.post(this.endpoint, this.form)
            console.log(this.$page.props.errors)
        }
    },
    mounted(){
        console.log(this.article)
    },
    computed: {
        endpoint(){
            return this.action=="create" ? this.$route('article.store') : this.$route('article.update');
        }
    }
}
</script>