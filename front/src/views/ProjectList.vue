<template>
    <main>
        <Menu />
        <Loader v-if="isLoading" />
        <section v-if="!isLoading" class="project-list">
            <ul>
                <li v-for="(item, index) in projectsList" :key="item.project.id">
                    <router-link :to="{ name: 'Projet', params: { slug: item.project.slug } }" >
                    ({{index + 1}}) {{item.project.title.rendered}}
                    </router-link>
                    <img v-if="item.project.acf.first_picture" :src="item.project.acf.first_picture.url" :alt="altPicture(item.project)" :style="position.first[item.positionIndex]"/>
                    <img v-if="item.project.acf.second_picture" :src="item.project.acf.second_picture.url" :alt="altPicture(item.project)" :style="position.second[item.positionIndex]"/>
                </li>
            </ul>
        </section>
    </main>
    
</template>

<script>
import Menu from '../components/Menu.vue';
import Loader from '../components/Loader.vue';

import projectService from '../services/projectService.js';

export default {

    components: {
        Menu,
        Loader
  },

    created(){

        this.loadProjects();
    },

    data(){
        return {
            projectsList: [],
            position:{
                first:['left:10%; top:20%;', 'top:5%; left:10%;', 'bottom:10%; left:10%;'],
                second:['right:15%; bottom:22.5%;', 'right:10%; bottom:20%;', 'top:7.5%; right:10%;']
            },
            isLoading: true,
        }
    },

    methods : {
        async loadProjects(){
            const list = await projectService.loadProjects();
            this.projectsList = list.map(item => ({ project : item, positionIndex : this.randomPositionIndex() }));
            this.isLoading = false;
        },

        randomPositionIndex(){
            const min = 0;
            const max = 2;

            return Math.floor(Math.random() * (max - min + 1)) + min;
        },

        altPicture(project){

            return project.acf.first_picture.alt ? project.acf.first_picture.alt : project.title.rendered;

        },
    },
    
}
</script>

<style scoped lang="scss">
@use "../assets/scss/variable.scss";
@use "../assets/scss/animation.scss";

.project-list {
    animation: componentAppear 1.5s linear forwards;
    height:calc(100vh - 2rem);
    width:100%;
    overflow:hidden;
    text-align: left;
    font-size: 10px;
    font-weight: bold;
    padding-top:1rem;
    position:relative;

    @media (min-width:1500px){
        max-height:94vh;
        padding-right:0;
        margin-left:2rem;
    }

    @media(min-height:600px){
        font-size: 20px;
        padding-top:4rem;
    }

    a {
        &:hover {
            color:white;
            animation : shining 2s infinite;
        }
    }

    

    img {
        z-index: -1;
        display:none;
        opacity: 0;
        max-width: 500px;
        max-height:400px;
        position:absolute;

        @media (min-width:1500px){
            max-width: 600px;
            max-height:450px;
        }
    }

    @media (min-width:1025px){
        padding-top:0rem;
        display: flex;
        align-items: flex-end;
    }
    

    ul {
        @media (min-width:1025px){
            display:inline;
    }
    }
    
    li {
        margin-bottom: variable.$small-gutter;
        font-weight:normal;
        font-size:32px;
        @media (min-width:1025px){
            display:inline-block;
            margin: variable.$tiny-gutter variable.$tiny-gutter 0 0;
            font-weight:normal;
            font-size:50px;
            &:hover img {
                display:block;
                animation: projectAppear .75s ease-in forwards;
            }
    }
    }
}

</style>