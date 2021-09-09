<template>

    <main>
        <Menu />
        <transition name="fade" appear>
            <section class="page">
                <h1>{{title}}</h1>
                <div v-html="content">
                </div>
            </section>
        </transition>
    </main>
    
</template>

<script>
import Menu from '../components/Menu.vue';
import pageService from '../services/pageService.js';

export default {

    data(){
        return {
            title:'',
            content:''
        }

    },

    components: {
        Menu,
  },

    created(){
        this.loadPage();

    },

    methods : {
        async loadPage(){
            const allDatas = await pageService.loadPage();
            this.title = allDatas.title.rendered;
            this.content = allDatas.content.rendered;
        },
    }

    
}
</script>


<style scoped lang="scss">
// Done in main.scss 

h1 {
    margin-top:0;
}

</style>