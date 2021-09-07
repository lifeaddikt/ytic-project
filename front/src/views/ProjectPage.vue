<template>
    <main>
        <Menu />
        <article class="page project-page">
            <header>
                <h1>{{ title }}</h1>
                <p class="project-page__date">{{date}}</p>
            </header>

            <img draggable="false" className="project-page__thumbnail" :src="imageUrl" :alt="imageAlt"/>
            <div v-html="content">
            </div>

        </article>
    </main>
    
</template>

<script>
import Menu from '../components/Menu';
import projectService from '../services/projectService.js';

export default {

    async created(){
        const slug = this.$route.params.slug;
        const datas = await projectService.loadProject(slug);

        console.log(datas);

        this.title = datas.title.rendered;
        this.date = datas.acf.date;
        this.content = datas.content.rendered;
        this.imageAlt = datas._embedded['wp:featuredmedia'][0].alt_text;
        this.imageUrl = datas._embedded['wp:featuredmedia'][0].source_url;
    },

    data(){
        return {
            title: '',
            date:'',
            content:'',
            imageUrl: '',
            imageAlt: ''

        }
    },

    components : {
        Menu
    },
    
}
</script>

<style lang="scss" scoped>

.project-page {

    width:90vw;
    border:none;

    header {
        @media (min-width:1024px){
            text-align: center;
        }
        margin-bottom:1rem;
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

    img:first-of-type {
        @media (min-width:1024px){
            max-height:750px;
            max-width: 1000px;
        }
    }

}


</style>