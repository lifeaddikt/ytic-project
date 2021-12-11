<template>

    <main>
        <Menu />
        <Loader v-if="loading"/>
            <section v-if="!loading" class="page">
                    <div class="page-appear" v-if="!loading">
                        <h1>{{title}}</h1>
                        <div v-html="content">
                        </div>
                    </div>
            </section>
    </main>
    
</template>

<script>
import Menu from '../components/Menu.vue';
import Loader from '../components/Loader.vue';
import pageService from '../services/pageService.js';

export default {

    data(){
        return {
            title:'',
            content:'',
            loading:true,
        }

    },

    components: {
        Menu,
        Loader,
  },

    created(){
        this.loadPage();
    },

    methods : {
        async loadPage(){
            const allDatas = await pageService.loadPage();
            this.title = allDatas.title.rendered;
            this.content = allDatas.content.rendered;
            this.loaded();
        },

        loaded(){
            this.loading = false;
        },
    }

    
}
</script>


<style scoped lang="scss">
// Done in main.scss 


</style>