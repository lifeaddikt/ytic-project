<template>

    <main>
        <Menu />
        <Loader v-if="loading"/>
            <section v-if="!loading" class="info page">
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
        this.newtabsButton();
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

        newtabsButton(){
            setTimeout(() => {
              const buttons = document.querySelectorAll('.wp-block-file__button');
              buttons.forEach(button => {
                button.setAttribute('target', '_blank');
              });
            }, "1000")
        }
    }
    
}
</script>


<style scoped lang="scss">
// Done in main.scss 

.info {
    padding-bottom:45px;
}

</style>