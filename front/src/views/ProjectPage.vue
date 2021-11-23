<template>
    <main>
        <Menu />
        <Loader v-if="loading"/>
        <article v-if="!loading" class="page project-page">
            <header>
                <h1>{{ title }}</h1>
                <p class="project-page__date">{{date}}</p>
            </header>
            <div className="project-page__thumbnail">
                <img draggable="false" :src="imageUrl" :alt="imageAlt"/>
            </div>
            <div v-html="content" className="project-page__content">
            </div>

        </article>
    </main>
    
</template>

<script>
import Menu from '../components/Menu';
import Loader from '../components/Loader';
import projectService from '../services/projectService.js';

export default {

    async created(){
        const slug = this.$route.params.slug;
        const datas = await projectService.loadProject(slug);

        console.log(datas);

        this.title = datas.title.rendered;
        this.date = datas.acf.date;
        this.imageAlt = datas._embedded['wp:featuredmedia'][0].alt_text;
        this.imageUrl = datas._embedded['wp:featuredmedia'][0].source_url;
        this.content = datas.content.rendered;

        this.loading = false;

        this.updateTitle();
    },

    methods: {
        updateTitle(){
            document.title = `${process.env.VUE_APP_TITLE} - ${this.title}`
        }
    },

    data(){
        return {
            title: '',
            date:'',
            content:'',
            imageUrl: '',
            imageAlt: '',
            loading:true,
        }
    },

    components : {
        Menu,
        Loader
    },
    
}
</script>

<style lang="scss" scoped>
@use "../assets/scss/variable.scss";

.project-page {

    img {
        
        &:first-of-type {
            max-width:750px;
            max-height:750px;

        @media (min-width:768px){
            margin:0 auto variable.$big-gutter auto;
        }

        @media (min-width:1025px){
            max-width:80%;
            max-height:800px;
        }
        }
    }

    @media (min-width:1500px){
        padding:1rem 5rem;
    }

    header {
        @media (min-width:1025px){
            text-align: center;
        }
        margin-bottom:1rem;
        @media (min-width:1500px){
            margin: 1.5rem 0;
        }
        h1 {
            display: inline;
        }
    }

    &__date {
        display:inline;
        margin-left:5px;
        font-size: 12px;
        font-style:italic;
    }
}


</style>