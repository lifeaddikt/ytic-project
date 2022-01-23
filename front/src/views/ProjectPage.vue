<template>
    <main>
        <Menu />
        <article v-if="loading" class="page project-page">
            <Loader />
        </article>
            <article v-if="!loading" class="page project-page">
                <header class="header">
                    <router-link v-if="previousSlug" :to="{ name: 'Projet', params: { slug: previousSlug} }">
                    <span class="header__previous btn"><i class="fas fa-caret-left"></i></span>
                    </router-link>
                    <router-link v-if="nextSlug" :to="{ name: 'Projet', params: { slug: nextSlug} }">
                    <span class="header__next btn"><i class="fas fa-caret-right"></i></span>
                    </router-link>
                    <h1>{{ title }}</h1>
                    <p class="project-page__date">{{date}}</p>
                </header>
                <div class="project-page__thumbnail">
                    <img draggable="false" v-if="imageUrl.length !== 0" :src="imageUrl" :alt="imageAlt"/>
                </div>
                <div v-html="content" class="project-page__content">
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
        this.content = datas.content.rendered;

        if(datas._embedded['wp:featuredmedia']){
            this.imageAlt = datas._embedded['wp:featuredmedia'][0].alt_text;
            this.imageUrl = datas._embedded['wp:featuredmedia'][0].source_url;
        }

        if (datas.next){
            this.previousSlug = datas.next.slug;
            console.log(this.previousSlug);
        }

        if(datas.previous){
        this.nextSlug = datas.previous.slug;
        }

        this.loading = false;

        this.updateTitle();
    },

    updated(){
        this.setImageUndraggable();
    },

    methods: {
        updateTitle(){
            document.title = `${process.env.VUE_APP_TITLE} - ${this.title}`
        },

        setImageUndraggable(){
            const images = document.querySelectorAll('img');
            
            images.forEach(image => {
                image.setAttribute('draggable', false);
            });
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
            previousSlug:null,
            nextSlug:null
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

        @media (min-width:768px){
            margin:0 auto variable.$big-gutter auto;
        }

        @media (min-width:1025px){
            max-height:600px;
        }
        @media (min-width:1500px){
            max-height:700px;
        }
        }
    }

    @media (min-width:1500px){
        padding:1rem 5rem;
    }

    .header{
        position: relative;
        width:100%;
        text-align: center;

    .btn {
        position:absolute;
        top:50%;
        transform: translate(0, -60%);
        color: #aa65f2;
        font-size:20px;
        cursor: pointer;

        @media (min-width:1024px){
            font-size:30px;
        }
    }

    &__previous {
        left: - variable.$small-gutter;
    }

    &__next {
        right: - variable.$small-gutter;
    }

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

    padding-bottom:50px;

    @media (min-width:1025px){
        padding-bottom:0px;
    }
}


</style>