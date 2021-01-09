<template>
    <div>
        <app-layout>
            <article class="border-b-2">
                <header>
                    <h1 class="text-4xl text-blue-800 font-medium italic px-1 pt-1">{{ article.title }}</h1>
                </header>
                <main class="text-justify">
                    <div v-html="article.introduction"></div>
                    <div v-html="article.text"></div>
                </main>
                <footer class="mt-4">
                    <div class="text-gray-500 float-left mr-6 italic">Publikoval user dňa 28.9.2020 o 20:00 hod.</div>
                    <div class="text-gray-500 float-right mr-6 italic">zobraziť celý článok...</div>
                </footer>
            </article>
        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    props: ['article'],
    components: {
        AppLayout,
    },
    mounted() {
        console.log(this.article)
    }

}
</script>