<template>
    <div>
        <app-layout>
            <article-form :article="article" action="create"></article-form>


        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ArticleForm from './Form'

export default {
    props: ['article'],
    components: {
        AppLayout,
        ArticleForm
    },
    mounted() {
        
    }

}
</script>